<?php

namespace Models;

class User
{
        private $idUser;
        private $name;
       
        private $email;
        private $password;



        public function getIdUser()
        {
                return $this->idUser;
        }


        public function setIdUser($idUser)
        {
                $this->idUser = $idUser;

                return $this;
        }


        public function getName()
        {
                return $this->name;
        }


        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }


      


        public function getEmail()
        {
                return $this->email;
        }


        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }


        public function getPassword()
        {
                return $this->password;
        }


        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
}
