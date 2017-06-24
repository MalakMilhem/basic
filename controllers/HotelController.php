<?php
/**
 * Created by PhpStorm.
 * User: malak
 * Date: 6/24/17
 * Time: 10:58 AM
 */

namespace app\controllers;

use app\models\Hotel;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;


/**
 * HotelController should implements set of actions like index , update , create
 * now I implement just index action which will refer to the search page
 *
 * - `index`:  will retrive the hotels based on the user criteria
 *
 * To add a new action, either override [[actions()]] by appending a new action class or write a new action method.
 * don't forget to check behaviors function to determine the  AccessControl for the users and the verb for the action 'post ,get..etc'
 *
 */
class HotelController extends Controller
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
     * Displays Search Page.
     * This action will be the search page
     * @return string the html for the page
     * @throws NotFoundHttpException
     * @internal param model $searchModel will represent hotel model
     * @internal param dataprovider $targetHotels  will represent sets of hotels based on the user search criteria
     */
    public function actionIndex()
    {
        //create new instance from hotel class and assign the carita to it
        $searchModel = new Hotel();
        $searchModel->load(\Yii::$app->request->get());

        //make ajax validation when the user use the form and write down his target criteria
        if(\Yii::$app->request->isAjax){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($searchModel);
        }
        //get hotels and convert the array to data provider
        $targetHotels = $searchModel->getTargetHotels(\Yii::$app->request->get('Hotel',''));
        $targetHotels = new ArrayDataProvider([
            'models' => $targetHotels,
            'totalCount' => count($targetHotels),
            'pagination' => [
                'pageSize' =>  count($targetHotels),
                'totalCount' => count($targetHotels),
                'forcePageParam' => true,
            ]
        ]);

        //calling the view to render the page
        return $this->render('index',['targetHotels'=>$targetHotels,'searchModel'=>$searchModel]);
    }


}