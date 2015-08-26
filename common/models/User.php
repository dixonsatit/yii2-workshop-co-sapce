<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    public $total;

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    const ROLE_USER = 'User';
    const ROLE_MANAGER = 'Manager';
    const ROLE_PROVINCIAL = 'Provincial';
    const ROLE_COUNTRY = 'Country';
    const ROLE_ADMINISTRATOR = 'Administrator';
    const ROLE_REPORTS = 'Reports';

    const SCENARIO_USERMANAGE = 'default';
    const SCENARIO_REGISTER ='register';

    const LEVEL_0 = 0;
    const LEVEL_1 = 1;
    const LEVEL_2 = 2;
    const LEVEL_3 = 3;

    public $password;
    public $confirm_password;
    public $role;
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
             //['status', 'required'],
             ['status', 'default', 'value' => self::STATUS_ACTIVE],
             ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],

             ['username', 'filter', 'filter' => 'trim'],
             ['username', 'required'],
             ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
             ['username', 'string', 'min' => 2, 'max' => 255],

             ['email', 'filter', 'filter' => 'trim'],
             ['email', 'required'],
             ['email', 'email'],
             ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

             ['password', 'required'],
             ['password', 'string', 'min' => 6],

             ['confirm_password', 'required'],
             ['confirm_password', 'string', 'min' => 6],
             ['confirm_password', 'compare','compareAttribute'=>'password'],

             ['role', 'safe'],
             ['level', 'integer'],

         ];
     }

     public function scenarios()
     {
         return [
             self::SCENARIO_USERMANAGE => ['username', 'password','confirm_password','email','status','level','role'],
             self::SCENARIO_REGISTER => ['username', 'email'],
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
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
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

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
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

    public function AttributeLabels(){
      return [
        'status'=>'Active',
        'levelName'=>'ระดับผู้ประเมิน'
      ];
    }

    public static function getItemsAlias($id){
    $items =  [
        'status'=>[
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_DELETED => 'Deleted'
        ],
        'role' => [
            self::ROLE_USER => 'User',
            self::ROLE_MANAGER => 'Manager',
            self::ROLE_PROVINCIAL => 'Provincial',
            self::ROLE_COUNTRY => 'Country',
            self::ROLE_ADMINISTRATOR => 'Administrator',
            self::ROLE_REPORTS => 'Reports'
        ],
        'level' => [
            self::LEVEL_0 => 'ไม่ได้ประเมิน',
            self::LEVEL_1 => 'ประเมินระดับที่ 1',
            self::LEVEL_2 => 'ประเมินระดับที่ 2',
            self::LEVEL_3 => 'ประเมินระดับที่ 3'
        ]
    ];
    return array_key_exists($id, $items) ? $items[$id] : [];
  }

  public function getItemRole(){
      return self::getItemsAlias('role');
  }

  public function getItemStatus(){
      return self::getItemsAlias('status');
  }
  public function getItemLevel(){
      return self::getItemsAlias('level');
  }
  public function getLevelName(){
      $items =  $this->getItemLevel();
      return array_key_exists($this->level, $items) ? $items[$this->level] : null;
  }
  public function getStatusName(){
      $items =  $this->getItemStatus();
      return array_key_exists($this->status, $items) ? $items[$this->status] : null;
  }

  public function assignMent(){
      $auth = Yii::$app->authManager;
      foreach ($this->role as $key => $value) {
        $auth->assign($auth->getRole($value),$this->id);
      }
  }

  public function getRoles(){
    $auth = Yii::$app->authManager;
    $rolesUser = $auth->getRolesByUser($this->id);
    $roleItems = self::getItemRole();
    $roleSelect=[];

    foreach ($roleItems as $key => $roleName) {
      foreach ($rolesUser as $role) {
        if($key==$role->name){
          $roleSelect[$key]=$roleName;
        }
      }
    }
    $this->role = $roleSelect;
  }

  /**
  * @inheritdoc
  * @return UserQuery the active query used by this AR class.
  */
 public static function find()
 {
     return new UserQuery(get_called_class());
 }

}
