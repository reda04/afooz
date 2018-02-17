<?php

namespace app\controllers;

use Yii;
use app\models\Consomation;
use app\models\Consomationsearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConsomationController implements the CRUD actions for Consomation model.
 */
class ConsomationController extends Controller
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
     * Lists all Consomation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Consomationsearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Consomation model.
     * @param integer $enseigne_has_customer_id
     * @param integer $enseigne_id
     * @param integer $point_de_vente_id
     * @return mixed
     */
    public function actionView($enseigne_has_customer_id, $enseigne_id, $point_de_vente_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($enseigne_has_customer_id, $enseigne_id, $point_de_vente_id),
        ]);
    }

    /**
     * Creates a new Consomation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Consomation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'enseigne_has_customer_id' => $model->enseigne_has_customer_id, 'enseigne_id' => $model->enseigne_id, 'point_de_vente_id' => $model->point_de_vente_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Consomation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $enseigne_has_customer_id
     * @param integer $enseigne_id
     * @param integer $point_de_vente_id
     * @return mixed
     */
    public function actionUpdate($enseigne_has_customer_id, $enseigne_id, $point_de_vente_id)
    {
        $model = $this->findModel($enseigne_has_customer_id, $enseigne_id, $point_de_vente_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'enseigne_has_customer_id' => $model->enseigne_has_customer_id, 'enseigne_id' => $model->enseigne_id, 'point_de_vente_id' => $model->point_de_vente_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Consomation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $enseigne_has_customer_id
     * @param integer $enseigne_id
     * @param integer $point_de_vente_id
     * @return mixed
     */
    public function actionDelete($enseigne_has_customer_id, $enseigne_id, $point_de_vente_id)
    {
        $this->findModel($enseigne_has_customer_id, $enseigne_id, $point_de_vente_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Consomation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $enseigne_has_customer_id
     * @param integer $enseigne_id
     * @param integer $point_de_vente_id
     * @return Consomation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($enseigne_has_customer_id, $enseigne_id, $point_de_vente_id)
    {
        if (($model = Consomation::findOne(['enseigne_has_customer_id' => $enseigne_has_customer_id, 'enseigne_id' => $enseigne_id, 'point_de_vente_id' => $point_de_vente_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
