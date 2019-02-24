<?php

namespace app\controllers;

use app\models\Pageprods;
use app\models\Pages;
use Yii;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [

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


    public function actionShuffleit () {

        return $this->render('shuffle', ['shuffle' => Pageprods::shuffleByColumn()]);
    }
    public function actionPages($cost = 10000) {
        if (!is_int($cost)) {
            throw new Exception('cost must be int value');
        }
        $query = Pages::find()->select('pages.name')->leftJoin('pageprods', 'pages.id = pageprods.page_id')->leftJoin('products', 'pageprods.product_id = products.id')->groupBy(' pages.name')->having("sum(cost)< :cost", [":cost"=>$cost])->asArray()->all();
        return $this->render('pages', ['pages' => $query]);
    }
}
