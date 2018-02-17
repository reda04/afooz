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
use app\models\UserPermissions;
use app\models\Consomation;
use yii\helpers\Url;
/**
 * EnseigneController implements the CRUD actions for Enseigne model.
 */
class EnseigneController extends Controller
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

          if (Yii::$app->user->identity->userPermissions->enseigne_crud)
                        {
        $searchModel = new Enseignesearch();
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
     public function actionReturn()
    {
          if (!Yii::$app->user->identity->userPermissions->enseigne_crud)
                 {
                    $originalId = Yii::$app->session->get('user.idbeforeswitch');
                    if (   $originalId) {
                         $user = User::findOne($originalId);
    $duration = 0;
    Yii::$app->user->switchIdentity($user, $duration);
    Yii::$app->session->remove('user.idbeforeswitch');
    return $this->redirect(['enseigne/index']);
}
       
    }
}
  
    public function actionChangesession($id)
    {
  if (Yii::$app->user->identity->userPermissions->enseigne_crud)
                        {
         $initialId = Yii::$app->user->getId(); //here is the current ID, so you can go back after that.
if ($id == $initialId) {
    //Same user!
} else {
    $user = User::findOne($id);
    $duration = 0;
    Yii::$app->user->switchIdentity($user, $duration); //Change the current user.
    Yii::$app->session->set('user.idbeforeswitch',$initialId); //Save in the session the id of your admin user.
    return $this->redirect(['site/index']); //redirect to any page you like.
}
    }
}

    
    

    /**
     * Displays a single Enseigne model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),

        ]);
    }
   public function actionDesc()
    {
          if (Yii::$app->user->identity->userPermissions->description_enseigne)
                        {
        $model =   $this->findModel(Yii::$app->user->identity->enseigneEnseigne->enseigne_id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->enseigne_id]);
        } else {
            return $this->render('desc', [
                'model' => $model,]);
        }
    }
    else
    {
        
        return $this->redirect(['site/forbidden']);
    }
       
    }
    public function actionLogo()
    {
        if (Yii::$app->user->identity->userPermissions->modification_logo)
                        {
        $model =   $this->findModel(Yii::$app->user->identity->enseigneEnseigne);
         $logo = new UploadForm();
        if ($logo->load(Yii::$app->request->post())) {
            $logo->imageFile = UploadedFile::getInstance($logo, 'imageFile');
            

            $x = $logo->upload($model->enseigne_id);
            $model->logo = $x;
        
          if( $model->save())
          {
               return $this->render('logo', ['logo' => $logo, ]);
           }
           else
           {
                print_r($model->getFirstErrors());
           }
                // file is uploaded successfully
          
            
            
        }

       return $this->render('logo', [
                'logo' => $logo,
              
            ]);
   }
   else
    {
       return $this->redirect(['site/forbidden']);
    }

    }
 public function actionFidelisation()
    {

        if (Yii::$app->user->identity->userPermissions->fidelisation)
                        {
        $model =   $this->findModel(Yii::$app->user->identity->enseigneEnseigne->enseigne_id);

        if ($model->load(Yii::$app->request->post())) {
          
        if($model->passage_or_amount=='passage' )
          
            {
                $model->number_dirhams=null;
                $model->pts_per_dirham=null;
            }
          
          else
          
           {  $model->pts_per_passage=null;}
        

          if( $model->save())
          {

    return $this->render('fidelisation', [
                'model' => $model,
              
            ]);
           }
             // file is uploaded successfully
          
            
            
        }

       return $this->render('fidelisation', [
                'model' => $model,
              
            ]);
        }
   else
    {
        return $this->redirect(['site/forbidden']);
    }
    }
    public function actionOffre()
    {

 if (Yii::$app->user->identity->userPermissions->offres_de_fidelite)
                        {


        $model =   $this->findModel(Yii::$app->user->identity->enseigneEnseigne);
        if ($model->load(Yii::$app->request->post())) {
          
          if( $model->save())
          {
    return $this->render('offre', [
                'model' => $model,
              
            ]);
           }
             // file is uploaded successfully
          
            
            
        }

       return $this->render('offre', [
                'model' => $model,
              
            ]);
   }
   else
    {
        return $this->redirect(['site/forbidden']);
    }
    }


    /**
     * Creates a new Enseiegne model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate()
    {
         if (Yii::$app->user->identity->userPermissions->enseigne_crud)
         {
               $model = new Enseigne();
               $user =  new User();
                $pointdevente = new Pointdevente();

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post()) && $pointdevente->load(Yii::$app->request->post())) {
             $user->password=Yii::$app->security->generateRandomString(9);
             $model->publication='non';
             $user->role_id=2;
             $user->setPassword($user->password);
             $user->generateAuthKey();
             $user->status=1;
    $model->description='Description de l\'enseigne';
    $model->average_purchase_value=0;
             if($model->validate() && $user->validate())
            {
                 
             $model->save();
             $user->enseigne_enseigne_id= $model->enseigne_id;
      
             $pointdevente->enseigne_enseigne_id= $model->enseigne_id;
             
             $pointdevente->save();
             $user->save();

             $permissions = new UserPermissions();
             $permissions->user_id= $user->id;

             $permissions->pointsdeventes = serialize(pointdevente::find()->select(['point_de_vente_id','nom'])->where(['point_de_vente_id'=> $pointdevente->point_de_vente_id])->asArray()->all());
             $permissions->save();
             
             }
             else
             {
                print_r($model->getErrors ());
                return $this->render('create', [
                'model' => $model,
                'user' => $user,
                'point'=> $pointdevente,
            ]);
             }
              $user = user::getadminenseigne($model->enseigne_id);
             //$url=Url::to(['site/setpassword','id'  => $model->enseigne_id , 'auth_key'=>$user->auth_key]);
             $url='<div style="background-color:#f2f3f5;padding:20px">
            <div style="max-width:600px;margin:0 auto">
                <div style="background:#fff;font:14px sans-serif;color:#686f7a;border-top:4px solid #428BCA;margin-bottom:20px">
                    
                        <div style="border-bottom:1px solid #f2f3f5;padding:20px 30px">
                            
                                <img id="m_-9168164051112753470m_-7380215566446000689m_2278659066782560706logo" style="max-width:99px;display:block" src= "http://afooz.thewebcompany.ma/images/logo-primary.png" alt="Afooz" class="CToWUd" width="150">
                            
                        </div>
                    
                    
                        
                        <div style="padding:20px 30px">
                            <div style="font-size:16px;line-height:1.5em;border-bottom:1px solid #f2f3f5;padding-bottom:10px;margin-bottom:20px">
                                
                                    <p><a style="text-decoration:none;color:#000">
                                        
                                            
                                                Bonjour '.$user->last_name.' '.$user->first_name.' ,
                                            
                                        
                                    </a></p>
                                
                                
                                    
                                <p><a style="text-decoration:none;color:#000">Une réinitialisation du mot de passe de votre compte a été demandée.</a></p>
                                    
                                <p><a style="text-decoration:none;color:#000">Cliquez sur le bouton ci-dessous pour modifier votre mot de passe.</a></p>
                                    
                                
                                
                                    
                                        <a href="'.Url::toRoute(["site/setpassword","id"  => $model->enseigne_id , "auth_key"=>$user->auth_key],'http').'" style="font-size:16px;color:#ffffff;text-decoration:none;border-radius:2px;background-color:#428BCA;border-top:12px solid #428BCA;border-bottom:12px solid #428BCA;border-right:18px solid #428BCA;border-left:18px solid #428BCA;display:inline-block" target="_blank" >
                                           Changer votre mot de passe
                                        </a>
                                    
                                
                            </div>
                        </div>
                    
                    
                        
                    
                </div>
              
            </div>
        </div>';
        //->setTo($user->email)
           /*  Yii::$app->mailer->compose()
    ->setFrom('afooz@thewebcompany.ma')
    ->setTo($user->email)
    ->setSubject('Message subject')
    ->setTextBody('This is my test a ')
    ->setHtmlBody($url)
    ->send();*/
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'user' => $user,
                'point' => $pointdevente,
            ]);
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
    public function actionUpdate($id)
    {//$uc = new UserController();
        if (Yii::$app->user->identity->userPermissions->enseigne_crud)
         {
        $model = $this->findModel($id);
        $user = user::getadminenseigne($id);
       $pointdevente= Pointdevente::find()->where(['enseigne_enseigne_id'=>$id])->one();

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post()) && $pointdevente->load(Yii::$app->request->post()) ) {
           $user->setPassword($user->password);
             if($model->save() and $user->save() )
         {
             $pointdevente->save();
                 Yii::$app->session->setFlash('success', "Le critère a bien été ajouté au filtre " );
               return $this->redirect(['index']);
           
        }
        else
        {
           print_r( $model->geterrors());
            return $this->render('update', [
                'model' => $model,
                'user' => $user,
                'point' => $pointdevente
            ]);
        }
    }
         else {
            $model->haserrors();
            return $this->render('update', [
                'model' => $model,
                'user' => $user,
                'point' => $pointdevente
            ]);
        }
    }

