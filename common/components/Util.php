<?php
/**
 * 工具类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/31
 * Time: 10:04
 */
namespace common\components;
use Yii;

class Util
{

    /**
     * 打印日志
     * @param $msg
     * @param string $level
     */
    public static function debug_log($msg,$level='')
    {
        $logdir=defined('LOGS_PATH')?LOGS_PATH:'/tmp';
        $level=strtolower($level);
        if($level=='' || $level=='debug')
        {
            $f='debug';
        }
        else
        {
            $f='debug_'.$level;
        }
        $flag=file_put_contents(rtrim($logdir,DS).DS.$f.'.'.date('Ymd'),(is_array($msg)?print_r($msg,true):$msg)."\t".date('Y-m-d H:i:s')."\n",FILE_APPEND);
        if($flag===false)
        {
            if(!file_exists($logdir) || !is_dir($logdir))
            {
                mkdir(LOGS_PATH,0777,true);
            }
            file_put_contents(rtrim($logdir,DS).DS.$f.'.'.date('Ymd'),(is_array($msg)?print_r($msg,true):$msg)."\t".date('Y-m-d H:i:s')."\n",FILE_APPEND);
        }
    }

    /**
     * gb2312转换utf8编码
     * @param $str
     * @return mixed
     */
    public static function gb2utf($str)
    {
        return iconv("gb2312","utf-8//IGNORE",$str);
    }
    /**
     * utf8转换gb2312编码
     * @param $str
     * @return mixed
     */
    public static function utfgb2($str)
    {
        return iconv("utf-8","gb2312//IGNORE",$str);
    }
    /**
     * 获取远程url内容
     * @param $url
     * @param array $data
     * @param string $method
     * @param string $userAgentType
     * @return bool
     */
    public static function curl_get_contents($url,$data=array(),$method='POST',$userAgentType='')
    {
        $request_data=http_build_query($data);

        $ch=curl_init();
        $this_header = array(
            "content-type: application/x-www-form-urlencoded;charset=UTF-8"
        );
        if($data && strtoupper($method)=='GET')
        {
            $url .= '?'.$request_data;
        }
        elseif($data && strtoupper($method)=='POST')
        {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$request_data);
        }

        curl_setopt($ch,CURLOPT_HTTPHEADER,$this_header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  #追踪重定向
        if($userAgentType=='app')
        {
            curl_setopt($ch, CURLOPT_USERAGENT, "Android4.4.2autohome7.2.0Android");
        }
        else
        {
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36");
        }
        //curl_setopt($ch, CURLOPT_PROXY, '127.0.0.1:8888');

        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        $response=curl_exec($ch);
        if(curl_errno($ch))
        {
            echo 'Error:'.curl_errno($ch),' ',$url."\n";
            return false;
        }
        else
        {
            curl_close($ch);
        }

        return $response;
    }

    /**
     * 下载文件直接输出文件
     * @param $file_url
     * @param $save_to
     */
    public static function curl_download($file_url,$save_to)
    {
        $downloaded_file = fopen($save_to, 'w');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch,CURLOPT_URL,$file_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0); #设置1或true 输出到变量也就是内存   false直接输出到文件
        #curl_setopt($ch, CURLOPT_HEADER, false); //不取得返回头信息
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  #追踪重定向
        curl_setopt($ch, CURLOPT_FILE, $downloaded_file);
        curl_exec($ch);
        curl_close($ch);
        fclose($downloaded_file);
    }
}