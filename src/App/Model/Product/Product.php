<?php
namespace App\Model\Product;

class Product{
    private $id;
    private $firstName;
    private $lastName;
    private $phoneNumber;
    private $bananaWalnutBread;
    private $chocolateCookie;
    private $rumRaisinCupcake;
    private $darkChocolateBrownie;

    public function __construct($assocArray = []){
        /*
        Accepts an associative array
        ["id"=>1,"firstName"=>"Austin","lastName"=>"Allman"];
        */
        foreach($assocArray as $key=>$value){
            $this->{$key} = $value;
        }
    }
    public function getId(){
        return $this->id;
    }
    public function  getFirstName(){
        return $this->firstName;
    }
    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }
    public function getLastName(){
        return $this->lastName;
    }
    public function setLastName($lastName){
        $this->lastName = $lastName;
    }
    public function getPhoneNumber(){
        return $this->phoneNumber;
    }
    public function setPhoneNumber($phoneNumber){
        $this->phoneNumber = $phoneNumber;
    }
    public function getOrderDate(){
        return $this->orderDate;
    }
    public function setOrderDate($orderDate){
        $this->orderDate = $orderDate;
    }
    public function getBananaWalnutBread(){
        return $this->bananaWalnutBread;
    }
    public function setBananaWalnutBread($bananaWalnutBread){
        $this->bananaWalnutBread = $bananaWalnutBread;
    }
    public function getChocolateCookie(){
        return $this->chocolateCookie;
    }
    public function setChocolateCookie($chocolateCookie){
        $this->chocolateCookie = $chocolateCookie;
    }
    public function getRumRaisinCupcake(){
        return $this->rumRaisinCupcake;
    }
    public function setRumRaisinCupcake($rumRaisinCupcake){
        $this->rumRaisinCupcake = $rumRaisinCupcake;
    }
    public function getDarkChocolateBrownie(){
        return $this->darkChocolateBrownie;
    }
    public function setDarkChocolateBrownie($darkChocolateBrownie){
        $this->darkChocolateBrownie = $darkChocolateBrownie;
    }
    
}