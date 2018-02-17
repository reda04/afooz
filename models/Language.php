<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $language_id
 * @property string $name
 * @property date $last_update
 *
 * @property Enseigne[] $enseignes
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['last_update'], 'safe'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'language_id' => 'Language ID',
            'name' => 'Name',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseignes()
    {
        return $this->hasMany(Enseigne::className(), ['language_id' => 'language_id']);
    }
}
