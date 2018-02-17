<?php

namespace app\controllers;

use Yii;
use app\models\Sponsorship;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SponsorshipController implements the CRUD actions for Sponsorship model.
 */
class SponsorshipController extends Controller
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
     * Lists all Sponsorship models.
     * @return mixed
     */


    /**
     * Displays a single Sponsorship model.
     * @param integer $id
     * @return mixed
     */
 

    /**
     * Creates a new Sponsorship model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    { if (Yii::$app->user->identity->userPermissions->parrainage)
                        {
        $model = new Sponsorship();
        $check = $model->find()->where(['enseigne_id'=>\Yii::$app->user->identity->enseigneEnseigne->enseigne_id ])->one();
        if($check)
        {
                  return $this->redirect(['update', 'id' => $check['sponsorship_id']]);
         
        }
        else
        {
            if ($model->load(Yii::$app->request->post()) ) {
            $model->enseigne_id=\Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
            if($model->save())
            {
            return $this->redirect(['view', 'id' => $model->sponsorship_id]);
        }} else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        }
}
else
    {
        return $this->redirect(['site/forbidden']);
    }
      
    }

    /**
     * Updates an existing Sponsorship model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         if (Yii::$app->user->identity->userPermissions->parrainage)
                        {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sponsorship_id]);
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
     * Deletes an existing Sponsorship model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
  

    /**
     * Finds the Sponsorship model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sponsorship the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sponsorship::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
