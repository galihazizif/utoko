<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $user_email
 * @property string $user_password
 * @property string $user_tipe
 * @property string $user_alamat
 * @property string $user_telepon
 * @property integer $user_status
 *
 * The followings are the available model relations:
 * @property Transaksi[] $transaksis
 */
class User extends CActiveRecord
{

	public $confirmPassword;
	public $confirmEmail;
	public $verifyCode;
	public $provinsi,$kabupaten,$kecamatan;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_email, user_password, user_telepon, kecamatan, kabupaten, provinsi', 'required'),
			array('user_email','email'),
			array('user_email','unique','message'=>'Email sudah terpakai, silahkan gunakan yang lain.'),
			array('confirmEmail','compare','compareAttribute'=>'user_email'),
			array('confirmPassword','compare','compareAttribute'=>'user_password'),
			array('user_status', 'numerical', 'integerOnly'=>true),
			array('user_email,user_nama, user_password', 'length', 'max'=>45),
			array('user_tipe', 'length', 'max'=>1),
			array('user_alamat', 'length', 'max'=>70),
			array('user_telepon', 'length', 'max'=>14),
			array('verifyCode','captcha','allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, user_email, user_password, user_tipe, user_alamat, user_telepon, user_status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'transaksis' => array(self::HAS_MANY, 'Transaksi', 'trans_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'ID',
			'user_email' => 'Email',
			'user_password' => 'Password',
			'user_tipe' => 'Tipe',
			'user_alamat' => 'Alamat',
			'user_telepon' => 'Telepon',
			'user_status' => 'Status',
			'confirmEmail'=>'Konfirmasi Email',
			'confirmPassword'=>'Konfirmasi Password',
			'user_nama'=>'Nama Lengkap',
			'user_lokasi'=>'Lokasi',
			'verifyCode'=>'Captcha',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_tipe',$this->user_tipe,true);
		$criteria->compare('user_alamat',$this->user_alamat,true);
		$criteria->compare('user_telepon',$this->user_telepon,true);
		$criteria->compare('user_status',$this->user_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
