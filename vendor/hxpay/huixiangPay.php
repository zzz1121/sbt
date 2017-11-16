<?php
//汇享快捷支付
class PayAction
{

    //机构号
    private $appId = 'a856dde9d4a343b186b12de4278d78fa';
    private $privateKey = __DIR__."/cert/huixiang/client.pfx"; //商户私钥


    private $publicKey = __DIR__."/cert/huixiang/server.cer"; //平台公钥


    private $privateKeyPass = "123456";
    //商户入网地址
    private $url = 'http://api.mypays.cn/api/service.json';

    //回调地址
    private $notify_url = 'http://sbt.um500.com/index.php/admin/callback';
	
    //跳转地址
    private $return_url = 'http://sbt.um500.com/index.php/api/callback/pxback';

    static private $count=0;

    public $cc=1;



    //商户注册
    public function reg($user_data,$card_data,$sye_rate,$oper_flag="A")
    {

        header("Content-type:text/html;charset=utf-8");
        $data = $this->getPublicParams(date('YmdHis'));
        $mcht_id="SBT".time();
        //接口类型 必填
        $postarr['method'] = 'register';
        //商户号  必填
        $postarr['merchant_code'] = (string)$mcht_id;
        //商户名称     必填
        $postarr['merchant_name'] = (string)$user_data['name'];
        //商户所在省份  必填
        $postarr['merchant_province'] = '福建省';
        //商户所在城市 必填
        $postarr['merchant_city'] = '福州市';
        //商户所在详细地址 必填
        $postarr['merchant_address'] = (string)$user_data['address'];
        //姓名  必填
        $postarr['family_name'] = (string)$user_data['name'];
        //证件号 必填
        $postarr['id_card'] = (string)$user_data['number'];
        //手机号 必填
        $postarr['mobile'] = (string)$card_data['card_phone'];
        //结算账号 必填
        $postarr['payee_bank_no'] = (string)$card_data['card_id'];
        //总行名称 必填
        $postarr['payee_bank_name'] = (string)$card_data['bank_name'];
        //总行联行号 必填
        $postarr['payee_bank_id'] = (string)$card_data['bank_no'];
        //开户行全称 必填
        $postarr['payee_branch_name'] = (string)$card_data['bank_name'];
        //开户行联行号 必填
        $postarr['payee_branch_code'] = (string)$card_data['bank_no'];
        //开户行省份 必填
        $postarr['payee_bank_province'] = (string)'福建省';
        //开户行城市
        $postarr['payee_bank_city'] = (string)'福州市';
        //操作标识
        $postarr['merchant_oper_flag'] = (string)$oper_flag;
        //单笔消费交易手续费
        $postarr['counter_fee_t0'] = (string)$sye_rate['extra_rate'];
        //消费交易手续费扣率 必填
        $postarr['rate_t0'] = (string)($sye_rate['settle_rate']*100);

        $data['data'] = json_encode($postarr);
        //签名信息 必填
        $data['sign'] = $this->getRsaSign($data,$this->privateKey,$this->privateKeyPass);

        $url = $this->url;
        $headers[] = 'Content-Type:application/json';
        $rs = $this->http($url,json_encode($data),'POST',$headers);
//        $rs = json_decode($rs,true);
        $rs=json_decode($rs);
        if(is_object($rs)){
            $rs=$this->object_to_array($rs);
        }

        //日志文件写入
        $this->log_write('hx_reg_log',$data);
        $this->log_write('hx_reg_log',$rs);

        $rs['ssss']=$postarr;
        $rs['data']=json_decode($rs['data']);
        $rs['mcht_no_2']=$mcht_id;
        return $rs;
    }

