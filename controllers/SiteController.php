<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ResetPasswordForm;
use app\models\User;
use app\models\UserPermissions;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    
                ],
            ],

            
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
 
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
         $this->layout = 'LoginLayout';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/index']);
        }
        else
        {


        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) ) {
             if($model->validate())

            {
              $model->login();
            return $this->redirect(['index']);
            }
            else
            {
                 return $this->render('login', [
            'model' => $model,
        ]);
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
}
public function actionSetpassword($id,$auth_key)
    {

       $this->layout = 'LoginLayout';
        $login = new LoginForm();
        $model = new ResetPasswordForm();
       
        $user = User::getadminenseigne($id);
       if($user->auth_key == $auth_key)
       {
        $model->login=$user->username;
        $permissions = UserPermissions::find()->where(['user_id'=>$user->id])->one();
        if($permissions->resetpassword==0){
       if ($model->load(Yii::$app->request->post())) {

                
                if( $model->password1 == $model->password2)
                {
                    $user->password = $model->password1;
                 
                    $user->setPassword($user->password);
                 
                      $user->generateAuthKey();
                    
           
                      if($user->save())
                      {
    
                       $login->username = $user->username;
                            $login->password = $model->password1;
                            if($login->login())
                            {
                               
                                 
                                 $permissions->resetpassword=1;
                                 $permissions->save();
                                return $this->redirect(['index']);
                            }
                            else
                            {
                                return $this->render('resetpassword', [
                                            'model' => $model,
                                        ]);
                            }
                             
                      }
                      else {
                       print_r($user->geterrors());
                      }
                }
                else
                {
                    return $this->render('resetpassword', [
                                'model' => $model,
                            ]);
                }
            }
        else{
            
             return $this->render('resetpassword', [
            'model' => $model,
        ]);
           

        }
        }else{
            return $this->redirect(['login']);
        }
        }
        else
        {
            return $this->redirect(['login']);

        }
     

    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionForbidden()
    {
       

        return $this->render('forbidden');
    }
   

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
  

   
}
