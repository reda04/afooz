<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $customer_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property integer $active
 * @property string $create_date
 * @property string $last_update
 * @property string $gender
 * @property string $birthday
 * @property integer $optin_email
 * @property string $phone
 * @property integer $optin_sms
 * @property string $comment
 * @property integer $country_id
 * @property string $city
 * @property string $adress
 *
 * @property Country $country
 * @property EnseigneHasCustomer[] $enseigneHasCustomers
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name','email','gender','phone','birthday','password'], 'required'],

            [['active', 'optin_email', 'optin_sms', 'country_id'], 'integer'],
            [['create_date', 'last_update'], 'safe'],
            [['gender'], 'string'],
            [['first_name', 'last_name', 'phone', 'comment', 'city','password'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 50],
            [['code'], 'string', 'max' => 200],
         
            [['adress'], 'string', 'max' => 145],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
       
            'first_name' => 'Prénom',
            'last_name' => 'Nom',
            'email' => 'Email',
            'active' => 'Activer le client ',
            'create_date' => 'Create Date',
            'last_update' => 'Last Update',
            'gender' => 'Sexe',
            'birthday' => 'Date de Naissance',
            'optin_email' => 'Reception d\' offres  par e-mail',
            'phone' => 'Téléphone',
            'optin_sms' => 'Reception d\' offres  par SMS ',
            'comment' => 'Comment',
            'country_id' => 'Pays',
            'city' => 'Ville',
               'code' => 'code',

            'adress' => 'Adresse',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigneHasCustomers()
    {
        return $this->hasMany(EnseigneHasCustomer::className(), ['customer_id' => 'customer_id']);
    }
 public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
     public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    /**
     * @inheritdoc
     * @return CustomerQuery the active query used by this AR class.
     */
     public function getCountries()
    {          $country = Country::find()->all();
        return $country;
    }
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
}
