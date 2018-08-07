<?php include(APPPATH . 'views/common/head.php'); ?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
  document.getElementById('info').innerHTML = [
    latLng.lat(),
    latLng.lng()
  ].join(', ');
}

function updateMarkerAddress(str) {
  document.getElementById('address').innerHTML = str;
}

function initialize() {
  var latLng = new google.maps.LatLng(<?php echo $row->lat;?>, <?php echo $row->long;?>);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 8,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });
  
  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);
  
  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });
  
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function (event) {


            document.getElementById("lat").value = event.latLng.lat();
            document.getElementById("long").value = event.latLng.lng();
        });
		
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);
</script>

 <style>
  #mapCanvas {
    width: 500px;
    height: 400px;
    float: left;
  }
  #infoPanel {
    float: left;
    margin-left: 10px;
  }
  #infoPanel div {
    margin-bottom: 5px;
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
							<a href="<?php echo base_url() ?>districts">districts</a>
						</li>
					</ul>
				<div class="close-bread">
					<a href="#">
						<i class="fa fa-times"></i>
					</a>
				</div>
				</div>
				<div class="row">
				<div class="col-sm-12">
				<div class="box box-bordered">
				<div class="box-title">
					<h3>
						<i class="fa fa-th-list"></i>Edit Form
					</h3>
				</div>
				<div class="box-content nopadding">
					<?php if(validation_errors()){?>
						<p><div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Note!</strong><?php echo validation_errors(); ?>
							</div>
						</p>
					<?php } ?>
					<?php $attributes = array('name' => 'frm', 'id'=>'frm','enctype' => 'multipart/form-data', 'class'=>'form-horizontal form-striped form-validate');?>
					<?php echo form_open('districts/edit_validate/'.$row->id,$attributes); ?>
			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">County id</label>
				<div class="col-sm-10">
                
                <select  name="county_id" id="county_id" class="form-control" required="required">
                    
                    <?php
                    foreach($counties as $key=>$county)
                    {
                    ?>
                    <option value="<?php echo $county['id'];?>" <?php if($row->county_id==$county['id']){ echo 'selected="selected"';}?>><?php echo $county['county'];?></option>
                    <?php	
                    }
                    ?>
                    </select>
				
				</div>
			</div>

			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">District</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'district', 'name' => 'district', 'value' => $row->district, 'class'=>'form-control','required'=>'required');
 					echo form_input($data, set_value('district'));
					?>
				</div>
			</div>

			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Population</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'population', 'name' => 'population', 'value' => $row->population, 'class'=>'form-control','required'=>'required');
 					echo form_input($data, set_value('population'));
					?>
				</div>
			</div>

			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Lat</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'lat', 'name' => 'lat', 'value' => $row->lat, 'class'=>'form-control','required'=>'required');
 					echo form_input($data, set_value('lat'));
					?>
				</div>
			</div>

			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Long</label>
				<div class="col-sm-10">
					<?php 
					$data = array('id' => 'long', 'name' => 'long', 'value' => $row->long, 'class'=>'form-control','required'=>'required');
 					echo form_input($data, set_value('long'));
					?>
				</div>
			</div>
            
            <div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Map</label>
				<div class="col-sm-10">
					
                    
                    
                     <div id="mapCanvas"></div>
  <div id="infoPanel">
    <b>Marker status:</b>
    <div id="markerStatus"><i>Click and drag the marker.</i></div>
    <b>Current position:</b>
    <div id="info"></div>
    <b>Closest matching address:</b>
    <div id="address"></div>
  </div>
                    
                    
                    
				</div>
			</div>

					<div class="form-actions col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">UPDATE CHANGES</button>
					</div>
				<?php echo form_close(); ?>
 			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

</body>
</html>
