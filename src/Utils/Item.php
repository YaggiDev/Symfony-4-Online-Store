<?php


namespace App\Utils;
use App\Utils\SearchInterface;

class Item implements SearchInterface
{
    private $name;
    private $price;
    private $quantity;
    public function __construct(string $name, int $price, int $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function AddItem()
    {
        if(isset($_SESSION['basket']))
        {
            $index = $this->SearchByName($_SESSION['basket'],$this->name);
            if($index)
            {
                $index = $index -1;
                $quantity = $_SESSION['basket'][$index]['quantity'];
                $quantity = $quantity + $this->quantity;
                $_SESSION['basket'][$index]['quantity'] = $quantity;
            }
            else
            {

                array_push($_SESSION['basket'],array(
                    'name' => $this->name,
                    'price' => $this->price,
                    'quantity' => $this->quantity
                ));
            }
        }
        else
        {
            $_SESSION['basket'] = array();
            array_push($_SESSION['basket'], array(
                'name' => $this->name,
                'price' => $this->price,
                'quantity' => $this->quantity
                ));
        }

    }
    public function RemoveItem()
    {
        $index = $this->SearchByName($_SESSION['basket'], $this->name) - 1;
        array_splice($_SESSION['basket'],$index,1);
    }
    public function getName() :string
    {
        return $this->name;
    }
    public function getPrice() :int
    {
        return $this->price;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }
    public function __toString()
    {
        return (string) $this->name;
    }

    public function SearchByName($array, $name) ///Search array by name , returns index value
    {
        $counter = 0;
        foreach ($array as $value)
        {

            if ($value['name']== $name)
            {
                return $counter+1;
            }
            $counter++;
        }
        return FALSE;
    }
}