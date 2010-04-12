<?php

  function save_image($source_url, $save_file) {
    $ch = curl_init ($source_url); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1); 
    $rawdata=curl_exec ($ch); 
    curl_close ($ch);

    $fp = fopen($save_file,'w'); 
    fwrite($fp, $rawdata); 
    fclose($fp);
  }
  
  $url='http://cams.halifaxwebcam.ca/cam10/current.jpg';
  $file = 'tmp/peggy.jpg';
  $cropped_width = 800;
  $cropped_height = 200;
  $crop_start_x = 60;
  $crop_start_y = 140;

  $sky_block_x = 600;
  $sky_block_y = 0;
  $sky_block_width = 50;
  $sky_block_height = 50;

  save_image($url,$file);
  //`convert -blur 1 $file $file`;


  $source_image = imagecreatefromjpeg($file);
  $cropped_image = imagecreatetruecolor($cropped_width, $cropped_height);


  //imagecopy ( resource $dst_im , resource $src_im , int $dst_x , int $dst_y , int $src_x , int $src_y , int $src_w , int $src_h )
  imagecopy($cropped_image, $source_image, 0, 0, $crop_start_x, $crop_start_y, $cropped_width, $cropped_height);

  //Grab a chunk of sky to match the background
  $sky_piece =  imagecreatetruecolor($sky_block_width, $sky_block_height);
  imagecopy($sky_piece, $cropped_image, 0, 0, $sky_block_x, $sky_block_y, $sky_block_width, $sky_block_height);
  imagejpeg($sky_piece, "./tmp/sky.jpg");
  `convert tmp/sky.jpg -filter box -resize 1x1! -format "%[pixel:u]" info: > ./tmp/sky_color.txt`;

  header('Content-Type: image/jpeg');
  imagejpeg($cropped_image, NULL, 100);
  
  imagedestroy($source_image);
  imagedestroy($sky_piece);
  imagedestroy($cropped_image);




  
?>