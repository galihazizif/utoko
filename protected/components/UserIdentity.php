<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $xid;
	public function authenticate()
	{
		$password = $this->password;
		$username = $this->username;
		$user = User::model()->find('user_email = :email',array(
			'email'=>$username)
		);

		if($user === null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		elseif($user->user_password != sha1($password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else{
			$this->errorCode=self::ERROR_NONE;
			// $this->xid = $user->user_id;
			$this->xid = array(
				'user_id'=>$user->user_id,
				'user_tipe'=>$user->user_tipe,
				'user_email'=>$user->user_email,
				);
		}
		return !$this->errorCode;
	}

	public function getId(){
		return $this->xid;
	}
}