<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | Global
  |--------------------------------------------------------------------------
 */

$config['site_admin'] = "Glorious IT";
$config['site_admin_name'] = "Glorious IT";

$config['category.best.image.view'] = "( File should be .jpg, .png, .gif format and file size should not be more then 5 MB (5120 KB)) ( Best image size 665X500 )";

$config['product.best.image.view'] = "( File should be .jpg, .png, .gif format and file size should not be more then 5 MB (5120 KB)) ( Best image size 2000X2500 )";


$config['site_admin_name'] = "Glorious IT";
$config['pagesize'] = "10";
$config['total_product_images'] = "6";


$config['adminPageOpt'] = array($config['pagesize'], 2 * $config['pagesize'], 3 * $config['pagesize'], 4 * $config['pagesize'], 5 * $config['pagesize']);

//local path
$config['ffmpeg_path'] = 'C:\\user\\bin\\ffmpeg';

//server path
//$config['ffmpeg_path'] = '/usr/bin/ffmpeg'; 
//, 'about' => "About Us Page"
$config['bannersections'] = array('index' => "Index Page", 'product' => "Product Page");

$config['bannersz'] = array('Index Slider' => "1600x350", "Index Uppper 1"=>"555x180", "Index Uppper 2"=>"555x180", "Index Bottom"=>"1150x200", 'Product Top Banner' => '850x360', 'Product Left Banner' => '262x265');

$config['banner_section_positions'] = array(
    'index' => array('Index Slider','Index Uppper 1','Index Uppper 2','Index Bottom'),
    'product' => array('Product Top Banner','Product Left Banner'),
    'about' => array('About Us Banner'),
);





/* End of file account.php */
/* Location: ./application/modules/sitepanel/config/sitepanel.php */