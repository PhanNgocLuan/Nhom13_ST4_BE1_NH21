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
    public function getNew10ProductsTypeId1()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id` = 1 ORDER BY `id` DESC LIMIT 0,10");
        return parent::select($sql);
    }
    public function getNew10ProductsTypeId2()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id` = 2 ORDER BY `id` DESC LIMIT 0,10");
        return parent::select($sql);
    }
    public function getNew10ProductsTypeId3()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id` = 3 ORDER BY `id` DESC LIMIT 0,10");
        return parent::select($sql);
    }
    public function getNew10ProductsTypeId4()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id` = 4 ORDER BY `id` DESC LIMIT 0,10");
        return parent::select($sql);
    }
    public function getNew10ProductsTypeId5()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id` = 5 ORDER BY `id` DESC LIMIT 0,10");
        return parent::select($sql);
    }
    public function searchProducts($keyword)
    {
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE `name` LIKE ? ");
        $search = "%{$keyword}%";
        $sql->bind_param('s', $search);
        return parent::select($sql);
    }
    public function search3Products($keyword,$page,$perPage)
    {
        // T??nh s??? th??? t??? trang b???t ?????u 
    	$firstLink = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM products WHERE `name` LIKE ? LIMIT ? , ? ");
        $search = "%{$keyword}%";
        $sql->bind_param('sii', $search,$firstLink, $perPage);
        return parent::select($sql);
    }
    //hien Thi theo loai san pham
    public function getProductByType($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        return parent::select($sql);
    }
    //Ph??n trang cho type
    public function get3ProductByType($type_id,$page,$perPage)
    {
        // T??nh s??? th??? t??? trang b???t ?????u 
    	$firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? LIMIT ? , ? ");
        $sql->bind_param("iii", $type_id, $firstLink, $perPage);
        return parent::select($sql);
    }
    //ph????ng th???c ph??n trang
    function paginate($url, $total, $perPage)
    {
        $totalLinks = ceil($total/$perPage);
            $link ="";
                for($j=1; $j <= $totalLinks ; $j++)
                {
                    $link = $link."<li><a href='$url&page=$j'> $j </a></li>";
                }
        return $link;
    }
    public function getRelatedProducts($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products, protypes WHERE products.type_id = protypes.type_id AND protypes.type_id = $type_id LIMIT 10");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    function getProductCartById($id){
        $sql = "SELECT * FROM products WHERE id = $id";
        $item = mysqli_query(self::$connection,$sql); 
        $item1 = mysqli_fetch_assoc($item);
        return $item1;
    }
}

