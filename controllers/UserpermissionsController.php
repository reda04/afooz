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

use app\models\userPermissions;


class UserpermissionsController extends Controller
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
     * Lists all Enseigne models.
     * @return mixed
     */
    public function actionIndex()
    {


            $dataprovider = new ActiveDataProvider([
    'query' => userPermissions::find()->joinwith('user')->where(['role_id'=>3])->andwhere(['enseigne_enseigne_id'=> Yii::$app->user->identity->enseigneEnseigne->enseigne_id]),
    'pagination' => [
        'pageSize' => 20,
    ],
]);

// get the posts in the current page
           return $this->render('index', [
    
      'dataprovider' => $dataprovider,
    ]) ;
    }
    

    /**
     * Displays a single Enseigne model.
     * @param integer $id
     * @return mixed
     */
   
    public function actionDeactivate($id)
    {
        if(Yii::$app->user->identity->userPermissions->gestion_des_droits )
        {
          $utilisateur= user::find()->where(['id'=>$id])->andwhere(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one();
          if($utilisateur)
          {
            if($utilisateur->status)
            {

                $utilisateur->status=0;
                $utilisateur->save();
                return $this->redirect(['userpermissions/index']);
            }
            else
            {
                return $this->redirect(['userpermissions/index']);
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
     public function actionActivate($id)
    {
        if(Yii::$app->user->identity->userPermissions->gestion_des_droits )
        {
          $utilisateur= user::find()->where(['id'=>$id])->andwhere(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one();
          if($utilisateur)
          {
            if(!$utilisateur->status)
            {

                $utilisateur->status=1;
                $utilisateur->save();
                return $this->redirect(['userpermissions/index']);
            }
            else
            {
                return $this->redirect(['userpermissions/index']);
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
 public function actionAdd()
                {
                     if(Yii::$app->user->identity->userPermissions->gestion_des_droits)
        {
                $per_vente = new userPermissions();
                $permissions = new userPermissions();
                //$permissions->gestion_des_droits=0;



                $user = new User();
                if ($per_vente->load(Yii::$app->request->post())&&$permissions->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post()))
                    {
                  
                    $user->role_id = 3;
                   
                    $user->setPassword($user->password);
                    $user->generateAuthKey();
                    $user->status = 1;
                    $user->enseigne_enseigne_id = Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
                    if ($user->validate())
                        {
                       
                                     if($user->save())
                       {
                        $permissions->user_id = $user->id;
                        $permissions->pointsdeventes = serialize(Pointdevente::find()->select(['point_de_vente_id','nom'])->where(['point_de_vente_id'=>$per_vente->pointsdeventes])->asArray()->all());
                     
                        
                        

                        if ($permissions->save())
                            {
                            return $this->redirect(['index']);
                            }
                          else
                            {
                            return $this->render('add', ['model' => $user, 'permission' => $permissions, 'per_vente' => $per_vente, ]);
                            }
                       }

                       }
                       else
                       {

                        print_r($user->geterrors());
                       return $this->render('add', ['model' => $user, 'permission' => $permissions, 'per_vente' => $per_vente, ]);

                       }
                        

                    }
                  else
                    {
                      
                      $permissions->base_clients=1;
$permissions->gestion_ciblages=1;
$permissions->envoi_emails=1;
$permissions->envoi_sms=1;
$permissions->envoi_notifications_pushs=1;
$permissions->messages_automatiques=1;
$permissions->statistiques=1;
$permissions->description_enseigne=0;
$permissions->gestion_des_droits=0;
$permissions->modification_logo=1;
$permissions->slides=1;
$permissions->offres_de_fidelite=0;
$permissions->parrainage=0;
$permissions->fidelisation=0;
$permissions->ipad=0;
$permissions->dashboard=1;
$permissions->enseigne_crud=0;
$permissions->type_commerce=0;
$permissions->criteres_crud=0;
$permissions->declencheurs=1;
                   
                    return $this->render('add', ['model' => $user, 'permission' => $permissions, 'per_vente' => $per_vente, ]);
                    }
                    }
                    else
                    {
                        return $this->redirect(['site/forbidden']);
                    }
                }

    /**
     * Updates an existing Enseigne model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
     public function actionAccountdetails($id)
    {
       $this->layout = false;
        if(Yii::$app->user->identity->userPermissions->gestion_des_droits )
        {

          $utilisateur= user::find()->where(['id'=>$id])->andwhere(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one();
          if($utilisateur)
          {
            
                
                return $this->render('accountdetails', [
                'model' => $utilisateur,
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
    public function actionUpdate($id)
    {  
      if(Yii::$app->user->identity->userPermissions->gestion_des_droits)
        {
                $utilisateur= user::find()->where(['id'=>$id])->andwhere(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one();
          $per_vente =  userPermissions::find()->where(['user_id'=>$id])->one();
          $permissions = userPermissions::find()->where(['user_id'=>$id])->one();

            if ($per_vente->load(Yii::$app->request->post())&&$permissions->load(Yii::$app->request->post()) && $utilisateur->load(Yii::$app->request->post()))
                    {

         
                       
                                     if($utilisateur->save())
                       {
                        $permissions->user_id = $utilisateur->id;
                        $permissions->pointsdeventes = serialize(Pointdevente::find()->select(['point_de_vente_id','nom'])->where(['point_de_vente_id'=>$per_vente->pointsdeventes])->asArray()->all());
                     
                        
                        

                        if ($permissions->save())
                            {
                            return $this->redirect(['index']);
                            }
                          else
                            {
                              return $this->render('update', ['model' => $utilisateur, 'permission' => $permissions, 'per_vente' => $per_vente ]);
                            }
                       }

                       }
                       else
                       {

                      
                       return $this->render('update', ['model' => $utilisateur, 'permission' => $permissions, 'per_vente' => $per_vente ]);

                       }
          //return $this->render('update', ['model' => $utilisateur, 'permission' => $permissions, 'per_vente' => $per_vente ]);
        }
         else
                    {
                        return $this->redirect(['site/forbidden']);
                    }


    }
     
}
