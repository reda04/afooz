<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Slide]].
 *
 * @see Slide
 */
class SlideQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Slide[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Slide|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
