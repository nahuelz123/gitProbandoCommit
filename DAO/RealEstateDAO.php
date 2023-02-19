<?php

namespace DAO;

use \Exception as Exception;


use DAO\Connection as Connection;
use Models\RealEstate as RealEstate;

class RealEstateDAO 
{
    private $companytList = array();

    private $connection;
    private $tableName = "realEstate";


    public function Add($estate)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (idUser,title,description,bedrooms,parking,price,city,url) VALUES (:idUser,:title,:description,:bedrooms,:parking,:price,:city,:url);";
            
            $valuesArray["idUser"] = $estate->getIdUser();
            $valuesArray["title"] = $estate->getTitle();
            $valuesArray["description"] = $estate->getDescription();
            $valuesArray["bedrooms"] = $estate->getBedrooms();
            $valuesArray["parking"] = $estate->getParking();
            $valuesArray["price"] = $estate->getPrice();
            $valuesArray["city"] = $estate->getCity();
            $valuesArray["url"] = $estate->getUrl();

            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $valuesArray);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetProductoById($idRealEstate)
    {
        try {
           
            
            $query = "SELECT * FROM .$this->tableName WHERE idRealEstate = '$idRealEstate'";;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $estate = new RealEstate();
                $estate->setIdRealEstate($valuesArray['idRealEstate']);
                $estate->setIdUser($valuesArray["idUser"]);
                $estate->setTitle($valuesArray["title"]);
                $estate->setDescription($valuesArray['description']);
                $estate->setBedrooms($valuesArray['bedrooms']);
                $estate->setParking($valuesArray['parking']);
                $estate->setPrice($valuesArray['price']);
                $estate->setCity($valuesArray['city']);
                $estate->setUrl($valuesArray['url']);
            }

            return $estate;
        } catch (Exception $e) {
            throw new Exception('Error al cargar la base de datos'.$e->getMessage());
        }
    }

    public function GetAllStock()
    { 
        $estateList= array();
     
        try {
           
            
            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $estate = new RealEstate();
                $estate->setIdRealEstate($valuesArray['idRealEstate']);
                $estate->setIdUser($valuesArray["idUser"]);
                $estate->setTitle($valuesArray["title"]);
                $estate->setDescription($valuesArray['description']);
                $estate->setBedrooms($valuesArray['bedrooms']);
                $estate->setParking($valuesArray['parking']);
                $estate->setPrice($valuesArray['price']);
                $estate->setCity($valuesArray['city']);
                $estate->setUrl($valuesArray['url']);
                array_push($estateList, $estate);
            }

            return $estateList;
        } catch (Exception $ex) {
            throw new Exception('Error al cargar la base de datos');
        }
    }
    public function GetAllPrice($min,$max)
    { 
        $estateList= array();
     
        try {
           
            
            $query = "SELECT * FROM .$this->tableName WHERE $this->tableName.price BETWEEN $min AND $max";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $estate = new RealEstate();
                $estate->setIdRealEstate($valuesArray['idRealEstate']);
                $estate->setIdUser($valuesArray["idUser"]);
                $estate->setTitle($valuesArray["title"]);
                $estate->setDescription($valuesArray['description']);
                $estate->setBedrooms($valuesArray['bedrooms']);
                $estate->setParking($valuesArray['parking']);
                $estate->setPrice($valuesArray['price']);
                $estate->setCity($valuesArray['city']);
                $estate->setUrl($valuesArray['url']);
                array_push($estateList, $estate);
            }

            return $estateList;
        } catch (Exception $ex) {
            throw new Exception('Error al cargar la base de datos');
        }
    }

    
    public function GetAllBedrooms($min,$max)
    { 
        $estateList= array();
     
        try {
           
            
            $query = "SELECT * FROM .$this->tableName WHERE $this->tableName.bedrooms BETWEEN $min AND $max";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $estate = new RealEstate();
                $estate->setIdRealEstate($valuesArray['idRealEstate']);
                $estate->setIdUser($valuesArray["idUser"]);
                $estate->setTitle($valuesArray["title"]);
                $estate->setDescription($valuesArray['description']);
                $estate->setBedrooms($valuesArray['bedrooms']);
                $estate->setParking($valuesArray['parking']);
                $estate->setPrice($valuesArray['price']);
                $estate->setCity($valuesArray['city']);
                $estate->setUrl($valuesArray['url']);
                array_push($estateList, $estate);
            }

            return $estateList;
        } catch (Exception $ex) {
            throw new Exception('Error al cargar la base de datos');
        }
    }
///para realizar la compra 
    public function comprar($idProducto)
    {
        
        $prod=$this->GetProductoById($idProducto);
        
        $this->connection = Connection::GetInstance();
         $stock=$prod->getStock()-1;
        
        $consulta = "UPDATE producto
        SET stock = '$stock'
        WHERE idProducto = '$idProducto'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    }
//para eliminar el producto 
    public function deleDeleteByIdte($idProducto)
    {
        $this->connection = Connection::GetInstance();
    
        $consulta = "DELETE From producto WHERE idProducto = '$idProducto'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    }
}
