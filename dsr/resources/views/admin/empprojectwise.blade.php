@extends('layouts.app')

@section('content')

<div class="row">

      
                
                
                {!! Form::open(['method' => 'post', 'action' => 'ProjectsController@empprojectwise', 'id'=>'form_1', 'files' => true ]) !!} 
                {{ csrf_field() }}
				<div class="panel-body">
                    <div class="row">		
                        <div class="col-lg-6">		
            				<div class="form-group">
                                {!! Form::label('title', 'Project') !!}
                                {!! Form::select('project_id',$allProjects, $selected_project_id, ['class'=>'form-control', 'id'=>'project_id']) !!}
                            </div>
                        </div>
                        <!-- 
                        <div class="col-lg-1">
                        	<div class="form-group">
                            	{!! Form::label('title', '&nbsp;') !!}
                            	{!! Form::submit('submit', ['class'=>'form-control btn btn-primary', 'id'=>'submit']) !!}
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div> 
                        </div>
                        --> 
                    </div>
                </div>                        
				{!! Form::close() !!}
				
				
    <div class="col-lg-12">
    	@if(count($selected_project_id)>1)
        	<h3 class="page-header"><span style="color:red;">{{$TotalEmpOnProject}}</span> {{$heading}} working on <span style="color:red;">{{$allProjects[4]}}</span></h3>
        @else
        	<h3 class="page-header"><span style="color:red;">{{$TotalEmpOnProject}}</span> {{$heading}} working on <span style="color:red;">{{$allProjects[$selected_project_id[0]]}}</span></h3>
        @endif
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

 <!-- /.row -->
<div class="row">
<div class="col-lg-12">


					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                        <thead>
                            <tr>
                                <th>Eid</th>
                                <th>Name</th>
                                <th>TH/LH/DSRH</th>
                                <th>Designation</th>
                                <th>Current Project</th>
                                <th>Shift</th>
                                <th>Manager</th>
                                <th>Contact No</th>
                                <th>DOB</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $empolyee)
                            <tr class="odd gradeX">
                                <td>{{$empolyee->emp_id}}</td>
                                <td><a href="{{url('/')}}/admin/{{$empolyee->id}}/edit" class='curEmp' id="{{$empolyee->id}}"  data-toggle="popover{{$empolyee->id}}">{{$empolyee->first_name}} {{$empolyee->last_name}}</a></td>
                                <td class="tooltip-demo">
                                <a href="{{url('/')}}/user/timelog/{{$empolyee->id}}" data-toggle="tooltip" data-placement="top" title="Time Log"><img src="{{url('/')}}/images/clock10.gif"></a> &nbsp; 
                                
                                <a href="{{url('/')}}/user/leaves/{{$empolyee->id}}" data-toggle="tooltip" data-placement="top" title="Leave History"><img src="{{url('/')}}/images/lh3.gif"></a> &nbsp; 
                                
                                <a href="{{url('/')}}/user/listdsr/{{$empolyee->id}}" data-toggle="tooltip" data-placement="top" title="DSR History"><img src="{{url('/')}}/images/dsrh1.gif"></a></td>
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
                                	<div class="tooltip-demo"><a href="{{url('/')}}/projects/{{$empolyee->project->id}}/edit" class="{{$onBenchClass}}" data-toggle="tooltip" data-placement="left" title="Project Members ({{$allEmpProject[$empolyee->project->id]}})">{{$empolyee->project->project_name}}</a></div>
                                	@endif
                                </td>
                                <td>
                                	<!--<a href="javascript:void(0);" data-toggle="shift{{$empolyee->id}}">{{$empolyee->working_on_shift}}</a>-->
                                	{{$empolyee->working_on_shift}}
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
];

?>

<?php foreach($employees as $empolyee){ ?>    
$('[data-toggle="popover{{$empolyee->id}}"]').popover({
    placement : 'left',
    trigger : 'hover',
    html : true,
    content : '<div class="media"><a href="#" class="pull-left"><img src="{{url('/')}}/images/employees/{{$empolyee->photo}}" class="media-object" width="244" alt="{{$empolyee->first_name}} {{$empolyee->last_name}}"></a><div class="media-body"></div></div>'
});

var shiftDropDown = '<select>';
<?php foreach($shifts as $shiftKey => $aShift){ ?>
	shiftDropDown = shiftDropDown + '<option value="{{$shiftKey}}">{{$aShift}}</option>';
<?php } ?>
shiftDropDown = shiftDropDown + '</select>';

$('[data-toggle="shift{{$empolyee->id}}"]').popover({
    placement : 'right',
    trigger : 'click',
    html : true,
    content : '<div class="media">' +shiftDropDown+ ' &nbsp;<a id="close-{{$empolyee->id}}" class="closeShift" href="javascript:void(0);">X</a> </div>'
});

<?php } ?>


$(".closeShift").click(function(){

	/*	
	var closeLink, row_closeLink, closeid;
	closeLink = this.id;
	row_closeLink = closeLink.split("-");
    closeid = row_closeLink[1];
    alert(closeid);
    */
    //$("#shift"+closeid).style('display:none;');	
    
	
}); 


$("#project_id").change(function(){

	 $( "#form_1" ).submit();    
	
}); 

-->

</script>
    

@endsection