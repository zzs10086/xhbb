<?php
namespace boss\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use boss\models\LoginForm;
use boss\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout='@app/views/layouts/matrix.php';
        $id = Yii::$app->user->id;
        $model = User::findOne($id);
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                $model->updatetime = date('Y-m-d H:i:s');
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
                echo $model->save();
            }
        }
        return $this->render('index',[
             'model'=>$model
        ]);
    }

    /**
     * 修改信息
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionProfile()
    {
        $this->layout='@app/views/layouts/matrix.php';
        $id = Yii::$app->user->id;
        $model = User::findOne($id);

        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
           
            if ($model->validate()) {
                $model->updatetime = date('Y-m-d H:i:s');
                $model->real_name =$model->real_name;
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
                $model->save();
                return $this->redirect(['site/profile']);
            }
        }
        return $this->render('profile',[
            'model'=>$model,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
