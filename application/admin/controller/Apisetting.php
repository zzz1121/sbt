<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\api;
class Apisetting extends Online
{
    protected $sye_rate;
    protected $role_rate;
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $sye_rate=Db::table('rate')
            ->where('id',1)
            ->field('settle_rate')
            ->find()['settle_rate'];
        $this->sye_rate=$sye_rate;
        $role_rate=Db::table('role')
            ->where("role_id",$this->role_id)
            ->field('settle_rate')
            ->find()['settle_rate'];
        $this->role_rate=$role_rate;
    }

    public function index()
    {
        if(request()->isGet()){
            $id=input('id/d',1);
            $this->assign('settle_rate',$this->sye_rate);
            $rate_data=Db::table('rate')
                ->where('id',$id)
                ->find();
            $this->assign('rate_data',$rate_data);

            $this->assign("sye_rate",$this->sye_rate);
            return $this->fetch('rate');
        }elseif(request()->isPost()){
            $role_id=input('role_id');
            if(empty($role_id)){
                $this->returnMsg['message']='角色id不能为空';
                return $this->returnMsg;
            }
            $role_data=Db::table('role')
                ->where('role_id',$role_id)
                ->find();
            $this->returnMsg['status']=200;
            $this->returnMsg['message']='请求成功';
            $this->returnMsg['data']=$role_data;
            return $this->returnMsg;
        }
    }



    public function update(){
        if(request()->isPost()){
            $id=input('id');
            $settle_rate=input('post.settle_rate',0.005);
            $extra_rate_type=input('post.extra_rate_type',"AMOUNT");
            $extra_rate=input('post.extra_rate',200);
            $min_charge=input('post.min_charge',300);
            $parent=input('parent',0.007);
            $superior=input('superior',0.003);
            $pay_prot_id=input('pay_prot_id');
            $period=input('period');
            $start_time=input('start_time',"00:00:00");
            $end_time=input('end_time',"23:59:59");
            if($extra_rate<1){
                $extra_rate_type="RATE";
            }
            if(empty($id)){
                $this->returnMsg['message']='请选择设定提现模式';
                return $this->returnMsg;
            }
            $save_data=[
                'settle_rate'=>  $settle_rate,
                'extra_rate_type'=>$extra_rate_type,
                'extra_rate'=>$extra_rate,
                'min_charge'=>$min_charge,
                'parent'=>$parent,
                'superior'=>$superior,
                'pay_prot_id'=>$pay_prot_id,
                'update_time'=>time(),
                'start_time'=>$start_time,
                'end_time'=>$end_time
            ];

            $admin=Db::table('rate')
                ->where('id',$id)
                ->update($save_data);
            if($admin==0){
                $this->returnMsg['message']='写入失败';
                return $this->returnMsg;
            }
            $period_res=Db::table('rate')
				->where('id','>',0)
                ->update(['period'=>$period]);
//            if(!$period_res){
//                $this->returnMsg['message']='分润入账时间设定失败';
//                return $this->returnMsg;
//            }

            $this->returnMsg['url']=url('charge/index')."?id=".$id;
            $this->returnMsg['message']='设定成功';
            $this->returnMsg['status']=200;
            return $this->returnMsg;

        }
    }

    //代理商汇率修改
    public function role_rate(){
        $settle_rate=input('post.settle_rate');
        $role_id=input('post.role_id');
        $save_data=input('post.');
        if($settle_rate>$this->sye_rate){
            $this->returnMsg['message']='输入汇率不能高于平台最高汇率';
            return $this->returnMsg;
        }
        $result=Db::table('role')
            ->where("role_id",$role_id)
            ->update($save_data);

        if(!$result){
            $this->returnMsg['message']='更新失败';
            return $this->returnMsg;
        }
        $this->returnMsg['message']='更新成功';
        $this->returnMsg['status']=200;
        return $this->returnMsg;
    }



}
