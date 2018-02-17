<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class MultiUploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'maxFiles' => 3,]
        ];
    }
 
    public function upload($path,$file)
    {
        

          
            $file->saveAs($path);
              
        
        return true;   
    }
}