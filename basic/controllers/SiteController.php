<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Cars;
use yii\web\Request;

class SiteController extends Controller
{
    public $Cars;
    public $numberPage = 1;
    public $countRows = 10;
    public $editform = [];
    public $addform =[];
    public $connection;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function renderListCars(){
        return $this->render('listcars', [
            'brands' => (new Cars())->getBrands(),
            'status' => (new Cars())->getStatus(),
            'page' => (new Cars())->getPage($this->numberPage, $this->countRows),
            'len' => (new Cars())->getLenCars(),
            'countRows'=>$this->countRows,
            'numberPage'=>$this->numberPage,
        ]);
    }

    public function actionListCars()
    {
        return $this->renderListCars();
    }

    public function actionChangeCountRows(){
        $this->numberPage = 1;
        $this->countRows = (int)$_GET['CountRows'];

        return (new Cars())->getPage($this->numberPage, $this->countRows);
    }

    public function actionGetPage(){
        return (new Cars())->getPage($this->numberPage, $this->countRows);
    }

    public function actionChangeSelectPage(){
        $this->numberPage = (int)$_GET['NumberPage'];
        return (new Cars())->getPage($this->numberPage, $this->countRows);
    }

    public function actionEditForm(){
        return $this->render('editform', [
            'brands' => (new Cars())->getBrands(),
            'status' => (new Cars())->getStatus(),
            'record' => (new Cars())->getRecord($_GET['id'])
        ]);
    }

    public function actionAddForm(){
        return $this->render('addform', [
            'brands' => (new Cars())->getBrands(),
            'status' => (new Cars())->getStatus(),
        ]);
    }

    public function actionSubmitEdit(){
        (new Cars())->updateRecord([
            'id' => Yii::$app->request->post('id'),
            'id_brand' => Yii::$app->request->post('id_brand'),
            'model' => Yii::$app->request->post('model'),
            'production_year' => Yii::$app->request->post('production_year'),
            'mileage' => Yii::$app->request->post('mileage'),
            'id_status' => Yii::$app->request->post('id_status'),
        ]);
        return $this->renderListCars();
    }

    public function actionSubmitAdd(){
        (new Cars())->addRecord([
            'id_brand' => Yii::$app->request->post('id_brand'),
            'model' => Yii::$app->request->post('model'),
            'production_year' => Yii::$app->request->post('production_year'),
            'mileage' => Yii::$app->request->post('mileage'),
            'id_status' => Yii::$app->request->post('id_status'),
        ]);
        return $this->renderListCars();
    }
}
