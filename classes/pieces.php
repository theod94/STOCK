<?php

class Pieces
{

    public $bdd;
    public $reference;
    public $fabriquant;
    public $image;
    public $name;
    public $allee;
    public $etage;
    public $prix;


    public function getBdd()
    {
        return $this->bdd;
    }

    public function setBdd($bdd)
    {
        $this->bdd = $bdd;
        return $this;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    public function getFabriquant()
    {
        return $this->fabriquant;
    }

    public function setFabriquant($fabriquant)
    {
        $this->fabriquant = $fabriquant;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
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

    public function getAllee()
    {
        return $this->allee;
    }

    public function setAllee($allee)
    {
        $this->allee = $allee;
        return $this;
    }

    public function getEtage()
    {
        return $this->etage;
    }

    public function setEtage($etage)
    {
        $this->etage = $etage;
        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function update()
    {
        $update = "UPDATE pieces SET 
        reference=:reference,
        fabriquant=:fabriquant,
        name=:name,
        allee=:allee,
        etage=:etage,
        prix=:prix
        WHERE id=:id";

        

        $stmt =  $this->bdd->prepare($update);

        $result = $stmt->execute([':reference' => $this->reference, ':fabriquant' =>  $this->fabriquant, ':name' => $this->name, ':allee' =>  $this->allee, ':etage' => $this->etage, ':prix' =>  $this->prix, ':id' => $this->id]);
        
        
    } 
}