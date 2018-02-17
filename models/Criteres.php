<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "criteres".
 *
 * @property integer $Critere_id
 * @property string $Nom
 * @property string $Result
 * @property string $value
 * @property string $type
 *
 * @property CriteresHasFiltrer[] $criteresHasFiltrers
 * @property Filtrer[] $filtrerFiltrers
 * @property OperateurHasCriteres[] $operateurHasCriteres
 * @property Operateur[] $operateurOperateurs
 */
class Criteres extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'criteres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string'],
            [['Nom', 'value'], 'string', 'max' => 45],
            [['Result'], 'string', 'max' => 200],
            [['table_name'], 'string', 'max' => 200],
            [['column_name'], 'string', 'max' => 200],
            [['Nom','table_name','type','value','column_name'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Critere_id' => 'Critere ID',
            'Nom' => 'Nom',
            'Result' => 'Result',
            'value' => 'Value',
            'type' => 'Type',
            'table_name' => 'Nom de la table ',
            "column_name"   => 'Nom de la colonne',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCriteresHasFiltrers()
    {
        return $this->hasMany(CriteresHasFiltrer::className(), ['critere_id' => 'Critere_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiltrerFiltrers()
    {
        return $this->hasMany(Filtrer::className(), ['filtrer_id' => 'filtrer_filtrer_id'])->viaTable('criteres_has_filtrer', ['critere_id' => 'Critere_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperateurHasCriteres()
    {
        return $this->hasMany(OperateurHasCriteres::className(), ['critere_id' => 'Critere_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperateurOperateurs()
    {
        return $this->hasMany(Operateur::className(), ['Operateur_id' => 'operateur_id'])->viaTable('operateur_has_criteres', ['critere_id' => 'Critere_id']);
    }
      public static function getalltables()
    {
        $command = Yii::$app->db->createCommand('select table_name from information_schema.columns where table_schema = "afoz" order by table_name,ordinal_position');
        $tables = $command->queryAll();
        return $tables;
    }
    public static function gettablecolumns($table)
    {
        $command = Yii::$app->db->createCommand('select table_name,column_name from information_schema.columns where table_schema = "afoz"  and table_name=:table order by table_name,ordinal_position')->bindValue('table',$table);
        $tables = $command->queryAll();
        return $tables;
    }
    public static function getdatatype($table,$column)
    {
        $command = Yii::$app->db->createCommand('select  data_type,column_type from information_schema.columns where table_schema = "afoz"  and table_name=:table  and column_name=:column order by table_name,ordinal_position')->bindValues([':table'=>$table,':column'=>$column]);
        $tables = $command->queryAll();
        return $tables;
    }

    /**
     * @inheritdoc
     * @return CriteresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CriteresQuery(get_called_class());
    }
}
