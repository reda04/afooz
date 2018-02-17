<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TypeCommerce]].
 *
 * @see TypeCommerce
 */
class TypeCommerceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TypeCommerce[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TypeCommerce|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
