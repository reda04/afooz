<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enseigne".
 *
 * @property integer $enseigne_id
 * @property string $name
 * @property string $contact_email
 * @property string $average_purchase_value
 * @property string $description
 * @property string $facebook
 * @property string $twitter
 * @property string $google_plus
 * @property string $trip_advisor
 * @property string $instagram
 * @property string $youtube
 * @property string $website
 * @property string $logo
 * @property string $register_required_name
 * @property string $register_required_email
 * @property string $default_optin
 * @property string $pts_register
 * @property string $passage_or_amount
 * @property string $clean_points
 * @property string $clean_points_param
 * @property string $register_to_use_points
 * @property string $delay_before_checkin
 * @property string $register_required_phone
 * @property string $Typeco_ID
 * @property integer $Type_commerce_ID
 * @property integer $Nbre_points_vente
 * @property string $Type_enseigne
 *
 * @property TypeCommerce $typeCommerce
 * @property EnseigneHasCustomer[] $enseigneHasCustomers
 * @property EnseigneHasOffer[] $enseigneHasOffers
 * @property Offer[] $offerOffers
 * @property Newsletter[] $newsletters
 * @property Notification[] $notifications
 * @property OfferHasEnseigne[] $offerHasEnseignes
 * @property Offer[] $offers
 * @property PointDeVente[] $pointDeVentes
 * @property Segmentations[] $segmentations
 * @property SettingPtsAmount[] $settingPtsAmounts
 * @property SettingPtsPassage[] $settingPtsPassages
 * @property Slide[] $slides
 * @property Sponsorship[] $sponsorships
 * @property User[] $users
 */
class Enseigne extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enseigne';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'register_required_name', 'register_required_email', 'default_optin', 'passage_or_amount', 'register_required_phone','ipad_pin','ipad_pin_reward','publication','phone_number'], 'string'],
            [['pts_register', 'delay_before_checkin', 'Type_commerce_ID', 'Nbre_points_vente', 'pts_per_passage','number_dirhams','pts_per_dirham'], 'integer'],
            [['Type_commerce_ID'], 'required'],

         
            [[ 'Nbre_points_vente'], 'integer','min'=>1],
             [['ipad_pin'], 'string', 'max' => 4],
              [['phone_number'], 'string', 'max' => 10 , 'min' => 10],
            [['name', 'contact_email', 'default_optin'], 'string', 'max' => 45 ],
            [['name','contact_email','phone_number'],'required'],
            [['facebook', 'google_plus', 'trip_advisor', 'instagram', 'youtube', 'website'], 'string', 'max' => 120],
            [['twitter'], 'string', 'max' => 100],
            [['logo'], 'string', 'max' => 200],

             ['contact_email', 'email'],
            [['Type_commerce_ID'], 'exist', 'skipOnError' => true, 'targetClass' => TypeCommerce::className(), 'targetAttribute' => ['Type_commerce_ID' => 'ID']],

            [['name'], 'unique','message'=>'Nom de l\'enseigne déja utilisé'],
            [['contact_email'], 'unique','message'=>'l\'email de contact déja utilisé'],
            [['phone_number'], 'unique','message'=>'Numéro de télephone de l\'enseigne déja utilisé'],

            [['average_purchase_value','description'], 'required'],
        ];
    }




    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'Type_commerce_ID' => 'Type Commerce  ID',
            'Nbre_points_vente' => 'Nbre Points Vente',
            'Type_enseigne' => 'Type Enseigne',
            'enseigne_id' => 'Enseigne ID',
            'name' => 'Nom de l\'enseigne',
            'contact_email' => 'l\'email de contact',
            'average_purchase_value' => 'Montant du panier moyen ',
            'description' => 'Description de l\'enseigne ',
            'facebook' => 'Adresse de votre page Facebook :',
            'twitter' => 'Adresse de votre compte sur Twitter :',
            'google_plus' => 'Adresse de votre page sur Google+ :',
            'trip_advisor' => 'Adresse de votre page sur Trip Advisor :',
            'instagram' => 'Adresse de votre compte sur Instagram :',
            'youtube' => 'Adresse de votre chaine sur YouTube :',
            'website' => 'Adresse de votre site Web :',
            'logo' => 'Logo',
            'register_required_name' => 'Register Required Name',
            'register_required_email' => 'Register Required Email',
            'default_optin' => 'Default Optin',
            'pts_register' => 'Pts Register',
            'passage_or_amount' => 'Passage Or Amount',
            'clean_points' => 'Clean Points',
            'clean_points_param' => 'Clean Points Param',
            'register_to_use_points' => 'Register To Use Points',
            'delay_before_checkin' => 'Delay Before Checkin',
            'pts_per_passage' => 'Points par passage ',  
            'register_required_phone' => 'Register Required Phone',
            'Type_commerce_ID' => 'Type de commerce',
            'Nbre_points_vente' => 'Nbre Points Vente',
            'phone_number'  => 'Numéro de télephone de l\'enseigne',
     
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeCommerce()
    {
        return $this->hasOne(TypeCommerce::className(), ['ID' => 'Type_commerce_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigneHasCustomers()
    {
        return $this->hasMany(EnseigneHasCustomer::className(), ['enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnseigneHasOffers()
    {
        return $this->hasMany(EnseigneHasOffer::className(), ['enseigne_enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferOffers()
    {
        return $this->hasMany(Offer::className(), ['offer_id' => 'offer_offer_id'])->viaTable('enseigne_has_offer', ['enseigne_enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsletters()
    {
        return $this->hasMany(Newsletter::className(), ['enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notification::className(), ['enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferHasEnseignes()
    {
        return $this->hasMany(OfferHasEnseigne::className(), ['enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasMany(Offer::className(), ['offer_id' => 'offer_id'])->viaTable('offer_has_enseigne', ['enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPointDeVentes()
    {
        return $this->hasMany(PointDeVente::className(), ['enseigne_enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSegmentations()
    {
        return $this->hasMany(Segmentations::className(), ['enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettingPtsAmounts()
    {
        return $this->hasMany(SettingPtsAmount::className(), ['enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettingPtsPassages()
    {
        return $this->hasMany(SettingPtsPassage::className(), ['enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlide()
    {
        return $this->hasMany(Slide::className(), ['enseigne_enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSponsorships()
    {
        return $this->hasMany(Sponsorship::className(), ['enseigne_id' => 'enseigne_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['enseigne_enseigne_id' => 'enseigne_id']);
    }
     public function getAdminenseigne()
    {
        return $this->hasOne(User::className(), ['enseigne_enseigne_id' => 'enseigne_id'  ])->andOnCondition(['role_id' => '2']);
    }

 public function getTypec()
   {
        return TypeCommerce::find()->all();
    }
    public function getSlides()
    {
        return Slide::find()->all();
    }

    /**
     * @inheritdoc
     * @return EnseigneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnseigneQuery(get_called_class());
    }
}
