
    <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */


 
//API Url

$url = 'localhost/basic/web/customer/jsoninscription';
 
//Initiate cURL.
$ch = curl_init($url);
 
//The JSON data.
$jsonData =array('email' => 'bergimedamine@gmail.com','password' => 'testtest','password' => 'testtest')
; 
//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
 
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
 
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
 
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

//Execute the request
//$result = curl_exec($ch);
echo $jsonDataEncoded;
 ?>

