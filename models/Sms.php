<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sms".
 *
 * @property integer $sms_id
 * @property string $etat
 * @property string $sender
 * @property string $message
 * @property string $send_on
 * @property integer $point_de_vente_id
 * @property integer $filtre_id
 * @property string $description
 * @property integer $enseigne_id
 *
 * @property Enseigne $enseigne
 * @property Filtrer $filtre
 * @property PointDeVente $pointDeVente
 */
class Sms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['etat'], 'string'],
            [['send_on'], 'safe'],
            [['point_de_vente_id', 'description', 'enseigne_id'], 'required'],
            [['point_de_vente_id', 'filtre_id', 'enseigne_id'], 'integer'],
            [['sender'], 'string', 'max' => 11],
            [['message'], 'string', 'max' => 141],
            [['description'], 'string', 'max' => 45],
            [['enseigne_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enseigne::className(), 'targetAttribute' => ['enseigne_id' => 'enseigne_id']],
            [['filtre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filtrer::className(), 'targetAttribute' => ['filtre_id' => 'filter_id']],
            [['point_de_vente_id'], 'exist', 'skipOnError' => true, 'targetClass' => PointDeVente::className(), 'targetAttribute' => ['point_de_vente_id' => 'point_de_vente_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
             'description'=> 'Description',
            'sms_id' => 'Sms ID',
            'etat' => 'Etat',
            'sender' => 'Sender',
            'message' => 'Message',
            'send_on' => 'Date d\' envoi',
            'point_de_vente_id' => 'Point De Vente ID',
            'filtre_id' => 'Filtre ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigne()
    {
        return $this->hasOne(Enseigne::className(), ['enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiltre()
    {
        return $this->hasOne(Filtrer::className(), ['filter_id' => 'filtre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPointDeVente()
    {
        return $this->hasOne(PointDeVente::className(), ['point_de_vente_id' => 'point_de_vente_id']);
    }
}
