<?php

namespace app\controllers;

use Yii;
use app\models\OperateurhasCriteres;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CrihasopController implements the CRUD actions for OperateurhasCriteres model.
 */
class CrihasopController extends Controller
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
     * @param integer $Operateur_Operateur_id
     * @param integer $Criteres_Critere_id
     * @return mixed
     */
    public function actionView($Operateur_Operateur_id, $Criteres_Critere_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Operateur_Operateur_id, $Criteres_Critere_id),
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
            return $this->redirect(['view', 'Operateur_Operateur_id' => $model->Operateur_Operateur_id, 'Criteres_Critere_id' => $model->Criteres_Critere_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OperateurhasCriteres model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Operateur_Operateur_id
     * @param integer $Criteres_Critere_id
     * @return mixed
     */
    public function actionUpdate($Operateur_Operateur_id, $Criteres_Critere_id)
    {
        $model = $this->findModel($Operateur_Operateur_id, $Criteres_Critere_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Operateur_Operateur_id' => $model->Operateur_Operateur_id, 'Criteres_Critere_id' => $model->Criteres_Critere_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OperateurhasCriteres model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Operateur_Operateur_id
     * @param integer $Criteres_Critere_id
     * @return mixed
     */
    public function actionDelete($Operateur_Operateur_id, $Criteres_Critere_id)
    {
        $this->findModel($Operateur_Operateur_id, $Criteres_Critere_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OperateurhasCriteres model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Operateur_Operateur_id
     * @param integer $Criteres_Critere_id
     * @return OperateurhasCriteres the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Operateur_Operateur_id, $Criteres_Critere_id)
    {
        if (($model = OperateurhasCriteres::findOne(['Operateur_Operateur_id' => $Operateur_Operateur_id, 'Criteres_Critere_id' => $Criteres_Critere_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
