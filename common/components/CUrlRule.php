<?php

/**
 * Created by PhpStorm.
 * @author: xudonghai
 * Date: 2017/3/10 10:39
 * 重写UrlRule类的初始化init方法，实现参数的组合传递
 * 'urlManager'=>[
 *      'rules'=>[
 *          [
 *              'class'=>'common\components\CarUrlRule',
 *              'pattern' => 'site/<id:\d+>(-a<a:\d+>|-b<b:\d+>|-c<c:\d+>)',
 *              'route' => 'site/read',
 *          ]
 *      ]
 * ]
 *注意：这边未完成。。。。。。。。。。。。。。
 */
namespace common\components;

use yii\web\UrlRule;

class CUrlRule extends UrlRule
{
    /**
     * @var string 用于生成新URL的模板
     */
    private $_template;

    /**
     * @var string 一个用于匹配路由部分的正则表达式，用于生成URL.
     */
    private $_routeRule;

    /**
     * @var array list of regex for matching parameters. This is used in generating URL.
     */
    private $_paramRules = [];

    /**
     * @var array 保存一组路由中使用的参数.
     */
    private $_routeParams = [];


    public function createUrl($manager, $route, $params)
    {
        if(count($params)!=count($this->_paramRules)){
            return false;
        }
        parent::createUrl($manager, $route, $params);
    }
}