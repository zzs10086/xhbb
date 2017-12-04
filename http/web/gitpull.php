<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/4
 * Time: 10:50
 */

echo '认证成功，开始更新';
echo exec("/home/sh/github_pull.sh");

echo date("Y-m-d H:i:s");
/*$github_signa = $_SERVER['HTTP_X_HUB_SIGNATURE'];
list($hash_type, $hash_value) = explode('=', $github_signa, 2);
$payload = file_get_contents("php://input");$secret = '9876543210.';$hash = hash_hmac($hash_type,$payload,$secret);if($hash && $hash === $hash_value)
{
    echo '认证成功，开始更新';
    echo exec("/home/sh/github_pull.sh");

    echo date("Y-m-d H:i:s");
}*/