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
	public function authenticate()
	{
		
		$user = Usuario::model()->find(array (
			'condition'=> 'username = :username',
			'params' => array(
			':username' => $this->username
			 ),
		));
		
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif( crypt( $this->password , $user->password_hash) !== $user->password_hash)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->errorCode=self::ERROR_NONE;

			$this->setState('user_id',$user->id_usuario);
			$this->setState('user',$user->username);
			$this->username = $user->tipo_usuario;
		}


		return !$this->errorCode;
	}
}