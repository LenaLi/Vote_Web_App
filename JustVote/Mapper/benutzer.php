<?php

//Klasse Benutzer

class benutzer
{
    public $login;
    public $name;
    public $vorname;
    public $hash;

    function __construct($data=null) {
        if (is_array($data)) {
            $this->login = $data['login'];
            $this->vorname = $data['name'];
            $this->nachname = $data['vorname'];
            $this->hash = $data['hash'];
        }
    }
}