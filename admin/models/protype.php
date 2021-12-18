<?php
class Protype extends Db{
    public function getAllProtype()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        return parent::select($sql);
    }
    public function addProtype($type_name)
    {
        $sql = self::$connection->prepare("INSERT INTO `protypes`(`type_name`) VALUES (?)");
        $sql->bind_param("s", $type_name);
        return $sql->execute(); //return an object
    }
    //
    public function delProtype($type_id){
        $sql = self::$connection->prepare("DELETE FROM protypes WHERE type_id = ?");
        $sql->bind_param("i",$type_id);
        return $sql->execute(); //return an object
    }
    //ham lay so luong san pham cua 1 manu 
    function countToTalProductOfAType($type_id){
        $sql = "SELECT COUNT(products.id) AS soLuongSanPham FROM protypes,products WHERE protypes.type_id = products.type_id AND protypes.type_id = $type_id";
        $item = mysqli_query(self::$connection,$sql);
        $items1 = mysqli_fetch_assoc($item);
        return $items1;
    }
    //
    public function updateProtype($type_id,$type_name)
    {
        $sql = self::$connection->prepare("UPDATE protypes SET type_name = '$type_name' WHERE type_id = '$type_id'");
        return $sql->execute(); //return an object
    }
    public function getProtypeById($type_id)
    {
        $sql = "SELECT * FROM protypes WHERE type_id = $type_id";
        $item = mysqli_query(self::$connection,$sql); 
        $item1 = mysqli_fetch_assoc($item);
        return $item1;
    }
    function countToTalProtype(){
        $sql = "SELECT COUNT(`type_id`) AS count_protype FROM protypes";
        $item = mysqli_query(self::$connection,$sql);
        $items1 = mysqli_fetch_assoc($item);
        return $items1;
    }
}