    //代付订单
    function enchashment($user_data,$card_data,$order_data){

        //$down_data = json_decode($input['down_data'],true);
        $data = $this->getPublicParams(date('YmdHis'),'AGENCY_PAYMENT');
        //dump($data);
        //$data = $this->getPublicParams($input['order_sn']);
        //接口类型 必填
        $postarr['method'] = 'pay';
        //订单时间  必填
//        $postarr['merchant_code']='HXTCSHORTCUTPAY@A019SBT1506579835';
        $postarr['trans_time'] = (string)$card_data['order_id'];
        //订单日期  必填
        $postarr['trans_date'] = date("Ymd");
        //订单金额 必填
        $postarr['trans_amount'] = (string)$order_data;
        //姓名 必填
        $postarr['family_name'] = (string)$user_data['name'];
        //身份证号 必填
        $postarr['id_card'] = (string)$user_data['number'];
        //卡号 必填
        $postarr['bank_no'] = (string)$card_data['card_id'];
        //手机号
        $postarr['mobile'] = (string)$card_data['card_phone'];

        $postarr['bank_name'] = (string)$card_data['bank_name'] ;
        //结算账号 必填
        $postarr['bank_id'] = (string)$card_data['bank_no'] ;


        //总行名称 必填
        $postarr['branch_name'] = (string)$card_data['bank_name'];

        //总行联行号 必填
        $postarr['branch_code'] = (string)$card_data['bank_no'];
        //开户省
        $postarr['bank_province'] = '福建省';
        //开户城市
        $postarr['bank_city'] = '福州市';
        //对公对私
        $postarr['acct_type'] = '1';
        //到账时间
        $postarr['settle_type'] = '0';
        //备注
        $postarr['memo'] = '';


        $data['data'] = json_encode($postarr);
        //签名信息 必填
        $data['sign'] = $this->getRsaSign($data,$this->privateKey,$this->privateKeyPass);
        //dump($data);

        $url = $this->url;
        //echo $url;
        $headers[] = 'Content-Type:application/json';
        $rs = $this->http($url,json_encode($data),'POST',$headers);
        //dump($rs);
        $rs = json_decode($rs,true);

        //日志文件写入
        $this->log_write('hx_enchashment_log',$rs);


        if(is_object($rs)){
            $rs=$this->object_to_array($rs);
        }
        $rs['data']=json_decode($rs['data']);
        if(is_object($rs['data'])){
            $rs['data']=$this->object_to_array($rs['data']);
        }

        return $rs;
    }


    //代付余额查询
    public function get_balance(){
        //$down_data = json_decode($input['down_data'],true);
        $data = $this->getPublicParams(date('YmdHis'),"AGENCY_PAYMENT");
        //dump($data);
        //$data = $this->getPublicParams($input['order_sn']);
        //接口类型 必填
        $postarr['method'] = 'balance';

        $data['data'] = json_encode($postarr);
        //签名信息 必填
        $data['sign'] = $this->getRsaSign($data,$this->privateKey,$this->privateKeyPass);
        //dump($data);

        $url = $this->url;
        //echo $url;
        $headers[] = 'Content-Type:application/json';
        $rs = $this->http($url,json_encode($data),'POST',$headers);
        //dump($rs);
        $rs = json_decode($rs,true);

        //日志文件写入
        $this->log_write('hx_enchashment_log',$rs);

        $rs['data']=json_decode($rs['data'],true);
        return $rs;
    }

    public function get_order_status($order_id){
        $data = $this->getPublicParams(date('YmdHis'),"AGENCY_PAYMENT");
        //接口类型 必填
        $postarr['method'] = 'pay_qry';
        $postarr['orig_tran_id'] = $order_id;

        $data['data'] = json_encode($postarr);
        //签名信息 必填
        $data['sign'] = $this->getRsaSign($data,$this->privateKey,$this->privateKeyPass);

        $url = $this->url;
        //echo $url;
        $headers[] = 'Content-Type:application/json';
        $rs = $this->http($url,json_encode($data),'POST',$headers);
        //dump($rs);
        $rs = json_decode($rs,true);

        //日志文件写入
        $this->log_write('hx_enchashment_log',$rs);

//
        if(is_object($rs)){
            $rs=$this->object_to_array($rs);
        }
//        $rs['dddd']=$postarr;
        $rs['data']=json_decode($rs['data']);
        if(is_object($rs['data'])){
            $rs['data']=$this->object_to_array($rs['data']);
        }
        return $rs;

    }

