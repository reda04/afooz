<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Enseigne]].
 *
 * @see Enseigne
 */
class EnseigneQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Enseigne[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Enseigne|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
