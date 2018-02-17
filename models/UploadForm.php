<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false],
        ];
    }
    
    public function upload($x)
    {\Yii::$app->params['uploadPath'] = \Yii::$app->basePath . '/web/AFOZ-LOGOS-UPLOADS/';
        if ($this->validate())
         {
             $randomString = \Yii::$app->getSecurity()->generateRandomString(10);
              $path = \Yii::$app->params['uploadPath'] .$x.'_'.$randomString. '.' . 'png';
            $f=\Yii::getAlias('@web').'/AFOZ-LOGOS-UPLOADS/'.$x. '_'.$randomString.'.'. 'png';
            $this->imageFile->saveAs($path);
            return $f;
        } else {
            return null;
        }
    }
}