<?php

namespace CodeCommerce;


class Cart
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price)
    {
        $this->items[$id] = [
                'qtde' => isset($this->items[$id]['qtde']) ? ++$this->items[$id]['qtde'] : 1,
                'name' => $name,
                'price' => $price
        ];
    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function updateQuantity($productID, $quantity)
    {
        if (key_exists($productID, $this->items))
            $this->items[$productID]['qtde'] = (int) $quantity;
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item)
            $total += ($item['qtde']*$item['price']);

        return $total;
    }
}