<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CriteresHasFiltrer]].
 *
 * @see CriteresHasFiltrer
 */
class CriteresHasFiltrerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CriteresHasFiltrer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CriteresHasFiltrer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
