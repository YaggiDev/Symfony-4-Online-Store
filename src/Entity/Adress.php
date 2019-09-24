<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdressRepository")
 */
class Adress
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string")
     */
    private $city;

    /**
     * @ORM\Column(type="string")
     */
    private $street;
    
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getPostalCode()
    {
        return $this->postalCode;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getStreet()
    {
        return $this->street;
    }
    /*Setters*/
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }
    public function setCity($city)
    {
        $this->city = $city;
    }
    public function setStreet($street)
    {
        $this->street = $street;
    }

}
