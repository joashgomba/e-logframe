<?php

/** DO NOT REMOVE THIS NOTICE FROM THE CODE**/
/**
 This code belongs to Joash Gomba (The developer).
The code cannot be reproduced without the express written permission of the developer.
The code can only be changed, enhanced or modified for the sole purpose of adding features or customizing the eLogFrame system.
Contravention of any of the above stated rules will constitute a violation of copyright laws.
//activities
**/
class Statisticalreports extends CI_Controller {

   function __construct()
   {
       parent::__construct();
       $this->load->model('statisticalreportsmodel');
   }

   public function index()
   {
       if (!$this->erkanaauth->try_session_login()) {
       	redirect('login','refresh');
       }
       $data = array(
           'rows' => $this->db->get('statisticalreports'),
		   'error_message' => $this->session->flashdata('error_message'),
		   'success_message' => $this->session->flashdata('success_message'),
       );
	 	   
       $this->load->view('statisticalreports/index', $data);
   }
   
   public function add()
   {
	   if (!$this->erkanaauth->try_session_login()) {
       	redirect('login','refresh');
       }
       $data = array();
	   
	   $data['countries'] = $this->countriesmodel->get_list();
	   
       $this->load->view('statisticalreports/add', $data);
   }
   
   
   public function template()
   {
	   $data = array();
	   
       $this->load->view('statisticalreports/template', $data); 
   }
   
   public function downloadimage()
   {
	 $image = file_get_contents('http://maps.google.com/maps/api/staticmap?center=Somalia&zoom=5&size=512x512&maptype=hybrid&markers=icon:http://www.drcdatabase.org/img/letter_p.png|label:Benadir|2.118737,45.336946&markers=icon:http://www.drcdatabase.org/img/letter_p.png|label:Togdheer|9.446059,45.299386&markers=icon:http://www.drcdatabase.org/img/letter_p.png|label:Awdal|10.633429,43.329466&markers=icon:http://www.drcdatabase.org/img/letter_p.png|label:WoqooyiGalbeed|9.542374,44.096031&sensor=false'); 
$fp  = fopen('./reportelements/ae.png', 'w+'); 

fputs($fp, $image); 
fclose($fp); 
unset($image);
   }
   
