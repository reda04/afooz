<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FilterhasCriteres]].
 *
 * @see FilterhasCriteres
 */
class FilterhasCriteresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return FilterhasCriteres[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FilterhasCriteres|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
