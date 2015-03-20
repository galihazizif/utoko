<?php

class SendMail{
		public $destination = array();
		public $subject;
		public $body;
		protected $isHtml = true;

		protected function contentType(){
			if($isHtml)
				return 'text/html';
			return 'text/plain';
		}

		public function kirim(){
			if(count($this->destination == 0) || $this->sender = null || $this->body = null || $this->subject)
				return false;

			$headers="From: ".Yii::app()->name." <".Yii::app()->params['adminEmail'].">\r\n".
					"Reply-To: ".Yii::app()->params['adminEmail']."\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: ".$this->contentType();

			return mail($this->emailArrayToString($this->destination),$this->subject,$this->body,$headers);
		}

		protected function emailArrayToString($emails){
			$dest = '';
			foreach ($emails as $key => $email) {
				$dest = $dest.$email.',';
			}
			return substr($dest,0,-1);
		}


}


?>