<?php

namespace app\controllers;

use Yii;
use app\models\Slide;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MultiUploadForm;
use yii\web\UploadedFile;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class SlideController extends Controller
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
     * Lists all Slide models.
     * @return mixed
     */
    public function actionIndex()
    { 

        
       if (Yii::$app->user->identity->userPermissions->slides)
      { 
        $dataProvider = new ActiveDataProvider([
            'query' => Slide::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
        else
    {
        return $this->redirect(['site/forbidden']);
    }
    }

    /**
     * Displays a single Slide model.
     * @param integer $slide_id
     * @param integer $enseigne_enseigne_id
     * @return mixed
     */
    
   
  


//slide_39_1.png
    

public function actionSetposition()
    {

        $sortlist = $_POST['slide'];    


        for ($i = 0; $i < count($sortlist); $i++)
        {
         
            $photo=$this->findModel($sortlist[$i],yii::$app->user->identity->enseigne_enseigne_id);
            $photo->order=$i+1;
            $photo->save();
        }
       return true;
    }








    /**
     * Creates a new Slide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    if (Yii::$app->user->identity->userPermissions->slides)
      { 

      $model = new MultiUploadForm();
      $slide = new slide();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
         if($model->validate())
         {
            $x =0 ;
         $slide ->isNewRecord = true; 
         \Yii::$app->params['uploadPath'] = \Yii::$app->basePath . '/web/AFOZ-LOGOS-UPLOADS/Slides/';
         $slide->deleteall('enseigne_enseigne_id = :test' ,['test'=>\Yii::$app->user->identity->enseigneEnseigne->enseigne_id]);
            foreach ($model->imageFiles as $file) 
           {
              $x++;
          
            $slide->enseigne_enseigne_id= \Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
            $path = \Yii::$app->params['uploadPath'].'slide_'.\Yii::$app->user->identity->enseigneEnseigne->enseigne_id.'_'.$x.'.png';
            $f='slide_'.\Yii::$app->user->identity->enseigneEnseigne->enseigne_id.'_'.$x.'.png';
             $slide->filename=$f;
                $model->upload($path,$file);
            $slide->save();
              $slide->slide_id++;
           
           // $slide->refresh();
          
              $slide ->isNewRecord = true; 
                // file is uploaded successfully
           }
                 return $this->redirect('index');
            
        }

        }

        return $this->render('create', ['model' => $model]);
    }
      else
    {
        return $this->redirect(['site/forbidden']);
    }
    }

    /**
     * Updates an existing Slide model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $slide_id
     * @param integer $enseigne_enseigne_id
     * @return mixed
     */
    public function actionUpdate($slide_id, $enseigne_enseigne_id)
    {
        $model = $this->findModel($slide_id, $enseigne_enseigne_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'slide_id' => $model->slide_id, 'enseigne_enseigne_id' => $model->enseigne_enseigne_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Slide model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $slide_id
     * @param integer $enseigne_enseigne_id
     * @return mixed
     */
    public function actionDelete($slide_id, $enseigne_enseigne_id)
    {
         if (Yii::$app->user->identity->userPermissions->slides)
      { 
        $this->findModel($slide_id, $enseigne_enseigne_id)->delete();

        return $this->redirect(['index']);
    }

      else
    {
        return $this->redirect(['site/forbidden']);
    }
    }

    /**
     * Finds the Slide model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $slide_id
     * @param integer $enseigne_enseigne_id
     * @return Slide the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($slide_id, $enseigne_enseigne_id)
    {
        if (($model = Slide::findOne(['slide_id' => $slide_id, 'enseigne_enseigne_id' => $enseigne_enseigne_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
