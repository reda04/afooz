<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_permissions".
 *
 * @property integer $user_id
 * @property integer $base_clients
 * @property integer $gestion_ciblages
 * @property integer $envoi_emails
 * @property integer $envoi_sms
 * @property integer $envoi_notifications_pushs
 * @property integer $messages_automatiques
 * @property integer $statistiques
 * @property integer $description_enseigne
 * @property integer $gestion_des_droits
 * @property integer $modification_logo
 * @property integer $slides
 * @property integer $offres_de_fidelite
 * @property integer $parrainage
 * @property integer $fidelisation
 * @property integer $ipad
 *
 * @property User $user
 */
class UserPermissions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
           [['base_clients','gestion_ciblages','envoi_emails','envoi_sms'] , 'default', 'value' => 1],
            [['user_id', 'base_clients', 'gestion_ciblages', 'envoi_emails', 'envoi_sms', 'envoi_notifications_pushs', 'messages_automatiques', 'statistiques', 'description_enseigne', 'gestion_des_droits', 'modification_logo', 'slides', 'offres_de_fidelite', 'parrainage', 'fidelisation', 'ipad','dashboard','enseigne_crud','type_commerce','criteres_crud','declencheurs'], 'integer'],
            [['user_id'], 'unique'],
              [['pointsdeventes'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'base_clients' => 'Base Clients',
            'gestion_ciblages' => 'Gestion Ciblages',
            'envoi_emails' => 'Envoi Emails',
            'envoi_sms' => 'Envoi Sms',
            'envoi_notifications_pushs' => 'Envoi Notifications Pushs',
            'messages_automatiques' => 'Messages Automatiques',
            'statistiques' => 'Statistiques',
            'description_enseigne' => 'Description Enseigne',
            'gestion_des_droits' => 'Gestion Des Droits',
            'modification_logo' => 'Modification Logo',
            'slides' => 'Slides',
            'offres_de_fidelite' => 'Offres De Fidelite',
            'parrainage' => 'Parrainage',
            'fidelisation' => 'Fidelisation',
            'ipad' => 'Ipad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
