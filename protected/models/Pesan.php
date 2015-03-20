<?php

/**
 * This is the model class for table "pesan".
 *
 * The followings are the available columns in table 'pesan':
 * @property integer $pesan_id
 * @property string $pesan_tanggal
 * @property integer $pesan_origination
 * @property integer $pesan_destination
 * @property string $pesan_judul
 * @property string $pesan_isi
 * @property string $pesan_status
 */
class Pesan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	const STATUS_NEW = 0;
	const STATUS_UNREAD = 1;
	const STATUS_READ = 2;

	public function tableName()
	{
		return 'pesan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pesan_judul, pesan_isi', 'required'),
			array('pesan_id, pesan_origination, pesan_destination', 'numerical', 'integerOnly'=>true),
			array('pesan_judul', 'length', 'max'=>150),
			array('pesan_isi', 'length', 'max'=>500),
			array('pesan_status', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pesan_id, pesan_tanggal, pesan_origination, pesan_destination, pesan_judul, pesan_isi, pesan_status', 'safe', 'on'=>'search'),
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
			'pesanUser' => array(self::BELONGS_TO, 'User', 'pesan_origination'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pesan_id' => 'Pesan',
			'pesan_tanggal' => 'Pesan Tanggal',
			'pesan_origination' => 'Pesan Origination',
			'pesan_destination' => 'Pesan Destination',
			'pesan_judul' => 'Pesan Judul',
			'pesan_isi' => 'Pesan Isi',
			'pesan_status' => 'Pesan Status',
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

		$criteria->compare('pesan_id',$this->pesan_id);
		$criteria->compare('pesan_tanggal',$this->pesan_tanggal,true);
		$criteria->compare('pesan_origination',$this->pesan_origination);
		$criteria->compare('pesan_destination',$this->pesan_destination);
		$criteria->compare('pesan_judul',$this->pesan_judul,true);
		$criteria->compare('pesan_isi',$this->pesan_isi,true);
		$criteria->compare('pesan_status',$this->pesan_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pesan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
