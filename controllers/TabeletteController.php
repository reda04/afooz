<?php
namespace app\controllers;

use Yii;
use app\models\Enseigne;
use app\models\Enseignesearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\User;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use app\models\EnseigneHasCustomer;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use app\models\Pointdevente;

use app\models\Customer;
use app\models\Consomation;

use app\models\userPermissions;


class TabeletteController extends Controller
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
     * Displays a single Enseigne model.
     * @param integer $id
     * @return mixed
     */
  
 public function actionConnexion($id)
    {
      $request = Yii::$app->request;
       $this->layout = false;

  


  if (Yii::$app->user->identity->userPermissions->ipad  )
   {

    $pointdevente = Pointdevente::find()->where(['point_de_vente_id'=>$id])->andwhere(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one();
    
    $user = User::find()->where(['id'=>Yii::$app->user->identity->id])->andwhere(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one();

    if($pointdevente)
    {

       if($user)
      {
        $con_type=1;
          


            if(Yii::$app->user->identity->enseigneEnseigne->ipad_pin_reward != null)
            {
              $con_type='ipad';
            }
            else
            {
              $con_type='password';
            }

        return $this->renderPartial('connexion', [
                'pointdevente' => $pointdevente,
                'user' => $user,
                'con_type'=> $con_type,
            ]);
      
      }
      else
      {
           return $this->redirect(['site/forbidden']);
      }
    }
    else
    {

   return $this->redirect(['site/forbidden']);
    }

    

  }
  else
  {

    return $this->redirect(['site/forbidden']);
  }


  }



   public function actionInscription()
    {
      $this->layout = false;
      
       $pointdevente = Yii::$app->session->get('user.tabelette.pointdevente');
                    
       $customer = new Customer();   //inscription d'un nouveau client / // insertion du client dans enseigne_has_customer , // inscription du client dans consomation 
      if($pointdevente)
      {
       
           $pointdevente = Pointdevente::find()->where(['point_de_vente_id'=>$pointdevente])->andwhere(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one();
        
        //print_r($pointdevente);
          // print_r($pointdevente);

        // $this->layout='LoginLayout';
      return $this->render('inscription',[
            'model' => $customer,
        ]);
         
        }
        else
        {
            return $this->redirect(['site/forbidden']);
         }
}
public function actionLogin()
    {
      $this->layout = false;
$customer = new Customer();
$consomation = new Consomation(); 

if ($customer->load(Yii::$app->request->post()))
  {
              $user = Customer::find()->where(['code' => $customer->code])->one();
                    if ($user)
                      {
                                  $ens_has_cust = EnseigneHasCustomer::find()->where(['customer_id' => $user->customer_id])->andwhere(['enseigne_id' => Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one();
                                                        if ($ens_has_cust)
                                                          {
                                                                                      if (Yii::$app->user->identity->enseigneEnseigne->passage_or_amount == "passage")
                                                                                        {
                                                                                              $conso = new Consomation();
                                                                                              $conso->points_avant = $ens_has_cust->number_points_sum;
                                                                                              $conso->enseigne_has_customer_id = $ens_has_cust->enseigne_has_customer_id;
                                                                                              $conso->enseigne_id = $ens_has_cust->enseigne_id;
                                                                                              $conso->type_operation = 'credit';
                                                                                              $conso->points = Yii::$app->user->identity->enseigneEnseigne->pts_per_passage;
                                                                                              $conso->point_de_vente_id = Yii::$app->session->get('user.tabelette.pointdevente');
                                                                                              $conso->user_id = Yii::$app->user->identity->id;
                                                                                                      if ($conso->save())
                                                                                                        {
                                                                                                                  $ens_has_cust->number_points_sum = $conso->points_avant + $conso->points;
                                                                                                                  $ens_has_cust->save();
                                                                                                                  return $this->redirect(['pointdevente/index']);
                                                                                                        }
                                                                                        }
                                                                                        else
                                                                                        {

                                                                                          $amount = Yii::$app->request->post('Consomation')['montant_depense'];

                                                                                          $conso = new Consomation();
                                                                                        
                                                                                              $conso->points_avant = $ens_has_cust->number_points_sum;
                                                                                              $conso->enseigne_has_customer_id = $ens_has_cust->enseigne_has_customer_id;
                                                                                              $conso->enseigne_id = $ens_has_cust->enseigne_id;
                                                                                              $conso->type_operation = 'credit';
                                                                                              $conso->points = round($amount * Yii::$app->user->identity->enseigneEnseigne->pts_per_dirham/Yii::$app->user->identity->enseigneEnseigne->number_dirhams);
                                                                                              $conso->point_de_vente_id = Yii::$app->session->get('user.tabelette.pointdevente');
                                                                                              $conso->user_id = Yii::$app->user->identity->id;
                                                                                             $conso->montant_depense = $amount;
                                                                                                      if ($conso->save())
                                                                                                        {
                                                                                                                  $ens_has_cust->number_points_sum = $conso->points_avant + $conso->points;
                                                                                                                   $ens_has_cust->montant_total+= $conso->montant_depense;

                                                                                                                  $ens_has_cust->save();
                                                                                                                  return $this->redirect(['pointdevente/index']);
                                                                                                        }





                                                                                        }
                                                          }
                                                        else
                                                        {
                                                                                    if (Yii::$app->user->identity->enseigneEnseigne->passage_or_amount == "passage")
                                                                                      {
                                                                                            /*liaison customer*/
                                                                                           $ens_customer = new EnseigneHasCustomer();
                                                                                            $ens_customer->enseigne_id = Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
                                                                                            $ens_customer->customer_id = $user->customer_id;
                                                                                            $ens_customer->number_points_sum = 0;
                                                                                            $ens_customer->save();
                                                                                            $conso = new Consomation();
                                                                                            $conso->enseigne_has_customer_id = $ens_customer->enseigne_has_customer_id;
                                                                                            $conso->enseigne_id = Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
                                                                                            $conso->point_de_vente_id = Yii::$app->session->get('user.tabelette.pointdevente');
                                                                                            $conso->type_operation = 'inscription';
                                                                                            $conso->points = Yii::$app->user->identity->enseigneEnseigne->pts_register;
                                                                                            $conso->points_avant = $ens_customer->number_points_sum;
                                                                                            $conso->user_id = Yii::$app->user->identity->id;
                                                                                            $conso->save();
                                                                                            $ens_customer->number_points_sum+= $conso->points;
                                                                                            $ens_customer->save();

                                                                                            sleep(1);
                                                                                           $conso = new Consomation();
                                                                                            $conso->enseigne_has_customer_id = $ens_customer->enseigne_has_customer_id;
                                                                                            $conso->enseigne_id = Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
                                                                                            $conso->point_de_vente_id = Yii::$app->session->get('user.tabelette.pointdevente');
                                                                                            $conso->type_operation = 'credit';
                                                                                            $conso->points = Yii::$app->user->identity->enseigneEnseigne->pts_per_passage;
                                                                                            $conso->points_avant = $ens_customer->number_points_sum;
                                                                                            $conso->user_id = Yii::$app->user->identity->id;
                                                                                            $conso->save();
                                                                                            $ens_customer->number_points_sum+= $conso->points;
                                                                                            $ens_customer->save();
                                                                                           
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          $amount = Yii::$app->request->post('Consomation')['montant_depense'];

                                                                                       

                                                                                         $ens_customer = new EnseigneHasCustomer();
                                                                                            $ens_customer->enseigne_id = Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
                                                                                            $ens_customer->customer_id = $user->customer_id;
                                                                                          
                                                                                              $ens_customer->number_points_sum =  Yii::$app->user->identity->enseigneEnseigne->pts_register;
                                                                                            $ens_customer->montant_total = 0 ;
                                                                                            $ens_customer->save();
                                                                                            $conso = new Consomation();
                                                                                            $conso->enseigne_has_customer_id = $ens_customer->enseigne_has_customer_id;
                                                                                            $conso->enseigne_id = Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
                                                                                            $conso->point_de_vente_id = Yii::$app->session->get('user.tabelette.pointdevente');
                                                                                            $conso->type_operation = 'inscription';
                                                                                            $conso->points =Yii::$app->user->identity->enseigneEnseigne->pts_register ;
                                                                                            $conso->points_avant = 0;
                                                                                            $conso->user_id = Yii::$app->user->identity->id;
                                                                                            $conso->montant_depense = 0;
                                                                                            if($conso->save())
                                                                                            {

                                                                                          
                                                                                          
                                                                                             sleep(1);
                                                                                               $conso_2 = new Consomation();
                                                                                        
                                                                                              $conso_2->points_avant = $ens_customer->number_points_sum;
                                                                                              $conso_2->enseigne_has_customer_id = $ens_customer->enseigne_has_customer_id;
                                                                                              $conso_2->enseigne_id = $ens_customer->enseigne_id;
                                                                                              $conso_2->type_operation = 'credit';
                                                                                              $conso_2->points = round($amount * Yii::$app->user->identity->enseigneEnseigne->pts_per_dirham/Yii::$app->user->identity->enseigneEnseigne->number_dirhams);
                                                                                              $conso_2->point_de_vente_id = Yii::$app->session->get('user.tabelette.pointdevente');
                                                                                              $conso_2->user_id = Yii::$app->user->identity->id;
                                                                                             $conso_2->montant_depense = $amount;
                                                                                                      if ($conso_2->save())
                                                                                                        {
                                                                                                                  $ens_customer->number_points_sum = $conso_2->points_avant + $conso_2->points;
                                                                                                                   $ens_customer->montant_total+= $conso_2->montant_depense;

                                                                                                                  $ens_customer->save();
                                                                                                                  return $this->redirect(['pointdevente/index']);
                                                                                                        }

                                                                                                            }

                                                                                      }




                                                    // return $this->redirect(['pointdevente/index']);
                                                        }
                       }
                      else
                      {


                     $customer->load(Yii::$app->request->post());

                     print_r($customer->code);
                      

                          print_r($consomation);
                      return $this->render('login', ['model' => $customer ,'conso' => $consomation]);
                      }
  }
  else
  {

//$this->layout='LoginLayout';

return $this->render('login', ['model' => $customer ,  'conso' => $consomation]);
}


       
}
     
 

  



 public function actionAcceuil($id)
    {
      
       
  if(Yii::$app->request->isPost)
  {
   if(Yii::$app->request->post()['ipad']==Yii::$app->user->identity->enseigneEnseigne->ipad_pin )
  {
       $pointdevente = Pointdevente::find()->where(['point_de_vente_id'=>$id])->andwhere(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one();
    
      // print_r($pointdevente);
      Yii::$app->session->set('user.tabelette.pointdevente',$pointdevente['point_de_vente_id']);
      $this->layout='LoginLayout';
      return $this->render('acceuil');
    }
    else
    {
        return $this->redirect(['site/forbidden']);
     }
}
 else
  {
    return $this->redirect(['site/forbidden']);
  }
  }
 

  
}
