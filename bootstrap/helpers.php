<?php


if (! function_exists('uploadImage')) {

  function uploadImage($width, $height, $key = 'image') {

      if (request()->hasFile($key))
      {
          $photo             = request()->file($key);
          $imageName         = time() . '_' . rand(00, 99);
          $imageExtension    = '.' . $photo->getClientOriginalExtension();
          $imagename_full    = $imageName  . $imageExtension;
          $location_full      = storage_path('app/public/'. $imagename_full);
          Image::make($photo)->resizeCanvas( $width, $height )->save($location_full);
          return $imagename_full;
      }

      $imagename_full = null;
  }

}


