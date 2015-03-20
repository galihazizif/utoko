<?php

class KeranjangKu{
	//sessionId adalah public $cookieId+'utoko'
	public function hitungPesanan($sessionId){
		if(Yii::app()->cache->get('cart'.$sessionId) === false){
			$connection = Yii::app()->db;
			$cmd = $connection->createCommand('SELECT COUNT(*) as keranjangku FROM keranjang k WHERE k.keranjang_sessid = :sessid AND k.keranjang_status = 0');
			$cmd->bindParam(':sessid',$sessionId);
			$results = $cmd->query();

			foreach ($results as $key => $value) {
				$result = $value['keranjangku'];
			}
			Yii::app()->cache->set('cart'.$sessionId,$result);
		}

		return Yii::app()->cache->get('cart'.$sessionId);
	}	
}

?>