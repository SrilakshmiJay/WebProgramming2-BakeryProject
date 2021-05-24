<?php
namespace App\Controller;

use App\Model\Product\Product;
use App\Model\Product\ProductEntity;
use App\Helpers\SQLiteDatabaseConnection;
use App\Helpers\Filters;

class ProductController{
    private $twig;
    private $productEntity;

    public function __construct($twig){
        $this->twig = $twig;
        $pdo = SQLiteDatabaseConnection::connect();
        $this->productEntity = new ProductEntity($pdo);
    }
   

    public function index(){
        $products = $this->productEntity->all();
        return $this->twig->render("product/index.twig",["products"=>$products]);
    }
    public function add(){
        return $this->twig->render("product/add_form.twig");
    }
    public function show(){
        $products = $this->productEntity->all();
        return $this->twig->render("product/recent.twig",["products"=>$products]);
    }
    public function create(){
        $data = filter_input_array(INPUT_POST,[
            "firstName" => Filters::required(),
            "lastName" => Filters::required(),
            "phoneNumber" => Filters::phoneNumber(),
            "orderDate" => Filters::required(),
            "bananaWalnutBread" => Filters::positiveNumber(),
            "chocolateCookie" => Filters::positiveNumber(),
            "rumRaisinCupcake" => Filters::positiveNumber(),
            "darkChocolateBrownie" => Filters::positiveNumber()
        ]);
        $product = new Product($data);
        $rowCount = $this->productEntity->create($product);
        if($rowCount == 1){
            return $this->twig->render("product/created.twig",["product"=>$product]);
        }else{
            return "Problem in making the order";
        }
    }
    public function read(){
        $data = filter_input_array(INPUT_GET,[
            "id" => Filters::positiveNumber()
        ]);
        if($data["id"]){
            $contact = $this->productEntity->read($data["id"]);
            return $this->twig->render("product/read.twig", ["product"=>$product]);
        }else{
            return "Id not provided :(";
        }
    }
    public function update(){
        $data = filter_input_array(INPUT_GET,[
            "id" => Filters::positiveNumber()
        ]);
        if($data["id"]){
            $product = $this->productEntity->read($data["id"]);
            return $this->twig->render("product/update_form.twig", ["product"=>$product]);
        }else{
            return "Id not provided :(";
        }
    }
    public function save(){
        $data = filter_input_array(INPUT_POST,[
            "firstName" => Filters::required(),
            "lastName" => Filters::required(),
            "phoneNumber" => Filters::phoneNumber(),
            "orderDate" => Filters::required(),
            "id" => Filters::positiveNumber(),
            "bananaWalnutBread" => Filters::positiveNumber(),
            "chocolateCookie" => Filters::positiveNumber(),
            "rumRaisinCupcake" => Filters::positiveNumber(),
            "darkChocolateBrownie" => Filters::positiveNumber()
        ]);
        $product= new Product($data);
        $rowCount = $this->productEntity->save($product);
        if($rowCount == 1){
            return $this->twig->render("product/saved.twig",["product"=>$product]);
        }else{
            return "Problem in making the order";
        }
    }
    public function delete(){
        $data = filter_input_array(INPUT_GET,[
            "id" => Filters::positiveNumber()
        ]);
        if($data["id"]){
            $rowCount = $this->productEntity->delete($data["id"]);
            return $this->twig->render("product/delete.twig");
        }else{
            return "Id not provided :(";
        }


}
}