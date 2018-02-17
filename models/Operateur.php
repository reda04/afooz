<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operateur".
 *
 * @property integer $Operateur_id
 * @property string $libellé
 * @property string $operator
 * @property string $mapping
 *
 * @property OperateurHasCriteres[] $operateurHasCriteres
 * @property Criteres[] $criteresCriteres
 */
class Operateur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operateur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['libellé'], 'string', 'max' => 200],
            [['operator'], 'string', 'max' => 100],
            [['mapping'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Operateur_id' => 'Operateur ID',
            'libellé' => 'Libell�',
            'operator' => 'Operator',
            'mapping' => 'Mapping',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperateurHasCriteres()
    {
        return $this->hasMany(OperateurHasCriteres::className(), ['operateur_id' => 'Operateur_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCriteresCriteres()
    {
        return $this->hasMany(Criteres::className(), ['Critere_id' => 'critere_id'])->viaTable('operateur_has_criteres', ['operateur_id' => 'Operateur_id']);
    }

    /**
     * @inheritdoc
     * @return OperateurQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OperateurQuery(get_called_class());
    }
}
