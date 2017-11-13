<?php
/**
 * @author qianwang-zlq
 * @version 2017-06-04
 *  api 操作判定父类
 */

namespace app\api\controller;
use think\Db;
class Online extends Index
{
//   protected $sbt_url="http://testapi.shangfudata.com";
   protected $sbt_url;
       public function _initialize()
       {
           parent::_initialize(); // TODO: Change the autogenerated stub
       $is_login=$this->token_check();
       if($is_login!==200){
		   $this->returnMsg['status']=404;
           $this->returnMsg['message']='登录授权过期,请重新登录';
           echo json_encode($this->returnMsg);
           die();
       }
	  // $this->returnMsg['statuas']=$this->online['login_status'];
	   if($this->online['login_status']!=1){
			$this->returnMsg['message']='您的帐户已经被锁定,请联系客服';
			$this->returnMsg['status']=401;
			echo json_encode($this->returnMsg);
			die();
		}

       $this->sbt_url=config('sbt_api_url');
   }
    
    //绑定推荐人
    public function bind_recommend(){
		
        if(request()->isPost()){
			
            $user_id=input('phone');
            $merchant=input('recommend');
			
            if(empty($user_id) || empty($merchant)){
                $this->returnMsg['message']='请求数据不能为空';
                return $this->returnMsg;
            }
			
            if (!preg_match("/^1[34578]{1}\d{9}$/", $user_id)) {
                $this->returnMsg['message']='请输入有效手机号';
				return $this->returnMsg;
            }
			
			
            if (!preg_match("/^1[34578]{1}\d{9}$/", $merchant)) {
                $this->returnMsg['message']='请输入有效推荐人手机号';
            }
			
            $user_data=model('user')
                ->where('user_id',$user_id)
                ->field('merchant_id')
                ->find();
            if(!empty($user_data['merchant_id'])){
                $this->returnMsg['message']='该用户已注册推荐人,无法重复绑定';
                return $this->returnMsg;
            }
			if($merchant==$user_id){
				$this->returnMsg['message']='请勿输入自身手机号';
                return $this->returnMsg;
			}
            $merchant_data=Db::table('user')
                ->where('user_id',$merchant)
                ->find();
            if(empty($merchant_data)){
                $this->returnMsg['message']='推荐人不存在,请重新输入';
                return $this->returnMsg;
            }
			if($merchant_data['merchant_id']==$user_id){
				$this->returnMsg['message']='不能绑定自身推广商户为推广人';
                return $this->returnMsg;
			}
			 
            // 启动事务
            Db::startTrans();

            $update_data['merchant_id']=$merchant;
            if($merchant_data['user_type']==2 && $merchant_data['is_merchant']==2){
                $update_data['settle_rate']=$merchant_data['settle_2'];
                $update_data['group_id']=$merchant;
                $update_data['group_up']=$merchant;
                $update_data['user_type']=2;
            }elseif($merchant_data['user_type']==2 && $merchant_data['group_id']==$merchant_data['group_up']){
                $settle_3=model('user')
                    ->where('user_id',$merchant_data['group_id'])
                    ->value('settle_3');
                $update_data['settle_rate']=$settle_3;
                $update_data['group_id']=$merchant_data['group_id'];
                $update_data['group_up']=$merchant;
                $update_data['user_type']=2;
            }elseif($merchant_data['user_type']==2 ){
                $settle_3=model('user')
                    ->where('user_id',$merchant_data['group_id'])
                    ->value('settle_3');
                $update_data['settle_rate']=$settle_3;
                $update_data['group_id']=$merchant_data['group_id'];
                $update_data['group_up']=$merchant_data['group_up'];
                $update_data['user_type']=2;
            }

			$user_update=model('user')
				->where('user_id',$user_id)
				->update($update_data);
			if($user_update==0){
				$this->returnMsg['message']='推荐人保存失败';
                return $this->returnMsg;
			}
			
            $result=model('user')
                ->where('user_id',$merchant)
                ->update(['underling'=>($merchant_data['underling']+1)]);
            if($result==0){
                $this->returnMsg['message']='推荐人保存失败';
                return $this->returnMsg;
            }
			
            if(!empty($merchant_data['merchant_id'])){
                $superior_data=model('user')
                    ->where('user_id',$merchant_data['merchant_id'])
                    ->find();
                $result2=model('user')
                    ->where('user_id',$superior_data['user_id'])
                    ->update(['indirect'=>($superior_data['indirect']+1)]);
            }
            if($result>0 && empty($merchant_data['merchant_id']) ||$result>0 && $result2>0 && !empty($merchant_data['merchant_id'])){
                Db::commit();
					
            }else{
                Db::rollback();
                $this->returnMsg['message']='保存失败,请重试';
                return $this->returnMsg;
            }


            $this->returnMsg['message']='推荐人保存成功';
            $this->returnMsg['status']=200;
            return $this->returnMsg;
        }
    }


}
