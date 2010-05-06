<?php

  function save_image_chuck($image) {
    

  }

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
  $cropped_height = 205;
  $crop_start_x = 60;
  $crop_start_y = 140;

  $sky_block1_x = 380;
  $sky_block1_y = 70;
  $sky_block1_width = 25;
  $sky_block1_height = 25;

  $sky_block2_x = 600;
  $sky_block2_y = 68;
  $sky_block2_width = 67;
  $sky_block2_height = 67;

  $sky_block3_x = 600;
  $sky_block3_y = 134;
  $sky_block3_width = 67;
  $sky_block3_height = 67;

  save_image($url,$file);
  //`convert -blur 1 $file $file`;


  $source_image = imagecreatefromjpeg($file);
  $cropped_image = imagecreatetruecolor($cropped_width, $cropped_height);


  //imagecopy ( resource $dst_im , resource $src_im , int $dst_x , int $dst_y , int $src_x , int $src_y , int $src_w , int $src_h )
  imagecopy($cropped_image, $source_image, 0, 0, $crop_start_x, $crop_start_y, $cropped_width, $cropped_height);

  //Grab a chunk of sky to match the background
  $sky_piece1 =  imagecreatetruecolor($sky_block1_width, $sky_block1_height);
  $sky_piece2 =  imagecreatetruecolor($sky_block2_width, $sky_block2_height);
  $sky_piece3 =  imagecreatetruecolor($sky_block3_width, $sky_block3_height);

  imagecopy($sky_piece1, $cropped_image, 0, 0, $sky_block1_x, $sky_block1_y, $sky_block1_width, $sky_block1_height);
  imagecopy($sky_piece2, $cropped_image, 0, 0, $sky_block2_x, $sky_block2_y, $sky_block2_width, $sky_block2_height);
  imagecopy($sky_piece3, $cropped_image, 0, 0, $sky_block3_x, $sky_block3_y, $sky_block3_width, $sky_block3_height);
  

  imagejpeg($sky_piece1, "./tmp/sky1.jpg");
  imagejpeg($sky_piece2, "./tmp/sky2.jpg");
  imagejpeg($sky_piece3, "./tmp/sky3.jpg");

  //use imagemagick reduce to one average color pixel and qrite that pixel value to file in form rgb(rr,gg,bb)
  `convert tmp/sky1.jpg -filter box -resize 1x1! -format "%[pixel:u]" info: > ./tmp/sky1_color.txt`;
  `convert tmp/sky2.jpg -filter box -resize 1x1! -format "%[pixel:u]" info: > ./tmp/sky2_color.txt`;
  `convert tmp/sky3.jpg -filter box -resize 1x1! -format "%[pixel:u]" info: > ./tmp/sky3_color.txt`;

  //Write cropped image to file
  $file = './tmp/cropped_peggy.jpg';
  imagejpeg($cropped_image, $file, 100);


  imagedestroy($source_image);
  imagedestroy($sky_piece1);
  imagedestroy($sky_piece2);
  imagedestroy($sky_piece3);
  imagedestroy($cropped_image);




  
?>