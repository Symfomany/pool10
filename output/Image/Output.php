<?php

namespace Image;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;
use  \Upload\Storage\FileSystem;


/**
 *
 */
class Output
{

  public function render($image)
  {
    // create an image manager instance with favored driver
    $manager = new ImageManager(array('driver' => 'gd'));

    $image = $manager->make($image)->resize(null, 200, function ($constraint) {
      $constraint->aspectRatio();
    })->greyscale();
    $image->save('image/img-thumbs.jpg');
    return $image;
  }


  /**
  *
  */
  public function upload($file){

    $storage = new FileSystem('image/');
    $file = new \Upload\File('photo', $storage); //photo : name de votre input

    $file->addValidations(array(
      new \Upload\Validation\Size('10M')
    ));

    $data = array(
      'name'       => $file->getNameWithExtension(),
      'extension'  => $file->getExtension(),
      'mime'       => $file->getMimetype(),
      'size'       => $file->getSize(),
      'md5'        => $file->getMd5(),
      'dimensions' => $file->getDimensions()
    );

    // Try to upload file
    try {
      $file->upload();

      return $data;
    } catch (\Exception $e) {
      $errors = $file->getErrors();
      return $errors;
    }

  }



}









 ?>
