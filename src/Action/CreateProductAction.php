<?php

namespace Shop\Action;

use Shop\Entity\Product;
use Shop\Factory\ProductRepositoryFactory;

class CreateProductAction
{
    public function handle(): void
    {
       
            $file = $_FILES['image'];
            $fileName = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileError = $_FILES['image']['error'];
            $fileType = $_FILES['image']['type'];
            $fileExt = strtolower(end(explode('.', $fileName)));
            $allowed = array('jpg', 'jpeg', 'png');
        
            if(in_array($fileExt, $allowed)){
                $uploadDirectory = __DIR__ . '/../../public/uploads/';
            
            $fileNameNew = uniqid('', true).".".$fileExt;
            $fileDestination =  $uploadDirectory.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            echo "File uploaded successfully.";
                 
            }else{
                echo "You cannot upload files of this type.";
            }
        
         $image = 'uploads/'.$fileNameNew;
        $product = new Product(
            filter_input(INPUT_POST, 'name'),
            filter_input(INPUT_POST, 'description'),
            filter_input(INPUT_POST, 'price'),
            $image
        );

        $repository = ProductRepositoryFactory::make();
        $repository->store($product);

        header('Location: /manage-products');
    }
}
