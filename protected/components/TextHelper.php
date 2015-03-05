<?php

class TextHelper{
	public static function rawToRupiah($number){
		return 'Rp. '.number_format($number,0,",",".");
	}

	public static function satuanHarga($text){
		if($text != '')
			return ' per '.$text;
		return '';
	}

	public static function charLimit($text,$number){
		return substr($text, 0,$number);
	}

	public static function image($src,$path,$cssClass,$substitute = false,$id =''){

		$idAttribute = ($id == '')? '': 'id="'.$id.'"';
			
		if($src != '' || $src != null){
			return '<img '.$idAttribute.' src="'.Yii::app()->baseUrl.'/'.$path.'/'.$src.'" class="'.$cssClass.'">';
		}else if($substitute){
			return '<img src="'.Yii::app()->baseUrl.'/data/static/empty.png'.'" class="'.$cssClass.'">';
		}

		return '';		

	}

	public static function tanggal($in){
		return date_format(date_create($in),'d M Y H:i:s');
	}
	
}
?>