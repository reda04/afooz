<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property int $notification_id
 * @property int $filtre_id
 * @property string $send_on
 * @property string $valid_to
 * @property string $title
 * @property string $icon
 * @property string $description
 * @property string $contents
 * @property int $enseigne_id
 * @property string $etat
 *
 * @property Enseigne $enseigne
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filtre_id', 'enseigne_id'], 'integer'],
            [['send_on', 'valid_to'], 'safe'],
            [['icon', 'contents', 'etat'], 'string'],
            [['enseigne_id'], 'required'],
            [['title', 'description'], 'string', 'max' => 45],
            [['enseigne_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enseigne::className(), 'targetAttribute' => ['enseigne_id' => 'enseigne_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'notification_id' => 'Notification ID',
            'filtre_id' => 'Filtre ID',
            'send_on' => 'Send On',
            'valid_to' => 'Valid To',
            'title' => 'Title',
            'icon' => 'Icon',
            'description' => 'Description',
            'contents' => 'Contents',
            'enseigne_id' => 'Enseigne ID',
            'etat' => 'Etat',
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