    public function monthlyreport()
   {
	   $data = array();
	   
	   $country_id = $this->input->post('country_id');
	   $month = $this->input->post('month');
	   $year = $this->input->post('year');
	   
	   $dateObj   = DateTime::createFromFormat('!m', $month);
	   $monthName = $dateObj->format('F');
	   
	   $country = $this->countriesmodel->get_by_id($country_id)->row();
	   
	   
	   $row = $this->db->get_where('statisticalreports', array('country_id' => $country_id,'statistic_month' => $month,'statistic_year' => $year))->row();
	   
	   if(!empty($row))
	   {
		  $this->session->set_flashdata('error_message', 'A monthly statistical report for the month of '.$monthName.' '.$year.' in '.$country->country.' has already been added.');
		  
		  redirect('statisticalreports','refresh');
	   }//end first if for $row empty check
	   else
	   {
		    $start_date = $year.'-'.$month.'-01';
		   if($month==02)
		   {
			   $end_day = 28;
		   }
		   else
		   {
			   $end_day = 30;
		   }
		   $end_date = $year.'-'.$month.'-'.$end_day;
		   
			 
			/** overal status begins here**/
			
			//$country_projects = $this->projectsmodel->get_list_by_country($country_id);
			$country_projects = $this->projectsmodel->get_by_country_dates_all($country_id,$start_date,$end_date);
			$total_country_projects = count($country_projects);
			
			//get ongoing projects
			//$country_ongoing_projects = $this->projectsmodel->get_list_by_country_status($country_id,2);
			$country_ongoing_projects = $this->projectsmodel->get_by_country_dates($country_id,$start_date,$end_date);
			$total_country_ongoing_projects = count($country_ongoing_projects);
			
			if($total_country_projects==0)
			{
				$percentage_projects = 0;
			}
			else
			{
				$percentage_projects = ($total_country_ongoing_projects/$total_country_projects)*100;
			}
			
			//get the total regions
			$counties = $this->countiesmodel->get_list_by_country($country_id);
			$total_counties = count($counties);
			
			//get the sectors and highest sectors
			$sectors = $this->sectorsmodel->get_list();
			$total_sectors = count($sectors);
			
			$sectorsArray = array();
			
			foreach($sectors as $key=>$sector):
			
				$sector_numbers = $this->sectorsmodel->get_total_sector($sector['id'],$start_date,$end_date);
				
							
				$sectorsArray["".$sector['sector'].""] = $sector_numbers;
			
			endforeach;
			
			$highest_sector_num    = max($sectorsArray);
			$highest_sector = array_keys($sectorsArray, max($sectorsArray));
			
			//get donors and the highest donor
			
			$donors = $this->donorsmodel->get_list();
			
			$donorsArray = array();
			
			foreach($donors as $key=>$donor):
			
				$donor_numbers = $this->donorsmodel->get_total_donor($donor['id'],$start_date,$end_date);
				$donorsArray["".$donor['donor_name'].""] = $donor_numbers;
						
			endforeach;
			
			$highest_donor_num    = max($donorsArray);
			$highest_donor = array_keys($donorsArray, max($donorsArray));	
			
			if($total_country_projects==0)
			{
				$percentage_donors = 0;
			}
			else
			{
				$percentage_donors = ($highest_donor_num/$total_country_projects)*100;
			}	
			
			
			$overal_status = '<ul>
				<li>In the month of '.$monthName.' '.$year.', ('.$total_country_ongoing_projects.'/'.$total_country_projects.') '.number_format($percentage_projects,1).'% of projects were ongoing in '.$total_counties.' regions in '.$country->country.', covering '.$total_sectors.' sectors.</li>
				<li>'.$highest_sector[0].' covered most of the projects with a total of '.$highest_sector_num.' projects implemented by the sector</li>
				<li>'.$highest_donor[0].' remains the leading donor with '.$highest_donor_num.' projects funded accounting for '.number_format($percentage_donors,1).'% of all the projects supported by donors.</li>
				</ul>';
				
			//add the sectors table
			
			$overal_status .= '<p>The table below gives a summary of the status of projects per sector in '.$country->country.' as of end of '.$monthName.' '.$year.'.</p>';
			
			$table_class = 'class="alt"';
			$bg_color = "#eaf2d3";
			
			$organizations = $this->organizationsmodel->get_list();
			
			
			foreach($organizations as $key=>$organization):
			
				$total_closed_numbers = 0;
				$total_new_numbers = 0;
				$total_ongoing_numbers = 0;
				
				$overal_status .= '<p>'.$organization['organization_name'].'</p>';
				
				$orgsectors = $this->sectorsmodel->get_by_organization_list($organization['id']);
			
			$overal_status .= '<table id="disttable"  border="1" cellspacing="0" cellpadding="1" bordercolor="#892a24" width="75%">
	<tr bgcolor="#892a24"><th width="50%"><font color="#FFFFFF"><strong>Sector</strong></font></th><th><font color="#FFFFFF"><strong>Closed</strong></font></th><th><font color="#FFFFFF"><strong>New</strong></font></th><th><font color="#FFFFFF"><strong>Ongoing</strong></font></th></tr>';
			foreach($orgsectors as $key=>$orgsector):
				$closed_numbers = $this->sectorsmodel->get_total_sector_status($orgsector['id'],$start_date,$end_date,1);
				$new_numbers = $this->sectorsmodel->get_total_sector_status($orgsector['id'],$start_date,$end_date,3);
				$ongoing_numbers = $this->sectorsmodel->get_total_sector_status($orgsector['id'],$start_date,$end_date,2);
				
				$total_closed_numbers = $closed_numbers + $total_closed_numbers;
				$total_new_numbers = $new_numbers + $total_new_numbers;
				$total_ongoing_numbers = $ongoing_numbers + $total_ongoing_numbers;
				
				if($table_class == 'class="alt"')
				{
					$table_class = '';
				}
				else
				{
					$table_class = 'class="alt"';
				} 
				
				if($bg_color == '#eaf2d3')
				{
					$bg_color = "";
				}
				else
				{
					$bg_color = "#eaf2d3";
				} 
			
				$overal_status .= '<tr '.$table_class.' bgcolor="'.$bg_color.'"><td>'.$sector['sector'].'</td><td>'.$closed_numbers.'</td><td>'.$new_numbers.'</td><td>'.$ongoing_numbers.'</td></tr>';
			
			endforeach;
			
			$overal_status .= '<tr bgcolor="#892a24"><td>&nbsp;</td><td><font color="#FFFFFF"><strong>'.$total_closed_numbers.'</strong></font></td><td><font color="#FFFFFF"><strong>'.$total_new_numbers.'</strong></font></td><td><font color="#FFFFFF"><strong>'.$total_ongoing_numbers.'</strong></font></td></tr>';
	
			$overal_status .= '</table>';
			
			endforeach;
			
			$overal_status .= '<p><font color="#FF0000"><sup>*</sup></font> Please note. A sector may be covered in more than one project.</p>';
				
				
			/**Overall status ends here**/
			
			/**Map section**/
					
			$county_id = 0; 
			$points = array();
			$projectrows = $this->mapsmodel->get_by_project_country_counties($country_id,$county_id);
			
			$map_elements = 'http://maps.google.com/maps/api/staticmap?center='.$country->country.'&zoom=5&size=512x512&maptype=hybrid';
			
			foreach ($projectrows as $projectkey=>$projectrow):
				$projectsector = $this->projectsectorsmodel->get_by_project($projectrow->projectID)->row();
				$sector = $this->sectorsmodel->get_by_id($projectsector->sector_id)->row();
				$status = $this->projectactivitystatusmodel->get_by_id($projectrow->projectactivitystatus_id)->row();
				$gps['lat'] = $projectrow->lat;
				$gps['lng'] = $projectrow->long;
				$mapdata['position'] = $gps;
				
				$map_elements .= '&markers=icon:http://www.drcdatabase.org/img/letter_p.png|label:P|'.$projectrow->lat.','.$projectrow->long.'';
				
				if($sector->sector=='Education')
						   {
							   $mapdata['icon'] = ''.base_url().'img/education.png';
						   }
						   else if($sector->sector=='Health and nutrition')
						   {
							   $mapdata['icon'] = ''.base_url().'img/health_nutrition.png';
						   }
						   
						   else if($sector->sector=='Water, sanitation and public health')
						   {
							   $mapdata['icon'] = ''.base_url().'img/water_sanitation_public_health.png';
						   }
						   
						   else if($sector->sector=='Production')
						   {
							   $mapdata['icon'] = ''.base_url().'img/production.png';
						   }
						   
						   else if($sector->sector=='Land, environment and climate change')
						   {
							   $mapdata['icon'] = ''.base_url().'img/land_environment_climate_chage.png';
						   }
						   
						   else if($sector->sector=='Humanitarian aid and protection')
						   {
							   $mapdata['icon'] = ''.base_url().'img/humanitarian_aid_protection.png';
						   }
						   
						   else if($sector->sector=='Economic infrastructure and services')
						   {
							   $mapdata['icon'] = ''.base_url().'img/economic_infrastructure_services.png';
						   }
						   
						   else if($sector->sector=='Government and civil society')
						   {
							   $mapdata['icon'] = ''.base_url().'img/government_civil_society.png';
						   }
						   
						   else if($sector->sector=='Other')
						   {
							   $mapdata['icon'] = ''.base_url().'img/other.png';
						   }
						   else
						   {
							   $mapdata['icon'] = ''.base_url().'img/other.png';
						   }
						   
						   
				 $project_donor = '';
						   $projectdonors = $this->projectdonorsmodel->get_list_by_project($projectrow->projectID);
						   foreach($projectdonors as $key=>$projectdonor):
								$donor = $this->donorsmodel->get_by_id($projectdonor['donor_id'])->row();
								$project_donor .= $donor->donor_name.',';
							endforeach;
							
						  $thesectors = $this->sectorsmodel->get_list();
						  $sectorlist = '';
						  foreach($thesectors as $key=>$thesector)
						  {
								$projectsector = $this->projectsectorsmodel->get_by_sector_project($projectrow->projectID,$thesector['id'])->row();
															
								if(empty($projectsector))
								{
									$sectorselected = '';
								}
								else
								{
									$sectorlist .= $thesector['sector'].',';
								}
															
							}
							
					$info = '
						   District: '.$projectrow->county.'<br>
						   Project: '.$projectrow->project_title.'<br>
						   Project No.: '.$projectrow->project_no.'<br>
						   Objective: '.$projectrow->project_objective.'<br>					  
						   Project Start: '.date("d F Y",strtotime($projectrow->project_start_date)).'<br>
						   Project End: '.date("d F Y",strtotime($projectrow->project_end_date)).'<br>
						   Donor: '.$project_donor.'<br>
						   Budget: '.$projectrow->currency.' '.$projectrow->project_budget.'<br>
						   Sector(s): '.$sectorlist.'<br> 
						   Status: '.$status->status.'<br>
						   ';	
						   
						  
							
				$mapdata['info'] = $info;
						   
				$points[] = $mapdata;
			
			endforeach;
			
			$map_json =  json_encode($points,JSON_HEX_QUOT | JSON_HEX_TAG);
			
			$map_elements .= '&sensor=false';
						
			$image = file_get_contents($map_elements); 

			$fp  = fopen('./reportelements/'.$country->country.'_'.$monthName.'_'.$year.'.jpg', 'w+');			
			
			fputs($fp, $image); 
			fclose($fp); 
			unset($image);
			
			$map_name = $country->country.'_'.$monthName.'_'.$year.'.jpg';
				
			/**End map section**/
			
			/****Status of activity implementation***/
			
			$activities = $this->projectactivitiesmodel->get_by_country_date($country_id,$month,$year);
			
			//$sql = $this->projectactivitiesmodel->get_by_country_date_test($country_id,$month,$year);
			
			//echo $sql;
					
			$total_activities = count($activities);
			
			
			$counties = $this->countiesmodel->get_list_by_country($country_id);
			$countiessArray = array();
			
			foreach($counties as $key=>$county):
			  
				$county_numbers = $this->projectactivitiesmodel->get_total_county($county['id'],$month,$year);
				$countiessArray["".$county['county'].""] = $county_numbers;
						
			endforeach;
			
			$highest_county_num    = max($countiessArray);
			$highest_county = array_keys($countiessArray, max($countiessArray));
			
			$activitycategories = $this->activitycategoriesmodel->get_list();
			
			$activityArray = array();
			foreach($activitycategories as $key=>$activitycategory):
			
				$activity_numbers = $this->projectactivitiesmodel->get_total_type($activitycategory['id'],$month,$year);
				$activityArray["".$activitycategory['activity_category'].""] = $activity_numbers;
			
			endforeach;
			
			$highest_activity_num    = max($activityArray);
			$highest_activity = array_keys($activityArray, max($activityArray));
			
			
			if($total_activities==0)
			{
				$highest_percentage = 0;
			}
			else
			{
				$highest_percentage = ($highest_activity_num/$total_activities)*100;
			}
			
			//print_r($activityArray);
			
			 arsort($activityArray);
			  $j = 0;
			  
			$activity_narrative = '';
			
			foreach ($activityArray as $key => $value) {
				$j++;
				if ($j > 3) {
					
				} else {
					if($value==0)
					{
							$activity_percentage = 0;
					}
					else
					{
						$activity_percentage = ($value/$total_activities)*100;
					}
					
					if($j==1)
					{
						
						$activity_narrative .= $key.' accounted for majority of the sub activities implemented at ('.number_format($activity_percentage,1).'%)';
					}
					if($j==2)
					{
						if($value==0)
						{
							$activity_narrative .= ' with '.$key.' being second';
						}
						else
						{
							$activity_narrative .= ' with '.$key.' being second at ('.number_format($activity_percentage,1).'%)';
						}
					}
					if($j==3)
					{
						if($value==0)
						{
							$activity_narrative .= ' and '.$key.' the third most implemented sub activity respectively.';
						}
						else
						{
							$activity_narrative .= ' and '.$key.' ('.number_format($activity_percentage,1).'%) the third most implemented sub activity respectively.';
						}
					}
					
					
				}
			}
	
			
			
	
			$status_of_activity = '<ul>
	<li>A total of '.$total_activities.' sub activities were implemented in the month of '.$monthName.' '.$year.'</li>
	<li>'.$highest_county[0].' region accounted for the highest number of sub activities reported, with a total of '.$highest_county_num.' out of the '.$total_activities.' sub activities implemented.</li>
	<li>'.$activity_narrative.'</li>
	</ul>';
	
	$status_of_activity .= '<table id="disttable" width="75%" border="1" cellspacing="0" cellpadding="2" bordercolor="#892a24">
	<tr bgcolor="#892a24">
	  <th width="50%"><font color="#FFFFFF"><strong>Region</strong></font></th><th><font color="#FFFFFF"><strong># of Sub activities</strong></font></th><th><font color="#FFFFFF"><strong>Completed</strong></font></th><th><font color="#FFFFFF"><strong>On time</strong></font></th><th><font color="#FFFFFF"><strong>Warning</strong></font></th><th><font color="#FFFFFF"><strong>Overdue</strong></font></th></tr>';
	
	$thecounties = $this->countiesmodel->get_list_by_country($country_id);
	
	$total_tasks = 0;
	$total_completed_tasks = 0;
	$total_on_time = 0;
	$total_overdue = 0;
	$total_warning = 0;
	
	$tbl_class = 'class="alt"';
	$bg_color = "#eaf2d3";
	
	
	foreach($thecounties as $thekey=>$thecounty):
	
		$no_of_tasks = $this->projectactivitiesmodel->count_by_county_status($thecounty['id'],$month,$year);
		$no_of_completed_tasks = $this->projectactivitiesmodel->get_by_county_status_completed($thecounty['id'],$month,$year);
		$on_time = $this->projectactivitiesmodel->get_by_county_status($thecounty['id'],$month,$year,1);
		$warning = $this->projectactivitiesmodel->get_by_county_status($thecounty['id'],$month,$year,2);	
		$overdue = $this->projectactivitiesmodel->get_by_county_status($thecounty['id'],$month,$year,3);
		
		
			
		$total_tasks = $total_tasks + $no_of_tasks;
		$total_completed_tasks = $total_completed_tasks + $no_of_completed_tasks;
		$total_on_time  = $total_on_time + $on_time;
		$total_overdue = $total_overdue + $overdue;
		$total_warning = $total_warning + $warning;
		
		if($tbl_class == 'class="alt"')
		{
			$tbl_class = '';
		}
		else
		{
			$tbl_class = 'class="alt"';
		} 
		
		if($bg_color == '#eaf2d3')
		{
			$bg_color = "";
		}
		else
		{
			$bg_color = "#eaf2d3";
		} 
		
		$status_of_activity .= '
	<tr '.$tbl_class.' bgcolor="'.$bg_color.'"><td width="50%">'.$thecounty['county'].'</td><td>'.$no_of_tasks.'</td><td>'.$no_of_completed_tasks.'</td><td>'.$on_time.'</td><td>'.$warning.'</td><td>'.$overdue.'</td></tr>';		  
						
		endforeach;
	
	$status_of_activity .= '<tr bgcolor="#892a24"><th width="50%"><font color="#FFFFFF"><strong>Total</strong></font></th><th><font color="#FFFFFF"><strong>'.$total_tasks.'</strong></font></th><th><font color="#FFFFFF"><strong>'.$total_completed_tasks.'</strong></font></th><th><font color="#FFFFFF"><strong>'.$total_on_time .'</strong></font></th><th><font color="#FFFFFF"><strong>'.$total_warning.'</strong></font></th><th><font color="#FFFFFF"><strong>'.$total_overdue.'</strong></font></th></tr>
	</table>';
	
			/****End status of activity implementation***/
			
			/**Distribution of activities implemented by type vs status of implementation**/
			
			/***Piechart & Graph**/
			
			$bar_categories = '';
			$bar_values = '';
			foreach ($activityArray as $key => $value) {
				
				$bar_categories .= "'".$key."',";
				$bar_values .= $value.',';
			}
			
			$series_category = '';
			foreach($thecounties as $thekey=>$thecounty):
				$series_category .= "'".$thecounty['county']."',";			
					
			endforeach;
			
				
			$series = '';
			
			$activity_table = '<table id="disttable" width="100%" border="1" cellspacing="0" cellpadding="3" bordercolor="#892a24">
			<thead>
			<tr bgcolor="#892a24"><th><font color="#FFFFFF"><strong>Activity type</strong></font></th><th><font color="#FFFFFF"><strong>Number Implemented</strong></font></th></tr>
			</thead>
			<tbody>
			';
			
			//get_by_category($activity_category)
			
			$tr_class = 'class="alt"';
			$bg_color = "#eaf2d3";
	
			foreach ($activityArray as $key => $value) {
				
				if($tr_class == 'class="alt"')
				{
					$tr_class = '';
				}
				else
				{
					$tr_class = 'class="alt"';
				} 
				
				if($bg_color == '#eaf2d3')
				{
					$bg_color = "";
				}
				else
				{
					$bg_color = "#eaf2d3";
				}
				
				$activity_table .= '<tr '.$tr_class.' bgcolor="'.$bg_color.'"><td>'.$key.'</td><td>'.$value.'</td></tr>';
				
				$series .= "{";
				$series .= "
							name: '".$key."',";
				$series .= "data: [";
					foreach($thecounties as $thekey=>$thecounty):
						//echo $thecounty['id'].''.$key.'<br>';
						
						$no_of_activities = $this->projectactivitiesmodel->count_by_county_type($thecounty['id'],$key,$month,$year);
						
						$series .= $no_of_activities.",";
					
					endforeach;
					
					$series .= "]";
					
					$series .= " },";
			}
			
			$activity_table .= '</tbody></table>';
			
					
			$pie_data = "['Completed',     ".$total_completed_tasks."],
					  ['On Time',   ".$total_on_time."],
					  ['Warning',   ".$total_warning."],
					  ['Overdue',   ".$total_overdue."]";
			
			/***End Piechart & Graph**/
			
			/**Beneficiaries Reached**/
			
			$beneficiaries = $this->beneficiarytypesmodel->get_list();
			
			$total_beneficiaries = 0;
			
			$beneficiaryArray = array();
			
			foreach($beneficiaries as $key=>$beneficiary):
			
				$beneficiary_numbers = $this->reportsmodel->get_activities_by_beneficiary($country_id,$month,$year,$beneficiary['id']);
				$beneficiaryArray["".$beneficiary['beneficiary_type'].""] = $beneficiary_numbers;
				
				$total_beneficiaries =  $total_beneficiaries + $beneficiary_numbers;
			
			endforeach;
			
			arsort($beneficiaryArray);
			
			$num=0;
			
			$beneficiary_narrative = '';
			
			 foreach ($beneficiaryArray as $key => $value) {
				$num++;
				if ($num > 3) {
					//only top 3
					
				} else {
					
					if($value==0)
					{
							$beneficiary_percentage = 0;
					}
					else
					{
						$beneficiary_percentage = ($value/$total_beneficiaries)*100;
					}
					
					if($num==1)
					{
						
						$beneficiary_narrative .= 'The highest number of beneficiaries reached were '.$key.' at '.number_format($value).' reached, accounting for ('.number_format($beneficiary_percentage,1).'%) of the total,';
					}
					if($num==2)
					{
						$beneficiary_narrative .= 'followed by '.$key.' ('.number_format($beneficiary_percentage,1).'%)';
					}
					
					if($num==3)
					{
						$beneficiary_narrative .= ' and '.$key.' ('.number_format($beneficiary_percentage,1).'%)';
					}
					
				}
				
			 }
			
			$beneficiaries_reached = '
			<ul>
	<li>During the month of '.$monthName.' '.$year.', a total of '.number_format($total_beneficiaries).' beneficiaries were reached in '.$total_counties.' regions of '.$country->country.'.</li>
	<li>'.$beneficiary_narrative.'</li>
	
	</ul>';
	
	$beneficiaries_reached .= '<p>The table below provides a list detailing in numbers and percentages, diferent categories of beneficiaries that were reported as reached during the reporting month of '.$monthName.' '.$year.'.</p>';
	
		$beneficiaries_reached .= '<table id="disttable" width="85%" border="1" cellspacing="0" cellpadding="3" bordercolor="#892a24">
		<tr bgcolor="#892a24"><th width="50%"><font color="#FFFFFF"><strong>Beneficiary Type</strong></font></th><th><font color="#FFFFFF"><strong># Reached</strong></font></th><th><font color="#FFFFFF"><strong>%</strong></font></th></tr>
		';
		$alt_class = 'class="alt"';
		$bg_color = "#eaf2d3";
		foreach ($beneficiaryArray as $key => $value) {
			if($value==0)
			{
				$beneficiarypercentage = 0;
			}
			else
			{
				$beneficiarypercentage = ($value/$total_beneficiaries)*100;
			}
			
			if($alt_class == 'class="alt"')
			{
				$alt_class = '';
			}
			else
			{
				$alt_class = 'class="alt"';
			} 
			
			 if($bg_color == '#eaf2d3')
			 {
				$bg_color = "";
			 }
			else
			{
				$bg_color = "#eaf2d3";
			} 
				
		  $beneficiaries_reached .= '<tr '.$alt_class.' bgcolor="'.$bg_color.'"><td width="50%">'.$key.'</td><td>'.number_format($value).'</td><td>'.number_format($beneficiarypercentage,1).'%</td></tr>';
		}
		
		$beneficiaries_reached .= '</table>';
		/**End Beneficiaries Reached**/
		
		
		
		/***Beneficiaries reached by sector disaggrigated by age & gender***/
		
		$beneficiarysubcategories = $this->beneficiarysubcategoriesmodel->get_by_aggregation_type(2);
		
		$beneficiaries_by_sector = '<table width="72%" border="1" cellspacing="0" cellpadding="3" bordercolor="#892a24" id="datatable">
		<thead>
			<tr bgcolor="#892a24"><th width="50%">&nbsp;</th>';
		
		foreach($beneficiarysubcategories as $key=>$beneficiarysubcategory):
			$beneficiaries_by_sector .= '
				  <th><font color="#FFFFFF"><strong>'.$beneficiarysubcategory['beneficiary_category'].'</strong></font></th>';
		endforeach;
		
		$beneficiaries_by_sector .= '</tr>';
		
		$beneficiaries_by_sector .= '</thead><tbody>';
		
		$class = 'class="alt"';
		$bg_color = "#eaf2d3";
		
		foreach($sectors as $key=>$sector):	 
		
			if($class == 'class="alt"')
			{
				$class = '';
			}
			else
			{
				$class = 'class="alt"';
			} 
			
		    if($bg_color == '#eaf2d3')
			{
				$bg_color = "";
			}
			else
			{
				$bg_color = "#eaf2d3";
			} 
			
			$beneficiaries_by_sector .= '<tr '.$class.' bgcolor="'.$bg_color.'"><th width="50%">'.$sector['sector'].'</th>';
			
			foreach($beneficiarysubcategories as $key=>$beneficiarysubcategory):
			
				$numbers_reached = $this->beneficiarysubcategoriesmodel->get_activities_by_sector_beneficiary($country_id,$sector['id'],$month,$year,$beneficiarysubcategory['id']);
					
			 $beneficiaries_by_sector .= '<td>'.number_format($numbers_reached).'</td>';
				 
			endforeach;
			
				
			$beneficiaries_by_sector .= '</tr>';
		endforeach;
		
	
			$beneficiaries_by_sector .= '</tbody></table>';
			
			
		//for export server
		$graphcategories = "";
		$graphseries = "";
			
			foreach($sectors as $key=>$sector):	
			
				$graphcategories .= "'".$sector['sector']."',";
					
			endforeach;
			
			foreach($beneficiarysubcategories as $key=>$beneficiarysubcategory):
			
					$graphseries .= "{
                name: '".$beneficiarysubcategory['beneficiary_category']."',
				data: [";
			
					foreach($sectors as $key=>$sector):
				
							$numbers_reached = $this->beneficiarysubcategoriesmodel->get_activities_by_sector_beneficiary($country->id,$sector['id'],$month,$year,$beneficiarysubcategory['id']);
							
														
							$graphseries .= "".number_format($numbers_reached).",";
					
					endforeach;
					
					$graphseries .= "]
					},";
				
			endforeach;
		
		/*** End Beneficiaries reached by sector disaggrigated by age & gender***/
		
		/**
	Beneficiaries reached versus the target number**/
	
		$total_target = 0;
		$total_reach = 0;
	
	$target_vs_reached = '<table id="disttable" width="85%" border="1" cellspacing="0" cellpadding="3" bordercolor="#892a24">
		<tr bgcolor="#892a24"><th width="50%"><font color="#FFFFFF"><strong>Beneficiary Type</strong></font></th><th><font color="#FFFFFF"><strong>Target</strong></font></th><th><font color="#FFFFFF"><strong>Reached</strong></font></th></tr>';
		
		$alt = 'class="alt"';
		$bg_color = "#eaf2d3";
		
		foreach($beneficiaries as $key=>$beneficiary):
		
			$beneficiary_target = $this->projectbeneficiariesmodel->get_by_beneficiary($beneficiary['id'],$start_date,$end_date);
			if(empty($beneficiary_target))
			{
				$target = 0;
			}
			else
			{
				$target = $beneficiary_target;
			}
			
			$total_target = $total_target+$target;
			
			$total_reach = $total_reach + $beneficiaryArray[$beneficiary['beneficiary_type']];
			
			if($alt == 'class="alt"')
			{
				$alt = '';
			}
			else
			{
				$alt = 'class="alt"';
			} 
			
			if($bg_color == '#eaf2d3')
			{
				$bg_color = "";
			}
			else
			{
				$bg_color = "#eaf2d3";
			} 
		
			$target_vs_reached .= '<tr '.$alt.' bgcolor="'.$bg_color.'"><td width="50%">'.$beneficiary['beneficiary_type'].'</td><td>'.number_format($target).'</td><td>'.number_format($beneficiaryArray[$beneficiary['beneficiary_type']]).'</td></tr>';
		
		endforeach;
		
		
		$target_vs_reached .= '<tr bgcolor="#892a24"><th width="50%"><font color="#FFFFFF"><strong>Total</strong></font></th><th><font color="#FFFFFF"><strong>'.number_format($total_target).'</strong></font></th><th><font color="#FFFFFF"><strong>'.number_format($total_reach).'</strong></font></th></tr>';
		$target_vs_reached .= '</table>';
	
		/**
		END Beneficiaries reached versus the target number**/
		
		
		/***Beneficiaries reached by district disaggrigated by age & gender***/
		
		$beneficiaries_by_district = '<table id="disttable" width="72%" border="1" cellspacing="0" cellpadding="3" bordercolor="#892a24">
		<thead>
			<tr>
			  <th bgcolor="#892a24" width="50%"><font color="#FFFFFF"><strong>Region</strong></font></th>';
			  
		foreach($beneficiarysubcategories as $key=>$beneficiarysubcategory):
			$beneficiaries_by_district .= '
				  <th bgcolor="#892a24"><font color="#FFFFFF"><strong>'.$beneficiarysubcategory['beneficiary_category'].'</strong></font></th>';
		endforeach;
		
		$beneficiaries_by_district .= '</tr>
		</thead>
		<tbody>';
			  
		$dist_alt = 'class="alt"';
		$bg_color = "#eaf2d3";
			  
		foreach($counties as $key=>$county):
		
			if($dist_alt == 'class="alt"')
			{
				$dist_alt = '';
			}
			else
			{
				$dist_alt = 'class="alt"';
			} 
			
			if($bg_color == '#eaf2d3')
			{
				$bg_color = "";
			}
			else
			{
				$bg_color = "#eaf2d3";
			} 
			
			$beneficiaries_by_district .= '<tr '.$dist_alt.' bgcolor="'.$bg_color.'"><td width="50%">'.$county['county'].'</td>';
				  
				  foreach($beneficiarysubcategories as $key=>$beneficiarysubcategory):
				  
					$num_reached = $this->beneficiarysubcategoriesmodel->get_activities_by_county_beneficiary($county['id'],$month,$year,$beneficiarysubcategory['id']);
					$beneficiaries_by_district .= '
				  <td>'.number_format($num_reached).'</td>';
				endforeach;
				
				$beneficiaries_by_district .= '</tr>';
				  
			
		endforeach;
		$beneficiaries_by_district .= '</tbody></table>';
		
		/***End Beneficiaries reached by district disaggrigated by age & gender***/
		
		/**Activities and beneficiaries**/
		
		$activities_beneficiaries = '<table id="disttable" width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#892a24">
		<thead>
			<tr bgcolor="#892a24">
				<th>
					<font color="#FFFFFF"><strong>Project Code</strong></font></th>
				<th>
					<font color="#FFFFFF"><strong>Sector</strong></font></th>
				<th>
					<font color="#FFFFFF"><strong>Sub Activity</strong></font></th>
				<th>
					<font color="#FFFFFF"><strong>Sub activity description</strong></font></th>
				<th>
					<font color="#FFFFFF"><strong>status</strong></font></th>
				
				<th colspan="3">
					<font color="#FFFFFF"><strong>Beneficiaries (by gender)</strong></font></th>
				
				<th colspan="2"><font color="#FFFFFF"><strong>Beneficiaries (uncategorised)</strong></font></th>
			</tr>
			</thead>
			<tbody>
			';
			
			$activities_beneficiaries .= '<tr>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				
				<td><strong>Male</strong></td>
				<td><strong>Female</strong></td>
				<td><strong>Total</strong></td>
				<td><strong>Target</strong></td>
				<td><strong>Numbers Reached</strong></td>
			</tr>';
			
		
		$total_male = 0;
		$total_female = 0;
		$total_line_total = 0;
		$total_beneficiaries_reached = 0;
		$total_beneficiary_target = 0;
		
		$altclass = 'class="alt"';
		$bg_color = "#eaf2d3";
			
		foreach($activities as $key=>$activity)
		{
			$project = $this->projectsmodel->get_by_id($activity->project_id)->row();
			$sector = $this->sectorsmodel->get_by_id($activity->sector_id)->row();
			$status = $this->projectactivitystatusmodel->get_by_id($activity->projectactivitystatus_id)->row();
			
			$num_male = $this->beneficiarysubcategoriesmodel->get_activities_by_gender_beneficiary($activity->id,$month,$year,1);
			$num_female = $this->beneficiarysubcategoriesmodel->get_activities_by_gender_beneficiary($activity->id,$month,$year,2);
			$total_num = ($num_male + $num_female);
			
			$total_male = $total_male + $num_male;
			$total_female = $total_female + $num_female;
			$total_line_total = $total_line_total + $total_num;
			$total_beneficiaries_reached = ($total_beneficiaries_reached + $activity->total_beneficiaries);
			
			$the_beneficiary = $this->projectplannedactivitiesmodel->get_by_id($activity->plannedactivity_id)->row();
			
			$project_beneficiary_target = $the_beneficiary->total_beneficiary_target;
			
			$total_beneficiary_target = $total_beneficiary_target + $project_beneficiary_target;
			
			if($altclass == 'class="alt"')
			{
				$altclass = '';
			}
			else
			{
				$altclass = 'class="alt"';
			} 
			
			 if($bg_color == '#eaf2d3')
			 {
				$bg_color = "";
			 }
			  else
			 {
				$bg_color = "#eaf2d3";
			} 
			
			$activities_beneficiaries .= '<tr '.$altclass.' bgcolor="'.$bg_color.'">
				<td>
					'.$project->project_no.'</td>			
					<td>
					'.$sector->sector.'</td>
				<td>
					'.$activity->activity.'</td>
				<td>
					'.$activity->activity_description.'</td>
				<td>
					'.$status->status.'</td>
				
				<td>'.number_format($num_male).'</td>
				<td>'.number_format($num_female).'</td>
				<td>'.number_format($total_num).'</td>
				<td>'.number_format($project_beneficiary_target).'</td>
				<td>'.number_format($activity->total_beneficiaries).'</td>
			</tr>';
			
		}
		
		$activities_beneficiaries .= '<tr>
				<td colspan="5">TOTAL BENEFICIARIES REPORTED REACHED DURING THE MONTH</td>
				<td><strong>'.number_format($total_male).'</strong></td>
				<td><strong>'.number_format($total_female).'</strong></td>
				<td><strong>'.number_format($total_line_total).'</strong></td>
				<td><strong>'.number_format($total_beneficiary_target).'</strong></td>
				<td><strong>'.number_format($total_beneficiaries_reached).'</strong></td>
			</tr>';
		
		$activities_beneficiaries .= '</tbody>
	</table>';
		/**End Activities and beneficiaries**/
	
		/**Projects and beneficiaries**/
		
		$projects_beneficiaries = '<table id="disttable" width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#892a24">
		<thead>
			<tr  bgcolor="#892a24">
				<th><font color="#FFFFFF"><strong>Project Code</strong></font></th>
				<th ><font color="#FFFFFF"><strong>Project</strong></font></th>
				<th ><font color="#FFFFFF"><strong>Start Date</strong></font></th>
				<th ><font color="#FFFFFF"><strong>End Date</strong></font></th>
				<th ><font color="#FFFFFF"><strong>status</strong></font></th>
				<th colspan="3"><font color="#FFFFFF"><strong>Beneficiaries (by gender)</strong></font></th>
				<th colspan="2"><font color="#FFFFFF"><strong>Beneficiaries (uncategorised)</strong></font></th>
			</tr>
			
			</thead>';
			$projects_beneficiaries .= '<tbody>
			<tr>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				
				<td><strong>Male</strong></td>
				<td><strong>Female</strong></td>
				<td><strong>Total</strong></td>
				<td><strong>Target</strong></td>
				<td><strong>Numbers Reached</strong></td>
			</tr>';
			
			$active_projects = $this->projectsmodel->get_by_country_dates($country_id,$start_date,$end_date);
			$total_project_male = 0;
			$total_project_female = 0;
			$total_project_line = 0;
			$total_target = 0;
			
			$total_project = 0;
			
			$altrow = 'class="alt"';
			$bg_color = "#eaf2d3";
			
			foreach($active_projects as $key=>$active_project):
			
			$project_status = $this->projectactivitystatusmodel->get_by_id($active_project->projectactivitystatus_id)->row();
			
			$number_male = $this->beneficiarysubcategoriesmodel->get_project_by_gender_beneficiary($active_project->id,$month,$year,1);
			$number_female = $this->beneficiarysubcategoriesmodel->get_project_by_gender_beneficiary($active_project->id,$month,$year,2);
			
			$number_project = $this->beneficiarysubcategoriesmodel->get_project_by_beneficiary($active_project->id,$month,$year);
			
			$total_project = $total_project + $number_project;
			
			$number_male_female = ($number_male+$number_female);
			
			$project_target = $this->beneficiarysubcategoriesmodel->get_project_by_beneficiary_target($active_project->id);
			
			$total_target = $total_target+$project_target;
			
			
			$total_project_male = ($total_project_male+$number_male);
			$total_project_female = ($total_project_female+$number_female);
			
			$total_project_line = ($total_project_line+$number_male_female);
			
			if($altrow == 'class="alt"')
			{
				$altrow = '';
			}
			else
			{
				$altrow = 'class="alt"';
			}
			
			if($bg_color == '#eaf2d3')
			{
				$bg_color = "";
			}
			else
			{
				$bg_color = "#eaf2d3";
			} 
				 
				$projects_beneficiaries .= '<tr '.$altrow.' bgcolor="'.$bg_color.'">
					<td>
						'.$active_project->project_no.'</td>
					<td>
						'.$active_project->project_title.'</td>
					<td>
						'.$active_project->project_start_date.'</td>
					<td>
						'.$active_project->project_end_date.'</td>
					<td>
						'.$project_status->status.'</td>
					
					<td>'.number_format($number_male).'</td>
					<td>'.number_format($number_female).'</td>
					<td>'.number_format($number_male_female).'</td>
					<td>'.number_format($project_target).'</td>
					<td>'.number_format($number_project).'</td>
				</tr>';
			endforeach;
			
			$projects_beneficiaries .= '<tr>
				<td colspan="5">TOTAL BENEFICIARIES REPORTED REACHED DURING THE MONTH</td>
				<td><strong>'.number_format($total_project_male).'</strong></td>
				<td><strong>'.number_format($total_project_female).'</strong></td>
				<td><strong>'.number_format($total_project_line).'</strong></td>
				<td><strong>'.number_format($total_target).'</strong></td>
				<td><strong>'.number_format($total_project).'</strong></td>
			</tr>';
			
		$projects_beneficiaries .= '</tbody>
	</table>';
		
		
		/**End Projects and beneficiaries**/
		
		
		$reportdata = array(
			   'country_id' => $this->input->post('country_id'),
               'statistic_month' => $this->input->post('month'),
               'statistic_year' => $this->input->post('year'),
               'overal_status' => $overal_status,
			   'map_json' => $map_json,
			   'status_of_activity' => $status_of_activity,
			   'series_category' => $series_category,
			   'series' => $series,
			   'pie_data' => $pie_data,
			   'activity_table' => $activity_table,
			   'beneficiaries_reached' => $beneficiaries_reached,
			   'beneficiaries_by_sector' => $beneficiaries_by_sector,
			   'target_vs_reached' => $target_vs_reached,
			   'beneficiaries_by_district' => $beneficiaries_by_district,
			   'activities_beneficiaries' => $activities_beneficiaries,
			   'projects_beneficiaries' => $projects_beneficiaries,
			   'graphcategories'=>$graphcategories,
			   'graphseries'=>$graphseries,
			   'map_name'=>$map_name,
			   'task_pie'=>'-',
			   'distribution_graph'=>'-',
			   'sector_graph'=>'-',
           );
           $this->db->insert('statisticalreports', $reportdata);
		   
		   $report_id = $this->db->insert_id();
		
	
		   $data['points'] = $map_json;			
		   $data['overal_status'] = $overal_status;
		   $data['status_of_activity'] = $status_of_activity;
		   $data['series_category'] = $series_category;
		   $data['series'] = $series;	   
		   $data['pie_data'] = $pie_data;
		   $data['activity_table'] = $activity_table;
		   $data['beneficiaries_reached'] = $beneficiaries_reached;
		   $data['beneficiaries_by_sector'] = $beneficiaries_by_sector;
		   $data['target_vs_reached'] = $target_vs_reached;
		   $data['beneficiaries_by_district'] = $beneficiaries_by_district;	   
		   $data['activities_beneficiaries'] = $activities_beneficiaries;
		   $data['projects_beneficiaries'] = $projects_beneficiaries;
		   $data['monthName'] = $monthName;
		   $data['year'] = $year;
		   $data['country'] = $country->country;
		   $data['graphcategories'] = $graphcategories;
		   $data['graphseries'] = $graphseries;
		   $data['report_id'] = $report_id;
			  
		   
		   $this->load->view('statisticalreports/monthlyreport', $data); 
	   }//end first else
   }
   
   
   
