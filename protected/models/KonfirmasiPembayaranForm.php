<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class KonfirmasiPembayaranForm extends CFormModel
{
	public $tanggal;
	public $norektujuan;
	public $norekasal;
	public $namarekasal;
	public $nominal;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('tanggal, norektujuan, norekasal, namarekasal, nominal', 'required'),
			array('tanggal','date','format'=>'dd/mm/yyyy'),
			array('nominal','numerical','integerOnly'=>true),
			// email has to be a valid email address
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'tanggal'=>'Tanggal Transfer',
			'norektujuan'=>'Rekening Tujuan',
			'norekasal'=>'Nomor Rekening Asal',
			'namarekasal'=>'Pemilik Rekening Asal',
			'nominal'=>'Nominal Transfer',
		);
	}
}