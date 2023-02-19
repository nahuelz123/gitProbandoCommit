<?php

namespace Controllers;

use DAO\VehicleDAO as VehicleDAO;
use Models\Vehicle as Vehicle;
use \Exception as Exception;
use DAO\Connection as Connection;
use DAO\RealEstateDAO as RealEstateDAO;
use Models\RealEstate as RealEstate;


class StoreController
{
    private $productoDAO;


    public function __construct()
    {
        $this->vehiculoDAO = new VehicleDAO();
        $this->realEstateDAO = new RealEstateDAO();
    }
    public function validarSession()
    {

        if (!isset($_SESSION['idUser'])) {
           // header("location: ../login.php");
                require_once(VIEWS_PATH . "login.php");
        }
    }
    public function ShowAddViewEstate($alert = "")
    {
       $this->validarSession();
        if (isset($_SESSION["idUser"])) {
            require_once(VIEWS_PATH . "add-new-real-estate.php");
        } else {
            $alert = [
                "type" => "error",
                "text" => "debe iniciar sesion"
            ];
            require_once(VIEWS_PATH . "login.php");
        }
    }
    public function ShowAddVehiculos($alert = "")
    {
        $this->validarSession();
        if (isset($_SESSION["idUser"])) {
            require_once(VIEWS_PATH . "add-new-vehicle.php");
        } else {
            $alert = [
                "type" => "error",
                "text" => "debe iniciar sesion"
            ];
            require_once(VIEWS_PATH . "login.php");
        }
    }

    public function ShowPriceView($min, $max)
    {
        $this->validarSession();
        $vehiculoList = array();
        $estateList = array();
        try {

            $estateList = $this->realEstateDAO->GetAllPrice($min, $max);
            $vehiculoList = $this->vehiculoDAO->GetAllPrice($min, $max);


            require_once(VIEWS_PATH . "shop.php");
        } catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => $e->getMessage()
            ];
            require_once(VIEWS_PATH . "shop.php");
        }
    }
    public function ShowBedrooms($min, $max)
    {

        $this->validarSession();
        $estateList = array();
        try {

            $estateList = $this->realEstateDAO->GetAllBedrooms($min, $max);

            require_once(VIEWS_PATH . "shop.php");
        } catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => $e->getMessage()
            ];
            require_once(VIEWS_PATH . "shop.php");
        }
    }
    public function ShowTvView($alert = "")
    {
        $this->validarSession();
        try {
            $alert = [
                "type" => "success",
                "text" => 'producto no disponible'
            ];
            require_once(VIEWS_PATH . "shop.php");
        } catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => $e->getMessage()
            ];
        }
    }
    public function ShowAvionView($alert = "")
    {
        $this->validarSession();
        try {
            $alert = [
                "type" => "success",
                "text" => 'producto no disponible'
            ];
            require_once(VIEWS_PATH . "shop.php");
        } catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => $e->getMessage()
            ];
        }
    }

    public function ShowHomeView($alert = "")
    {
        $this->validarSession();
        $estateList = array();
        try {

            $estateList = $this->realEstateDAO->GetAllStock();


            require_once(VIEWS_PATH . "shop.php");
        } catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => $e->getMessage()
            ];
        }
    }

    public function ShowVehicleView($alert = "")
    {
        $this->validarSession();
        $vehiculoList = array();
        try {

            $vehiculoList = $this->vehiculoDAO->GetAllStock();


            require_once(VIEWS_PATH . "shop.php");
        } catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => $e->getMessage()
            ];
        }
    }

    public function ShowListView($alert = "")
    {

        $this->validarSession();
        $vehiculoList = array();
        $estateList = array();
        try {

            $estateList = $this->realEstateDAO->GetAllStock();
            $vehiculoList = $this->vehiculoDAO->GetAllStock();


            require_once(VIEWS_PATH . "shop.php");
        } catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => $e->getMessage()
            ];
            require_once(VIEWS_PATH . "shop.php");
        }
    }



    public function AddRealEstate($title, $description, $bedrooms, $parking, $price, $city, $foto)
    {

        $this->validarSession();
        try {

            $directorio = "img/";
            $url = $directorio . $foto['name'];
            // $tipoArchivo= strtolower(pathinfo($url,PATHINFO_EXTENSION));
            //validar que es imagen 
            $size = getimagesize($foto['tmp_name']);
            // var_dump($size);
            if ($size != false) {
                if (move_uploaded_file($foto['tmp_name'], $url)) {
                    $estate = new RealEstate();
                    $estate->setIdUser($_SESSION['idUser']);
                    $estate->setTitle($title);
                    $estate->setDescription($description);
                    $estate->setBedrooms($bedrooms);
                    $estate->setParking($parking);
                    $estate->setPrice($price);
                    $estate->setCity($city);
                    $estate->setUrl($url);
                    $this->realEstateDAO->Add($estate);
                    $alert = [
                        "type" => "success",
                        "text" => 'estate subido con exito'
                    ];

                    $this->ShowListView($alert);
                } else {
                    $alert = [
                        "type" => "error",
                        "text" => 'ocurrio un error al guardar la imagen'
                    ];
                    $this->ShowAddView($alert);
                }
            } else {
                $alert = [
                    "type" => "error",
                    "text" => 'no se subio una imagen'
                ];
                $this->ShowAddView($alert);
            }
        } catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => 'Hubo un error al agregar el estate'
            ];
            $this->ShowAddView($alert);
        }
    }



    public function AddVehicle($title, $description, $year, $price, $city, $foto)
    {
        $this->validarSession();
        try {

            $directorio = "img/";
            $url = $directorio . $foto['name'];
            // $tipoArchivo= strtolower(pathinfo($url,PATHINFO_EXTENSION));
            //validar que es imagen 
            $size = getimagesize($foto['tmp_name']);
            // var_dump($size);
            if ($size != false) {
                if (move_uploaded_file($foto['tmp_name'], $url)) {
                    $vehiculo = new Vehicle();
                    $vehiculo->setIdUser($_SESSION['idUser']);
                    $vehiculo->setTitle($title);
                    $vehiculo->setDescription($description);
                    $vehiculo->setYear($year);
                    $vehiculo->setPrice($price);
                    $vehiculo->setCity($city);
                    $vehiculo->setUrl($url);
                    $this->vehiculoDAO->Add($vehiculo);
                    $alert = [
                        "type" => "success",
                        "text" => 'estate subido con exito'
                    ];

                    $this->ShowListView($alert);
                } else {
                    $alert = [
                        "type" => "error",
                        "text" => 'ocurrio un error al guardar la imagen'
                    ];
                    $this->ShowAddView($alert);
                }
            } else {
                $alert = [
                    "type" => "error",
                    "text" => 'no se subio una imagen'
                ];
                $this->ShowAddView($alert);
            }
        } catch (Exception $e) {
            $alert = [
                "type" => "error",
                "text" => 'Hubo un error al agregar el vehiculo'
            ];
            $this->ShowListView($alert);
        }
    }

   
}
