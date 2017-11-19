<?php
namespace boss\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\Pagination;
use common\models\ByMoney as Money;

/**
 * Site controller
 */
class MoneyController extends Controller
{
    public $layout = '@app/views/layouts/boss.php';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
             'access' => [
                  'class' => AccessControl::className(),
                  'rules' => [
                       [
                            'allow' => true,
                            'roles' => ['@'],
                       ],
                  ],
             ],
        ];
    }

    /**
     * @return string
     * 充值规则列表
     * @wanghui
     */
    public function actionList()
    {
        //分页数据
        $query = Money::find();
        $is_default = Yii::$app->request->get('is_default');

        if ($status = Yii::$app->request->get('status')) {
            $query->andWhere(['status'=>$status]);
        }
        if ($is_default || $is_default === '0') {
                $query->andWhere(['is_default'=>$is_default]);
        }
        $count = $query->count();

        $query->orderBy([
             'id' => SORT_DESC
        ]);

        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->setPageSize(10);

        $moneys = $query->offset($pagination->offset)
             ->limit($pagination->limit)
             ->all();
        return $this->render('list', [
             'pagination' => $pagination,
             'moneys' => $moneys,
             'money_order' => $count
        ]);
    }

}
