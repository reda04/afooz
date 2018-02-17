<?php
namespace app\models;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * User model
 *
 * @property integer $id
 * @property string  $last_name
 * @property string  $first_name
 * @property string  $username
 * @property string  $auth_key
 * @property string  $password_hash
 * @property string  $password_reset_token
 * @property string  $email
 * @property integer $status
 * @property integer  $created_at
 * @property string  $password
 * @property integer $updated_at
 * @property integer $role_id
 * @property UserRole $role
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
       
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['last_name', 'first_name', 'password_hash', 'role_id','username','password','email','phone_number'], 'required'],
            [['status', 'role_id'], 'integer'],
            [['created_at'], 'safe'],
            [['last_name', 'first_name', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'password'], 'string', 'max' => 255],
            [['username'], 'unique','message'=>'Login déja utilisé'],
            ['username', 'match', 'pattern' => '/^[a-z]\w*$/i' , 'message'=>'le login ne doît contenir ni espaces ni caractéres spéciaux ou numériques'],

              [['phone_number'], 'string', 'max' => 10 , 'min' => 10],
              [['password'] ,'string', 'min' => 8, 'max' => 20],
            [['username'], 'trim','message'=>'No whitespaces'],
            ['email', 'email'],
            [['email'], 'unique','message'=>'Email déja utilisé'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRole::className(), 'targetAttribute' => ['role_id' => 'role_id']],
             [['enseigne_enseigne_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enseigne::className(), 'targetAttribute' => ['enseigne_enseigne_id' => 'enseigne_id']],
    
        ];
    }
     /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Nom',
            'first_name' => 'Prénom',
            'username' => 'Login',
            'auth_key' => 'Clef d\'authentication',
            'password_hash' => 'Mot de passe hashé',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Statut',
            'created_at' => 'Creér à ',
            'password' => 'Mot de passe',
            'updated_at' => 'Modifié à',
            'role_id' => 'Role',
             'phone_number' => 'Télephone de l\'utilisateur: ',
            
            
        ];
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        if(static::findOne(['username' => $username]))

            {
                return static::findOne(['username' => $username]);
            }
            else
            {
                return static::findByEmail($username);
            }
    }
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
     public function getEnseigneEnseigne()
    {
        return $this->hasOne(Enseigne::className(), ['enseigne_id' => 'enseigne_enseigne_id']);
    }
    public static function getadminenseigne($enseigne_id)
    {
        return  user::find()->andwhere(['enseigne_enseigne_id' => $enseigne_id])->andwhere('role_id = 2')->one();
    }
    public function getRole()
    {
        return $this->hasOne(UserRole::className(), ['role_id' => 'role_id']);
    }
     public function getRoles()
    {          $role = UserRole::find()->all();
        return $role;
    }
     

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPermissions()
    {
        return $this->hasOne(UserPermissions::className(), ['user_id' => 'id']);
    }
}
