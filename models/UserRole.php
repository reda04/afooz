<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_role".
 *
 * @property integer $role_id
 * @property string $name
 * @property string $role
 * @property string $detail_role
 * @property string $create_time
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time'], 'safe'],
            [['name', 'role'], 'string', 'max' => 70],
            [['detail_role'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'name' => 'Role',
            'role' => 'Role',
            'detail_role' => 'Detail Role',
            'create_time' => 'Create Time',
        ];
    }
}