    //代付余额查询
    public function get_orders(){
        $data = $this->getPublicParams(date('YmdHis'),"AGENCY_PAYMENT");
        //接口类型 必填
        $postarr['method'] = 'bill';
        $postarr['trans_date'] = date("Ymd",time());

        $data['data'] = json_encode($postarr);
        //签名信息 必填
        $data['sign'] = $this->getRsaSign($data,$this->privateKey,$this->privateKeyPass);

        $url = $this->url;
        //echo $url;
        $headers[] = 'Content-Type:application/json';
        $rs = $this->http($url,json_encode($data),'POST',$headers);
        //dump($rs);
        $rs = json_decode($rs,true);

        //日志文件写入
        $this->log_write('hx_enchashment_log',$rs);

//
        if(is_object($rs)){
            $rs=$this->object_to_array($rs);
        }
//        $rs['dddd']=$postarr;
        $rs['data']=json_decode($rs['data']);
        return $rs;
    }


    //账户信息更新状态
    public function update_status($user_data,$card_data,$sye_rate,$oper_flag="A")
    {
        header("Content-type:text/html;charset=utf-8");
        $data = $this->getPublicParams(date('YmdHis'));

        //接口类型 必填
        $postarr['method'] = 'register';
        //商户号  必填
        $postarr['merchant_code'] = (string)$user_data['mcht_no_2'];
        //商户名称     必填
        $postarr['merchant_name'] = (string)$user_data['name'];
        //商户所在省份  必填
        $postarr['merchant_province'] = (string)'福建省';
        //商户所在城市 必填
        $postarr['merchant_city'] = (string)'福州市';
        //商户所在详细地址 必填
        $postarr['merchant_address'] = (string)$user_data['address'];
        //姓名  必填
        $postarr['family_name'] = (string)$user_data['name'];
        //证件号 必填
        $postarr['id_card'] = (string)$user_data['number'];
        //手机号 必填
        $postarr['mobile'] = (string)$card_data['card_phone'];
        //结算账号 必填
        $postarr['payee_bank_no'] = (string)$card_data['card_id'];
        //总行名称 必填
        $postarr['payee_bank_name'] = (string)$card_data['bank_name'];
        //总行联行号 必填
        $postarr['payee_bank_id'] = (string)$card_data['bank_no'];
        //开户行全称 必填
        $postarr['payee_branch_name'] = (string)$card_data['bank_name'];
        //开户行联行号 必填
        $postarr['payee_branch_code'] = (string)$card_data['bank_no'];
        //开户行省份 必填
        $postarr['payee_bank_province'] = (string)'福建省';
        //开户行城市
        $postarr['payee_bank_city'] = (string)'福州市';
        //操作标识
        $postarr['merchant_oper_flag'] = (string)$oper_flag;
        //单笔消费交易手续费
        $postarr['counter_fee_t0'] = (string)$sye_rate['extra_rate'];
        //消费交易手续费扣率 必填
        $postarr['rate_t0'] = (string)($user_data['settle_rate'] * 100);

        $data['data'] = json_encode($postarr);
        //签名信息 必填
        $data['sign'] = $this->getRsaSign($data, $this->privateKey, $this->privateKeyPass);
        $this->log_write('hx_data',$data);
        $url = $this->url;
        $headers[] = 'Content-Type:application/json';
        $rs = $this->http($url, json_encode($data), 'POST', $headers);
//        $rs = json_decode($rs,true);
        $rs = json_decode($rs);
        if (is_object($rs)) {
            $rs = $this->object_to_array($rs);
        }
        //日志文件写入
        $this->log_write('hx_update_log',$rs);

//        $rs['ssss'] = $postarr;
        $rs['data'] = json_decode($rs['data']);
        return $rs;
    }
    //订单支付
    function hxpay($user_data,$card_data,$debit_card,$order_data,$rate_data){

        //$down_data = json_decode($input['down_data'],true);
        $data = $this->getPublicParams(date('YmdHis'));
        //dump($data);
        //$data = $this->getPublicParams($input['order_sn']);
        //接口类型 必填
        $postarr['method'] = 'pay';
        //终端商户号 必填
        $postarr['third_merchant_code'] = $user_data['secretKey_2'];
        //订单时间  必填
        $postarr['trans_time'] = date("YmdHis");
        //订单日期  必填
        $postarr['trans_date'] = date("Ymd");
        //订单金额 必填
        $postarr['trans_amount'] = (string)$order_data['money'];
        //姓名 必填
        $postarr['family_name'] = (string)$user_data['name'];
        //身份证号 必填
        $postarr['id_card'] = (string)$user_data['number'];
        //卡号 必填
        $postarr['pay_bank_no'] = (string)$card_data['card_id'];
        //手机号
        $postarr['mobile'] = (string)$card_data['card_phone'];
        //结算账号 必填
        $postarr['payee_bank_no'] = (string)$debit_card['card_id'];
        //总行名称 必填
        $postarr['payee_bank_name'] = (string)$debit_card['bank_name'];

        //总行联行号 必填
        $postarr['payee_bank_id'] = (string)$debit_card['bank_no'];
        //到账金额 必填
        $postarr['pay_amount'] = (string)$order_data['arrival_amount'];
        //手续费 必填
        $postarr['operation_fee'] = (string)$order_data['service'];
        //单笔消费交易手续费 必填
        $postarr['counter_fee_t0'] = (string)$rate_data['extra_rate'];
        //费率 必填
        $postarr['rate_t0'] = (string)($rate_data['settle_rate']*100);
        //备注
        $postarr['memo'] = '';
        //前台通知地址URL
        $postarr['front_notify_url'] = $this->notify_url;
        //后台通知地址URL
        $postarr['back_notify_url'] = $this->return_url;

        $data['data'] = json_encode($postarr);
        //签名信息 必填
        $data['sign'] = $this->getRsaSign($data,$this->privateKey,$this->privateKeyPass);
        //dump($data);

        $url = $this->url;
        //echo $url;
        $headers[] = 'Content-Type:application/json';
        $rs = $this->http($url,json_encode($data),'POST',$headers);
        //dump($rs);
        $rs = json_decode($rs,true);

        //日志文件写入
        $this->log_write('hx_order_log',$rs);


        if(is_object($rs)){
            $rs=$this->object_to_array($rs);
        }
        $rs['dddd']=$postarr;
        $rs['data']=json_decode($rs['data']);
        return $rs;
    }


