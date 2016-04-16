<?php

class benutzer
{
    public $id;
    public $vorname;
    public $nachname;
    public $email;
    public $role;
    public $hash;
    public $salt;

    function __construct($data=null) {
        if (is_array($data)) {
            $this->id = $data['id'];
            $this->vorname = $data['vorname'];
            $this->nachname = $data['nachname'];
            $this->email = $data['email'];
            $this->role = $data['role'];
            $this->hash = $data['hash'];
            $this->salt = $data['salt'];
        }
    }
}