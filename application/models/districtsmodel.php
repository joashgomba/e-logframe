<?php

/** DO NOT REMOVE THIS NOTICE FROM THE CODE**/
/** This code belongs to Joash Gomba (The developer).
The code cannot be reproduced without the express written permission of the developer.
The code can only be changed, enhanced or modified for the sole purpose of adding features or customizing the eLogFrame system.
Contravention of any of the above stated rules will constitute a violation of copyright laws.
**/
class Districtsmodel extends CI_Model {

	private $tbl_roles= 'districts';
   function __construct()
   {
       parent::__construct();
   }

   public function get_list()
   {
       $data = array();
       $Q = $this->db->get('districts');
       if ($Q->num_rows() > 0) {
       	foreach ($Q->result_array() as $row){
       		$data[] = $row;
       	}
       }
       $Q->free_result();
       return $data;
   }
   
    public function get_by_county($county_id)
   {
       $data = array();
	   $this->db->where('county_id', $county_id);
       $Q = $this->db->get('districts');
       if ($Q->num_rows() > 0) {
       	foreach ($Q->result_array() as $row){
       		$data[] = $row;
       	}
       }
       $Q->free_result();
       return $data;
   }
   
   
   function get_by_country($country_id)
   {
	   
	   $sql = 'SELECT countries.*,counties.*,districts.*,districts.id AS district_id
	   FROM countries,counties,districts
	   WHERE countries.id = counties.country_id
	   AND counties.id = districts.county_id
	   AND countries.id='.$country_id.'	   
	   ';
				 
	   $query = $this->db->query($sql);
        
        return $query->result();
   }

   public function count_all()
   {
       return $this->db->count_all($this->tbl_roles);
   }

   public function get_by_id($id)
   {
       $this->db->where('id', $id);
       return $this->db->get($this->tbl_roles);
   }

   public function save($role)
   {
       $this->db->insert($this->tbl_roles, $role);
       return $this->db->insert_id();
   }

   public function update($id,$role)
   {
       $this->db->where('id', $id);
       $this->db->update($this->tbl_roles, $role);
   }

   public function delete($id)
   {
       $this->db->where('id', $id);
       $this->db->delete($this->tbl_roles);
   }

}
