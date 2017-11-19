<?php
namespace boss\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\Pagination;
use common\models\ByOrder as Order;
/*use common\models\ByArticle as Article;
use common\models\ByCategory as Category;*/

/**
 * Site controller
 */
class OrderController extends Controller
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
     * 订单列表
     * @wanghui
     */
    public function actionList()
    {
        //分页数据
        $query = Order::find()->alias('a');

        $query->joinWith(['user as b']);

        if ($number = Yii::$app->request->get('number')) {
            $query->andWhere(['a.number'=>$number]);
        }

        if ($transaction_id = Yii::$app->request->get('transaction_id')) {
            $query->andWhere(['a.transaction_id' => $transaction_id]);
        }
        if ($wx_name = Yii::$app->request->get('wx_name')) {
            $query->andWhere(['b.wx_name'=>$wx_name]);
        }
        if ($status = Yii::$app->request->get('status')) {
            $query->andWhere(['a.status'=>$status]);
        }
        $count = $query->count();

        $query->orderBy([
             //'status'=>SORT_ASC,
             'a.id' => SORT_DESC
        ]);

        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->setPageSize(20);

        $orders = $query->offset($pagination->offset)
             ->limit($pagination->limit)
             ->all();
        return $this->render('list', [
             'pagination' => $pagination,
             'orders' => $orders,
             'total_order' => $count
        ]);
    }

}
