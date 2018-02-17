<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $city_id
 * @property string $city
 * @property string $last_update
 * @property integer $country_id
 *
 * @property Address[] $addresses
 */
class city extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'country_id'], 'required'],
            [['last_update'], 'safe'],
            [['country_id'], 'integer'],
            [['city'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'City ID',
            'city' => 'City',
            'last_update' => 'Last Update',
            'country_id' => 'Country ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['city_id' => 'city_id']);
    }
}
