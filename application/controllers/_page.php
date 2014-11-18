<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_page extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }
   public function getFunction()
    {

if ( !isset($_GET['term']) )
    exit;
    $term = $_REQUEST['term'];
        $data = array();
        $rows = $this->model_page->getData($term);
            foreach( $rows as $row )
            {
                $data[] = array( 
                    'value' => $row->fio);   // here i am taking name as value so it will display name in text field, you can change it as per your choice.
            }
        echo json_encode($data);
        flush();

}
}
