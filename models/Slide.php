<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slide".
 *
 * @property integer $slide_id
 * @property string $filename
 * @property integer $enseigne_enseigne_id
 *
 * @property Enseigne $enseigneEnseigne
 */
class Slide extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slide';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enseigne_enseigne_id'], 'required'],
            [['enseigne_enseigne_id'], 'integer'],
            [['filename'], 'string', 'max' => 256],
            [['enseigne_enseigne_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enseigne::className(), 'targetAttribute' => ['enseigne_enseigne_id' => 'enseigne_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
 
            'filename' => 'Filename',
            'enseigne_enseigne_id' => 'Enseigne Enseigne ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigneEnseigne()
    {
        return $this->hasOne(Enseigne::className(), ['enseigne_id' => 'enseigne_enseigne_id']);
    }

    /**
     * @inheritdoc
     * @return SlideQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SlideQuery(get_called_class());
    }
}
