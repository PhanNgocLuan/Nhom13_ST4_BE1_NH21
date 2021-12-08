<?php
class Manufacture extends Db{
    public function getAllManu()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM manufactures");
        return parent::select($sql);
    }
    public function addManu($manu_name)
    {
        $sql = self::$connection->prepare("INSERT INTO `manufactures`(`manu_name`) VALUES (?)");
        $sql->bind_param("s", $manu_name);
        return $sql->execute(); //return an object
    }
    public function delManu($manu_id){
        $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manu_id` = ?");
        $sql->bind_param("i",$manu_id);
        return $sql->execute(); //return an object
    }
    //ham lay so luong san pham cua 1 manu 
    function countToTalProductOfAManu($manu_id){
        $sql = "SELECT COUNT(products.id) AS soLuongSanPham FROM `manufactures`,products WHERE manufactures.manu_id = products.manu_id AND manufactures.manu_id = $manu_id";
        $item = mysqli_query(self::$connection,$sql);
        $items1 = mysqli_fetch_assoc($item);
        return $items1;
    }
    public function updateManu($manu_id,$manu_name)
    {
        $sql = self::$connection->prepare("UPDATE manufactures SET manu_name = '$manu_name' WHERE manu_id = '$manu_id'");
        return $sql->execute(); //return an object
    }
    public function getManuById($manu_id)
    {
        $sql = "SELECT * FROM manufactures WHERE manu_id = $manu_id";
        $item = mysqli_query(self::$connection,$sql); 
        $item1 = mysqli_fetch_assoc($item);
        return $item1;
    }
}