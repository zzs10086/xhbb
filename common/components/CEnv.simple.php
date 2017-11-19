<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev'); // dev=>YII_ENV_DEV test=>YII_ENV_TEST prod=>YII_ENV_PROD
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/30
 * Time: 13:53
 */
class CEnv
{
    //主从数据库参数
    const DB_HOST_MASTER = 'rm-bp10h7b832629p429o.mysql.rds.aliyuncs.com';
    const DB_USER = 'car_base';
    const DB_PASS = 'car_base2046';
    const DB_PORT = '3306';
    const DB_DBNAME = 'wx_msg';
    const DB_TABLEPREFIX = 'by_';
    const DB_CHARSET = 'utf8';
    const DB_HOST_SLAVE = 'rm-bp10h7b832629p429o.mysql.rds.aliyuncs.com';

    //redis的参数
    const REDIS_HOST = '127.0.0.1';
    const REDIS_PORT = '6379';
    const REDIS_PASS = null;
    const REDIS_DATA_BASE = 5;

    const SESSION_DOMAIN = '.msg.com';  //session的domain
    const COOKIE_VALIDATION_KEY = 'msgsfwejSoinJOSDIJFIjxzSbasdfg-sdfkjoias-asdf'; //cookie加密的字符串 ,可以随机生成
    const STATIC_RESOURCE = 'http://static.msg.com'; //静态资源（cdn）地址

    const HOST_WWW = 'http://www.msg.com';
    const HOST_API = 'http://api.msg.com';
    const HOST_BOSS = 'http://boss.msg.com';
    const WX_NOTIFY = 'https://wx.checheng.cn';
}