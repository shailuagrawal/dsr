@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">{{$heading}}</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

 <!-- /.row -->
<div class="row">
<div class="col-lg-12">
      
   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
<thead>
    <tr class="alert alert-success">

    <th style="text-align:left !important;">Shift:</th>
     @foreach($shiftEmpReport as $shifTime => $sr)
	<th style="text-align:center !important;">{{$shifTime}}</th>
     @endforeach   
    </tr>
</thead>
<tbody>
    <tr class="odd gradeX">
    <th style="text-align:left !important;color:green;">Employees:</th>
				@foreach($shiftEmpReport as $shifTime => $sr)	                                                
	<td align="center">{{$sr['no_emp']}}</td>
    @endforeach    
		</tr>
    <tr class="odd gradeX">
    <th style="text-align:left !important;color:red;">On Bench:</th>
				@foreach($shiftEmpReport as $shifTime => $sr)	                                                
	<td align="center">{{$sr['onbench']}}</td>
    @endforeach    
		</tr>                 			   
</tbody>
</table>             
                
                

					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example3">
                        <thead>
                            <tr>
                                <th>Eid</th>
                                <th>Name</th>
                                <th>TH/LH/DSRH/AH
                                <?php if(isset($GrandTotalAmount) && ($loggedInUser->designation=='Administrator' || $loggedInUser->designation=='MD' || $loggedInUser->designation=='HR' || $loggedInUser->designation=='Accountant' || $loggedInUser->designation=='Sr Programmer') ){ ?>
                                	:<font style="color:red;">{{$GrandTotalAmount}}</font>
                                <?php } ?>
                                	                                	
                                </th>
                                <th>Designation</th>
                                <th>Current Project</th>
                                <th>Shift</th>
                                <th>Manager</th>
                                <th>Contact No</th>
                                <th>DOB</th>
                                <th>Left On</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $empolyee)
                        
                         <?php 
                            $rowClass = '';
                             if(isset($allEmpLeaves[$empolyee->id])){ 
                                 
                                 if(date('Y-m-d') >= date('Y-m-d', strtotime($allEmpLeaves[$empolyee->id]['leave_from'])) 
                                     && date('Y-m-d') <= date('Y-m-d', strtotime($allEmpLeaves[$empolyee->id]['leave_to']))){
                                       $rowClass = 'background-color:#d9edf7;';      
                                 }

                                 /*       
                                 if((date('Y-m-d 00:00:00') >= $allEmpLeaves[$empolyee->id]['leave_from'].' 00:00:00' && date('Y-m-d 00:00:00') <= $allEmpLeaves[$empolyee->id]['leave_to'].' 24:59:59') || 
                                 (date('Y-m-d 00:00:00') >= $allEmpLeaves[$empolyee->id]['leave_to'].' 00:00:00' && date('Y-m-d 00:00:00') <= $allEmpLeaves[$empolyee->id]['leave_to'].' 00:00:00'))
                                                 
                                 {
                                       $rowClass = 'background-color:#d9edf7;';
                                 }
                                 */
                             }
                             
                         ?>
                         
                            <tr class="odd gradeX" style="{{$rowClass}}">
                                <td>{{$empolyee->emp_id}}</td>
                                <td><a href="{{url('/')}}/admin/{{$empolyee->id}}/edit" class='curEmp' id="{{$empolyee->id}}"  data-toggle="popover{{$empolyee->id}}">{{$empolyee->first_name}} {{$empolyee->last_name}}</a></td>
                                <td class="tooltip-demo">
                                
                                <a href="{{url('/')}}/user/timelog/{{$empolyee->id}}" data-toggle="tooltip" data-placement="top" title="Time Log"><img src="{{url('/')}}/images/clock10.gif"></a> &nbsp; 
                                
                                <a href="{{url('/')}}/user/leaves/{{$empolyee->id}}" data-toggle="tooltip" data-placement="top" title="Leave History"><img src="{{url('/')}}/images/lh3.gif"></a> &nbsp; 
                                
                                
                                <a href="{{url('/')}}/user/listdsr/{{$empolyee->id}}" data-toggle="tooltip" data-placement="top" title="DSR History"><img src="{{url('/')}}/images/dsrh1.gif"></a>&nbsp;
                                
                                
                                <?php if($loggedInUser->designation=='Administrator' || $loggedInUser->designation=='MD' || $loggedInUser->designation=='HR' || $loggedInUser->designation=='Accountant' || $loggedInUser->designation=='Sr Programmer' ){ ?>
        							<a href="{{url('/')}}/advance/history/{{$empolyee->id}}" data-toggle="tooltip" data-placement="top" title="Advance History"><img src="{{url('/')}}/images/A3.gif"></a>
        							&nbsp; 
        							<?php 
										if(isset($EmpAdvance[$empolyee->id])){
										    echo "<font style='font-size:11px;color:red;'>{$EmpAdvance[$empolyee->id]}</font>";
										}
									?>

        						<?php } ?>
                                
                                
                                <?php if(isset($allEmpLeaves[$empolyee->id])){ ?>

                                	<?php 
                                	$Leave_title = 'Leave from '. date('d-m-Y', strtotime($allEmpLeaves[$empolyee->id]['leave_from'])) ." to ". date('d-m-Y', strtotime($allEmpLeaves[$empolyee->id]['leave_to'])); ?>
                                	&nbsp; <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="{{$Leave_title}}"><img src="{{url('/')}}/images/leave_flag.gif"></a>
                                	
                                <?php } ?>
                                    
                                </td>
                                
                                <td>{{$empolyee->designation}}</td>
                                <td>
                                	@if(isset($empolyee->project))
                                	<?php 
                                	  $array = [4,831,1280];
                                	  $onBenchClass= '';
                                	  if(in_array($empolyee->project->id, $array)){
                                	      $onBenchClass= 'text-danger';
                                	  }
                                	?>
                                	<div class="tooltip-demo"><span class="projectName" id="projectName-{{$empolyee->id}}"><a href="{{url('/')}}/projects/{{$empolyee->project->id}}/edit" class="{{$onBenchClass}}" data-toggle="tooltip" data-placement="left" title="Project Members ({{@$allEmpProject[$empolyee->project->id]}})">{{$empolyee->project->project_name}}</a></span>
                                	<span class='projectList' id="projectList-{{$empolyee->id}}"></span>
                                	 &nbsp;&nbsp;<a href="javascript:void(0);" class="changeProject" id="changeProject-{{$empolyee->id}}" style="color:green;">edit</a></div>
                                	@endif
                                </td>
                                <td>
                                	 <a href="javascript:void(0);" data-toggle="shifttimings" id="l-{{$empolyee->id}}" class='shifttime'>{{$empolyee->working_on_shift}}</a>
                                	 <span class='timing' id="timing-{{$empolyee->id}}"></span>
                                	</td>
                                <td>
                                <?php if(isset($managerName[$empolyee->emp_id])){ ?>
                                        {{$managerName[$empolyee->emp_id]}}
                                <?php } ?>
                                </td>
                                <td>{{$empolyee->mobile_number}}
                                
                                	@if ($empolyee->landline_number!='')
                                		<!-- {{$empolyee->landline_number}}, --> 
                                	@endif
                                	@if ($empolyee->other_contact!='')
                                		<!--, {{$empolyee->other_contact}} -->
                                	@endif	
                                
                                
                                </td>
                                <td>
                                <?php 
                                    echo date("j M", strtotime($empolyee->dob));
                                ?>
                                </td>
                                <td>
                                <span style="display:none;"><?php echo strtotime($empolyee->company_left_on); ?></span>
                                 <?php echo date("d/m/Y", strtotime($empolyee->company_left_on)); ?>
                                </td>
                            </tr>
                        @endforeach    
 						</tbody>
                    </table>
                                                               
                
                   
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->



