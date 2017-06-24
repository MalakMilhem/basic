<?php

namespace app\controllers;

use app\models\Hotel;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * SiteController should implements set of actions like index ,login ,logout and about
 * now I implement just index action which will refer to the home page
 *
 * - `index`:  will retrive the most comfortable hotels and most recommended hotelsand display them in good maner
 *
 * To add a new action, either override [[actions()]] by appending a new action class or write a new action method.
 *
 * don't forget to check behaviors function to determine the  AccessControl for the users and the verb for the action 'post ,get..etc'
 *
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     * This action will be the home page for the site
     * @return string the html for the page
     * @throws NotFoundHttpException
     * @internal param model $searchModel will represent hotel model
     * @internal param dataprovider $mostComfortableHotels will represent sets of hotels
     * @internal param dataprovider $recommendedHotels  will represent sets of hotels
     */
    public function actionIndex()
    {
        //get target data from the model
        $searchModel            = new Hotel();
        $mostComfortableHotels  = $searchModel->mostComfortableHotels;
        $recommendedHotels      = $searchModel->recomendedHotels;

        //convert array to data providers
        $mostComfortableHotels = new ArrayDataProvider([
            'models'             => $mostComfortableHotels,
            'totalCount'         => count($mostComfortableHotels),
            'pagination'         => [
                'pageSize'       => count($mostComfortableHotels),
                'totalCount'     => count($mostComfortableHotels),
                'forcePageParam' => false,
            ]
        ]);
        $recommendedHotels = new ArrayDataProvider([
            'models'             => $recommendedHotels,
            'totalCount'         => count($recommendedHotels),
            'pagination'         => [
                'pageSize'       => count($recommendedHotels),
                'totalCount'     => count($recommendedHotels),
                'forcePageParam' => false,
            ]
        ]);

        //calling the view to render the page
        return $this->render('index',
            [
                'searchModel'           => $searchModel,
                'mostComfortableHotels' => $mostComfortableHotels,
                'recommendedHotels'     => $recommendedHotels
            ]);
    }


}
