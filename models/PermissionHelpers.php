<?php
namespace app\models;
use Yii;

class PermissionHelpers {

    public static function requireRoot() {

        if(Yii::$app->user->identity->role->role=='root')
        {
            return true;
        }
        else return false;
    }
    public static function requireAdmin() {

        if(Yii::$app->user->identity->role->role== 'administarteur')
        {
            return true;
        }
        else return false;
    }

} 
