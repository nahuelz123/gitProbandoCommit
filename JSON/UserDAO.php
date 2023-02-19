<?php
    namespace JSON;

    use Models\User as User;

    class UserDAO 
    {
        public function __construct()
        {
          $this->filename = dirname(__DIR__)."/Data/Users.json";
          $this->maxId = 0;
        }
   
        private $userList = array();


        public function Add(User $user)
        {
            $this->RetrieveData();
            $this->maxId++;
            $user->setIdUser($this->maxId);
            array_push($this->userList, $user);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->userList;
        }
        public function GetByEmail($email)
        {
          $this->RetrieveData();
          foreach ($this->userList as $user) {
            if (strcmp($user->getEmail(), $email) == 0) {
              return $user;
            }
          }
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->userList as $user)
            {
                $valuesArray["idUser"] = $user->getIdUser();
                $valuesArray["name"] = $user->getName();
                $valuesArray["lastName"] = $user->getLastName();
                $valuesArray["email"] = $user->getEmail();
                $valuesArray["password"] = $user->getPassword();
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents($this->filename, $jsonContent);
        }
     
        private function RetrieveData()
        {
            $this->userList = array();
            if(file_exists($this->filename))
            {
                $jsonContent = file_get_contents($this->filename);

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $user = new User();
                    $user->setIdUser($valuesArray["idUser"]);
                    $user->setName($valuesArray["name"]);
                    $user->setLastName($valuesArray["lastName"]);
                    $user->setEmail($valuesArray["email"]);
                    $user->setPassword($valuesArray["password"]);

                    array_push($this->userList, $user);

                    if($user->getIdUser()>$this->maxId){
                        $this->maxId = $user->getIdUser();
                    }
                }
            }
        }
    }
?>