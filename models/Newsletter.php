<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "newsletter".
 *
 * @property integer $newsletter_id
 * @property string $etat
 * @property integer $filtre_id
 * @property string $send_on
 * @property string $title
 * @property integer $point_de_vente_id
 * @property integer $enseigne_id
 *
 * @property Enseigne $enseigne
 */
class Newsletter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newsletter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['etat', 'point_de_vente_id', 'enseigne_id'], 'required'],
            [['etat'], 'string'],
            [['message'], 'string'],
            [['filtre_id', 'point_de_vente_id', 'enseigne_id'], 'integer'],
            [['send_on'], 'safe'],
            [['title'], 'string', 'max' => 45],
            [['enseigne_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enseigne::className(), 'targetAttribute' => ['enseigne_id' => 'enseigne_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
             'newsletter_id' => 'Newsletter ID',
            'etat' => 'Etat',
            'filtre_id' => 'Filtre ID',
            'send_on' => 'Date d\'envoi',
            'title' => 'Description',
            'point_de_vente_id' => 'Point De Vente ID',
        ];
      
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigne()
    {
        return $this->hasOne(Enseigne::className(), ['enseigne_id' => 'enseigne_id']);
    }
}
