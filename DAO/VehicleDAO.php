<?php

namespace DAO;

use \Exception as Exception;

use Models\Vehicle as Vehicle;
use DAO\Connection as Connection;

class VehicleDAO 
{
    private $companytList = array();

    private $connection;
    private $tableName = "vehicle";


    public function Add($vehiculo)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (idUser,title,description,year,price,city,url) VALUES (:idUser,:title,:description,:year,:price,:city,:url);";
         
            $valuesArray["idUser"] = $vehiculo->getIdUser();
            $valuesArray["title"] = $vehiculo->getTitle();
            $valuesArray["description"] = $vehiculo->getDescription();
            $valuesArray["year"] = $vehiculo->getYear();
            $valuesArray["price"] = $vehiculo->getPrice();
            $valuesArray["city"] = $vehiculo->getCity();
            $valuesArray["url"] = $vehiculo->getUrl();

            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $valuesArray);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetProductoById($idVehicle)
    {
        try {
           
            
            $query = "SELECT * FROM .$this->tableName WHERE idVehicle = '$idVehicle'";;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $vihiculo = new Vehicle();
                $vihiculo->setIdVehicle($valuesArray['idVehicle']);
                $vihiculo->setIdUser($valuesArray["idUser"]);
                $vihiculo->setTitle($valuesArray["title"]);
                $vihiculo->setDescription($valuesArray['description']);
                $vihiculo->setYear($valuesArray['year']);
                $vihiculo->setPrice($valuesArray['price']);
                $vihiculo->setCity($valuesArray['city']);
                $vihiculo->setUrl($valuesArray['url']);
            }

            return $vihiculo;
        } catch (Exception $e) {
            throw new Exception('Error al cargar la base de datos'.$e->getMessage());
        }
    }

    public function GetAllStock()
    {
        $vihiculoList= array();
        
        try {
           
           
            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $vihiculo = new Vehicle();
                $vihiculo->setIdVehicle($valuesArray['idVehicle']);
                $vihiculo->setIdUser($valuesArray["idUser"]);

                $vihiculo->setTitle($valuesArray["title"]);

                $vihiculo->setDescription($valuesArray['description']);
                $vihiculo->setYear($valuesArray['year']);
                $vihiculo->setPrice($valuesArray['price']);
                $vihiculo->setCity($valuesArray['city']);
                $vihiculo->setUrl($valuesArray['url']);
                array_push($vihiculoList, $vihiculo);
              
            }

            return $vihiculoList;
        } catch (Exception $ex) {
            throw new Exception('Error al cargar la base de datos');
        }
    }
    public function GetAllPrice($min,$max)
    {
        $vihiculoList= array();
        
        try {
           
           
            $query = "SELECT * FROM .$this->tableName WHERE $this->tableName.price BETWEEN $min AND $max";


            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $vihiculo = new Vehicle();
                $vihiculo->setIdVehicle($valuesArray['idVehicle']);
                $vihiculo->setIdUser($valuesArray["idUser"]);

                $vihiculo->setTitle($valuesArray["title"]);

                $vihiculo->setDescription($valuesArray['description']);
                $vihiculo->setYear($valuesArray['year']);
                $vihiculo->setPrice($valuesArray['price']);
                $vihiculo->setCity($valuesArray['city']);
                $vihiculo->setUrl($valuesArray['url']);
                array_push($vihiculoList, $vihiculo);
              
            }

            return $vihiculoList;
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
