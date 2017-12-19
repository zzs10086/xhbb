<?php
namespace boss\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\Pagination;
use common\models\ByUser as User;

/**
 * Site controller
 */
class UserController extends Controller
{
    public $layout = '@app/views/layouts/matrix.php';
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
     * 用户列表
     * @wanghui
     */
    public function actionList()
    {
        //分页数据
        $query = User::find();

        if ($is_forever = Yii::$app->request->get('is_forever')) {
            if($is_forever == 1){//永久vip
                $query->andWhere(['is_forever' => $is_forever]);
            }else if($is_forever == 2){//vip
                $query->andWhere(['is_forever' => 2]);
                $query->andWhere(['>=','expire_time',date('Y-m-d')]);
            }else{//非vip
                $query->andWhere(['is_forever' => 2]);
                $query->andWhere(['<','expire_time',date('Y-m-d')]);
            }
        }

        if ($openid = Yii::$app->request->get('openid')) {
                $query->andWhere(['openid' => $openid]);
        }
        if ($user_name = Yii::$app->request->get('user_name')) {
            $query->andWhere(['user_name' => $user_name]);
        }
        if ($expire_time = Yii::$app->request->get('expire_time')) {
            $query->andWhere(['is_forever' => 2]);
            $query->andWhere(['<=','expire_time',$expire_time]);
        }
        $count = $query->count();

        $query->orderBy([
             'id' => SORT_DESC
        ]);

        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->setPageSize(20);

        $users = $query->offset($pagination->offset)
             ->limit($pagination->limit)
             ->all();
        return $this->render('list', [
             'pagination' => $pagination,
             'list' => $users,
             'total_user' => $count
        ]);
    }

    /**
     * 修改内容
     * @param $id
     * @return string
     * @wanghui
     */
    public function actionEdit($id){
        $model = Article::findOne($id);
        $model->scenario = 'update';
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                if($model->save()){
                    $this->redirect(['/article/list']);
                }
            }
        }
        $catrgory = Category::find()->where('status=1')->asArray()->all();
        $catrgory_data = \yii\helpers\ArrayHelper::map($catrgory, 'id', 'category_name');
        return $this->render('edit', [
             'catrgory_data' => $catrgory_data,
             'model' => $model,
        ]);


    }


}