@endsection


@section('javascriptsection')
<style type="text/css">
    .bs-example{
        margin: 200px 150px 0;
    }
    .bs-example button{
        margin: 10px;
</style>

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
               
<script type="text/javascript">
<!--

<?php 

$shifts = [
    '07:00 AM' => '07:00 AM',
    '07:15 AM' => '07:15 AM',
    '07:30 AM' => '07:30 AM',
    '07:45 AM' => '07:45 AM',
    '08:00 AM' => '08:00 AM',
    '08:15 AM' => '08:15 AM',
    '08:30 AM' => '08:30 AM',
    '08:45 AM' => '08:45 AM',
    '09:00 AM' => '09:00 AM',
    '09:15 AM' => '09:15 AM',
    '09:30 AM' => '09:30 AM',
    '09:45 AM' => '09:45 AM',
    '10:00 AM' => '10:00 AM',
    '19:15 AM' => '19:15 AM',
    '10:30 AM' => '10:30 AM',
    '10:45 AM' => '10:45 AM',
    '11:00 AM' => '11:00 AM',
    '11:15 AM' => '11:15 AM',
    '11:30 AM' => '11:30 AM',
    '11:45 AM' => '11:45 AM',
    '12:00 PM' => '12:00 PM',
    '12:15 PM' => '12:15 PM',
    '12:30 PM' => '12:30 PM',
    '12:45 PM' => '12:45 PM',
    '01:00 PM' => '01:00 PM',
    '01:15 PM' => '01:15 PM',
    '01:30 PM' => '01:30 PM',
    '01:45 PM' => '01:45 PM',
    '01:00 PM' => '01:00 PM',
    '01:15 PM' => '01:15 PM',
    '01:30 PM' => '01:30 PM',
    '01:45 PM' => '01:45 PM',
    '02:00 PM' => '02:00 PM',
    '02:15 PM' => '02:15 PM',
    '02:30 PM' => '02:30 PM',
    '02:45 PM' => '02:45 PM',
    '03:00 PM' => '03:00 PM',
    '03:15 PM' => '03:15 PM',
    '03:30 PM' => '03:30 PM',
    '03:45 PM' => '03:45 PM',
    '04:00 PM' => '04:00 PM',
    '04:15 PM' => '04:15 PM',
    '04:30 PM' => '04:30 PM',
    '04:45 PM' => '04:45 PM',
    '05:00 PM' => '05:00 PM',
    '05:15 PM' => '05:15 PM',
    '05:30 PM' => '05:30 PM',
    '05:45 PM' => '05:45 PM',
    '06:00 PM' => '06:00 PM',
    '06:15 PM' => '06:15 PM',
    '06:30 PM' => '06:30 PM',
    '06:45 PM' => '06:45 PM',
    '07:00 PM' => '07:00 PM',
    '07:15 PM' => '07:15 PM',
    '07:30 PM' => '07:30 PM',
    '07:45 PM' => '07:45 PM',
    '08:00 PM' => '08:00 PM',
    '08:15 PM' => '08:15 PM',
    '08:30 PM' => '08:30 PM',
    '08:45 PM' => '08:45 PM',
    '09:00 PM' => '09:00 PM',
    '09:15 PM' => '09:15 PM',
    '09:30 PM' => '09:30 PM',
    '09:45 PM' => '09:45 PM',
    '10:00 PM' => '10:00 PM',
    '10:15 PM' => '10:15 PM',
    '10:30 PM' => '10:30 PM',
    '10:45 PM' => '10:45 PM',
    '11:00 PM' => '11:00 PM',
];

$allprojects = App\Project::where('active', '=', 1)->orderBy('project_name')->get();


foreach($allprojects as $aProject){
    $projects[$aProject->id] = $aProject->project_name;
}

?>


<?php foreach($employees as $empolyee){ ?>    
$('[data-toggle="popover{{$empolyee->id}}"]').popover({
    placement : 'left',
    trigger : 'hover',
    html : true,
    content : '<div class="media"><a href="#" class="pull-left"><img src="{{url('/')}}/images/employees/{{$empolyee->photo}}" class="media-object" width="244" alt="{{$empolyee->first_name}} {{$empolyee->last_name}}"></a><div class="media-body"></div></div>'
});



<?php } ?>


-->
$(".changeProject").click(function(){

	result=$(this).attr('id').split('-');
	elId = result[1]


	   $.get("ajax/get/project/"+elId, function(data, status){

	    	var projectsDropDown = '<select class="projectselector" onChange="changeProject('+elId+', this.value);" id="selectedProject'+elId+'" >';
	    	<?php foreach($projects as $projectKey => $aProject){ ?>
	    	projectsDropDown = projectsDropDown + '<option value="{{$projectKey}}" >{{$aProject}}</option>';
	    	<?php } ?>
	    	projectsDropDown = projectsDropDown + '</select>';

	    	
	    	elementId = 'projectList-'+ elId;
	    	
	      	$("#"+elementId).append(projectsDropDown);

	      	$("#projectName-"+elId).hide();
	      	$("#changeProject-"+elId).hide();
	      	
	      	$('#selectedProject'+elId).val(data);
	      	  	
	    });
    
}); 



$(".shifttime").click(function(){

	result=$(this).attr('id').split('-');
	
	elId = result[1];
	
    $.get("ajax/get/shift/"+elId, function(data, status){

    	var shiftDropDown = '<select class="timeselector" onChange="changeTime('+elId+', this.value);" id="selectedList'+elId+'" >';
    	<?php foreach($shifts as $shiftKey => $aShift){ ?>
    		shiftDropDown = shiftDropDown + '<option value="{{$shiftKey}}" >{{$aShift}}</option>';
    	<?php } ?>
    	shiftDropDown = shiftDropDown + '</select>';

    	
    	elementId = 'timing-'+ elId;
    	
      	$("#"+elementId).html(shiftDropDown);

      	
      	$("#l-"+elId).hide();
      	
      	
      	$('#selectedList'+elId).val(data);
      	  	
    });
    
}); 


$(document).keyup(function(e) {
	  if (e.which == 27) {

	      	$(".timing").html('');
	      	$(".shifttime").show();
	      	
	      	$(".projectList").html('');
	      	$(".changeProject").show();
	      	$(".projectName").show();
	      		      	
	  } 
});

function changeTime(elId, time){

	$.get("ajax/change/shift/"+elId+"/"+time, function(data, status){
      	$("#l-"+elId).html(data);
      	$("#l-"+elId).show();
      	$("#timing-"+elId).html('');
	});
}

function changeProject(elId, project_id){

	$.get("ajax/change/project/"+elId+"/"+project_id, function(data, status){

		
		
		$("#projectName-"+elId).html(data);
		
      	$(".projectList").html('');
      	$(".changeProject").show();
      	$(".projectName").show();
      	
	});
}

/*
$(".timeselector").change(function(){
	alert('hi');
	
}); 
*/


</script>
    

@endsection