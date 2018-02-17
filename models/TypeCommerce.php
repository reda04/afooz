<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_commerce".
 *
 * @property integer $ID
 * @property string $Nom
 *
 * @property Enseigne[] $enseignes
 */
class TypeCommerce extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_commerce';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nom'], 'required'],
            [['Nom'], 'string', 'max' => 70],
            [['Nom'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Nom' => 'Nom',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseignes()
    {
        return $this->hasMany(Enseigne::className(), ['Type_commerce_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return TypeCommerceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TypeCommerceQuery(get_called_class());
    }
}
