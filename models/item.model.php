<?php

class Item {

    public $id;
    public $pName;
    public $description;
    public $category;
    public $week_price;
    public $month_price;
    public $three_month_price;
    public $stock;
    public $asset_number;

    public function __construct($id, $pName, $description, $category, $week_price, $month_price, $three_month_price, $stock, $asset_number) {
        $this->id = $id;
        $this->pName = $pName;
        $this->description = $description;
        $this->category = $category;
        $this->week_price = $week_price;
        $this->month_price = $month_price;
        $this->three_month_price = $three_month_price;
        $this->stock = $stock;
        $this->asset_number = $asset_number;
    }


}

