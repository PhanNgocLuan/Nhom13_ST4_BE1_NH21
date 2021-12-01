<?php
class Product extends Db{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM products,manufactures,protypes
        WHERE products.manu_id=manufactures.manu_id
        AND products.type_id=protypes.type_id");
        return parent::select($sql);
    }
    public function addProduct($name,$manu_id,$type_id,$price,$image,$desc,$feature)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `products`(`name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`) 
        VALUES (?,?,?,?,?,?,?)");
        $sql->bind_param("siiissi", $name,$manu_id,$type_id,$price,$image,$desc,$feature);
        return $sql->execute(); //return an object
    }
    public function delProduct($id){
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `id` = ?");
        $sql->bind_param("i",$id);
        return $sql->execute(); //return an object
    }
    public function getProductById($id)
    {
        $sql = "SELECT * FROM products,protypes,manufactures WHERE products.manu_id = manufactures.manu_id AND products.type_id = protypes.type_id And products.id = $id";
        $item = mysqli_query(self::$connection,$sql); 
        $item1 = mysqli_fetch_assoc($item);
        return $item1;
    }
    public function updateProduct($id,$name,$manu_id,$type_id,$price,$pro_image,$description,$feature)
    {
        $sql = self::$connection->prepare("UPDATE products 
        SET name = '$name',manu_id = '$manu_id',type_id = '$type_id',price = '$price',pro_image = '$pro_image',description = '$description',feature = '$feature' WHERE id = '$id'");
        return $sql->execute(); //return an object
    }
}