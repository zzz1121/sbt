<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Session;

class UserCard extends Online {

    public function index() {

        $card_status = input('card_status');
        $keyworld = input('keyworld');
        $where['user_id']=array('>',0);
        if(!empty($card_status) && $card_status >-1){
            $where['card_type'] = $card_status;
        }


        if (!empty($keyworld)) {
            if (preg_match("/^1[34578]{1}\d{9}$/", $keyworld)) {
                $where['user_id'] = $keyworld;
            } else {
                $where['name'] = array('like', "%$keyworld%");
            }
        }

        $user_list_count = Db::table('user_card')->where($where)->count();
        $lists = Db::table('user_card')->where($where)->paginate(10, $user_list_count,[
            'page' => input('param.page'),
            'path'=>url('index').'?page=[PAGE]'."&card_status=".$card_status."&keyworld=".$keyworld
        ]);

        $page = $lists->render();


        $this->assign('pages', $page);
        $this->assign('lists', $lists);

        return $this->fetch();

    }




    public function update(){
        if(request()->isPost()){
            $id=input('post.id');
            $update=input('post.');
            $user_data=model('usercard')
                ->where('id',$id)
                ->find();
            if(empty($user_data)){
                $this->returnMsg['message']='卡片不存在';
                return $this->returnMsg;
            }
            if($update['card_end']>1299){
                $this->returnMsg['message']='请输入正确的有效日期';
                return $this->returnMsg;
            }
            unset($update['id']);
            $result=model('usercard')
                ->where('id',$id)
                ->update($update);

            if(!$result){
                $this->returnMsg['message']='修改失败，请重试';
                return $this->returnMsg;
            }
            // 提交事务
            $this->returnMsg['message']='设定成功';
            $this->returnMsg['status']=200;
            $this->returnMsg['url']=url('edit?id='.$id);
            return $this->returnMsg;

        }
    }


    public function edit($id=null){
        if(empty($id)){
            $this->redirect('usercard/index');
        }
        $user_card=model('usercard')
            ->where('id',$id)
//            ->field('name,address,number,balance,user_id,reg_time,underling,indirect,role_id,login_status')
            ->find();
        if(empty($user_card)){
            $this->redirect('usercard/index');
        }

        $this->assign('user_card',$user_card);
        return $this->fetch();
    }



    // 添加代理
    public function insert_merchant(){
        if(request()->isPost()){
            $user_arr=input('user_id/a');
            $role_id=input('role_id');
            if(empty($role_id)){
                $this->returnMsg['message']='选择等级错误';
            }
            if(count($user_arr)==1){
                $user_id=$user_arr[0];

                if (!preg_match("/^1[34578]{1}\d{9}$/", $user_id)) {
                    $this->returnMsg['message']="用户账号有误";
                    return $this->returnMsg;
                }

                $user_data=model('user')
                    ->where('user_id',$user_id)
                    ->field('user_id,name,card_status')
                    ->find();
                if(empty($user_data)){
                    $this->returnMsg['message']='用户不存在,无法升级';
                    return $this->returnMsg;
                }
                if($user_data['card_status']!==1){
                    $this->returnMsg['message']='用户尚未实名认证,无法升级为代理';
                    return $this->returnMsg;
                }
                if($role_id==0){
                    $this->returnMsg['message']='超出设定权限';
                    return $this->returnMsg;
                }

                $add_user=Db::table('user')
                    ->where('user_id',$user_data['user_id'])
                    ->update([
                        'role_id'=>$role_id
                    ]);
                if($add_user==0){
                    $this->returnMsg['message']='设定失败,请刷新重试';
                    return $this->returnMsg;
                }
                // 提交事务
                $this->returnMsg['message']='用户角色等级设定成功';
                $this->returnMsg['status']=200;
                return $this->returnMsg;
            }else{
                foreach($user_arr as $val){
                    $user_id=$val;
                    if (!preg_match("/^1[34578]{1}\d{9}$/", $user_id)) {
                        $this->returnMsg['message']="用户账号有误";
                        return $this->returnMsg;
                    }

                    $user_data=model('user')
                        ->where('user_id',$user_id)
                        ->field('user_id,name,card_status')
                        ->find();
                    if(empty($user_data)){
                        $this->returnMsg['message']='用户不存在,无法升级';
                        return $this->returnMsg;
                    }
                    if($user_data['card_status']!==1){
                        $this->returnMsg['message']=$val.'用户尚未实名认证,无法升级为代理';
                        return $this->returnMsg;
                    }
                    if($role_id==0){
                        $this->returnMsg['message']='超出设定权限';
                        return $this->returnMsg;
                    }

                    $add_user=Db::table('user')
                        ->where('user_id',$user_data['user_id'])
                        ->update([
                            'role_id'=>$role_id
                        ]);
                    if($add_user==0){
                        $this->returnMsg['message']=$val.'设定失败,请刷新重试';
                        return $this->returnMsg;
                    }
                }
                $this->returnMsg['message']='设定成功';
                $this->returnMsg['status']=200;
                return $this->returnMsg;

            }

        }
    }
}
