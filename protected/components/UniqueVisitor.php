<?php
class UniqueVisitor{
	
	protected function generateCookieId(){
		return sha1(date('YmdHis').microtime());
	}

	public function getCookieId(){
		if(!isset($_COOKIE['utoko'])){
			$cookieId = self::generateCookieId();
			setcookie('utoko',$cookieId,time()+3600*24,'/');
			CController::refresh();
		}

		return $_COOKIE['utoko'];
	}

}

?>