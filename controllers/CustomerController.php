<?php

namespace app\controllers;

use Yii;
use app\models\Customer;
use app\models\customersearch;
use app\models\EnseigneHasCustomer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Consomation;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
         if (Yii::$app->user->identity->userPermissions->base_clients )
         {
        $searchModel = new customersearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    else
    {
        return $this->redirect(['site/forbidden']);
    }

}

    /**
     * Displays a single Customer model.
     * @param integer $id
     * @return mixed
     */
  
    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         if (Yii::$app->user->identity->userPermissions->base_clients )
         {
        $model = new Customer();
        $affectation = new  EnseigneHasCustomer();

       
 if ($model->load(Yii::$app->request->post())  && $model->validate()) {
  $model->setPassword($model->password);

  $model->code = Yii::$app->security->generateRandomString().time();
           
             $model->save();
         

             $affectation->customer_id=$model->customer_id;
                $affectation->enseigne_id=Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
                $affectation->number_points_sum = Yii::$app->user->identity->enseigneEnseigne->pts_register;
                //$affetation->isNewRecord = true;
                if($affectation->save() )
                {



                    $conso = new Consomation();
             $conso->points_avant = 0;
             $conso->enseigne_has_customer_id= $affectation->enseigne_has_customer_id;
             $conso->enseigne_id= $affectation->enseigne_id;
             $conso->type_operation='inscription';
             $conso->points=Yii::$app->user->identity->enseigneEnseigne->pts_register;
             $conso->user_id = Yii::$app->user->identity->id;
              $conso->point_de_vente_id = 41;
             if($conso->save())
             {

             return $this->redirect('index');
        }
        else
        {
            print_r($conso->getErrors());
        }
             }
             else
             {
                print_r($affectation->geterrors());
             }
         }
          
     else {
            return $this->render('create', [
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
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         if (Yii::$app->user->identity->userPermissions->base_clients )
         {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post() ) ) {

              $model->setPassword($model->password);
              if($model->save())
              {
            return $this->redirect(['view', 'id' => $model->customer_id]);
       }
       else {
            print_r($model->geterrors());
        }
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
     * Deletes an existing Customer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
  

    /**
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
