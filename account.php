<?php
class Account
{
    protected $username;
    protected $password;
    protected $fullname;
    protected $email;
    public $address;
    private $phone;
    public function __construct($username, $password, $fullname, $email, $address, $phone)
    {
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
    }
    //$this mereferensikan object dari kelas ini
    //self merenferesikan kelasnya langsung
    public function hello()
    {
        echo 'Nama Pengguna : ' . $this->name;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->username;
    }
    public function getFullname()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->username;
    }
    public function getAddress()
    {
        return $this->username;
    }
    public function getPhone()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username ;
    }
    public function setPassword($password)
    {
        $this->password = $password ;
    }
    public function setFullname($fullname)
    {
        $this->fullname = $fullname ;
    }
    public function setEmail($email)
    {
        $this->email = $email ;
    }
}
