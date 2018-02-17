<?php

namespace app\controllers;

use Yii;
use app\models\EnseigneHasCustomer;
use app\models\EnseigneHasCustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EnseigneHasCustomerController implements the CRUD actions for EnseigneHasCustomer model.
 */
class EnseigneHasCustomerController extends Controller
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
     * Lists all EnseigneHasCustomer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EnseigneHasCustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EnseigneHasCustomer model.
     * @param integer $enseigne_id
     * @param integer $enseigne_has_customer_id
     * @param integer $customer_id
     * @return mixed
     */
    public function actionView($enseigne_id, $enseigne_has_customer_id, $customer_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($enseigne_id, $enseigne_has_customer_id, $customer_id),
        ]);
    }

    /**
     * Creates a new EnseigneHasCustomer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EnseigneHasCustomer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'enseigne_id' => $model->enseigne_id, 'enseigne_has_customer_id' => $model->enseigne_has_customer_id, 'customer_id' => $model->customer_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionDashboard()
    {
        

        return $this->render('dashboard');
    }

    /**
     * Updates an existing EnseigneHasCustomer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $enseigne_id
     * @param integer $enseigne_has_customer_id
     * @param integer $customer_id
     * @return mixed
     */
    public function actionUpdate($enseigne_id, $enseigne_has_customer_id, $customer_id)
    {
        $model = $this->findModel($enseigne_id, $enseigne_has_customer_id, $customer_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'enseigne_id' => $model->enseigne_id, 'enseigne_has_customer_id' => $model->enseigne_has_customer_id, 'customer_id' => $model->customer_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EnseigneHasCustomer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $enseigne_id
     * @param integer $enseigne_has_customer_id
     * @param integer $customer_id
     * @return mixed
     */
    public function actionDelete($enseigne_id, $enseigne_has_customer_id, $customer_id)
    {
        $this->findModel($enseigne_id, $enseigne_has_customer_id, $customer_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EnseigneHasCustomer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $enseigne_id
     * @param integer $enseigne_has_customer_id
     * @param integer $customer_id
     * @return EnseigneHasCustomer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($enseigne_id, $enseigne_has_customer_id, $customer_id)
    {
        if (($model = EnseigneHasCustomer::findOne(['enseigne_id' => $enseigne_id, 'enseigne_has_customer_id' => $enseigne_has_customer_id, 'customer_id' => $customer_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
