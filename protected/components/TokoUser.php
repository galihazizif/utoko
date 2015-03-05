<?php

class TokoUser extends CWebUser{

	public function isAdmin(){
		$user = $this->id;
		return ($user['user_tipe'] == LevelUser::ADMIN);
	}

	public function isVisitor(){
		$user = $this->id;
		return ($user['user_tipe'] == LevelUser::VISITOR);
	}
}

?>