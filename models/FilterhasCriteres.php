<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Filter_has_criteres".
 *
 * @property integer $filter_id
 * @property integer $operateur_has_criteres_id
 * @property string $selected_value
 *
 * @property Filter $filter
 * @property OperateurHasCriteres $operateurHasCriteres
 */
class FilterhasCriteres extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Filter_has_criteres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filter_id', 'operateur_has_criteres_id', 'selected_value'], 'required'],
            [['filter_id', 'operateur_has_criteres_id'], 'integer'],
            [['selected_value'], 'string', 'max' => 200],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filter_id' => 'Filter ID',
            'operateur_has_criteres_id' => 'Operateur Has Criteres ID',
            'selected_value' => 'Valeur',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilter()
    {
        return $this->hasOne(Filter::className(), ['filter_id' => 'filter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperateurHasCriteres()
    {
        return $this->hasOne(OperateurHasCriteres::className(), ['id' => 'operateur_has_criteres_id']);
    }

    /**
     * @inheritdoc
     * @return FilterhasCriteresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilterhasCriteresQuery(get_called_class());
    }
}
