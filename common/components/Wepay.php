<?php
namespace common\components;
use yii\base\Component;
/*
 * 小程序微信支付
 */
class Wepay extends Component
{
    public $appid;
    public $mch_id;
    public $AppSecret;
    public $key;
    public $number;
    public $total_fee;
    public $openid;
    public $accounts = [];

    /**
     *
     * 多个小程序调用同一个api，appid需要重新赋值
     * @param $site
     */
    public function initParams($site){

        $accounts = $this->accounts;
        if(!isset($accounts[$site]) || !$accounts[$site]) return;
        $account = $accounts[$site];

        $this->appid = $account['appid'];
        $this->mch_id = $account['mch_id'];
        $this->AppSecret = $account['AppSecret'];
        $this->key = $account['key'];

    }

    public function getOpenid($code){
        $url = "https://api.weixin.qq.com/sns/jscode2session";
        $data = [
            'appid'=>$this->appid,
            'secret'=>$this->AppSecret,
            'js_code'=>$code,
            'grant_type'=>'authorization_code'
        ];
        $return = self::http($url,$data);
        return json_decode($return);
    }

    public function pay($number,$total_fee,$openid){
        $this->number = $number;
        $this->total_fee = $total_fee;
        $this->openid = $openid;
        //统一下单接口
        $return=$this->weixinapp();
        return $return;
    }
    //统一下单接口
    private function unifiedorder(){
        $url='https://api.mch.weixin.qq.com/pay/unifiedorder';
        $parameters=array(
            'appid'=>$this->appid,//小程序ID
            'mch_id'=>$this->mch_id,//商户号
            'nonce_str'=>$this->createNoncestr(),//随机字符串
            'body'=>'会员续费',//商品描述
            'out_trade_no'=>$this->number,//商户订单号
            'total_fee'=>floatval($this->total_fee * 100),//总金额 单位 分
            'spbill_create_ip'=>$_SERVER['REMOTE_ADDR'],//终端IP
            'notify_url'=>\CEnv::WX_NOTIFY.'/wx/notice',//通知地址
            'openid'=>$this->openid,//用户id
            'trade_type'=>'JSAPI'//交易类型
        );

        //统一下单签名
        $parameters['sign']=$this->getSign($parameters);

        $xmlData = self::arrayToXml($parameters);

        $return = self::http($url,$xmlData);
        $return = self::xmlToArray($return);
        $return['timeStamp'] = time();
        $return['package'] = 'prepay_id='.$return['prepay_id'];
        return $return;
    }

    /**
     * 模拟提交参数，支持https提交 可用于各类api请求
     * @param string $url ： 提交的地址
     * @param array $data :POST数组
     * @param string $method : POST/GET，默认GET方式
     * @return mixed
     */
    function http($url, $data='', $method='POST'){
        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        if($method=='POST'){
            curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
            if ($data != ''){
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
            }
        }
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
        $tmpInfo = curl_exec($curl); // 执行操作
        curl_close($curl); // 关闭CURL会话
        return $tmpInfo; // 返回数据
    }

    function arrayToXml($arr){
        $xml = "<xml>";
        foreach ($arr as $key=>$val){
            if(is_array($val)){
                $xml.="<".$key.">".arrayToXml($val)."</".$key.">";
            }else{
                $xml.="<".$key.">".$val."</".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }

    public function xmlToArray($xml){

        //禁止引用外部xml实体

        libxml_disable_entity_loader(true);

        $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);

        $val = json_decode(json_encode($xmlstring),true);

        return $val;

    }

    //微信小程序接口
    private function weixinapp(){
        //统一下单接口
        $unifiedorder=$this->unifiedorder();

        $parameters=array(
            'appId'=>$this->appid,//小程序ID
            'timeStamp'=>'"'.time().'"',//时间戳
            'nonceStr'=>$this->createNoncestr(),//随机串
            'package'=>'prepay_id='.$unifiedorder['prepay_id'],//数据包
            'signType'=>'MD5'//签名方式
        );
        //签名
        $parameters['paySign']=$this->getSign($parameters);

        return $parameters;
    }
    //作用：产生随机字符串，不长于32位
    private function createNoncestr($length = 32 ){
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str ="";
        for ( $i = 0; $i < $length; $i++ ) {
            $str.= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }
        return $str;
    }
    //作用：生成签名
    private function getSign($Obj){
        foreach ($Obj as $k => $v){
            $Parameters[$k] = $v;
        }
        //签名步骤一：按字典序排序参数
        ksort($Parameters);
        $String = $this->formatBizQueryParaMap($Parameters, false);
        //签名步骤二：在string后加入KEY
        $String = $String."&key=".$this->key;
        //签名步骤三：MD5加密
        $String = md5($String);
        //签名步骤四：所有字符转为大写
        $result_ = strtoupper($String);
        return $result_;
    }
    ///作用：格式化参数，签名过程需要使用
    private function formatBizQueryParaMap($paraMap, $urlencode){
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v){
            if($urlencode)
            {
                $v = urlencode($v);
            }
            $buff .= $k . "=" . $v . "&";
        }
        $reqPar = '';
        if (strlen($buff) > 0){
            $reqPar = substr($buff, 0, strlen($buff)-1);
        }
        return $reqPar;
    }
}