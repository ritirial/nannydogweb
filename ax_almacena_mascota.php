<?php

  require 'vendor/autoload.php';

  use Parse\ParseClient;
  use Parse\ParseObject;
  use Parse\ParseException;
  use Parse\ParseFile;
  use Parse\ParseUser;  

  session_start();

  ParseClient::initialize('5MUjnjMwd8whYbxWY2pWqAv0QMZ3MHGStiMqRt3y', 'bvdNyubNuQUFWRWZ3cfFSZpm0q6KvHk5gW2xf2D3', 'xoZNO6TOuIV4kLHvIwTam9tYa2xY9prURzhFyASL');
  ParseClient::setServerURL('https://parseapi.back4app.com', '/');

  if(isset($_POST['name']) && isset($_POST['size']) && isset($_POST['gender']) && isset($_POST['breed']) && isset($_POST['about']) && isset($_FILES["testimage1"])){

      $name = $_POST["name"];
      $size = $_POST["size"];
      $gender = $_POST["gender"];
      $breed = $_POST["breed"];
      $about = $_POST["about"];

      //Obtenemos la imagen enviada y la guardamos en Parse
      $pet_image = ParseFile::createFromData(file_get_contents($_FILES['testimage1']['tmp_name']), basename( $_FILES['testimage1']['name']));
      $pet_image->save();

      $pet = new ParseObject("Pets");

      $pet->set("name", $name);
      $pet->set("size", $size);
      $pet->set("gender", $gender);
      $pet->set("breed", $breed);
      $pet->set("about", $about);
      $pet->set("pet_photo", $pet_image);

      $pet->save(); 
  }
  
  $user = ParseUser::getCurrentUser();
  $pet_relation = $user->getRelation("my_pets");
  $pet_relation->add($pet);
  $user->save();

  header("Location: ./pages/mascotas.php");

?>