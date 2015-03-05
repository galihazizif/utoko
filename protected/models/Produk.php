<?php

/**
 * This is the model class for table "produk".
 *
 * The followings are the available columns in table 'produk':
 * @property integer $produk_id
 * @property string $produk_nama
 * @property string $produk_deskripsi
 * @property integer $produk_kategori
 * @property string $produk_harga
 * @property string $produk_satuan
 * @property integer $produk_qty
 * @property integer $produk_status
 * @property string $produk_tanggal
 * @property integer $produk_allowcomment
 * @property string $produk_img
 *
 * The followings are the available model relations:
 * @property Keranjang[] $keranjangs
 * @property Kategoriproduk $produkKategori
 * @property Transaksi[] $transaksis
 */
class Produk extends CActiveRecord
{
	const ALLOW_COMMENT = 1;
	const DISALLOW_COMMENT = 0;

	public static function commentAllowanceList(){
		return array(
			self::ALLOW_COMMENT=>'Komentar Aktif',
			self::DISALLOW_COMMENT=>'Komentar Tidak Aktif',
			);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'produk';
	}

	public function harga(){
		return TextHelper::rawToRupiah($this->produk_harga);
	}

	public function deskripsiLimited(){
		return TextHelper::charLimit($this->produk_deskripsi,150);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('produk_nama, produk_deskripsi, produk_harga, produk_satuan, produk_allowcomment', 'required'),
			array('produk_kategori, produk_qty, produk_status, produk_allowcomment', 'numerical', 'integerOnly'=>true),
			array('produk_nama', 'length', 'max'=>70),
			array('produk_deskripsi', 'length', 'max'=>700),
			array('produk_harga', 'length', 'max'=>10),
			array('produk_img','file','allowEmpty'=>true,'types'=>'jpg,png,jpeg','maxSize'=>1024*500),
			array('produk_satuan', 'length', 'max'=>50),
			array('produk_tanggal, produk_img', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('produk_id, produk_nama, produk_deskripsi, produk_kategori, produk_harga, produk_satuan, produk_qty, produk_status, produk_tanggal, produk_allowcomment, produk_img', 'safe', 'on'=>'search'),
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
			'keranjangs' => array(self::HAS_MANY, 'Keranjang', 'keranjang_produk'),
			'produkKategori' => array(self::BELONGS_TO, 'Kategoriproduk', 'produk_kategori'),
			'transaksis' => array(self::HAS_MANY, 'Transaksi', 'trans_produk'),
			'komentars' => array(self::HAS_MANY, 'Komentar', 'komentar_prod_id'),
			'komentarsCount' => array(self::STAT, 'Komentar', 'komentar_prod_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'produk_id' => 'Produk',
			'produk_nama' => 'Nama Produk',
			'produk_deskripsi' => 'Deskripsi',
			'produk_kategori' => 'Kategori',
			'produk_harga' => 'Harga',
			'produk_satuan' => 'Satuan',
			'produk_qty' => 'Qty',
			'produk_status' => 'Status',
			'produk_tanggal' => 'Tanggal',
			'produk_allowcomment' => 'Allowcomment',
			'produk_img' => 'Gambar',
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

		$criteria->compare('produk_id',$this->produk_id);
		$criteria->compare('produk_nama',$this->produk_nama,true);
		$criteria->compare('produk_deskripsi',$this->produk_deskripsi,true);
		$criteria->compare('produk_kategori',$this->produk_kategori);
		$criteria->compare('produk_harga',$this->produk_harga,true);
		$criteria->compare('produk_satuan',$this->produk_satuan,true);
		$criteria->compare('produk_qty',$this->produk_qty);
		$criteria->compare('produk_status',$this->produk_status);
		$criteria->compare('produk_tanggal',$this->produk_tanggal,true);
		$criteria->compare('produk_allowcomment',$this->produk_allowcomment);
		$criteria->compare('produk_img',$this->produk_img,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Produk the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
