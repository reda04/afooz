<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "criteres_has_filtrer".
 *
 * @property integer $Criteres_Critere_id
 * @property integer $filtrer_filtrer_id
 *
 * @property Criteres $criteresCritere
 * @property Filtrer $filtrerFiltrer
 */
class CriteresHasFiltrer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'criteres_has_filtrer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Criteres_Critere_id', 'filtrer_filtrer_id'], 'required'],
            [['Criteres_Critere_id', 'filtrer_filtrer_id'], 'integer'],
            [['Criteres_Critere_id'], 'exist', 'skipOnError' => true, 'targetClass' => Criteres::className(), 'targetAttribute' => ['Criteres_Critere_id' => 'Critere_id']],
            [['filtrer_filtrer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filtrer::className(), 'targetAttribute' => ['filtrer_filtrer_id' => 'filtrer_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Criteres_Critere_id' => 'Criteres  Critere ID',
            'filtrer_filtrer_id' => 'Filtrer Filtrer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCriteresCritere()
    {
        return $this->hasOne(Criteres::className(), ['Critere_id' => 'Criteres_Critere_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiltrerFiltrer()
    {
        return $this->hasOne(Filtrer::className(), ['filtrer_id' => 'filtrer_filtrer_id']);
    }

    /**
     * @inheritdoc
     * @return CriteresHasFiltrerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CriteresHasFiltrerQuery(get_called_class());
    }
}
