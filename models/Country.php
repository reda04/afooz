<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property integer $code
 * @property string $alpha2
 * @property string $alpha3
 * @property string $nom_en_gb
 * @property string $nom_fr_fr
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'alpha2', 'alpha3', 'nom_en_gb', 'nom_fr_fr'], 'required'],
            [['code'], 'integer'],
            [['alpha2'], 'string', 'max' => 2],
            [['alpha3'], 'string', 'max' => 3],
            [['nom_en_gb', 'nom_fr_fr'], 'string', 'max' => 45],
            [['alpha2'], 'unique'],
            [['alpha3'], 'unique'],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'alpha2' => 'Alpha2',
            'alpha3' => 'Alpha3',
            'nom_en_gb' => 'Nom En Gb',
            'nom_fr_fr' => 'Nom Fr Fr',
        ];
    }
}
