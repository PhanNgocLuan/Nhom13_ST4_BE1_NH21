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
    //hien Thi theo loai san pham
    public function getProductByType($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        return parent::select($sql);
    }
    //Phân Trang
    public function get3ProductByType($type_id,$page,$perPage)
    {
        // Tính số thứ tự trang bắt đầu 
    	$firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? LIMIT ? , ? ");
        $sql->bind_param("iii", $type_id, $firstLink, $perPage);
        return parent::select($sql);
    }
    //phương thức phân trang
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
}

