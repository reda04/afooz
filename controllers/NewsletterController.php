<?php

namespace app\controllers;

use Yii;
use app\models\Newsletter;
use app\models\Newslettersearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\filter;

/**
 * NewsletterController implements the CRUD actions for Newsletter model.
 */
class NewsletterController extends Controller
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
     * Lists all Newsletter models.
     * @return mixed
     */
    public function actionIndex()
    {
          if (Yii::$app->user->identity->userPermissions->envoi_emails)
                        {
        $searchModel = new Newslettersearch();
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
     * Displays a single Newsletter model.
     * @param integer $newsletter_id
     * @param integer $point_de_vente_id
     * @return mixed
     */
    

    /**
     * Creates a new Newsletter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
          if (Yii::$app->user->identity->userPermissions->envoi_emails)
                        {
        $model = new Newsletter();

        if(Yii::$app->user->identity->enseigneEnseigne->contact_email == null)
        {
        Yii::$app->session->setFlash('contact', "");
        
        }
        if ($model->load(Yii::$app->request->post()) ) {


            switch (\Yii::$app->request->post('submit')) {
                 case 'brouillon':
                $model->enseigne_id=\Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
                 $model->etat= 'Brouillon';
                 echo 'hhhhhhhhhhhhh';
                if( $model->save())
                {
                    print_r("jnjnkjnkjbkjbk");
                }
                else
                {
                    print_r($model->geterrors());
                }
                 break;

                 case 'save':
                     return   Yii::$app->mailer->compose()
    ->setFrom('bergimedamine@gmail.com')
    ->setTo(['bergimedamine@gmail.com','eljaouarihrida@gmail.com'])
    ->setSubject('AFOOZ')
    ->setTextBody('Ceci est un test  ')
    ->setHtmlBody('')
    ->send();
                 break;
   
   }


         //   return $this->redirect(['view', 'newsletter_id' => $model->newsletter_id, 'point_de_vente_id' => $model->point_de_vente_id]);
        } 
        else 
             {
                    if(Yii::$app->user->identity->role->role=='admin')
                     {

                       for($i=0 ;$i<count(Yii::$app->user->identity->enseigneEnseigne->pointDeVentes) ; $i++)
                        {
                          
                                  $point = Yii::$app->user->identity->enseigneEnseigne->pointDeVentes[$i]['point_de_vente_id'];
                             

                        }
              }

 $filtres = filter::find()->where(['statut'=>'active'])->asarray()->all();
            return $this->render('create', [
                'model' => $model,
                'filtres' => $filtres,
                'point' => $point,

         
            ]);
        }
    }
    else
    {
        return $this->redirect(['site/forbidden']);
    }

    }

    /**
     * Updates an existing Newsletter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $newsletter_id
     * @param integer $point_de_vente_id
     * @return mixed
     */
    public function actionUpdate($newsletter_id, $point_de_vente_id)
    {
          if (Yii::$app->user->identity->userPermissions->envoi_emails)
                        {
        $model = $this->findModel($newsletter_id, $point_de_vente_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'newsletter_id' => $model->newsletter_id, 'point_de_vente_id' => $model->point_de_vente_id]);
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
     * Deletes an existing Newsletter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $newsletter_id
     * @param integer $point_de_vente_id
     * @return mixed
     */
    public function actionDelete($newsletter_id, $point_de_vente_id)
    {
          if (Yii::$app->user->identity->userPermissions->envoi_emails)
           {
        $this->findModel($newsletter_id, $point_de_vente_id)->delete();

        return $this->redirect(['index']);
    }
    else
    {
        return $this->redirect(['site/forbidden']);
    }
    }

    /**
     * Finds the Newsletter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $newsletter_id
     * @param integer $point_de_vente_id
     * @return Newsletter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($newsletter_id, $point_de_vente_id)
    {
        if (($model = Newsletter::findOne(['newsletter_id' => $newsletter_id, 'point_de_vente_id' => $point_de_vente_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
