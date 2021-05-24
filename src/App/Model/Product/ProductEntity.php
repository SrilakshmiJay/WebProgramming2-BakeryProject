<?php
namespace App\Model\Product;
use PDO;
class ProductEntity{
    private $pdo;
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function all(){
        $statement = $this->pdo->query("SELECT * FROM product");
        $rows = $statement->fetchAll(PDO::FETCH_CLASS,Product::class);
        return $rows;
    }
    public function create($product){
        $statement = $this->pdo->prepare("INSERT INTO product VALUES(null,:firstName,:lastName,:phoneNumber,:orderDate,:bananaWalnutBread,:chocolateCookie,:rumRaisinCupcake,:darkChocolateBrownie)");
        $statement->execute([
            "firstName" => $product->getFirstName(),
            "lastName" => $product->getLastName(),
            "phoneNumber" => $product->getPhoneNumber(),
            "orderDate" => $product->getOrderDate(),
            "bananaWalnutBread" => $product->getBananaWalnutBread(),
            "chocolateCookie" => $product->getChocolateCookie(),
            "rumRaisinCupcake" => $product->getRumRaisinCupcake(),
            "darkChocolateBrownie" => $product->getDarkChocolateBrownie()
        ]);
        return $statement->rowCount();
    }
    public function read($id){
        $statement = $this->pdo->prepare("SELECT * FROM product WHERE id=:id");
        $statement->execute(["id"=>$id]);
      
        return $statement->fetchObject(Product::class);
    }
    public function save($product){
        $statement = $this->pdo->prepare("UPDATE product SET firstName=:firstName,lastName=:lastName,phoneNumber=:phoneNumber,orderDate=:orderDate,bananaWalnutBread=:bananaWalnutBread,chocolateCookie=:chocolateCookie,rumRaisinCupcake=:rumRaisinCupcake,darkChocolateBrownie=:darkChocolateBrownie WHERE id=:id");
        $statement->execute([
            "firstName" => $product->getFirstName(),
            "lastName" => $product->getLastName(),
            "phoneNumber" => $product->getPhoneNumber(),
            "orderDate" => $product->getOrderDate(),
            "bananaWalnutBread" => $product->getBananaWalnutBread(),
            "chocolateCookie" => $product->getChocolateCookie(),
            "rumRaisinCupcake" => $product->getRumRaisinCupcake(),
            "darkChocolateBrownie" => $product->getDarkChocolateBrownie(),
            "id" => $product->getId()
        ]);
        return $statement->rowCount();
    }
    public function delete($id){
        $statement = $this->pdo->prepare("DELETE FROM product WHERE id=:id");
        $statement->execute(["id"=>$id]);
        return $statement->rowCount();
    }
}