<?php

class Employes
{

    public $bdd;
    public $name;
    public $firstname;
    public $email;
    public $phone;
    public $password;
    public $statut;


    public function getBdd()
    {
        return $this->bdd;
    }


    public function setBdd($bdd)
    {
        $this->bdd = $bdd;
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


    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
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

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
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

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
        return $this;
    }



    public function insert()
    {
        $insert = "INSERT INTO employes 
    (name, firstname, email, phone, password, statut)
    VALUES (:name, :firstname, :email, :phone, :password, :statut)";

        $stmt = $this->bdd->prepare($insert);
        return $stmt->execute(['name' => $this->name, 'firstname' => $this->firstname, 'email' => $this->email, 'phone' => $this->phone, 'password' => $this->password, 'statut' => $this->statut]);
    }

    public function update()
    {
        $update = "UPDATE employes SET 
        name=:name,
        firstname=:firstname,
        email=:email,
        phone=:phone,
        password=:password,
        statut=:statut, 
        WHERE id=:id";


        $stmt =  $this->bdd->prepare($update);
        $result2 = $stmt->execute([':name' => $this->name, ':firstname' =>  $this->firstname, ':email' => $this->email, ':phone' =>  $this->phone, ':password' => $this->password, 'statut' =>  $this->statut, ':id' => $this->id]);
    }
}