    //4要素鉴权
    public function bank_4($mobile,$family_name,$id_card,$bank_no){
        $data = $this->getPublicParams(date('YmdHis'),"REALNAME_AUTH4");
        //dump($data);
        //$data = $this->getPublicParams($input['order_sn']);


        //订单日期  必填
        $postarr['mobile'] = (string)$mobile;
        //姓名 必填
        $postarr['family_name'] = (string)$family_name;
        //身份证号 必填
        $postarr['id_card'] = (string)$id_card;
        //卡号 必填
        $postarr['bank_no'] = (string)$bank_no;

        $data['data'] = json_encode($postarr);
        //签名信息 必填
        $data['sign'] = $this->getRsaSign($data, $this->privateKey, $this->privateKeyPass);

        $url = $this->url;
        $headers[] = 'Content-Type:application/json';
        $rs = $this->http($url, json_encode($data), 'POST', $headers);
//        $rs = json_decode($rs,true);
        $rs = json_decode($rs);
        if (is_object($rs)) {
            $rs = $this->object_to_array($rs);
        }

        //日志文件写入
        $this->log_write('hx_send_log',$data);
        $this->log_write('hx_update_log',$rs);

        $rs['data'] = json_decode($rs['data']);

        return $rs;
    }

    //生成签名
    public function getRsaSign($data, $pfxContent, $privkeypass)
    {
        $pfxContent = file_get_contents($pfxContent);
        $signString	= $this->verifyString($data);
        $pfxContent	= base64_decode($pfxContent);

        openssl_pkcs12_read($pfxContent, $certs, $privkeypass);
        openssl_sign($signString, $signMsg, $certs['pkey'], OPENSSL_ALGO_MD5);	//注册生成加密信息 OPENSSL_ALGO_SHA1
        $signMsg	= base64_encode($signMsg); 								//base64转码加密信息

        return $signMsg;
    }

