<?php

class Broker{
    private $mysqli;
    private static $broker;

    private function __construct(){
        $this->mysqli = new mysqli("localhost","root","","krofne");
        $this->mysqli->set_charset("utf8");
    }



    public static function getBroker(){
        if(!isset($broker)){
            $broker=new Broker();
        }
        return $broker;
    }





    public function vratiKolekciju($upit){
        $rezultat=$this->mysqli->query($upit);    // prosledjeni upit
        $response=[];   // prazna kolekcija popunjavam je pomoću fetch_object
        if(!$rezultat){
            $response['status']=false;
            $response['error']=$this->mysqli->error;
        }
        else{
            $response['status']=true;
            while($red=$rezultat->fetch_object()){   // ucitava jedan po jedan red iy baye i ubacuje ga u kolekciju rezultat,
                $response['kolekcija'][]=$red;// a taj reyultat vra'a kao povratnu vrednost
            }
        }
        return $response;
    }



    public function udc($upit){    // update delete change
        $rezultat=$this->mysqli->query($upit);
        $response=[];
        $response['status']=(!$rezultat)?false:true;
        if(!$rezultat){
            $response['error']=$this->mysqli->error;
        }
        return $response;
    }





}

?>