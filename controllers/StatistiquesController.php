<?php
namespace app\controllers;

use Yii;
use app\models\Enseigne;
use app\models\Enseignesearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\User;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use app\models\EnseigneHasCustomer;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use app\models\Pointdevente;

use app\models\userPermissions;


class StatistiquesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Enseigne models.
     * @return mixed
     */
    public function actionIndex()
    {


       
// get the posts in the current page
           return $this->render('index') ;
    }
    

}
