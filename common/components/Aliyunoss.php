<?php
namespace common\components;

use Yii;
use yii\base\Component;
use OSS\OssClient;

class Aliyunoss extends Component
{
     public static $oss;
     public $accessKeyId;
     public $accessKeySecret;
     public $endPoint;
     public $bucket;
     public $link='http://cdn.img.checheng.com';

     public function init()
     {
          $accessKeyId = $this->accessKeyId;                 //获取阿里云oss的accessKeyId
          $accessKeySecret = $this->accessKeySecret;         //获取阿里云oss的accessKeySecret
          $endpoint = $this->endPoint;                       //获取阿里云oss的endPoint
          self::$oss = new OssClient($accessKeyId, $accessKeySecret, $endpoint);  //实例化OssClient对象
          parent::init();
     }

     /**
      * 使用阿里云oss上传文件
      * @param $bucket   保存到阿里云库
      * @param $object   保存到阿里云oss的文件名
      * @param $filepath 文件在本地的绝对路径
      * @return bool     上传是否成功
      */
     public function upload($object, $filepath, $bucket = false)
     {
          $res = false;
          $bucket = $bucket ? $bucket : $this->bucket;               //获取阿里云oss的bucket
          if (self::$oss->uploadFile($bucket, $object, $filepath)) {  //调用uploadFile方法把服务器文件上传到阿里云oss
               $res = true;
          }

          return $res;
     }

     /**
      * 删除指定文件
      * @param $object 被删除的文件名
      * @return bool   删除是否成功
      */
     public function delete($object, $bucket = false)
     {
          $res = false;
          $bucket = $bucket ? $bucket : $this->bucket;    //获取阿里云oss的bucket
          if (self::$oss->deleteObject($bucket, $object)) { //调用deleteObject方法把服务器文件上传到阿里云oss
               $res = true;
          }

          return $res;
     }

     public function test()
     {
          echo 123;
          echo "success";
     }
}

?>