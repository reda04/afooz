<?php

namespace app\controllers;

use Yii;
use app\models\Sms;
use app\models\Filtrer;
use app\models\smssearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SmsController implements the CRUD actions for Sms model.
 */
class SmsController extends Controller
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
     * Lists all Sms models.
     * @return mixed
     */
    public function actionIndex()
    {
         if (Yii::$app->user->identity->userPermissions->envoi_sms)
                        {
        $searchModel = new smssearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    else
    {
        return $this->redirect(['site/forbidden']);
    }
    }

    /**
     * Displays a single Sms model.
     * @param integer $id
     * @return mixed
     */
 
    /**
     * Creates a new Sms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         if (Yii::$app->user->identity->userPermissions->envoi_sms)
                        {
        $model = new Sms();

        if ($model->load(Yii::$app->request->post()) ) {


            switch (\Yii::$app->request->post('submit')) {
                 case 'brouillon':
                 $model->etat= 'brouillon';
                if( $model->save())
                {
                    return $this->redirect(['index']);
                }
                else
                {$model->etat= '';
                    print_r($model->geterrors());
                }
                 break;

                 case 'save':
                     $model->etat= 'en attente';
                if( $model->save())
                {
                    return $this->redirect(['index']);
                }
                else
                {$model->etat= '';
                    print_r($model->geterrors());
                }
                 break;
   
   }


         //   return $this->redirect(['view', 'newsletter_id' => $model->newsletter_id, 'point_de_vente_id' => $model->point_de_vente_id]);
        } 
        else 
             {
                    if(Yii::$app->user->identity->role->role=='admin')
                     {

                       for($i=0 ;$i<count(Yii::$app->user->identity->enseigneEnseigne->pointDeVentes) ; $i++)
                        {
                          if(Yii::$app->user->identity->enseigneEnseigne->pointDeVentes[$i]['flag']=='primary')
                             {
                                  $point = Yii::$app->user->identity->enseigneEnseigne->pointDeVentes[$i]['point_de_vente_id'];
                             }

                        }
              }

 $filtres = filtrer::find()->where(['statut'=>'active'])->andwhere(['point_de_vente_id'=>$point])->asarray()->all();
            return $this->render('create', [
                'model' => $model,
                'filtres' => $filtres,
                'point' => $point,

         
            ]);
        }
    }
    else
    {
        return $this->redirect(['site/forbidden']);
    }
    }


    /**
     * Updates an existing Sms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         if (Yii::$app->user->identity->userPermissions->envoi_sms)
                        {
                            $model = $this->findModel($id);

                            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                                return $this->redirect(['view', 'id' => $model->sms_id]);
                            } else {
                                return $this->render('update', [
                                    'model' => $model,
                                ]);
                            }
    }
    else
    {
        return $this->redirect(['site/forbidden']);
    }
    }

    /**
     * Deletes an existing Sms model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
         if (Yii::$app->user->identity->userPermissions->envoi_sms)
         {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
         }
         else
         {
              return $this->redirect(['site/forbidden']);
         }
    }

    /**
     * Finds the Sms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