    public function edit($id)
  {
	 
	   if(!is_numeric($id)) {
       	redirect('statisticalreports','refresh');
       }
	   
	
	   
	   $row = $this->db->get_where('statisticalreports', array('id' => $id))->row();
       if(empty($row)) {
       	redirect('statisticalreports','refresh');
       }
	   
	   $data = array();
	   	   		
	   $data['row'] = $row;
	   	  
	   
       $this->load->view('statisticalreports/edit', $data); 
	  
	   
	  
  }
  
  public function edit_validate($id)
  {
	   if (!$this->erkanaauth->try_session_login()) {
       	redirect('login','refresh');
       }
       $this->load->library('form_validation');
       $this->form_validation->set_rules('overal_status', 'Overall status of projects', 'trim|required');
	   $this->form_validation->set_rules('status_of_activity', 'Status of Sub Activity Implementation', 'trim|required');
	   $this->form_validation->set_rules('activity_table', 'Distribution of activities implemented by type vs status of
implementation', 'trim|required');
	   $this->form_validation->set_rules('beneficiaries_reached', 'Beneficiaries Reached ', 'trim|required');
	   $this->form_validation->set_rules('beneficiaries_by_sector', 'Beneficiaries reached by sector disaggrigated by age & gender', 'trim|required');
	   $this->form_validation->set_rules('target_vs_reached', 'Beneficiaries reached versus the target number', 'trim|required');
	   $this->form_validation->set_rules('beneficiaries_by_district', 'Beneficiaries reached by region disaggrigated by age & gender', 'trim|required');
	   $this->form_validation->set_rules('activities_beneficiaries', 'Sub Activities and beneficiaries', 'trim|required');
	   $this->form_validation->set_rules('projects_beneficiaries', 'Projects and beneficiaries', 'trim|required');
       if ($this->form_validation->run() == false) {
           $this->edit($id);
       } else {
		   
		   $data = array(
               'overal_status' => $this->input->post('overal_status'),
			   'status_of_activity' => $this->input->post('status_of_activity'),
			   'activity_table' => $this->input->post('activity_table'),
			   'beneficiaries_reached' => $this->input->post('beneficiaries_reached'),
			   'beneficiaries_by_sector' => $this->input->post('beneficiaries_by_sector'),
			   'target_vs_reached' => $this->input->post('target_vs_reached'),
			   'beneficiaries_by_district' => $this->input->post('beneficiaries_by_district'),
			   'activities_beneficiaries' => $this->input->post('activities_beneficiaries'),
			   'projects_beneficiaries' => $this->input->post('projects_beneficiaries'),
           );
           $this->db->where('id', $id);
           $this->db->update('statisticalreports', $data);
           
		   redirect('statisticalreports','refresh');
       }
  }
   
   
  public function view($id)
  {
	  
	   if (!$this->erkanaauth->try_session_login()) {
       	redirect('login','refresh');
       }
       if(!is_numeric($id)) {
       	redirect('statisticalreports','refresh');
       }
	   
	   
	   
	   $row = $this->db->get_where('statisticalreports', array('id' => $id))->row();
       if(empty($row)) {
       	redirect('statisticalreports','refresh');
       }
	   
	   $data = array();
	   
	   $country = $this->countriesmodel->get_by_id($row->country_id)->row();
	   $year = $row->statistic_year;
	   $month = $row->statistic_month;
	   
	   $dateObj   = DateTime::createFromFormat('!m', $month);
	   $monthName = $dateObj->format('F'); 
	   		
	   $data['points'] = $row->map_json;			
	   $data['overal_status'] = $row->overal_status;
	   $data['status_of_activity'] = $row->status_of_activity;
	   $data['series_category'] = $row->series_category;
	   $data['series'] = $row->series;	   
	   $data['pie_data'] = $row->pie_data;
	   $data['activity_table'] = $row->activity_table;
	   $data['beneficiaries_reached'] = $row->beneficiaries_reached;
	   $data['beneficiaries_by_sector'] = $row->beneficiaries_by_sector;
	   $data['target_vs_reached'] = $row->target_vs_reached;
	   $data['beneficiaries_by_district'] = $row->beneficiaries_by_district;	   
	   $data['activities_beneficiaries'] = $row->activities_beneficiaries;
	   $data['projects_beneficiaries'] = $row->projects_beneficiaries;
	   $data['monthName'] = $monthName;
	   $data['year'] = $year;
	   $data['country'] = $country->country;
	   $data['report_id'] = $row->id;
	   $data['graphcategories'] = $row->graphcategories;
	   $data['graphseries'] = $row->graphseries;
	   
	      	  
	   
       $this->load->view('statisticalreports/view', $data); 
	  
	   
	  
  }
  
  
    
  public function mailreport($id)
  {
	   if (!$this->erkanaauth->try_session_login()) {
       	redirect('login','refresh');
       }
       if(!is_numeric($id)) {
       	redirect('statisticalreports','refresh');
       }
	   
	     
	   $row = $this->db->get_where('statisticalreports', array('id' => $id))->row();
	   	   
       if(empty($row)) {
       	redirect('statisticalreports','refresh');
       }
	   else
	   {
		   $country = $this->countriesmodel->get_by_id($row->country_id)->row();
		   $year = $row->statistic_year;
		   $month = $row->statistic_month;
			   
		   $dateObj   = DateTime::createFromFormat('!m', $month);
		   $monthName = $dateObj->format('F');
		   
		   /*******GENERATE PDF FOR ATTACHMENT*******/
		   
		    // create new PDF document
			$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('DRC/DDG');
			$pdf->SetTitle('Monthly Statistical Report');
			$pdf->SetSubject('DRC/DDG Monthly Statistical Report');
			$pdf->SetKeywords('DRC, DDG, Report, Statistics','Projects','Beneficiaries','Activities');
			
			// set default header data
			$pdf->SetHeaderData(false, false, '', '');
			
			
			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			
			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
			
			
			//set margins
			//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			
			//set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			
			//set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
			
			//set some language-dependent strings
			//$pdf->setLanguageArray($l);
			
			// ---------------------------------------------------------
			
			// set font
			$pdf->SetFont('dejavusans', '', 9);
			
			$pdf->SetPrintHeader(false);
			
			// add a page
			$pdf->AddPage('L','A4');
	  
	  	  
	   
	   $html = '<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">';
	   $html .= '<tr><td><img src="'. base_url().'img/drc_logo.png" alt="" class="retina-ready" width="98" height="36">&nbsp;&nbsp;&nbsp; <img src="'.base_url().'img/ddg_logo.png" alt="" class="retina-ready" width="105" height="36"></td></tr>
<tr bgcolor="#1f7eb8"><th><center>
<font color="#FFFFFF"><strong>MONTHLY STATISTICAL REPORT '.strtoupper($country->country).' - '.strtoupper($monthName).' '.$year.'</strong></font>
</center></th></tr>';

		$html .= '<tr><td>
		<table width="100%" cellpadding="3" cellspacing="2">
		<tr>
		<td bgcolor="#892A24" width="50%">
		<font color="#FFFFFF"><strong>Overall status of projects </strong></font>
		</td>
		<td bgcolor="#892A24" width="50%">
		<font color="#FFFFFF"><strong>Map of projects in Somalia </strong></font>
		</td>
		</tr>
		<tr>
		<td valign="top">'.$row->overal_status.'</td>
		<td valign="top">
		<img src="'.base_url().'reportelements/'.$row->map_name.'" alt="" class="retina-ready">
		
		</td>
		</tr>
		</table>
		
		</td></tr>
		
		</table>';
		
		$html .= '<br pagebreak="true">';
		
		$html .= '
		<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
		<tr><td>
		<table width="100%" cellpadding="3" cellspacing="2">
		<tr><td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Status of Sub Activity Implementation</strong></font></td><td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Distribution of activities implemented by type vs status of implementation</strong></font></td></tr>
		<tr><td valign="top">'.$row->status_of_activity.'</td>
		<td valign="top">'.$row->activity_table.'
		</td></tr>
		
		</table>
		
		</td></tr>
		</table>';
		
		$html .= '<br pagebreak="true">';
		
		$html .= '
		<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
		<tr><td>
		<img src="'.base_url().'reportelements/'.$row->task_pie.'" alt="" class="retina-ready" height="400" weight="400">
		</td></tr>
		</table>';
		
		$html .= '<br pagebreak="true">';
		
		$html .= '
		<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
		<tr><td>
		<table width="100%" cellpadding="3" cellspacing="2">
		<tr><td bgcolor="#892A24"><font color="#FFFFFF"><strong>Distribution of activities in regions implemented by type </strong></font></td></tr>
		<tr><td>
		<img src="'.base_url().'reportelements/'.$row->distribution_graph.'" alt="" class="retina-ready" width="600">
		</td>
		</tr>
		</table>
		
		</td></tr>
		</table>
		';
		
		$html .= '<br pagebreak="true">';
		
		$html .= '
		<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
		<tr><td>
		<table width="100%" cellpadding="3" cellspacing="2">
		<tr><td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Beneficiaries Reached    </strong></font></td>
		<td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Beneficiaries reached by sector disaggrigated by age &amp; gender</strong></font></td></tr>
		
		<tr><td valign="top">'.$row->beneficiaries_reached.'</td>
		<td valign="top">'.$row->beneficiaries_by_sector.'</td>
		</tr>
		</table>
		
		</td></tr>
		</table>
		';
		
		$html .= '<br pagebreak="true">';
		
		
		$html .= '
		<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
		<tr><td><img src="'.base_url().'reportelements/'.$row->sector_graph.'" alt="" class="retina-ready" width="600"></td></tr>
		</table>
		';
		
		$html .= '<br pagebreak="true">';
		
		$html .= '
		<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
		<tr><td>
		<table width="100%" cellpadding="3" cellspacing="2">
		<tr><td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Beneficiaries reached versus the target number    </strong></font></td>
		<td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Beneficiaries reached by region disaggrigated by age &amp; gender</strong></font></td></tr>
		
		<tr><td valign="top">'.$row->target_vs_reached.'</td>
		
		<td valign="top">'.$row->beneficiaries_by_district.'</td>
		</tr>
		
		
		</table>
		</td></tr>
		</table>';
		
		$html .= '<br pagebreak="true">';
		
		$html .= '
		<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
		<tr><td>
		<table width="100%" cellpadding="3" cellspacing="2">
		<tr><td bgcolor="#892A24"><font color="#FFFFFF"><strong>Sub Activities and beneficiaries</strong></font></td>
		</tr>
		<tr>
		<td valign="top">
		<p>The table below gives a brief summary of all the subactivities activities conducted and the beneficiaries reached.</p>
		'.$row->activities_beneficiaries.'
		</td>
		</tr> 
		</table>
		
		</td></tr>
		</table>
		';
		
		
		$html .= '<br pagebreak="true">';
		
		$html .= '
		<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
		<tr><td>
		<table width="100%" cellpadding="3" cellspacing="2">
		<tr>
		  <td bgcolor="#892A24"><font color="#FFFFFF"><strong>Projects and beneficiaries</strong></font></td>
		</tr>
		<tr>
		<td valign="top">
		'.$row->projects_beneficiaries.'
		</td>
		</tr>
		   
		</table>
		
		</td></tr>';
		
			   $html .= '</table>';
	   
	   // output the HTML content
			$pdf->writeHTML($html, true, false, true, false, '');
			
			$txt = date("m/d/Y h:m:s");    
	
	 // print a block of text using Write()
	 //$pdf->Write($h=0, $txt, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
			// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			// test pre tag
			
			
			// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			
			// reset pointer to the last page
			$pdf->lastPage();
			
			ob_start();
				// ---------------------------------------------------------
			 //ob_end_clean();
			//Close and output PDF document
			$pdf->Output('./savedreports/Statistical_report_'.$country->country.'_'.$monthName.'_'.$year.'.pdf', 'F');
			
			
			//============================================================+
			// END OF FILE                                                
			//============================================================+
			
		   
		   
		   /****************END OF PDF GENERATION*********************/
	   	 	   
		   $users = $this->usersmodel->get_list_by_country($row->country_id);
		   
		   if(empty($users))
		   {
			   $this->session->set_flashdata('error_message', 'There are no users for the country in the database.');
		   }
		   else
		   {
		   
			   foreach($users as $key=>$user)
			   {
				   $this->email->clear();
				   
				   $config['protocol'] = 'mail';
				   $config['charset'] = 'iso-8859-1';
				   $config['wordwrap'] = TRUE;
				   $config['mailtype'] = 'html';
				   $config['newline'] = '\r\n';
				   
				   $this->email->initialize($config);
								
				   $this->email->from('no-reply@drcdatabase.org', 'DRC/DDG M&E Database');
				   $this->email->to($user['user_email']);
								
				   $subject = 'MONTHLY STATISTICAL REPORT '.strtoupper($country->country).' - '.strtoupper($month).' '.$year.'';
								
				   $this->email->subject($subject);
				   
				   $message = '<p>'.$user['fname'].' '.$user['lname'].',</p>
								
					<p>Please note that the Monthly Statistical Report for  '.$country->country.' - '.$month.' '.$year.' has been generated in the DRC/DDG Central M&E Database System and is ready for review. The report is herewith attached for your perusal.</p>
					<p>Thank You,<br><br>
					DRC/DDG Monitoring and Evaluation Team.</p>
								
					<p>This is an auto generated email, please do not respond.</p>
					';
						
					$this->email->message($message);
					//attach document
					$this->email->attach('./savedreports/Statistical_report_'.$country->country.'_'.$monthName.'_'.$year.'.pdf');
														
					$this->email->send();
			   }// end for loop
			   
			   //delete_files('./savedreports/');
			   
			   $this->session->set_flashdata('success_message', 'The email notifications have been sent to the users.');
		   
		   }// end else for empty user check
		   
		   redirect('statisticalreports','refresh');
	   }// end empty row check else
  }
  
  public function download()
  {
	  
	  $url = $_POST['url'];
		$object = $_POST['object'];
		$link = $url.''.$object;
		
		$country = $_POST['country'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$report_id = $_POST['report_id'];
		
		$image = file_get_contents($link); 
		
		$fp  = fopen('./reportelements/pie_'.$country.'_'.$month.'_'.$year.'.jpg', 'w+');	
		
		$task_pie = 'pie_'.$country.'_'.$month.'_'.$year.'.jpg';	
		
		
		fputs($fp, $image); 
		fclose($fp); 
		unset($image);
		
		$data = array(
               'task_pie' => $task_pie,
           );
           $this->db->where('id', $report_id);
           $this->db->update('statisticalreports', $data);
	  
  }
  
  public function downloadgraph()
  {
	  
	  $url = $_POST['url'];
		$object = $_POST['object'];
		$link = $url.''.$object;
		
		$country = $_POST['country'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$report_id = $_POST['report_id'];
		
		$image = file_get_contents($link); 
		
		$fp  = fopen('./reportelements/graph_'.$country.'_'.$month.'_'.$year.'.jpg', 'w+');	
		
		$distribution_graph = 'graph_'.$country.'_'.$month.'_'.$year.'.jpg';	
		
		
		fputs($fp, $image); 
		fclose($fp); 
		unset($image);
		
		$data = array(
               'distribution_graph' => $distribution_graph,
           );
           $this->db->where('id', $report_id);
           $this->db->update('statisticalreports', $data);
	  
  }
  
  
   public function sectorgraph()
  {
	  
	  $url = $_POST['url'];
		$object = $_POST['object'];
		$link = $url.''.$object;
		
		$country = $_POST['country'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$report_id = $_POST['report_id'];
		
		$image = file_get_contents($link); 
		
		$fp  = fopen('./reportelements/sectorgraph_'.$country.'_'.$month.'_'.$year.'.jpg', 'w+');	
		
		$sector_graph = 'sectorgraph_'.$country.'_'.$month.'_'.$year.'.jpg';	
		
		
		fputs($fp, $image); 
		fclose($fp); 
		unset($image);
		
		$data = array(
               'sector_graph' => $sector_graph,
           );
           $this->db->where('id', $report_id);
           $this->db->update('statisticalreports', $data);
	  
  }
  
  
  
  
   public function templateview($id)
  {
	  
	  // create new PDF document
			$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('DRC/DDG');
			$pdf->SetTitle('Monthly Statistical Report');
			$pdf->SetSubject('DRC/DDG Monthly Statistical Report');
			$pdf->SetKeywords('DRC, DDG, Report, Statistics','Projects','Beneficiaries','Activities');
			
			// set default header data
			$pdf->SetHeaderData(false, false, '', '');
			
			
			// set header and footer fonts
			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			
			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
			
			
			//set margins
			//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			
			//set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			
			//set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
			
			//set some language-dependent strings
			//$pdf->setLanguageArray($l);
			
			// ---------------------------------------------------------
			
			// set font
			$pdf->SetFont('dejavusans', '', 9);
			
			$pdf->SetPrintHeader(false);
			
			// add a page
			$pdf->AddPage('L','A4');
	  
	   
	   $row = $this->db->get_where('statisticalreports', array('id' => $id))->row();
       if(empty($row)) {
       	redirect('statisticalreports','refresh');
       }
	   
	   $country = $this->countriesmodel->get_by_id($row->country_id)->row();
	   $year = $row->statistic_year;
	   $month = $row->statistic_month;
	   
	   $dateObj   = DateTime::createFromFormat('!m', $month);
	   $monthName = $dateObj->format('F'); 
	   
	   $html = '<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">';
	   $html .= '<tr><td><img src="'. base_url().'img/drc_logo.png" alt="" class="retina-ready" width="98" height="36">&nbsp;&nbsp;&nbsp; <img src="'.base_url().'img/ddg_logo.png" alt="" class="retina-ready" width="105" height="36"></td></tr>
<tr bgcolor="#1f7eb8"><th><center>
<font color="#FFFFFF"><strong>MONTHLY STATISTICAL REPORT '.strtoupper($country->country).' - '.strtoupper($monthName).' '.$year.'</strong></font>
</center></th></tr>';

$html .= '<tr><td>
<table width="100%" cellpadding="3" cellspacing="2">
<tr>
<td bgcolor="#892A24" width="50%">
<font color="#FFFFFF"><strong>Overall status of projects </strong></font>
</td>
<td bgcolor="#892A24" width="50%">
<font color="#FFFFFF"><strong>Map of projects in Somalia </strong></font>
</td>
</tr>
<tr>
<td valign="top">'.$row->overal_status.'</td>
<td valign="top">
<img src="'.base_url().'reportelements/'.$row->map_name.'" alt="" class="retina-ready">

</td>
</tr>
</table>

</td></tr>

</table>';

$html .= '<br pagebreak="true">';

$html .= '
<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
<tr><td>
<table width="100%" cellpadding="3" cellspacing="2">
<tr><td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Status of Sub Activity Implementation</strong></font></td><td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Distribution of activities implemented by type vs status of implementation</strong></font></td></tr>
<tr><td valign="top">'.$row->status_of_activity.'</td>
<td valign="top">'.$row->activity_table.'
</td></tr>

</table>

</td></tr>
</table>';

$html .= '<br pagebreak="true">';

$html .= '
<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
<tr><td>
<img src="'.base_url().'reportelements/'.$row->task_pie.'" alt="" class="retina-ready" height="400" weight="400">
</td></tr>
</table>';

$html .= '<br pagebreak="true">';

$html .= '
<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
<tr><td>
<table width="100%" cellpadding="3" cellspacing="2">
<tr><td bgcolor="#892A24"><font color="#FFFFFF"><strong>Distribution of activities in regions implemented by type </strong></font></td></tr>
<tr><td>
<img src="'.base_url().'reportelements/'.$row->distribution_graph.'" alt="" class="retina-ready" width="600">
</td>
</tr>
</table>

</td></tr>
</table>
';

$html .= '<br pagebreak="true">';

$html .= '
<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
<tr><td>
<table width="100%" cellpadding="3" cellspacing="2">
<tr><td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Beneficiaries Reached    </strong></font></td>
<td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Beneficiaries reached by sector disaggrigated by age &amp; gender</strong></font></td></tr>

<tr><td valign="top">'.$row->beneficiaries_reached.'</td>
<td valign="top">'.$row->beneficiaries_by_sector.'</td>
</tr>
</table>

</td></tr>
</table>
';

$html .= '<br pagebreak="true">';


$html .= '
<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
<tr><td><img src="'.base_url().'reportelements/'.$row->sector_graph.'" alt="" class="retina-ready" width="600"></td></tr>
</table>
';

$html .= '<br pagebreak="true">';

$html .= '
<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
<tr><td>
<table width="100%" cellpadding="3" cellspacing="2">
<tr><td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Beneficiaries reached versus the target number    </strong></font></td>
<td bgcolor="#892A24" width="50%"><font color="#FFFFFF"><strong>Beneficiaries reached by region disaggrigated by age &amp; gender</strong></font></td></tr>

<tr><td valign="top">'.$row->target_vs_reached.'</td>

<td valign="top">'.$row->beneficiaries_by_district.'</td>
</tr>


</table>
</td></tr>
</table>';

$html .= '<br pagebreak="true">';

$html .= '
<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
<tr><td>
<table width="100%" cellpadding="3" cellspacing="2">
<tr><td bgcolor="#892A24"><font color="#FFFFFF"><strong>Sub Activities and beneficiaries</strong></font></td>
</tr>
<tr>
<td valign="top">
<p>The table below gives a brief summary of all the subactivities activities conducted and the beneficiaries reached.</p>
'.$row->activities_beneficiaries.'
</td>
</tr> 
</table>

</td></tr>
</table>
';


$html .= '<br pagebreak="true">';

$html .= '
<table width="100%" cellpadding="3" cellspacing="0" border="1" bordercolor="#999999">
<tr><td>
<table width="100%" cellpadding="3" cellspacing="2">
<tr>
  <td bgcolor="#892A24"><font color="#FFFFFF"><strong>Projects and beneficiaries</strong></font></td>
</tr>
<tr>
<td valign="top">
'.$row->projects_beneficiaries.'
</td>
</tr>
   
</table>

</td></tr>';

	   $html .= '</table>';
	   
	   // output the HTML content
			$pdf->writeHTML($html, true, false, true, false, '');
			
			$txt = date("m/d/Y h:m:s");    
	
	 // print a block of text using Write()
	 //$pdf->Write($h=0, $txt, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
			// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			// test pre tag
			
			
			// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			
			// reset pointer to the last page
			$pdf->lastPage();
			ob_start();
				// ---------------------------------------------------------
			 //ob_end_clean();
			//Close and output PDF document
			$pdf->Output('Statistical_report_'.$country->country.'_'.$monthName.'_'.$year.'.pdf', 'I');
			
			
			//============================================================+
			// END OF FILE                                                
			//============================================================+
	   
	   
	   
	  
  }
  
  public function detail($id)
  {
	  /**
	   if(!is_numeric($id)) {
       	redirect('statisticalreports','refresh');
       }
	   
	   **/
	   
	   $row = $this->db->get_where('statisticalreports', array('id' => $id))->row();
       if(empty($row)) {
       	redirect('statisticalreports','refresh');
       }
	   
	   $data = array();
	   
	   $country = $this->countriesmodel->get_by_id($row->country_id)->row();
	   $year = $row->statistic_year;
	   $month = $row->statistic_month;
	   
	   $dateObj   = DateTime::createFromFormat('!m', $month);
	   $monthName = $dateObj->format('F'); 
	   		
	   $data['points'] = $row->map_json;			
	   $data['overal_status'] = $row->overal_status;
	   $data['status_of_activity'] = $row->status_of_activity;
	   $data['series_category'] = $row->series_category;
	   $data['series'] = $row->series;	   
	   $data['pie_data'] = $row->pie_data;
	   $data['activity_table'] = $row->activity_table;
	   $data['beneficiaries_reached'] = $row->beneficiaries_reached;
	   $data['beneficiaries_by_sector'] = $row->beneficiaries_by_sector;
	   $data['target_vs_reached'] = $row->target_vs_reached;
	   $data['beneficiaries_by_district'] = $row->beneficiaries_by_district;	   
	   $data['activities_beneficiaries'] = $row->activities_beneficiaries;
	   $data['projects_beneficiaries'] = $row->projects_beneficiaries;
	   $data['monthName'] = $monthName;
	   $data['year'] = $year;
	   $data['country'] = $country->country;
	   	  
	   
       $this->load->view('statisticalreports/view', $data); 
	  
	   
	  
  }
  
  
  public function getnumbers()
  {
	  
	   $country_id = 2;
	   $month = 03;
	   $year = 2017;
	   
	   $activities = $this->projectactivitiesmodel->get_by_country_period($country_id,$month,$year);
	   
	   $activities_beneficiaries = '<table border="1">
		<thead>
			<tr>
				<th>
					<strong>Project Code</strong></th>
				<th>
					<strong>Sector</strong></th>
				<th>
					<strong>Task</strong></th>
				<th>
					<strong>Task description</strong></th>
				<th>
					<strong>status</strong></th>
				
				<th colspan="3">
					<strong>Beneficiaries (by gender)</strong></th>
				
				<th>Beneficiaries (uncategorised)</th>
				
				<th>IDP</th>
			</tr>
			</thead>
			<tbody>
			';
			
			$activities_beneficiaries .= '<tr>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				<td>&nbsp;
					</td>
				
				<td><strong>Male</strong></td>
				<td><strong>Female</strong></td>
				<td><strong>Total</strong></td>
				<td><strong>Numbers Reached</strong></td>
				<td>&nbsp;</td>
			</tr>';
			
		
		$total_male = 0;
		$total_female = 0;
		$total_line_total = 0;
		$total_beneficiaries_reached = 0;
		
		$altclass = 'class="alt"';
			
		foreach($activities as $key=>$activity)
		{
			$project = $this->projectsmodel->get_by_id($activity->project_id)->row();
			$sector = $this->sectorsmodel->get_by_id($activity->sector_id)->row();
			$status = $this->projectactivitystatusmodel->get_by_id($activity->projectactivitystatus_id)->row();
			
			$num_male = $this->beneficiarysubcategoriesmodel->get_activities_by_gender_beneficiary($activity->id,$month,$year,1);
			$num_female = $this->beneficiarysubcategoriesmodel->get_activities_by_gender_beneficiary($activity->id,$month,$year,2);
			$total_num = ($num_male + $num_female);
			
			$total_male = $total_male + $num_male;
			$total_female = $total_female + $num_female;
			$total_line_total = $total_line_total + $total_num;
			$total_beneficiaries_reached = ($total_beneficiaries_reached + $activity->total_beneficiaries);
			
			$row = $this->db->get_where('projectactivitiesbeneficiaries', array('projectactivity_id' => $activity->id,'beneficiary_id' => 1))->row();
			
			if($altclass == 'class="alt"')
			{
				$altclass = '';
			}
			else
			{
				$altclass = 'class="alt"';
			} 
			
			$activities_beneficiaries .= '<tr '.$altclass.'>
				<td>
					'.$project->project_no.'</td>			
					<td>
					'.$sector->sector.'</td>
				<td>
					('.$activity->id.')'.$activity->activity.'</td>
				<td>
					'.$activity->activity_description.'</td>
				<td>
					'.$status->status.'</td>
				
				<td>'.number_format($num_male).'</td>
				<td>'.number_format($num_female).'</td>
				<td>'.number_format($total_num).'</td>
				<td>'.number_format($activity->total_beneficiaries).'</td>
				<td>'.$row->number_reached.'</td>
			</tr>';
			
		}
		
		$activities_beneficiaries .= '<tr>
				<td colspan="5">TOTAL BENEFICIARIES REPORTED REACHED DURING THE MONTH</td>
				<td><strong>'.number_format($total_male).'</strong></td>
				<td><strong>'.number_format($total_female).'</strong></td>
				<td><strong>'.number_format($total_line_total).'</strong></td>
				<td><strong>'.number_format($total_beneficiaries_reached).'</strong></td>
				<td>&nbsp;</td>
			</tr>';
		
		$activities_beneficiaries .= '</tbody>
	</table>';
	
	
	echo $activities_beneficiaries;
			
			
  }
  

}
