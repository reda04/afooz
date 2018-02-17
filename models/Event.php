<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $event_id
 * @property string $event_type
 * @property string $created_at
 *
 * @property Trigger[] $triggers
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['event_type'], 'string', 'max' => 200],
            [['event_type'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'event_type' => 'Type d\'évenement',
            'created_at' => 'Date de créat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTriggers()
    {
        return $this->hasMany(Trigger::className(), ['event_id' => 'event_id']);
    }

    /**
     * @inheritdoc
     * @return EventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EventQuery(get_called_class());
    }
}
