<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PointDeVente]].
 *
 * @see PointDeVente
 */
class PointDeVenteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PointDeVente[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PointDeVente|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
