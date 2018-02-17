<?php

namespace app\controllers;

use Yii;
use app\models\Notification;
use app\models\Notificationsearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\filter;


/**
 * NotificationController implements the CRUD actions for Notification model.
 */
class NotificationController extends Controller
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
     * Lists all Notification models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Notificationsearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Notification model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Notification model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Notification();
        $model->enseigne_id=Yii::$app->user->identity->enseigneEnseigne->enseigne_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            echo $model->filtre_id;
            //return $this->redirect(['index']);
        } else {
            $filtres = filter::find()->where(['statut'=>'active'])->asarray()->all();

            return $this->render('create', [
                'model' => $model,
                'filtres' => $filtres,
            ]);
        }

        
    }

    /**
     * Updates an existing Notification model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $model->filtre_id=$_POST['Notification']['filtre_id'];
            $model->save();
            return $this->redirect(['index']);
        } else {
            $filtres = filter::find()->where(['statut'=>'active'])->asarray()->all();
            return $this->render('update', [
                'model' => $model,
                'filtres' => $filtres,
            ]);
        }
    }

    /**
     * Deletes an existing Notification model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Notification model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notification::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
