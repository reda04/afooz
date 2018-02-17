<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Consomation]].
 *
 * @see Consomation
 */
class ConsomationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Consomation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
  

    /**
     * @inheritdoc
     * @return Consomation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
