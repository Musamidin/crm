<?php if( !defined('BASEPATH')) exit ('No direct script access alolowd');

class Template{
	
   function user_view($data,$name)
   {
   $CI =& get_instance();
   $CI->load->view('header_view.php',$data);
   $CI->load->view($name.'_view.php',$data);
   //$CI->load->view('menu_view.php',$data);
   $CI->load->view('footer_view.php',$data);

   }

}



?>