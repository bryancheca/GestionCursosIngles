<?php
namespace App;

class MailParam
{
   //todos son configurables
   private $smtpAddress = 'smtp.gmail.com';
   private $port = 465;
   private $encryption = 'ssl';
   private $email = 'bryan24.alex1@gmail.com';//configurable
   private $password = '1234';//configurable

    public function getSmptAddress()
    {
    	return $this->smtpAddress;
    }

    public function getPort()
    {
    	return $this->port;
    }

    public function getEncryption()
    {
    	return $this->encryption;
    }

    public function getEmail()
    {
    	return $this->email;
    }

    public function getPassword()
    {
    	return $this->password;
    }
}
?>