else
{
    return $this->redirect(['site/forbidden']);
}
}
  public function actionDashboard()
  {
        if (Yii::$app->user->identity->userPermissions->dashboard)
                        {
                                 $query = Consomation::find()->where(['enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->andWhere(['or',['type_operation'=>'credit'],['type_operation'=>'inscription']]);
                                 $query2 = Consomation::find()->where(['enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->andwhere(['type_operation'=>'debit']);
                                 $totaux = new ActiveDataProvider([
                                'query' => $query->limit(20),
                                'sort' => [
        'defaultOrder' => [
            'date_conso' => SORT_DESC,
            
        ]
    ],
                                 ]);
                                 $recompenses = new ActiveDataProvider([
                                'query' => $query2->limit(10),
                                 ]);
                                 $nouveaux =  EnseigneHasCustomer::find()->where(['enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id]);
         //$connus =  EnseigneHasCustomer::find()->select('enseigne_has_customer_id')->where(['enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->having('COUNT(*) > 1');
           $connection = Yii::$app->getDb();
                     $command = $connection->createCommand(' SELECT COUNT(*) from ( SELECT * FROM consomation c where c.enseigne_id='.Yii::$app->user->identity->enseigneEnseigne->enseigne_id.' and c.type_operation="credit" GROUP BY c.enseigne_has_customer_id HAVING COUNT(*) > 1 ) num ');
                     $connus = $command->queryScalar();
         return $this->render('dashboard',['passage' => $query ,'totaux'=> $totaux, 'nouveaux' => $nouveaux ,'connus'=> $connus,'recompenses'=> $recompenses]);
    }
    else
    {
        return $this->redirect(['site/forbidden']);
    }
}
    /**
     * Deletes an existing Enseigne model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
         if (Yii::$app->user->identity->userPermissions->enseigne_crud)
         {


            return $this->redirect(['index']);
          }
    else
    {
        return $this->redirect(['site/forbidden']);
    }
    }

public function actionSlide()
    {  if (Yii::$app->user->identity->userPermissions->slides)
                        {
        $model =   $this->findModel(Yii::$app->user->identity->enseigneEnseigne);
         $logo = new UploadForm();
        if ($logo->load(Yii::$app->request->post())) {
            $logo->imageFile = UploadedFile::getInstance($logo, 'imageFile');
            

            $x = $logo->upload($model->enseigne_id);
            $model->logo = $x;
        
           $model->save();
        
           
                // file is uploaded successfully
          
            
            
        }

       return $this->render('Slide', [
                'logo' => $logo,
              
            ]);
   }
   else
    {
        return $this->redirect(['site/forbidden']);
    }
    }


    /**
     * Finds the Enseigne model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Enseigne the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Enseigne::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
