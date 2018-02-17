<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enseigne_has_customer".
 *
 * @property integer $enseigne_id
 * @property integer $enseigne_has_customer_id
 * @property integer $customer_id
 * @property string $created_at
 * @property string $number_points_sum
 *
 * @property Consomation[] $consomations
 * @property Customer $customer
 * @property Enseigne $enseigne
 */
class EnseigneHasCustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enseigne_has_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enseigne_id', 'customer_id'], 'required'],
            [['enseigne_id', 'customer_id','number_points_sum'], 'integer'],
            [['created_at'], 'safe'],
          
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'customer_id']],
            [['enseigne_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enseigne::className(), 'targetAttribute' => ['enseigne_id' => 'enseigne_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enseigne_id' => 'Enseigne ID',
            'enseigne_has_customer_id' => 'Enseigne Has Customer ID',
            'customer_id' => 'Customer ID',
            'created_at' => 'Created At',
            'number_points_sum' => 'Number Points Sum',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsomations()
    {
        return $this->hasMany(Consomation::className(), ['enseigne_has_customer_id' => 'enseigne_has_customer_id', 'enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigne()
    {
        return $this->hasOne(Enseigne::className(), ['enseigne_id' => 'enseigne_id']);
    }

    /**
     * @inheritdoc
     * @return EnseigneHasCustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnseigneHasCustomerQuery(get_called_class());
    }
}
