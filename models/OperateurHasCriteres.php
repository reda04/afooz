<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operateur_has_criteres".
 *
 * @property integer $id
 * @property integer $critere_id
 * @property integer $operateur_id
 *
 * @property Criteres $critere
 * @property Operateur $operateur
 */
class OperateurHasCriteres extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operateur_has_criteres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['critere_id', 'operateur_id'], 'required'],
            
            [['critere_id'], 'exist', 'skipOnError' => true, 'targetClass' => Criteres::className(), 'targetAttribute' => ['critere_id' => 'Critere_id']],
            [['operateur_id'], 'exist', 'skipOnError' => true, 'targetClass' => Operateur::className(), 'targetAttribute' => ['operateur_id' => 'Operateur_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'critere_id' => 'Critere ID',
            'operateur_id' => 'L\'Operateur ',
        ];
    }

public function getFilterHasOperateurHasCriteres()
    {
        return $this->hasMany(FiltrerHasOperateurHasCriteres::className(), ['operateur_has_criteres_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilterFilters()
    {
        return $this->hasMany(Filtrer::className(), ['filter_id' => 'filtrer_filtrer_id'])->viaTable('filtrer_has_operateur_has_criteres', ['operateur_has_criteres_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCritere()
    {
        return $this->hasOne(Criteres::className(), ['Critere_id' => 'critere_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperateur()
    {
        return $this->hasOne(Operateur::className(), ['Operateur_id' => 'operateur_id']);
    }

    /**
     * @inheritdoc
     * @return OperateurHasCriteresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OperateurHasCriteresQuery(get_called_class());
    }
}
