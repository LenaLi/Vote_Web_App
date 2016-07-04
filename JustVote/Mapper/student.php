<?php

class student
{
    public $student_id;
    public $vorname;
    public $nachname;
    public $email;
    public $password;


    function __construct($data = null)
    {
        if (is_array($data)) {
            $this->student_id = $data['id'];
            $this->vorname = $data['vorname'];
            $this->nachname = $data['nachname'];
            $this->email = $data['email'];
            $this->password = $data['password'];
        }
    }
}
