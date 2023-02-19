<?php

namespace DAO;

use \Exception as Exception;
use DAO\IViews as IViews;
use Models\User as User;
use DAO\Connection as Connection;

class UserDAO
{


    private $connection;
    private $tableName = "users";


    public function Add($user)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (name,email,password ) VALUES (:name,:email,:password);";

            $valuesArray["name"] = $user->getName();

            $valuesArray["email"] = $user->getEmail();
            $valuesArray["password"] = $user->getPassword();

            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $valuesArray);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetByEmail($email)
    {
        $user = 0;
        try {


            $query = "SELECT * FROM .$this->tableName WHERE email = '$email'";;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $user = new User();
                $user->setIdUser($valuesArray["idUser"]);
                $user->setName($valuesArray["name"]);
                $user->setEmail($valuesArray['email']);
                $user->setPassword($valuesArray['password']);
            }

            return $user;
        } catch (Exception $ex) {
            throw new Exception('Error al cargar la base de datos');
        }
    }

    ///para realizar la compra 
    public function Modify($CompanyName, $BusinessName, $CompanyAdress, $id_company, $telephone, $email, $web, $cuil, $password)
    {

        $this->connection = Connection::GetInstance();

        $consulta = "UPDATE company
        SET CompanyName = '$CompanyName', BusinessName = '$BusinessName', CompanyAdress = '$CompanyAdress',cuil = '$cuil', telephone = $telephone, email = '$email', web = '$web', password ='$password'
        WHERE id_company = '$id_company'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    }
    //para eliminar el producto 
    public function delete($CompanyName)
    {

        //$this->connection = Connection::GetInstance();

        $consulta = "DELETE From company WHERE CompanyName = '$CompanyName'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    }
}
