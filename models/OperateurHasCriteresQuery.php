<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OperateurHasCriteres]].
 *
 * @see OperateurHasCriteres
 */
class OperateurHasCriteresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OperateurHasCriteres[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OperateurHasCriteres|array|null
     */
     public function alloperateurcritere($x)
    {
        return parent::where(['critere_id',$x])->all();
    }
    public function one($db = null)
    {
        return parent::one($db);
    }
}
