<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consomation".
 *
 * @property integer $enseigne_has_customer_id
 * @property integer $enseigne_id
 * @property integer $point_de_vente_id
 * @property string $date_conso
 * @property string $type_operation
 * @property integer $points
 * @property integer $offer_id
 * @property string $description
 *
 * @property EnseigneHasCustomer $enseigneHasCustomer
 */
class Consomation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consomation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enseigne_has_customer_id', 'enseigne_id', 'point_de_vente_id', 'type_operation', 'points'], 'required'],
            [['enseigne_has_customer_id', 'enseigne_id', 'point_de_vente_id', 'points', 'offer_id','points_avant'], 'integer'],

            [['date_conso'], 'safe'],
            [['type_operation'], 'string'],
            [['description'], 'string', 'max' => 245],
            [['enseigne_has_customer_id', 'enseigne_id'], 'exist', 'skipOnError' => true, 'targetClass' => EnseigneHasCustomer::className(), 'targetAttribute' => ['enseigne_has_customer_id' => 'enseigne_has_customer_id', 'enseigne_id' => 'enseigne_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enseigne_has_customer_id' => 'Enseigne Has Customer ID',
            'enseigne_id' => 'Enseigne ID',
            'point_de_vente_id' => 'Point De Vente ID',
            'date_conso' => 'Date du passage',
            'type_operation' => 'Type Operation',
            'points' => 'Points',
            'offer_id' => 'Offer ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigneHasCustomer()
    {
        return $this->hasOne(EnseigneHasCustomer::className(), ['enseigne_has_customer_id' => 'enseigne_has_customer_id', 'enseigne_id' => 'enseigne_id']);
    }
    public function getPointdevente()
    {
        return $this->hasOne(PointDeVente::className(), ['point_de_vente_id' => 'point_de_vente_id']);
    }
     public function getOffer()
    {
        return $this->hasOne(Offer::className(), ['offer_id' => 'offer_id']);
    }

    /**
     * @inheritdoc
     * @return ConsomationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConsomationQuery(get_called_class());
    }
}
