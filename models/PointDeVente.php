<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "point_de_vente".
 *
 * @property integer $point_de_vente_id
 * @property integer $enseigne_enseigne_id
 * @property string $nom
 * @property string $adresse
 * @property string $lattitude
 * @property string $longitude
 *
 * @property Consomation[] $consomations
 * @property EnseigneHasCustomer[] $enseigneHasCustomers
 * @property Enseigne $enseigneEnseigne
 */
class PointDeVente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'point_de_vente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enseigne_enseigne_id','nom'], 'required'],
            [['enseigne_enseigne_id'], 'integer'],
            [['nom', 'lattitude', 'longitude'], 'string', 'max' => 45],
            [['adresse'], 'string', 'max' => 145],
            [['enseigne_enseigne_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enseigne::className(), 'targetAttribute' => ['enseigne_enseigne_id' => 'enseigne_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'point_de_vente_id' => 'Point De Vente ID',
            'enseigne_enseigne_id' => 'Enseigne Enseigne ID',
            'nom' => 'Nom',
            'adresse' => 'Adresse',
            'lattitude' => 'Lattitude',
            'longitude' => 'Longitude',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsomations()
    {
        return $this->hasMany(Consomation::className(), ['point_de_vente_id' => 'point_de_vente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigneHasCustomers()
    {
        return $this->hasMany(EnseigneHasCustomer::className(), ['enseigne_has_customer_id' => 'enseigne_has_customer_id', 'enseigne_id' => 'enseigne_id'])->viaTable('consomation', ['point_de_vente_id' => 'point_de_vente_id']);
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
     * @return PointDeVenteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PointDeVenteQuery(get_called_class());
    }
}
