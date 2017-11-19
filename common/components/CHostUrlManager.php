<?php
/**
 * Created by PhpStorm.
 * User: xudonghai
 * Date: 2017/3/13 9:27
 * 继承重写urlmanage类，使其支持多域名，注意：CUrlManage中的键，必须跟模块下配置文件main中的id一致，否则在默认不传标识的情况下，找不到rules规则
 * 例如生成图片模块车系首页
 * 基本用法：Yii::$app->CUrlManage->createHostUrl(['控制器/方法','参数名'=>参数值],'CUrlManage中配置的键值名，例如photos')
 * 精简用法：$this->createHostUrl(['控制器/方法','参数名'=>参数值],'CUrlManage中配置的键值名，例如photos')
 * demo: 生成图片模块车系首页 => $this->createHostUrl(['site/index','id'=>123]， HOST_WWW) = photo.carnew.com/123
 */
namespace common\components;

use yii;
use yii\web\UrlManager;
use yii\base\InvalidConfigException;

class CHostUrlManager extends UrlManager
{
    public $apps = [];
    public $cache='cache';

    private $_appInstances = [];

    public function init()
    {
        if (isset($this->apps[Yii::$app->id])) {
            $currentAppConfig = $this->apps[Yii::$app->id];
            foreach ($currentAppConfig as $attribute => $value) {
                $this->$attribute = $value;
            }
        }
        parent::init();
    }

    /**
     * @param array $params
     * @param null $appId
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function createUrl($params = [], $appId = null)
    {
        if ($appId === null || $appId === Yii::$app->id) {
            return parent::createUrl($params);
        } else {
            if (!isset($this->apps[$appId])) {
                throw new InvalidConfigException('Please configure UrlManager of apps "' . $appId . '".');
            }
            $appUrlManager = $this->_loadOtherAppInstance($appId);
            return $appUrlManager->createUrl($params);
        }
    }

    /**
     * @param array|string $params
     * @param null $scheme  `http`, `https` or `null`
     * @param null $appId
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function createHostUrl($params, $appId = null,$scheme = null)
    {
        if ($appId === null || $appId === Yii::$app->id) {
            return parent::createAbsoluteUrl($params, $scheme);
        } else {
            if (!isset($this->apps[$appId])) {
                throw new InvalidConfigException('Please configure UrlManager of apps "' . $appId . '".');
            }
            $appUrlManager = $this->_loadOtherAppInstance($appId);
            return $appUrlManager->createAbsoluteUrl($params);
        }
    }


    /**
     * @param string $appId
     * @return UrlManager
     * @throws \yii\base\InvalidConfigException
     */
    private function _loadOtherAppInstance($appId)
    {
        if (!isset($this->_appInstances[$appId])) {
            $this->_appInstances[$appId] = Yii::createObject([
                    'class' => '\yii\web\UrlManager',
                ] + $this->apps[$appId]);
        }

        return $this->_appInstances[$appId];
    }

    public function getHostInfo($appId = null)
    {
        if ($appId === null || $appId === Yii::$app->id) {
            return parent::getHostInfo();
        } else {
            $appUrlManager = $this->_loadOtherAppInstance($appId);

            return $appUrlManager->getHostInfo();
        }
    }
}