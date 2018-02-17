<?php

namespace app\controllers;

use Yii;
use app\models\OperateurhasCriteres;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OperateurhascriteresController implements the CRUD actions for OperateurhasCriteres model.
 */
class OperateurhascriteresController extends Controller
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
     * Lists all OperateurhasCriteres models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OperateurhasCriteres::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OperateurhasCriteres model.
     * @param integer $id
     * @param integer $critere_id
     * @return mixed
     */
    public function actionView($id, $critere_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $critere_id),
        ]);
    }

    /**
     * Creates a new OperateurhasCriteres model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OperateurhasCriteres();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'critere_id' => $model->critere_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OperateurhasCriteres model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $critere_id
     * @return mixed
     */
    public function actionUpdate($id, $critere_id)
    {
        $model = $this->findModel($id, $critere_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'critere_id' => $model->critere_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OperateurhasCriteres model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $critere_id
     * @return mixed
     */
    public function actionDelete($id, $critere_id)
    {
        $this->findModel($id, $critere_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OperateurhasCriteres model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $critere_id
     * @return OperateurhasCriteres the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $critere_id)
    {
        if (($model = OperateurhasCriteres::findOne(['id' => $id, 'critere_id' => $critere_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
