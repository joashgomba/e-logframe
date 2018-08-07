<?php include(APPPATH . 'views/common/head.php'); ?>
<style>
    #map-canvas{
      width: 100%;
      height: 500px;
	    padding: 6px;
        border-width: 1px;
        border-style: solid;
        border-color: #ccc #ccc #999 #ccc;
        -webkit-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        -moz-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        box-shadow: rgba(64, 64, 64, 0.1) 0 2px 5px;
    }
	
	img { max-width:none; }
  </style>
  
   <style type="text/css">
   .labels {
     color: red;
     background-color: white;
     font-family: "Lucida Grande", "Arial", sans-serif;
     font-size: 10px;
     font-weight: bold;
     text-align: center;
     width: 40px;     
     border: 2px solid black;
     white-space: nowrap;
   }
 </style>
 
		<body>
			<?php include(APPPATH . 'views/common/navigation.php'); ?>
				<div class="container-fluid" id="content">
				<?php include(APPPATH . 'views/common/left.php'); ?>
				<div id="main">
				<div class="container-fluid">
				<?php include(APPPATH . 'views/common/pageheader.php'); ?>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="<?php echo site_url('home')?>">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="<?php echo base_url() ?>beneficiarytypes">Maps</a>
						</li>
					</ul>
				<div class="close-bread">
					<a href="#">
						<i class="fa fa-times"></i>
					</a>
				</div>
				</div>
				<div class="row">
				<div class="col-sm-3">
					<p>&nbsp;</p>
					
				</div>
				</div>
				<div class="row">
                <div class="col-sm-12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="fa fa-map-marker"></i>
									Activities map
								</h3>
							</div>
							<div class="box-content">
                             <?php 
					   $attributes = array('name' => 'frm', 'id' => 'frm', 'enctype' => 'multipart/form-data','onsubmit'=>'return(validate())');
					  echo form_open('maps/searchactivity',$attributes); ?>
                      <table class="table table-hover table-nomargin table-bordered">
                      
                                            
                    <tr>
                    <th>Project</th>
                    <td>
                    <select name="project_id" id="project_id" required="required" class='chosen-select form-control'>
                                            <option value="">Select Project</option>
                                           <?php foreach ($projects->result() as $project): ?>
                                           <option value="<?php echo $project->id;?>" <?php if($project->id==$project_id){ echo 'selected="selected"';}?>><?php echo $project->project_no;?> / <?php echo $project->project_title;?></option>
                                           <?php endforeach; ?>
                                            </select>
                    </td>
                    
                    
                    </tr>
                   
                      
                      
                      <tr><th colspan="2"><?php echo form_submit('submit', 'Get Map', 'class="btn btn-primary"'); ?></th></tr>
                      </table>
								<!--<table id="customers">
                               <tr><td colspan="9"><strong>Legend</strong> (Mouse over to view)</td></tr>
                               <tr><td><a href="javascript:void(0)" class="tooltip-success" data-rel="tooltip" title="Economic infrastructure and services"><img src="<?php echo base_url();?>img/economic_infrastructure_services.png" ></a></td><td><a href="javascript:void(0)" class="tooltip-success" data-rel="tooltip" title="Education"><img src="<?php echo base_url();?>img/education.png"></a></td><td><a href="javascript:void(0)" class="tooltip-success" data-rel="tooltip" title="Government and civil society"><img src="<?php echo base_url();?>img/government_civil_society.png"></a></td><td><a href="javascript:void(0)" class="tooltip-success" data-rel="tooltip" title="Health and nutrition"><img src="<?php echo base_url();?>img/health_nutrition.png"></a></td><td><a href="javascript:void(0)" class="tooltip-success" data-rel="tooltip" title="Humanitarian aid and protection"><img src="<?php echo base_url();?>img/humanitarian_aid_protection.png"></a></td><td><a href="javascript:void(0)" class="tooltip-success" data-rel="tooltip" title="Land, environment and climate change"><img src="<?php echo base_url();?>img/land_environment_climate_chage.png"></a></td><td><a href="javascript:void(0)" class="tooltip-success" data-rel="tooltip" title="Production"><img src="<?php echo base_url();?>img/production.png"></a></td><td><a href="javascript:void(0)" class="tooltip-success" data-rel="tooltip" title="Water, sanitation and public health"><img src="<?php echo base_url();?>img/water_sanitation_public_health.png"></a></td><td><a href="javascript:void(0)" class="tooltip-success" data-rel="tooltip" title="Other"><img src="<?php echo base_url();?>img/other.png"></a></td></tr>
                         
                               </table>-->
   <div id="json_data" style="display:none;">
									 <?php
                                    
                      					echo json_encode($points,JSON_HEX_QUOT | JSON_HEX_TAG);
                                     
                                     ?>
                                     </div>
                                   <div id="map-canvas"></div>
                                <script src="<?php echo base_url(); ?>js/mapwithmarker.js"></script>
                   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                   <script src="<?php echo base_url(); ?>js/markerclusterer.js"></script>
                  
  <script src="<?php echo base_url(); ?>js/map.js"></script>
                                
							</div>
						</div>
					</div>
                </div>
</div>
</div>
</div>
	</body>
</html>
