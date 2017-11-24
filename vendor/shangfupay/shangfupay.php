<?php
//汇享快捷支付
class ShangfuPay
{

//    //机构号
//    private $appId = 'a856dde9d4a343b186b12de4278d78fa';


    private $sp_id_1='1086-1';
    private $publicKey_1='AC0838C5EDE74CDC97A449659E8EFC2A';


    private $sp_id_2='1086-2';
    private $publicKey_2='D7B06CF4779B444AB944DBBF5AE9641F';

    //商户入网地址
    private $sbt_url = 'http://api.shangfudata.com';

    //回调地址
    private $notify_url = 'http://sbt.um500.com/index.php/api/callback';

    static private $count=0;




    //商户注册
    public function reg($data,$sp_id="1086-2")
    {

        if(empty($data)){
            return 400;
        }
        $post_data = [
            'sp_id' => $sp_id, //平台号
            'mcht_name' => '个体商户',//商户类型
            'mcht_short_name' => $data['name'] . '的店铺',//店铺名
            'address' => $data['address'],//地址
            'leg_name' => $data['name'],//姓名
            'leg_phone' => $data['user_id'],//手机号
            'leg_email' => $data['user_id'] . '@163.com',//邮箱地址
            'acc_no' => $data['card_id'],//收款卡号
            'acc_bank_name' => $data['card_name'],//银行名称
            'acc_bank_no' => $data['bank_no'],//银行联号
            'service_tel' => $data['card_phone'],//银行预留好
            'id_type' => '01',//证件类型
            'id_no' => $data['number'],//身份证号
            'nonce_str' => $this->random(4, 1)//随机数
        ];
        if($sp_id=='1086-1'){
            $public_kye=$this->publicKey_1;
        }else{
            $public_kye=$this->publicKey_2;
        }

        $post_data = $this->sbt_sign($post_data,$public_kye);
        $url = $this->sbt_url . '/gate/msvr/mbreg';
        $result = $this->http($url, false, $post_data['data']);
        if(empty($result)){
            return false;
        }
        return $result;


    }

    //上福通道业务开通
    public function busiopen($data,$sp_id='1086-2',$busi_type="EPAYS"){
        $reg_data = [
            'sp_id' => $sp_id,
            'mcht_no' => $data['mcht_no'],
            'busi_type' => $busi_type,
            'settle_type' => 'REAL_PAY',
            'settle_rate' => $data['settle_rate'],
            'extra_rate_type' => 'AMOUNT',
            'extra_rate' => $data['extra_rate'],
            'nonce_str' => $this->random(4, 1)
        ];
        if($sp_id=='1086-1'){
            $public_kye=$this->publicKey_1;
        }else{
            $public_kye=$this->publicKey_2;
        }
        $reg_data = $this->sbt_sign($reg_data,$public_kye);
        $url = $this->sbt_url . '/gate/msvr/busiopen';
        $result_reg = $this->http($url, false, $reg_data['data']);
        return $result_reg;
    }
    //账户信息更新状态
    public function update_status($data,$pay_id="1")
    {
        if($pay_id==1){
            $sp_id="1086-2";
        }else{
            $sp_id="1086-1";
        }
        $reg_data = [
            'sp_id' => $sp_id,
            'mcht_no' => $data['mcht_no'],
            'busi_type' => 'EPAYS',
            'settle_type' => 'REAL_PAY',
            'settle_rate' => $data['settle_rate'],
            'extra_rate_type' => "AMOUNT",
            'extra_rate' => $data['extra_rate'],
            'nonce_str' => $this->random(4, 1)
        ];
        if($sp_id=='1086-1'){
            $public_kye=$this->publicKey_1;
        }else{
            $public_kye=$this->publicKey_2;
        }
        $this->log_write('shangfu_log',$reg_data);
        $reg_data = $this->sbt_sign($reg_data,$public_kye);
        $url = config('sbt_api_url'). '/gate/msvr/busiratemodify';
        $result_reg = $this->http($url, false, $reg_data['data']);
        $this->log_write('shangfu_log',$url);
        $this->log_write('shangfu_log',$result_reg);
        if(empty($result_reg)){
            $this->returnMsg['message'] = '系统繁忙，请稍候再试';
            return 401;
        }
        if ($result_reg->status !== 'SUCCESS') {
            $this->returnMsg['message'] = $result_reg->message;
            //return $this->returnMsg;
            return 401;
        }
        if($result_reg->result_code!=="SUCCESS"){
            $this->returnMsg['message'] = $result_reg->err_msg;
            //return $this->returnMsg;
            return 401;
        }
        return 200;
    }

