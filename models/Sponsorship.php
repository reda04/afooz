<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sponsorship".
 *
 * @property integer $sponsorship_id
 * @property string $active
 * @property integer $max_referrals
 * @property integer $pts_sponsor
 * @property integer $pts_referral
 * @property integer $delay
 * @property integer $enseigne_id
 *
 * @property Enseigne $enseigne
 */
class Sponsorship extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sponsorship';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'enseigne_id','max_referrals', 'pts_sponsor', 'pts_referral', 'delay'], 'required'],
            [['active'], 'string'],
            [['max_referrals', 'pts_sponsor', 'pts_referral', 'delay', 'enseigne_id'], 'integer'],
            [['enseigne_id'], 'unique'],
            [['enseigne_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enseigne::className(), 'targetAttribute' => ['enseigne_id' => 'enseigne_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
    
            'active' => 'Active',
            'max_referrals' => 'Nombre de filleuls autorisés par parrain :',
            'pts_sponsor' => 'Points offerts pour le parrain :',
            'pts_referral' => 'Points offerts pour le filleul :',
            'delay' => 'Délai',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigne()
    {
        return $this->hasOne(Enseigne::className(), ['enseigne_id' => 'enseigne_id']);
    }
}
