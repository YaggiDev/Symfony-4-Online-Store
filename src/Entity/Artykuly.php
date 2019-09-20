<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtykulyRepository")
 */
class Artykuly
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_artykulu;
    /**
     * @ORM\Column(type="string", unique=TRUE)
     */
    private $nazwa;
    /**
     * @ORM\Column(type="integer")
     */
    private $cena;
    /**
     * @ORM\Column(type="text")
     */
    private $kategoria;
    /**
     * @ORM\Column(type="text")
     */
    private $opis;


    public function getId(): int
    {
        return $this->id_artykulu;
    }
    public function getNazwa()
    {
        return $this->nazwa;
    }
    public function getKategoria()
    {
        return $this->kategoria;
    }
    public function getCena()
    {
        return $this->cena;
    }
    public function getOpis()
    {
        return $this->opis;
    }

    
}
