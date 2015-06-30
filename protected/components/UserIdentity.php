<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    private $userType;

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
        //get user data
        $user = User::model()->findByAttributes(array('username'=>$this->username));
        $hashedInput = hash('sha256', Yii::app()->params['hashSalt'].$this->password);

        if ($this->username==null || count($user)==0){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }else if($hashedInput!=$user->password){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
        }else{
			$this->errorCode=self::ERROR_NONE;
            $this->_id=$user->id_user;
            $this->userType=$user->isAdmin;
            $this->setState('name', $user->name);
        }
		return !$this->errorCode;
	}

    /**
     * @return integer the ID of the user record
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return integer the ID of the user type
     */
    public function isAdmin()
    {
        if ($this->userType==1){
            return true;
        }else{
            return false;
        }
    }
}