<?php

/* @var $this yii\web\View */
use yii\helpers\url;
$this->title = 'AFOZ';
 if(Yii::$app->user->identity->role_id==2 || Yii::$app->user->identity->role_id==3 ) {
return Yii::$app->response->redirect(Url::to(['enseigne/dashboard']));

}
else
{
    return Yii::$app->response->redirect(Url::to(['enseigne/index']));

}
?>


