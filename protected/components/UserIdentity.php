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
    private $_id;
    private $_username;
    public function getName()
    {
        return $this->_username;
    }
    public function getId()
    {
        return $this->_id;
    }
    public function authenticate()
    {
        $user= User::model()->find('LOWER(netName)=?', array(strtolower($this->username)));
        if($user === null)
        {
            $this->errorCode= self::ERROR_UNKNOWN_IDENTITY;
        }
        elseif($user->password !== md5($this->password))
        {
            $this->errorCode= self::ERROR_PASSWORD_INVALID;
        }
        else
        {
            $this->_id = $user->userID;
            $this->_username = $user->emailAddress;
            $this->setState('roles', $user->roleID);
            $user->lastLogin=new CDbExpression("NOW()");
            $user->save();
            $this->errorCode= self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
}