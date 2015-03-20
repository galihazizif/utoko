<?php

/**
 * This is the model class for table "lokasi".
 *
 * The followings are the available columns in table 'lokasi':
 * @property integer $lok_id
 * @property string $lok_parent
 * @property string $lok_nama
 * @property integer $lok_level
 */
class Lokasi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lokasi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lok_id, lok_parent, lok_nama, lok_level', 'required'),
			array('lok_id, lok_level', 'numerical', 'integerOnly'=>true),
			array('lok_parent', 'length', 'max'=>10),
			array('lok_nama', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('lok_id, lok_parent, lok_nama, lok_level', 'safe', 'on'=>'search'),
		);
	}

	public function showProvinsi(){
		return $this->findAll('lok_level = 0');
	}

	public function arrayProvinsi(){
		$model = Lokasi::model()->findAll('lok_level = 0');
		foreach ($model as $key => $value) {
			$arr[$value->lok_id] = $value->lok_nama;
		}

		$arr['']='Pilih Provinsi';
		return $arr;
	}

	public function showKabupaten($kodeprov){
		return Lokasi::model()->findAll('lok_level = 1 AND lok_parent = ?',array($kodeprov));
	}

	public function arrayKabupaten($kodeprov){
		$model = Lokasi::model()->findAll('lok_level = 1 AND lok_parent = ?',array($kodeprov));
		foreach ($model as $key => $value) {
			$arr[$value->lok_id] = $value->lok_nama;
		}
		return $arr;
	}

	public function showKecamatan($kodekab){
		return Lokasi::model()->findAll('lok_level = 2 AND lok_parent = ?',array($kodekab));
	}

	public function arrayKecamatan($kodekab){
		$model = Lokasi::model()->findAll('lok_level = 2 AND lok_parent = ?',array($kodekab));
		foreach ($model as $key => $value) {
			$arr[$value->lok_id] = $value->lok_nama;
		}
		return $arr;
	}

	public function lokasiLengkap($idKecamatan){
			$model = Lokasi::model()->findByPk($idKecamatan);
			$namaKecamatan = $model->lok_nama;
			$kabupaten = Lokasi::model()->findByPk($model->lok_parent);
			$namaKabupaten = $kabupaten->lok_nama;
			$provinsi = Lokasi::model()->findByPk($kabupaten->lok_parent);
			$namaProvinsi = $provinsi->lok_nama;
			return $namaKecamatan.', '.$namaKabupaten.', '.$namaProvinsi;

	}

	public function getName($id){
		return Lokasi::model()->findByPk($id)->lok_nama;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'lok_id' => 'Lok',
			'lok_parent' => 'Lok Parent',
			'lok_nama' => 'Lok Nama',
			'lok_level' => 'Lok Level',
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

		$criteria->compare('lok_id',$this->lok_id);
		$criteria->compare('lok_parent',$this->lok_parent,true);
		$criteria->compare('lok_nama',$this->lok_nama,true);
		$criteria->compare('lok_level',$this->lok_level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lokasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
