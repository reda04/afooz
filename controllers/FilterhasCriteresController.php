<?php

namespace app\controllers;

use Yii;
use app\models\FilterhasCriteres;
use app\models\FilterHasCriteressearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FilterhasCriteresController implements the CRUD actions for FilterhasCriteres model.
 */
class FilterhasCriteresController extends Controller
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
     * Lists all FilterhasCriteres models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilterHasCriteressearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FilterhasCriteres model.
     * @param integer $filter_id
     * @param integer $operateur_has_criteres_id
     * @return mixed
     */
    public function actionView($filter_id, $operateur_has_criteres_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($filter_id, $operateur_has_criteres_id),
        ]);
    }

    /**
     * Creates a new FilterhasCriteres model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FilterhasCriteres();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'filter_id' => $model->filter_id, 'operateur_has_criteres_id' => $model->operateur_has_criteres_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FilterhasCriteres model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $filter_id
     * @param integer $operateur_has_criteres_id
     * @return mixed
     */
    public function actionUpdate($filter_id, $operateur_has_criteres_id)
    {
        $model = $this->findModel($filter_id, $operateur_has_criteres_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'filter_id' => $model->filter_id, 'operateur_has_criteres_id' => $model->operateur_has_criteres_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FilterhasCriteres model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $filter_id
     * @param integer $operateur_has_criteres_id
     * @return mixed
     */
    public function actionDelete($filter_id, $operateur_has_criteres_id)
    {
        $this->findModel($filter_id, $operateur_has_criteres_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FilterhasCriteres model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $filter_id
     * @param integer $operateur_has_criteres_id
     * @return FilterhasCriteres the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($filter_id, $operateur_has_criteres_id)
    {
        if (($model = FilterhasCriteres::findOne(['filter_id' => $filter_id, 'operateur_has_criteres_id' => $operateur_has_criteres_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
