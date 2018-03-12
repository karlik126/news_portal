<?php
namespace models\account;
class user
{
    private $userId;
    private $name;
    private $login;
    private $hashPassword;
    private $mail;
    private $emailConfirm;
    private $userStatus;
    private $ban;

    /**
     * user constructor.
     * @param $userId
     * @param $name
     * @param $login
     * @param $hashPassword
     * @param $mail
     * @param $emailConfirm
     * @param $userStatus
     * @param $ban
     */
    public function __construct($userId, $name, $login, $hashPassword, $mail, $emailConfirm, $userStatus, $ban)
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->login = $login;
        $this->hashPassword = $hashPassword;
        $this->mail = $mail;
        $this->emailConfirm = $emailConfirm;
        $this->userStatus = $userStatus;
        $this->ban = $ban;
    }
    public function __toString()
    {
        return $this->userId."  ".$this->name."  "."  ". $this->login ;
    }

    public function getUserId()
    {
        return $this->userId;
    }


    public function setUserId($userId)
    {
        $this->userId = $userId;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getLogin()
    {
        return $this->login;
    }


    public function setLogin($login)
    {
        $this->login = $login;
    }


    public function getHashPassword()
    {
        return $this->hashPassword;
    }


    public function setHashPassword($hashPassword)
    {
        $this->hashPassword = $hashPassword;
    }


    public function getMail()
    {
        return $this->mail;
    }


    public function setMail($mail)
    {
        $this->mail = $mail;
    }


    public function getEmailConfirm()
    {
        return $this->emailConfirm;
    }


    public function setEmailConfirm($emailConfirm)
    {
        $this->emailConfirm = $emailConfirm;
    }


    public function getUserStatus()
    {
        return $this->userStatus;
    }


    public function setUserStatus($userStatus)
    {
        $this->userStatus = $userStatus;
    }


    public function getBan()
    {
        return $this->ban;
    }


    public function setBan($ban)
    {
        $this->ban = $ban;
    }











}