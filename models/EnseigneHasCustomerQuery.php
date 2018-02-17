<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EnseigneHasCustomer]].
 *
 * @see EnseigneHasCustomer
 */
class EnseigneHasCustomerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EnseigneHasCustomer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EnseigneHasCustomer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