    //验签
    function checkRsaSign($data, $public_key, $signMsg)
    {
        $public_key = file_get_contents($public_key);
        $signString	= $this->verifyString_notify($data);
        /*$unsignMsg	= base64_decode($signMsg);							//base64解码加密信息
        $cer		= openssl_x509_read($cerContent); 					//读取公钥
        $res		= openssl_verify($signString, $unsignMsg, $cer); 	//验证*/

        $public_key	= str_replace("-----BEGIN CERTIFICATE-----", "", $public_key);
        $public_key	= str_replace("-----END CERTIFICATE-----", "", $public_key);
        $public_key	= str_replace("\n", "", $public_key);
        $public_key	= '-----BEGIN CERTIFICATE-----'.PHP_EOL.wordwrap($public_key, 64, "\n", true) .PHP_EOL.'-----END CERTIFICATE-----';

        $res = openssl_get_publickey($public_key);
        if($res){
            $result = (bool)openssl_verify($signString,base64_decode($signMsg),$res,OPENSSL_ALGO_MD5);
        }else{
            return false;
        }
        openssl_free_key($res);

        return $result;
    }

    //请求签名串组装
    function verifyString($data)
    {
        ksort($data);
        unset($data['sign']);

        $arr	= array();
        foreach($data AS $k => $v){
            if($k != 'sign'){
                $arr[]	= $k."=".$v;
            }
        }

        return implode("&", $arr);
    }

    //回调签名串组装
    function verifyString_notify($data)
    {
        ksort($data);

        unset($data['sign']);

        $arr	= array();
        foreach($data as $k => $v){

            if($k != 'sign' && $k != 'resp_msg'){
                $arr[]	= $k."=".$v;
            }
        }

        return implode("|", $arr);
    }





    function query(){

        //机构号 必填
        $postarr['app_id'] = $this->appId;
        //机构商户编号  必填
        $postarr['trans_type'] = 'SHORTCUTPAY';
        //瀚银商户号  必填
        $postarr['client_trans_id'] = date('YmdHisS');
        //订单号 必填
        $postarr['trans_timestamp'] = time();
        //订单时间 必填

        //瀚银流水号
        $data['method'] = 'pay_qry';
        //产品类型 必填
        $data['orig_tran_id'] = 'xx';

        $postarr['data'] = json_encode($data);

        //签名信息 必填
        $postarr['sign'] = $this->getRsaSign($postarr,$this->privateKey,'123456');
//        $postarr['sign'] = $this->dfsign($postarr,$this->privateKey,'123456');
        dump($postarr);
        $url = $this->url;
        $headers[] = 'Content-Type:application/json';
        $rs = $this->http($url,json_encode($postarr),'POST',$headers);

        $rs = json_decode($rs,true);
        dump($rs);
    }

    //获取公告参数
    private function getPublicParams($order_sn,$transtype='SHORTCUTPAY'){
        //应用code 必填
        $data['app_id'] = $this->appId;
        //交易类型  必填
        $data['trans_type'] = $transtype;
        //交易流水号  必填
        $data['client_trans_id'] = $order_sn;
        //请求时间 必填
        $data['trans_timestamp'] = time();
        return $data;
    }

    public function notify($rs){

        //获取回调参数

        $sn = $rs['client_trans_id'];
        if ($rs['resp_code'] == 'PAY_SUCCESS') {


            $sign = $this->checkRsaSign($rs,$this->publicKey,$rs['sign']);
            if(!$sign){
                $this->log_write('px_back','签名失败');
                return 400;

            }
            return 200;

        }
        return 400;
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
    function http($url, $params, $method = 'GET', $header = array(), $timeout = 40){
        $this->log_write('hx_data',$params);
        $opts = array(
            CURLOPT_TIMEOUT        => $timeout,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => $header
        );
        /* 根据请求类型设置特定参数 */
        switch(strtoupper($method)){
            case 'GET':
                $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                break;
            case 'POST':
                //判断是否传输文件
                $opts[CURLOPT_URL] = $url;
                $opts[CURLOPT_POST] = 1;
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            default:
                throw new Exception('不支持的请求方式！');
        }
        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data  = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if($error) throw new Exception('请求发生错误：' . $error);
        return  $data;
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