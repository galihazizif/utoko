<?php
class Styler{
	const NAVBAR = 1;
	const BOXHEADER = 2;
	const BGTIPE = 3;
	const BGCOLOR = 5;
	const FOOTERLISTCOLOR = 6;
	const WELLCOLOR = 7;
	const BGIMG = 8;
	const BGIMGREPEAT = 9;
	const KOMENTARBG = 10;


	public function imgRepeatType(){
		return 
			array(
			'repeat-x'=>'Perulangan Horisontal',
			'repeat-y'=>'Perulangan Vertikal',
			'repeat'=>'Perulangan Penuh',
			'no-repeat'=>'Tanpa Perulangan',
			
		);
	}
}
?>