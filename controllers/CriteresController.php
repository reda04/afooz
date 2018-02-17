<?php

namespace app\controllers;

use Yii;
use app\models\Criteres;
use app\models\Criteresearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\OperateurHasCriteres;
use app\models\Operateur;
use yii\data\ActiveDataProvider;
//migration live 
/**
 * CriteresController implements the CRUD actions for Criteres model.
 */
class CriteresController extends Controller
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
     * Lists all Criteres models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new Criteresearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Criteres model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionListecolonnes()
    {
     $out = [];
    $data = '';
    if (isset($_POST['depdrop_parents'])) {

        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $selected_table = $parents[0];
            $tables =Criteres::gettablecolumns($selected_table); 
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
           $cpt=0;
                 foreach($tables as $colonnes )
                        {
            $data[$cpt]['id']=$colonnes['column_name'];
             $data[$cpt]['name']=$colonnes['column_name'];
              $cpt++;
}
            echo \yii\helpers\Json::encode(['output'=>$data, 'selected'=>'']);
            return;
        }

           
   // echo \yii\helpers\Json::encode(['output'=>$out, 'selected'=>'']);

}
    }
    public function actionDatatype($table,$colonne)
    {

        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;

        $resultat =  Criteres::getdatatype($table,$colonne);
        $chaine = $resultat[0]['column_type'];

        //strstr remplace enum(  par un vide 
    //  $chaine = str_replace('enum(','',$chaine);
      //  $chaine = str_replace('\'','',$chaine);
        //  $chaine = str_replace(')','',$chaine);
           // $chaine = str_replace('enum(','',$chaine);
        print_r($chaine);

    }

    /**
     * Creates a new Criteres model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Criteres();
        $operateur_has_criteres = new OperateurHasCriteres();
       //$model_ope = new Operateur();

        if ($model->load(Yii::$app->request->post())) {

           // $name = $request->post('OperateurHasCriteres');
            
            $var = $_POST['OperateurHasCriteres']['operateur_id'];
              $model->save();
              if(!empty($var))
              {
                foreach ($var as $value) {
                $operateur_has_criteres = new OperateurHasCriteres();
                $operateur_has_criteres->operateur_id=$value;
                $operateur_has_criteres->critere_id=$model->Critere_id;
                
                $operateur_has_criteres->save() ;
             }
        }
        
          
            return $this->redirect(['view', 'id' => $model->Critere_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'operateur' => $operateur_has_criteres
            ]);
        }
    }

    /**
     * Updates an existing Criteres model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    { $operateur_has_criteres = new OperateurHasCriteres();
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) ) {
                                    
         $var = $_POST['OperateurHasCriteres']['operateur_id'];
         $model->save();    
         //$model = $connection->createCommand('DELETE FROM DELETE FROM operateur_has_criteres WHERE critere_id=:userid');
         //$model->bindParam(':userid', $model->id);
       $operateur_has_criteres->deleteAll(['critere_id' => $id]);
         if(!empty($var))
              {
         foreach ($var as $value) {
                $operateur_has_criteres = new OperateurHasCriteres();
                $operateur_has_criteres->operateur_id=$value;
                $operateur_has_criteres->critere_id=$model->Critere_id;
                $operateur_has_criteres->isNewRecord = true;
                $operateur_has_criteres->save() ;
             }
     }
                
         

             return $this->redirect(['view', 'id' => $model->Critere_id]);
         }
         else {
            return $this->render('update', [
                'model' => $model,
                'operateur' => $operateur_has_criteres
            ]);
        }
    
}


    /**
     * Deletes an existing Criteres model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
$q =  new OperateurHasCriteres();

        $q->deleteAll(['critere_id' => $id]);
        $this->findModel($id)->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Criteres model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Criteres the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
  
    protected function findModel($id)
    { 
        if (($model = Criteres::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
