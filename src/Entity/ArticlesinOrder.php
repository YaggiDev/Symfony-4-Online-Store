<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Orders;
use App\Entity\Artykuly;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesinOrderRepository")
 */
class ArticlesinOrder
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Orders")
     * @ORM\JoinColumn(name="order_id",referencedColumnName="id")
     */
    private $order_id;

    /**
     * @ORM\ManyToOne(targetEntity="Artykuly")
     * @ORM\JoinColumn(name="article_id",referencedColumnName="id")
     */
    private $article_id;
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->article_id;
    }

    /**
     * @param mixed $article_id
     */
    public function setArticleId($article_id): void
    {
        $this->article_id = $article_id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id): void
    {
        $this->order_id = $order_id;
    }

}
