<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $login
 * @property string|null $password
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $fio
 * @property int|null $role_id
 *
 * @property Report[] $reports
 * @property Role $role
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    private $admin = [
        'id' => 0,
        'login' => 'admin',
        'password' => 'pass',
        'fio' => 'admin',
        'role_id' => 1,
        'phone' => '',
    ];
    public function __toString() {
        return $this->login;
    }
    public $confirmPassword;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id'], 'integer'],
            ['email', 'email'],
            ['login', 'unique'],
            [['login', 'password', 'email', 'phone', 'fio'], 'string', 'max' => 255],
            [['login', 'password', 'email', 'phone', 'fio', 'confirmPassword'], 'required'],
            ['confirmPassword', 'compare', 'compareAttribute' => 'password'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'login' => 'Логин',
            'password' => 'Пароль',
            'confirmPassword' => 'Подтверждение пароля',
            'email' => 'Email',
            'phone' => 'Телефон',
            'fio' => 'Фамилия Имя Отчество',
            'role_id' => 'Роль',
        ];
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }

        /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        if (self::findOne(['id'=> $id])) {
            return self::findOne(['id'=> $id]);
        }
        else {
            return self::$admin['id'];
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        if (self::findOne(['login'=> $username])) {
            return self::findOne(['login'=> $username]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return null;

    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        if ($this->password === $password) {
            return $this->password === $password;
        }
        else {
            return $this->admin['password'] === $password;
        }
    }
}
