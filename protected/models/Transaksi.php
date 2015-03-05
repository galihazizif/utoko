<?php

/**
 * This is the model class for table "transaksi".
 *
 * The followings are the available columns in table 'transaksi':
 * @property string $trans_id
 * @property string $trans_kodetrans
 * @property string $trans_tanggal
 * @property integer $trans_produk
 * @property integer $trans_qty
 * @property integer $trans_user
 * @property string $trans_keterangan
 * @property string $trans_lokasi
 * @property string $trans_alamat
 * @property integer $trans_status
 *
 * The followings are the available model relations:
 * @property Produk $transProduk
 * @property User $transUser
 */
class Transaksi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('trans_kodetrans, trans_tanggal, trans_produk, trans_qty, trans_user, trans_status', 'required'),
			array('trans_produk, trans_qty, trans_user, trans_status', 'numerical', 'integerOnly'=>true),
			array('trans_kodetrans', 'length', 'max'=>15),
			array('trans_keterangan', 'length', 'max'=>100),
			array('trans_lokasi, trans_alamat', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('trans_id, trans_kodetrans, trans_tanggal, trans_produk, trans_qty, trans_user, trans_keterangan, trans_lokasi, trans_alamat, trans_status', 'safe', 'on'=>'search'),
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
			'transProduk' => array(self::BELONGS_TO, 'Produk', 'trans_produk'),
			'transUser' => array(self::BELONGS_TO, 'User', 'trans_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'trans_id' => 'Trans',
			'trans_kodetrans' => 'Trans Kodetrans',
			'trans_tanggal' => 'Trans Tanggal',
			'trans_produk' => 'Trans Produk',
			'trans_qty' => 'Trans Qty',
			'trans_user' => 'Trans User',
			'trans_keterangan' => 'Trans Keterangan',
			'trans_lokasi' => 'Trans Lokasi',
			'trans_alamat' => 'Trans Alamat',
			'trans_status' => 'Trans Status',
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

		$criteria->compare('trans_id',$this->trans_id,true);
		$criteria->compare('trans_kodetrans',$this->trans_kodetrans,true);
		$criteria->compare('trans_tanggal',$this->trans_tanggal,true);
		$criteria->compare('trans_produk',$this->trans_produk);
		$criteria->compare('trans_qty',$this->trans_qty);
		$criteria->compare('trans_user',$this->trans_user);
		$criteria->compare('trans_keterangan',$this->trans_keterangan,true);
		$criteria->compare('trans_lokasi',$this->trans_lokasi,true);
		$criteria->compare('trans_alamat',$this->trans_alamat,true);
		$criteria->compare('trans_status',$this->trans_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaksi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
