<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operator extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    $data['info'] = 'test';
		$name = 'main';
		$this->template->user_view($data,$name);
		
	}
/***************************************************************************************/	
    function suggestions()
	{
	$term = $this->input->post('term',TRUE);
	$name = $this->input->post('name',TRUE);
	//if (strlen($term) < 2) break;

	$rows = $this->all_model->GetAutocomplete(array('keyword' => $term,'name'=>$name));

	$json_array = array();
	foreach ($rows as $row)
		 array_push($json_array, $row->$name);
    
	echo json_encode($json_array);
	}
/***************************************************************************************/	
    function country()
	{
	$term = $this->input->post('term',TRUE);
	$name = $this->input->post('name',TRUE);
	//if (strlen($term) < 2) break;

	$rows = $this->all_model->GetAutocompleteCountry(array('keyword' => $term,'name'=>$name));

	$json_array = array();
	foreach ($rows as $row)
		 array_push($json_array, $row->$name);
    
	echo json_encode($json_array);
	}

/***************************************************************************************/    
	function getcities()
	{
		$str='';
		$countrisid = $this->input->post('countrisid');
		$data['info'] = $this->all_model->get_cities($countrisid);
		$info = array();
		$info = $data['info'];
		foreach($info as $item){	
		$str .= $item['title_ru'].',';
		}
		
		echo $str; 
	}
/***************************************************************************************/
	function fill()
	{
	$term = $this->input->post('term',TRUE);
	$name = $this->input->post('name',TRUE);
   // if(strlen($term) < 2) break;

    $rows = $this->all_model->get_fill(array('keyword' => $term,'name'=>$name));
	
	$json_array = array();
    foreach ($rows as $row)
       array_push($json_array, $row);
     
    echo json_encode($json_array);
	}

/************************************************************************************************/
function checkUser()
{
	$id = $this->input->post('id');
	
	$rows = $this->all_model->get_checkUser($id);
echo $rows;
}


/************************************************************************************************/
function SaveUser()
{

	$fio = $this->input->post('fio');
	$phone = $this->input->post('phone');
	$email = $this->input->post('email');
	$country = $this->input->post('country');
	$city = $this->input->post('city');
	$customer_type = $this->input->post('customer_type');
	$rows = $this->all_model->get_InsertUser(array('fio' =>$fio,'phone' =>$phone,'email' =>$email,'country' =>$country,'city' =>$city,'customer_type' =>$customer_type));

echo $rows;
}

/**************************************************************************/

	function tourPackage()
	{
	if(isset($_POST)){
	
	$pdata = $this->session->set_userdata($_POST);
	$data['sess'] = array(
						'fio'=>$this->session->userdata('fio'),
						'phone'=>$this->session->userdata('phone'),
						'email'=>$this->session->userdata('email'),
						'country'=>$this->session->userdata('country'),
						'city'=>$this->session->userdata('city'),
						'customer_type'=>$this->session->userdata('customer_type'),
						'datetime'=>$this->session->userdata('datetime')
						);
	$data['activityTourPackages'] = $this->all_model->get_data('Spravochnik_Active');
	$data['tourOperator'] = $this->all_model->get_data('Spravochnik_tour_operator');
	$data['physicalActivity'] = $this->all_model->get_data('Spravochnik_phisical_Activity');
	$data['typeOfTourPackage'] = $this->all_model->get_data('Spravochnik_type_of_tour_package');
    $data['season'] = $this->all_model->get_data('Spravochnik_seasons');
	$name = 'contents/tourPackage';
	$this->template->user_view($data,$name);
	
	}else{
	echo 'Not allowed';
	}
	
}
/***************************************************************************************/
	function result()
	{   $touroperator = array();
		$activityTourPackages = array();
		$region = array();
		$season = array();
		$typetp = array();

		if(isset($_POST) && !empty($_POST)){
			//	echo '<pre>';
			//	print_r($_POST);
			//	echo '</pre><br/><hr/>';
			foreach($_POST as $k=>$v){
			if(is_array($v) && $k == 'touroperator'){ $touroperator = $v; }
			elseif(is_array($v)&& $k == 'activityTourPackages'){ $v; }
			elseif(is_array($v)&& $k == 'region'){ $region = $v; }
			elseif(is_array($v) && $k == 'season'){ $season = $v; }
			elseif(is_array($v) && $k == 'typeoftourpackage'){ $typetp = $v; }
			}
		}
//var_dump($this->all_model->search_result($region));
	$data['retval'] = $this->all_model->search_result($region,$activityTourPackages,$season,$typetp,$touroperator);
	$name = 'contents/resultSearch';
	$this->template->user_view($data,$name);
	}


/*

	echo '<pre>';
	print_r($touroperator);
	echo '</pre>';
		echo '<pre>';
	print_r($activityTourPackages);
	echo '</pre>';
		echo '<pre>';
	print_r($region);
	echo '</pre>';
	
*/











	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */