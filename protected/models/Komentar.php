<?php

/**
 * This is the model class for table "komentar".
 *
 * The followings are the available columns in table 'komentar':
 * @property integer $komentar_id
 * @property integer $komentar_prod_id
 * @property string $komentar_inreply
 * @property string $komentar_isi
 * @property string $komentar_tanggal
 * @property integer $komentar_pengirim
 * @property integer $komentar_status
 * @property string $komentar_email
 * @property string $komentar_nama
 *
 * The followings are the available model relations:
 * @property Produk $komentarProd
 */
class Komentar extends CActiveRecord
{

	public $verifyCode;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'komentar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('komentar_isi, komentar_pengirim, komentar_email, komentar_nama', 'required'),
			array('komentar_email','email'),
			array('komentar_prod_id, komentar_pengirim, komentar_status', 'numerical', 'integerOnly'=>true),
			array('komentar_inreply', 'length', 'max'=>5),
			array('komentar_isi', 'length', 'max'=>300),
			array('komentar_email, komentar_nama', 'length', 'max'=>45),
			array('verifyCode','captcha','allowEmpty'=>!CCaptcha::checkRequirements()),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('komentar_id, komentar_prod_id, komentar_inreply, komentar_isi, komentar_tanggal, komentar_pengirim, komentar_status, komentar_email, komentar_nama', 'safe', 'on'=>'search'),
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
			'komentarProd' => array(self::BELONGS_TO, 'Produk', 'komentar_prod_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'komentar_id' => 'Komentar',
			'komentar_prod_id' => 'Komentar Prod',
			'komentar_inreply' => 'Komentar Inreply',
			'komentar_isi' => 'Komentar Isi',
			'komentar_tanggal' => 'Komentar Tanggal',
			'komentar_pengirim' => 'Komentar Pengirim',
			'komentar_status' => 'Komentar Status',
			'komentar_email' => 'Komentar Email',
			'komentar_nama' => 'Komentar Nama',
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

		$criteria->compare('komentar_id',$this->komentar_id);
		$criteria->compare('komentar_prod_id',$this->komentar_prod_id);
		$criteria->compare('komentar_inreply',$this->komentar_inreply,true);
		$criteria->compare('komentar_isi',$this->komentar_isi,true);
		$criteria->compare('komentar_tanggal',$this->komentar_tanggal,true);
		$criteria->compare('komentar_pengirim',$this->komentar_pengirim);
		$criteria->compare('komentar_status',$this->komentar_status);
		$criteria->compare('komentar_email',$this->komentar_email,true);
		$criteria->compare('komentar_nama',$this->komentar_nama,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Komentar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
