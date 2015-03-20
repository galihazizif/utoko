<?php

/**
 * This is the model class for table "atribut".
 *
 * The followings are the available columns in table 'atribut':
 * @property integer $atribut_id
 * @property string $atribut_kategori
 * @property string $artribut_deskripsi
 * @property string $atribut_isi
 *
 * The followings are the available model relations:
 * @property Kategoriatribut $atributKategori
 */
class Atribut extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'atribut';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('atribut_kategori, artribut_deskripsi, atribut_isi', 'required'),
			array('atribut_kategori', 'length', 'max'=>3),
			array('artribut_deskripsi', 'length', 'max'=>45),
			array('atribut_isi', 'length', 'max'=>700),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('atribut_id, atribut_kategori, artribut_deskripsi, atribut_isi', 'safe', 'on'=>'search'),
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
			'atributKategori' => array(self::BELONGS_TO, 'Kategoriatribut', 'atribut_kategori'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'atribut_id' => 'Atribut',
			'atribut_kategori' => 'Kategori',
			'artribut_deskripsi' => 'Deskripsi',
			'atribut_isi' => 'Isi',
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

		$criteria->compare('atribut_id',$this->atribut_id);
		$criteria->compare('atribut_kategori',$this->atribut_kategori,true);
		$criteria->compare('artribut_deskripsi',$this->artribut_deskripsi,true);
		$criteria->compare('atribut_isi',$this->atribut_isi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Atribut the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
