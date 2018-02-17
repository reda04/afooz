<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ResetPasswordForm extends Model
{
    public $login;

    public $password1;
    public $password2;
       public function rules()
    {
        return [
            // username and password are both required
           // [['username', 'password'], 'required',],
        
        [['password1','password2'],'required'],
            // rememberMe must be a boolean value
          
        ];
    }

   

   
  

}