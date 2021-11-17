<?php
class Manufacture extends Db{
    public function getAllManu()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM manufactures");
        return parent::select($sql);
    }
    
}