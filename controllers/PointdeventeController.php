<?php

namespace app\controllers;

use Yii;
use app\models\Pointdevente;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\models\UserPermissions;
/**
 * PointdeventeController implements the CRUD actions for Pointdevente model.
 */
class PointdeventeController extends Controller
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
     * Lists all Pointdevente models.
     * @return mixed
     */
    public function actionIndex()
    {


         
        $dataProvider = new ActiveDataProvider([
            'query' => Pointdevente::find()->where(['point_de_vente_id'=>\yii\helpers\ArrayHelper::getColumn(unserialize(Yii::$app->user->identity->userPermissions->pointsdeventes),'point_de_vente_id')]),
        ]);





        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    
}
/* public function actionJson()
    {
        if(\Yii::$app->user->identity->enseigneEnseigne->Nbre_points_vente == 1)
        {
            
        
                throw new ForbiddenHttpException;
        
        }
        else
        {
            $dataProvider= Pointdevente::find()->where(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->all();
 

       \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
       return $dataProvider;
    }
}*/
    /**
     * Displays a single Pointdevente model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return  $this->redirect(['index']);
    
}
    /**
     * Creates a new Pointdevente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(\Yii::$app->user->identity->enseigneEnseigne->Nbre_points_vente   == Pointdevente::find()->where(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->count() || Yii::$app->user->identity->role->role=='manager')
        {
            
        
                 return  $this->redirect(['index']);
        
        }
        else
        {
        $model = new Pointdevente();
        $model->enseigne_enseigne_id=\Yii::$app->user->identity->enseigneEnseigne->enseigne_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $permission = UserPermissions::find()->where(['user_id'=> \Yii::$app->user->identity->id])->one();
            $permission->pointsdeventes = serialize(Pointdevente::find()->select(['point_de_vente_id','nom'])->where(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->asArray()->all() ) ;
            $permission->save();
            return $this->redirect(['view', 'id' => $model->point_de_vente_id]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    }

    /**
     * Updates an existing Pointdevente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $permission = UserPermissions::find()->where(['user_id'=> \Yii::$app->user->identity->id])->one();
             $permission->pointsdeventes = serialize(Pointdevente::find()->select(['point_de_vente_id','nom'])->where(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->asArray()->all() ) ;
             $permission->save();
            return $this->redirect(['view', 'id' => $model->point_de_vente_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pointdevente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {       
        if(\Yii::$app->user->identity->role->role=='manager')
        {
            
        
                 return  $this->redirect(['index']);
        
        }
        else
        {
            $this->findModel($id)->delete();
            $permission = UserPermissions::find()->where(['user_id'=> \Yii::$app->user->identity->id])->one();
            $permission->pointsdeventes = serialize(Pointdevente::find()->select(['point_de_vente_id','nom'])->where(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->asArray()->all() ) ;
            $permission->save();
        return $this->redirect(['index']);
    }
    }   

    /**
     * Finds the Pointdevente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pointdevente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pointdevente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
