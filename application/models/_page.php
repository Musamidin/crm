<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_page extends CI_Model {
    public function __construct()
    {
         parent::__construct();
         // Your own constructor code 

    }
    function getData($term)
    { 
        $sql = $this->db->query('select * from customers_id where fio like "'. mysql_real_escape_string($term) .'%" order by name asc limit 0,10');

 return $sql ->result();
    }
}
