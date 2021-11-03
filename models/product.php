<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products");
        return parent::select($sql);
    }
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products,protypes WHERE products.type_id = protypes.type_id AND products.id = ?");
        $sql->bind_param("i", $id);
        return parent::select($sql);
    }
    public function getNew10Products()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `id` DESC LIMIT 0,10");
        return parent::select($sql);
    }
    public function searchProducts($keyword)
    {
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE `name` LIKE ?");
        $search = "%{$keyword}%";
        $sql->bind_param('s', $search);
        return parent::select($sql);
    }
}
