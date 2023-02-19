<?php

namespace Models;

class RealEstate
{
        private $idRealEstate;
        private $idUser;
        private $title;
        private $description;
        private $bedrooms;
        private $parking;
        private $price;
        private $city;
        private $url;


       

        /**
         * Get the value of idRealEstate
         */ 
        public function getIdRealEstate()
        {
                return $this->idRealEstate;
        }

        /**
         * Set the value of idRealEstate
         *
         * @return  self
         */ 
        public function setIdRealEstate($idRealEstate)
        {
                $this->idRealEstate = $idRealEstate;

                return $this;
        }

        /**
         * Get the value of idUser
         */ 
        public function getIdUser()
        {
                return $this->idUser;
        }

        /**
         * Set the value of idUser
         *
         * @return  self
         */ 
        public function setIdUser($idUser)
        {
                $this->idUser = $idUser;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of bedrooms
         */ 
        public function getBedrooms()
        {
                return $this->bedrooms;
        }

        /**
         * Set the value of bedrooms
         *
         * @return  self
         */ 
        public function setBedrooms($bedrooms)
        {
                $this->bedrooms = $bedrooms;

                return $this;
        }

        /**
         * Get the value of parking
         */ 
        public function getParking()
        {
                return $this->parking;
        }

        /**
         * Set the value of parking
         *
         * @return  self
         */ 
        public function setParking($parking)
        {
                $this->parking = $parking;

                return $this;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Get the value of city
         */ 
        public function getCity()
        {
                return $this->city;
        }

        /**
         * Set the value of city
         *
         * @return  self
         */ 
        public function setCity($city)
        {
                $this->city = $city;

                return $this;
        }

        /**
         * Get the value of url
         */ 
        public function getUrl()
        {
                return $this->url;
        }

        /**
         * Set the value of url
         *
         * @return  self
         */ 
        public function setUrl($url)
        {
                $this->url = $url;

                return $this;
        }
}
