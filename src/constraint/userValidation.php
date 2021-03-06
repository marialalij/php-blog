<?php

namespace App\src\constraint;

use App\config\Parameter;

class UserValidation extends Validation
{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value)
    {
        if($name === 'pseudo') {
            $error = $this->checkPseudo($name, $value);
            $this->addError($name, $error);
        }
        elseif($name === 'email') {
            $error = $this->checkEmail($name, $value);
            $this->addError($name, $error);
        }

        elseif($name === 'first_name') {
            $error = $this->checkFirstName($name, $value);
            $this->addError($name, $error);
        }
        elseif($name === 'last_name') {
            $error = $this->checkLastName($name, $value);
            $this->addError($name, $error);
        }
        elseif($name === 'password') {
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        }

    }

    private function addError($name, $error) {
        if($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkPseudo($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('pseudo', $value);
        }
        elseif($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('pseudo', $value, 2);
        }
        elseif($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('pseudo', $value, 255);
        }
    }




    private function checkEmail($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('email', $value);
        }
        elseif($this->constraint->minLength($name, $value, 10)) {
            return $this->constraint->minLength('email', $value, 2);
        }
        elseif($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('email', $value, 255);
        }
    }


    private function checkFirstName($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('first_name', $value);
        }
        elseif($this->constraint->minLength($name, $value, 10)) {
            return $this->constraint->minLength('first_name', $value, 2);
        }
        elseif($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('first_name', $value, 255);
        }
    }


    private function checkLastName($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('last_name', $value);
        }
        elseif($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('last_name', $value, 2);
        }
        elseif($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('last_name', $value, 255);
        }
    }




    private function checkPassword($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('password', $value);
        }
        elseif($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('password', $value, 2);
        }
        elseif($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('password', $value, 255);
        }
    }
}