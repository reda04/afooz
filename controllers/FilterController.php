<?php

namespace app\controllers;

use Yii;
use app\models\Filter;
use app\models\Filtersearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\FilterhasCriteres;
use yii\data\ActiveDataProvider;
use app\controllers\FilterhasCriteresController;
use app\models\Pointdevente;
use app\models\UserPermissions;

use app\models\operateurhasCriteres;

use app\models\Criteres;



/**
 * FilterController implements the CRUD actions for Filter model.
 */
class FilterController extends Controller
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
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Filter models.
     * @return mixed
     */
    public function actionIndex()
    {
          if (Yii::$app->user->identity->userPermissions->gestion_ciblages)   
                {
                    $searchModel = new Filtersearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return $this->render('index', [

                        'dataProvider' => $dataProvider,
                    ]);
                }
                else
                {
                    return $this->redirect(['site/forbidden']);
                }
    }
    
    public function actionListeoperateurs() {
          if (Yii::$app->user->identity->userPermissions->gestion_ciblages)   
                    {
    $out = [];
    $data = '';
    if (isset($_POST['depdrop_parents'])) {

        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out = operateurhasCriteres::find()->joinWith(['operateur'])->where(['Critere_id' => $cat_id])->asArray()->all(); 
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
           $cpt=0;
                 foreach($out as $k )
                        {
            $data[$cpt]['id']=$k['operateur']['Operateur_id'];
             $data[$cpt]['name']=$k['operateur']['operator'];
              $cpt++;
}
            echo \yii\helpers\Json::encode(['output'=>$data, 'selected'=>'']);
            return;
        }

           
   // echo \yii\helpers\Json::encode(['output'=>$out, 'selected'=>'']);

}
    
            
      
             // echo  \yii\helpers\Json::encode($out);
}
 else
    {
        return $this->redirect(['site/forbidden']);
    }
}

    /**
     * Displays a single Filter model.
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
     * Creates a new Filter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->identity->userPermissions->gestion_ciblages)   
                    {
        $model = new Filter();
        $points = UserPermissions::find()->select('pointsdeventes')->where(['user_id'=>Yii::$app->user->identity->id])->one();
        $serie =  $points['pointsdeventes'];
        $liste = \yii\helpers\ArrayHelper::map(unserialize($serie),'point_de_vente_id','nom');
        $nombre =  Pointdevente::find()->where(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->count();
        if ($model->load(Yii::$app->request->post()) ) {

            $model->enseigne_id=Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
            $model->name = $model->name.'_'.Yii::$app->user->identity->enseigneEnseigne->name.'/'.Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
            $model->statut='Inactive';
            $point=Pointdevente::find()->where(['enseigne_enseigne_id'=> Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one();
            
          if ( $model->save())
          {
               return $this->redirect(['update', 'id' => $model->filter_id]);
          }
          else
          {
          return $this->render('create', [
                'model' => $model,
                'pointdevente'  => $liste,
                'nombre' => $nombre,
            ]);
        
          }

        } else {
            return $this->render('create', [
                'model' => $model,
                'pointdevente'  => $liste,
                'nombre' => $nombre,
            ]);
        }
    }
    else
    {
        return $this->redirect(['site/forbidden']);
    }
    }

    /**
     * Updates an existing Filter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
      {
                      if (Yii::$app->user->identity->userPermissions->gestion_ciblages)   
                    {
                 $joint = new FilterhasCriteres();

                 $model = $this->findModel($id);
                $dataProvider = new ActiveDataProvider([
         'query' => FilterhasCriteres::find()->where(['filter_id'=>$model->filter_id]),
        ]);

         $ophascri = Criteres::find()->all();
          $opcr = new OperateurHasCriteres();
        if ( $opcr->load(Yii::$app->request->post())&& $joint->load(Yii::$app->request->post())) {
                  

          
                 $val_id = $opcr->find()->select('id')->where(['critere_id' =>$opcr->critere_id])->andwhere(['operateur_id' =>$opcr->operateur_id])->asArray()->one();
                 $joint->filter_id=$id;
                 $joint->operateur_has_criteres_id=$val_id['id'];
                 if($joint->save())
                 {
                 $model->statut='Inactive';
                  $model->save();

                Yii::$app->session->setFlash('success', "Le critère a bien été ajouté au filtre " );
                 return $this->refresh();
                 }
                 else
                 {
                  print_r($joint->getErrors());

                 }
                 

         
    }
        else
        {


            return $this->render('update', [
                'model' => $model,
                'dataProvider'=>  $dataProvider,
                 'ophascri'=>$ophascri,
                'criteria' => $joint,
                'opcr' => $opcr
            ]);
        }
    }
    else
    {
        return $this->redirect(['site/forbidden']);
    }
    }

     public function actionActivate($id)
{
    if (Yii::$app->user->identity->userPermissions->gestion_ciblages)   
                    {
    $model = $this->findModel($id);
    $dataProvider = new ActiveDataProvider(['query' => FilterhasCriteres::find()->where(['filter_id' => $model->filter_id]) ]);
    if (FilterhasCriteres::find()->where(['filter_id' => $model->filter_id])->count() == 0)
    {
        return $this->redirect(['update', 'id' => $id]);
    }
    else
    {
 

     
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {

            
                $s = "from  ";
                echo $s.'\n';
                $tables = [];
                for ($i = 0; $i < count($dataProvider->getmodels()); $i++)
                {
                    if (!in_array($dataProvider->getmodels() [$i]['operateurHasCriteres']['critere']['table_name'], $tables))
                    {
                        
                        if($dataProvider->getmodels() [$i]['operateurHasCriteres']['critere']['table_name'] =='enseigne_has_customer')
                    {
                      array_push($tables,'customer');
                     
                    }
                    else
                    {
                        array_push($tables, $dataProvider->getmodels() [$i]['operateurHasCriteres']['critere']['table_name']);
                    }
                    }
                }

                for ($i = 0; $i < count($tables); $i++)
                {
                   
                    $s = $s . '`' . $dataProvider->getmodels() [$i]['operateurHasCriteres']['critere']['table_name'] . '`';
                    
                    if ($i < count($tables) - 1)
                    {
                        $s.= ",";
                    }
                  
                }

                $s = $s . "  INNER JOIN `enseigne_has_customer` ON customer.customer_id=enseigne_has_customer.customer_id where ";
                for ($i = 0; $i < count($dataProvider->getmodels()); $i++)
                {
                    $s = $s . $dataProvider->getmodels() [$i]['operateurHasCriteres']['critere']['table_name'] . ".`" . $dataProvider->getmodels() [$i]['operateurHasCriteres']['critere']['column_name'] . "`";
                     switch ($dataProvider->getmodels() [$i]['operateurHasCriteres']['operateur']['libellé']) {
    case 'contains':
        $s = $s."like '%" . $dataProvider->getmodels() [$i]['selected_value'] . "%' ";
        break;
    case 'startswith':
          $s = $s."like '" . $dataProvider->getmodels() [$i]['selected_value'] . "%' ";
        break;
    case 'endswith':
        $s = $s."like '%" . $dataProvider->getmodels() [$i]['selected_value'] . "' ";
        break;
     case 'doesnotcontains':
        $s = $s."not like '%" . $dataProvider->getmodels() [$i]['selected_value'] . "%' ";
        break;

 default:
       $s = $s . $dataProvider->getmodels() [$i]['operateurHasCriteres']['operateur']['mapping'] . " '" . $dataProvider->getmodels() [$i]['selected_value'] . "' ";
       break;
               
                     
                }
                    if ($i < count($dataProvider->getmodels()) - 1)
                    {
                        $s.= " " . $model->operation . " ";
                    }
                }


                $connection = Yii::$app->getDb();
                  $s.=' AND enseigne_has_customer.enseigne_id = '.Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
                $model->requete = $s;
                $model->statut = 'Active';
                $model->save();
            

            return $this->redirect(['index']);
            
        }
        else
        {

            if ($model->operation == null and FilterhasCriteres::find()->where(['filter_id' => $model->filter_id])->count() ==1 )
            {
                $s = "from  `";
                
                if( $dataProvider->getmodels() [0]['operateurHasCriteres']['critere']['table_name']=='enseigne_has_customer')
                {
                  $s = $s .'customer';
                }
                else
                {
                  $s = $s . $dataProvider->getmodels() [0]['operateurHasCriteres']['critere']['table_name'];
                }

                if($model->point_de_vente_id==null)
                {

                $s = $s . "` INNER JOIN `enseigne_has_customer` ON customer.customer_id=enseigne_has_customer.customer_id where `" . $dataProvider->getmodels() [0]['operateurHasCriteres']['critere']['column_name'] . "`";
                
                }
                else
                {
                  $s = $s."` INNER JOIN `enseigne_has_customer` ON customer.customer_id=enseigne_has_customer.customer_id INNER JOIN  `consomation` ON enseigne_has_customer.enseigne_has_customer_id=consomation.enseigne_has_customer_id where `" .$dataProvider->getmodels() [0]['operateurHasCriteres']['critere']['column_name'] . "`";
                }
                        switch ($dataProvider->getmodels() [0]['operateurHasCriteres']['operateur']['libellé']) {
    case 'contains':
        $s = $s."like '%" . $dataProvider->getmodels() [0]['selected_value'] . "%' ";
        break;
    case 'startswith':
          $s = $s."like '" . $dataProvider->getmodels() [0]['selected_value'] . "%' ";
        break;
    case 'endswith':
        $s = $s."like '%" . $dataProvider->getmodels() [0]['selected_value'] . "' ";
        break;
     case 'doesnotcontains':
        $s = $s."not like '%" . $dataProvider->getmodels() [0]['selected_value'] . "%' ";
        break;

 default:
       $s = $s . $dataProvider->getmodels() [0]['operateurHasCriteres']['operateur']['mapping'] . " '" . $dataProvider->getmodels() [0]['selected_value'] . "' ";
       break;
               
                     
                }
                 if($model->point_de_vente_id==null)
                {
                $s.=' AND enseigne_has_customer.enseigne_id = '.Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
                }
                else
                {
                  $s.=' AND enseigne_has_customer.enseigne_id = '.Yii::$app->user->identity->enseigneEnseigne->enseigne_id.' AND consomation.point_de_vente_id ='.$model->point_de_vente_id;

                }
                $model->requete = $s;
                $connection = Yii::$app->getDb();
                $model->requete = $s;
                $model->statut = 'Active';
                $model->save();
               return $this->redirect(['index']);
            }
            else
            {

            return $this->render('activate', ['model' => $model, 'dataProvider' => $dataProvider, ]);
        }
        }
    }
}
else
    {
        return $this->redirect(['site/forbidden']);
    }
}
    /**
     * Deletes an existing Filter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
   

  public function actionDelete($filter_id, $operateur_has_criteres_id)
    {if (Yii::$app->user->identity->userPermissions->gestion_ciblages)   
        {
       FilterhasCriteres::findOne(['filter_id' => $filter_id, 'operateur_has_criteres_id' => $operateur_has_criteres_id])->delete();
        $model = $this->findModel($filter_id);
        $model->statut='Inactive';
        $model->operation=null;
        $model->requete=null;
        $model->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
    else
    {
        return $this->redirect(['site/forbidden']);
    }
    }
    /**
     * Finds the Filter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Filter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Filter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
