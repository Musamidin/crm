<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class All_model extends CI_Model {
        
	function GetAutocomplete($options = array())
    {
	    $this->db->select($options['name']);
	    $this->db->like($options['name'], $options['keyword'], 'after');
   		$query = $this->db->get('customers_id');
		return $query->result();
    }
	function GetAutocompleteCountry($options = array())
    {
	    $this->db->select($options['name']);
	    $this->db->like($options['name'], $options['keyword'], 'after');
   		$query = $this->db->get('geodatabase');
		return $query->result();
    }
	
/*	
	function get_countries()
	{
	    $gdata = $this->load->database("geodata", TRUE, TRUE);
        $r = $gdata->query("SELECT country_id,title_ru FROM _countries");

        return $r->result_array();  
	}

	function get_cities($countrisid)
        {
	    $id = $countrisid;
	    $gdata = $this->load->database("geodata", TRUE, TRUE);
		
        $r = $gdata->query("SELECT title_ru FROM _cities where country_id=$id");
	 return $r->result_array();
	}
*/	
	function get_fill($options = array())
    {
		//$this->db->select('fio');
        $this->db->where($options['name'], $options['keyword']);
        $query = $this->db->get('customers_id');
        return $query->result();

	}
	

	function get_checkUser($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('customers_id');

        return $query->num_rows();
   
	}

	function get_InsertUser($data = array())
    {
$this->db->insert('customers_id',$data);

return $this->db->affected_rows();
      

   
	}

	function get_data($table,$id=null)
	{
	//$this->db->select();
	$query = $this->db->get($table);
    return $query->result_array();
	}
	
	function search_result($region=null,$activityTourPackages=null,$seasons=null,$type_tp=null,$touroperator=null)
	{
		if($region != null){
		$str_region = null;	
 		for($i=0; $i<count($region); $i++) {
 		# code...
 		$str_region .= '"'.$region[$i].'",';
 		}
 		$str_regions = substr($str_region,0,-1);

 		$query1 = " obl.PlaceName IN(".$str_regions.") ";

		}else{
		$query1 = "";	
		}

		if($activityTourPackages != null){
 		$atp = null;
 		for($i=0; $i<count($activityTourPackages); $i++){
 			$atp .= '"'.$activityTourPackages[$i].'",';
 		}
 		$atp = substr($atp,0,-1);
 		$query2 = " AND act.Name IN(".$atp.") ";
 		}else{
 		$query2 = "";
 		}

 		if($seasons != null){
 		$seas = null;
 		for($i=0; $i<count($seasons); $i++){
 			$seas .= '"'.$seasons[$i].'",';
 		}
 		$seas = substr($seas,0,-1);
 		$query3 = " AND seas.name IN(".$seas.") ";
 		}else{
 		$query3 = "";	
 		}

 		if($type_tp != null){
 		$typetp = null;
 		for($i=0; $i<count($type_tp); $i++){
 			$typetp .= '"'.$type_tp[$i].'",';
 		}
 		$typetp = substr($typetp,0,-1);
 		$query4 = " AND tftp.name IN(".$typetp.") ";
 		}else{
 		$query4 = "";
 		}

 		if($touroperator != null){
 		$tourOper = null;
 		for($i=0; $i<count($touroperator); $i++){
 			$tourOper .= '"'.$touroperator[$i].'",';
 		}
 		$tourOper = substr($tourOper,0,-1);
 		$query5 = " AND toperator.name IN(".$tourOper.") "; 		
 		}else{
 		$query5 = "";	
 		}

$query = $this->db->query("SELECT tp.Name, obl.PlaceName, act.Name AS ActiveTP, seas.name AS Season,tftp.name AS TypeOfTP,toperator.name  AS Toperator FROM TurPakety AS tp
inner join TP_Obl AS tpobl ON tp.id=tpobl.TP_ID
inner join TP_Active AS tpact ON tp.id=tpact.TP_ID
inner join TP_Seasons AS sez ON tp.id=sez.TP_ID
inner join TP_TypeTP AS ttp ON tp.id=ttp.TP_ID
inner join TP_Operator AS tpoper ON tp.id=tpoper.TP_ID
inner join Spravochnik_Oblast AS obl ON obl.id=tpobl.Obl_ID
inner join Spravochnik_Active AS act ON act.id=tpact.Active_ID
inner join Spravochnik_seasons AS seas ON seas.id=sez.Seasons_ID
inner join Spravochnik_type_of_tour_package AS tftp ON tftp.id=ttp.TypeTP_ID
inner join Spravochnik_tour_operator AS toperator ON toperator.id=tpoper.TOperator_ID
WHERE ".$query1.$query2.$query3.$query4.$query5."");
	
	return $query->result_array();
	
	}
	
}
?>