<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filter".
 *
 * @property integer $filter_id
 * @property string $name
 * @property string $statut
 * @property string $operation
 * @property string $requete
 * @property integer $point_de_vente_id
 * @property integer $enseigne_id
 *
 * @property Enseigne $enseigne
 * @property Sms[] $sms
 */
class Filter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'statut',  'enseigne_id'], 'required'],
            [['statut', 'operation'], 'string'],
            [['point_de_vente_id', 'enseigne_id'], 'integer'],
            [['name'], 'string', 'max' => 145],
            [['requete'], 'string', 'max' => 400],
            [['name'], 'unique' , 'message'=>'le nom du filtre existe déja'],
            [['enseigne_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enseigne::className(), 'targetAttribute' => ['enseigne_id' => 'enseigne_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filtrer_id' => 'Filtrer ID',
            'name' => 'Nom',
            'statut' => 'statut',
            'operation' => 'Operation',
            'requete' => 'Requete',
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
    public function getSms()
    {
        return $this->hasMany(Sms::className(), ['filtre_id' => 'filter_id']);
    }

    /**
     * @inheritdoc
     * @return FiltrerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilterQuery(get_called_class());
    }
}
