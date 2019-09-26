<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $sum;

    /**
     * Many Orders belongs to one User
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="client_id",referencedColumnName="id")
     */
    private $id_client;

    //Getters and Setter
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getSum()
    {
        return $this->sum;
    }
    public function setSum($sum)
    {
        $this->sum = $sum;
    }

    public function getIdClient()
    {
        return $this->id_client;
    }
    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
    }
}
