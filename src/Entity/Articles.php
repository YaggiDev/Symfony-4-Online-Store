<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 */
class Articles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
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
        return $this->id;
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
