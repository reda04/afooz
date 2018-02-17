<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Operateur]].
 *
 * @see Operateur
 */
class OperateurQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Operateur[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Operateur|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
