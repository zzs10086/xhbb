<?php
namespace boss\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\Pagination;
use common\models\ByArticle as Article;
use common\models\ByCategory as Category;

/**
 * Site controller
 */
class ArticleController extends Controller
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
     * 内容列表
     * @wanghui
     */
    public function actionList()
    {
        //分页数据
        $query = Article::find();

        if ($title = Yii::$app->request->get('title')) {
            $query->andWhere(['like', 'title', $title]);
        }

        if ($list_status = Yii::$app->request->get('list_status')) {
            if(! empty($list_status)) {
                $query->andWhere(['status' => $list_status]);
            }
        }
        $count = $query->count();

        $query->orderBy([
             'status'=>SORT_ASC,
             'id' => SORT_DESC
        ]);

        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->setPageSize(20);

        $articles = $query->offset($pagination->offset)
             ->limit($pagination->limit)
             ->all();
        return $this->render('list', [
             'pagination' => $pagination,
             'articles' => $articles,
             'total_article' => $count
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

    /**
     * @return string
     * 分类列表
     * @wanghui
     */
    public function actionCategory()
    {
        //分页数据
        $query = Category::find();

        if ($title = Yii::$app->request->get('title')) {
            $query->andWhere(['like', 'title', $title]);
        }

        if ($list_status = Yii::$app->request->get('list_status')) {
            if(! empty($list_status)) {
                $query->andWhere(['status' => $list_status]);
            }
        }
        $count = $query->count();

        $query->orderBy([
             'status'=>SORT_ASC,
             'id' => SORT_DESC
        ]);

        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->setPageSize(20);

        $category = $query->offset($pagination->offset)
             ->limit($pagination->limit)
             ->all();
        return $this->render('category_list', [
             'pagination' => $pagination,
             'list' => $category,
             'total_count' => $count
        ]);
    }

    /**
     * 修改分类
     * @param $id
     * @return string
     * @wanghui
     */
    public function actionCategoryedit($id){
        $model = Category::findOne($id);
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                if($model->save()){
                    $this->redirect(['/article/category']);
                }
            }
        }

        return $this->render('category_edit', [
             'model' => $model,
        ]);


    }




}
