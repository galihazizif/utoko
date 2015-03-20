<?php

/**
 * This is the model class for table "artikel".
 *
 * The followings are the available columns in table 'artikel':
 * @property string $artikel_id
 * @property string $artikel_judul
 * @property string $artikel_isi
 * @property string $artikel_tanggal
 */
class Artikel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'artikel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('artikel_judul, artikel_isi', 'required'),
			array('artikel_judul', 'length', 'max'=>70),
			array('artikel_isi', 'length', 'max'=>1000),
			array('artikel_tanggal', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('artikel_id, artikel_judul, artikel_isi, artikel_tanggal', 'safe', 'on'=>'search'),
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
		);
	}

	public function previewIsi($num){
		return substr($this->artikel_isi, 0,$num);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'artikel_id' => 'ID',
			'artikel_judul' => 'Judul',
			'artikel_isi' => 'Isi',
			'artikel_tanggal' => 'Tanggal',
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

		$criteria->compare('artikel_id',$this->artikel_id,true);
		$criteria->compare('artikel_judul',$this->artikel_judul,true);
		$criteria->compare('artikel_isi',$this->artikel_isi,true);
		$criteria->compare('artikel_tanggal',$this->artikel_tanggal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Artikel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