    //修改绑定卡
    public function change_card($data,$pay_id='1'){
        if($pay_id==1){
            $sp_id="1086-2";
        }else{
            $sp_id="1086-1";
        }
        if($sp_id=='1086-1'){
            $public_kye=$this->publicKey_1;
        }else{
            $public_kye=$this->publicKey_2;
        }
        $reg_data = [
            'sp_id' => $sp_id,
            'mcht_no'=>$data['mcht_no'],
            'acc_no' => $data['card_id'],
            'acc_bank_name' => $data['bank_name'],
            'acc_bank_no' => $data['bank_no'],
            'service_tel' => $data['card_phone'],
            'nonce_str' => $this->random(4, 1)
        ];

        $url = $this->sbt_url . '/gate/msvr/modify/mbsettle';

        $this->log_write('shangfu_log',$reg_data);
        $reg_data = $this->sbt_sign($reg_data,$public_kye);
        $result = $this->http($url, false, $reg_data['data']);
        $this->log_write('shangfu_log',$url);
        $this->log_write('shangfu_log',$result);
        if ( empty($result) || $result->status !== 'SUCCESS' ||!strtolower($result->sign) == $this->sbt_sign($result)['sign'] ) {
            //$this->returnMsg['message'] = '系统繁忙,请稍后再试';
            $this->returnMsg['message'] = $result->message;
            return 400;
        }
        return 200;
    }

    public function order($data,$sp_id='1086-2'){
        $post_data = [
            'sp_id' => $sp_id,
            'mch_id' => $data['mcht_no'],
            'out_trade_no' => $data['order_id'],
            'total_fee' => $data['money'],
            'body' => '电子',
            'notify_url' => $this->notify_url,
            'id_type' => '01',
            'acc_bank_name' => $data['bank_name'],
            'acct_type' => 'CREDIT',
            'acc_name' => $data['name'],
            'acc_no' => $data['card_id'],
            'mobile' => $data['card_phone'],
            'id_no' => $data['number'],
            'bank_code' => $data['bank_no'],
            'expire_date' => $data['card_end'],
            'cvv' => $data['card_cvv'],
            'nonce_str' => $this->random(4, 1)
        ];
        $url = $this->sbt_url . '/gate/epay/sapply';
        $bodys = $this->sbt_sign($post_data, $data['secret_key'])['data'];
        $result = $this->http($url, false, $bodys);
        return $result;
    }

    public function sub_order($data,$pay_id){
        if($pay_id==1){
            $sp_id="1086-2";
        }else{
            $sp_id="1086-1";
        }
        $post_data = [
            'sp_id' => $sp_id,
            'mch_id' => $data['mcht_no'],
            'out_trade_no' => $data['order_id'],
            'password' => $data['password'],
            'nonce_str' => $this->random(4, 1)
        ];
        if($sp_id=='1086-1'){
            $public_kye=$this->publicKey_1;
        }else{
            $public_kye=$this->publicKey_2;
        }
        $url = $this->sbt_url . '/gate/epay/submit';
        $bodys = $this->sbt_sign($post_data, $data['secret_key'])['data'];
        $result = $this->http($url, false, $bodys);
        return $result;
    }

    //sbt 签名生成
    public function sbt_sign($post_data=null,$secret_key=NULL){
        $str='';
        if(!is_array($post_data)&&!is_object($post_data)){
            return false;
        }
        if(is_object($post_data)){
            $arr=[];
            foreach($post_data as $key =>$val){
                $arr[$key]=$val;
            }
            $post_data=$arr;
        }
        ksort($post_data);//key值排序
        $this->log_write('logg',$post_data);
        foreach($post_data as $key=>$val){
            if($key!=='sign'){
                $str.=empty($val)?'':$key."=".$val."&";
            }
        }
        $str_sign=substr($str,0,-1).'&key='.$secret_key;
        //$this->returnMsg['$str']=$str;
        //$this->returnMsg['string']=$str_sign;
        //$this->returnMsg['key']=$sign_key;
        //$this->returnMsg['sign']=strtoupper (md5($str_sign));
        $result['sign']=strtoupper (md5($str_sign));//小写字符转义大写
        $result['data']=$str."sign=".strtoupper (md5($str_sign));
        return $result;
    }

    //签名校验
    public function check_sign(){

    }

    //php对象转数组
    public function object_to_array($object) {
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        }
        else {
            $array = $object;
        }
        return $array;
    }

    //curl调用
    function http($urls, $header = NULL, $post = FALSE){
        $url = is_array($urls) ? $urls['0'] : $urls;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //带header方式提交
        if(!empty($header)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        //post提交方式
        if($post != FALSE){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if(is_array($urls)){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data);
    }
    protected function random($length = 6, $numeric = 0) {
        PHP_VERSION < '4.2.0' && mt_srand((double) microtime() * 1000000);
        if ($numeric) {
            $hash = sprintf('%0' . $length . 'd', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for ($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }
    //log记录
    public function log_write($file_name,$message){
        $path = ROOT_PATH .'public' . DS . 'log'.DS.date('Y-m-d',time()).DS;

        if(!is_dir($path)){
            mkdir($path);
        }

        $filename= $path.$file_name.".txt";
        $fh = fopen($filename, "a+");
        if(is_object($message) || is_array($message)){
            $message="\n".date('Y--m-d H:i:s',time()).json_encode($message);
        }else{
            $message="\n".date('Y--m-d H:i:s',time()).$message;
        }


        fwrite($fh, $message);    // 输出：
        fclose($fh);
    }

}