<?php

/**
 * This is the model class for table "keranjang".
 *
 * The followings are the available columns in table 'keranjang':
 * @property string $keranjang_id
 * @property string $keranjang_sessid
 * @property integer $keranjang_produk
 * @property integer $keranjang_qty
 * @property string $keranjang_tanggal
 * @property integer $keranjang_status
 *
 * The followings are the available model relations:
 * @property Produk $keranjangProduk
 */
class Keranjang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'keranjang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keranjang_sessid, keranjang_produk, keranjang_qty, keranjang_tanggal, keranjang_status', 'required'),
			array('keranjang_produk, keranjang_qty, keranjang_status', 'numerical', 'integerOnly'=>true),
			array('keranjang_sessid', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('keranjang_id, keranjang_sessid, keranjang_produk, keranjang_qty, keranjang_tanggal, keranjang_status', 'safe', 'on'=>'search'),
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
			'keranjangProduk' => array(self::BELONGS_TO, 'Produk', 'keranjang_produk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'keranjang_id' => 'Keranjang',
			'keranjang_sessid' => 'Keranjang Sessid',
			'keranjang_produk' => 'Keranjang Produk',
			'keranjang_qty' => 'Keranjang Qty',
			'keranjang_tanggal' => 'Keranjang Tanggal',
			'keranjang_status' => 'Keranjang Status',
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

		$criteria->compare('keranjang_id',$this->keranjang_id,true);
		$criteria->compare('keranjang_sessid',$this->keranjang_sessid,true);
		$criteria->compare('keranjang_produk',$this->keranjang_produk);
		$criteria->compare('keranjang_qty',$this->keranjang_qty);
		$criteria->compare('keranjang_tanggal',$this->keranjang_tanggal,true);
		$criteria->compare('keranjang_status',$this->keranjang_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Keranjang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
