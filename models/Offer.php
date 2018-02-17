<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "offer".
 *
 * @property integer $offer_id
 * @property string $title
 * @property integer $points
 * @property double $value
 * @property integer $enseigne_id
 *
 * @property EnseigneHasOffer[] $enseigneHasOffers
 * @property Enseigne[] $enseigneEnseignes
 * @property Enseigne $enseigne
 * @property OfferHasEnseigne[] $offerHasEnseignes
 * @property Enseigne[] $enseignes
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'points', 'value', 'enseigne_id'], 'required'],
            [['points', 'enseigne_id'], 'integer'],
            [['value'], 'number'],
            [['title'], 'string', 'max' => 256],
            [['enseigne_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enseigne::className(), 'targetAttribute' => ['enseigne_id' => 'enseigne_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           'title' => 'Titre :',
            'points' => 'Nombre de Points :',
            'value' => 'Valeur : ',
            'enseigne_id' => 'Enseigne ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigneHasOffers()
    {
        return $this->hasMany(EnseigneHasOffer::className(), ['offer_offer_id' => 'offer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigneEnseignes()
    {
        return $this->hasMany(Enseigne::className(), ['enseigne_id' => 'enseigne_enseigne_id'])->viaTable('enseigne_has_offer', ['offer_offer_id' => 'offer_id']);
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
    public function getOfferHasEnseignes()
    {
        return $this->hasMany(OfferHasEnseigne::className(), ['offer_id' => 'offer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseignes()
    {
        return $this->hasMany(Enseigne::className(), ['enseigne_id' => 'enseigne_id'])->viaTable('offer_has_enseigne', ['offer_id' => 'offer_id']);
    }
}
