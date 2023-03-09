<?php

namespace Shop\Action;

use Shop\Entity\Product;
use Shop\Factory\ProductRepositoryFactory;

class UpdateProductAction
{
    public function handle(): void
    {
      $id= filter_input(INPUT_POST, 'id');
      $name= filter_input(INPUT_POST, 'name');
      $description= filter_input(INPUT_POST, 'description');
      $price= filter_input(INPUT_POST, 'price');
      if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
          
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
      }
      if(empty($description)){
        $message='Description is required';
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=' . urlencode($message));
       exit;
      }
      else if(empty($name)){
        $message='name is required';
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=' . urlencode($message));
        exit;
      } else if(empty($price)){
        $message='price is required';
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=' . urlencode($message));
        exit;
      } else{
        $repository = ProductRepositoryFactory::make();
        $product=  $repository->find($id);
        if(!isset($image)){
          $image=$product->image();
        }
        $product->update($name,$description,$price,$image);
        $repository->update($product);
        header('Location: /manage-products');
      }

       
    }
}
