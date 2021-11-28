<?php
class Protype extends Db{
    public function getAllProtype()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM protypes");
        return parent::select($sql);
    }
}