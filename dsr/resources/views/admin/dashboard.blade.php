@extends('layouts.app')

@section('content')


            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">Dashboard</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <a href="{{url('/')}}/admin"  class="panel-primary">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-sitemap fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$report['TotalEmployees']}}</div>
                                    <div>Total Employees</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/')}}/admin">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </a>
                
                <a href="{{url('/')}}/projects" class="panel-green">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$report['TotalProjects']}}</div>
                                    <div>Total Projects</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/')}}/projects">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                 </a>
                
                <a href="{{url('/')}}/absentee/report/1" class="panel-yellow">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plane fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$empOnLeave}}</div>
                                    <div>Total Employees On Leave</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/')}}/absentee/report/1">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                </a>
                
                 <a href="{{url('/')}}/employees/project/report" class="panel-red">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tablet fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$report['TotalOnBenchEmployees']}}</div>
                                    <div>Total Employees On Bench</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/')}}/employees/project/report">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                 </a>
                 
            </div>
            <!-- /.row -->
            <div class="row">
                
                

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
                    
                
                
            </div>
            <!-- /.row -->


		<?php if(count($data)>0){ ?>
           <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">Pending Leave Requests</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            
            <?php 
            $allStatus = [];
            //$allStatus[0] = 'Pending';
            $allStatus[2] = 'Approve';
            $allStatus[3] = 'Reject';
            $allStatus[4] = 'Cancel';
            ?>
            
            
            			
            			{!! Form::open(['method' => 'post', 'action' => 'ProjectsController@leaveupdate', 'files' => true ]) !!}
            			     
  						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                        <thead>
                            <tr>
                            	<th>Leave Id</th>
                            	<th>Request Date</th>
                            	<th>Employee</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Days</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th><input type='checkbox' name="checkallleaves" id="checkallleaves" ></th>
                            </tr>
                        </thead>
                        <tbody>                        
                        @foreach($data as $k => $aLeave)     
                                     
                            <tr>
                            	<td><a href="{{url('/')}}/leave/{{$aLeave['leave_id']}}/edit">LA{{$aLeave['leave_id']}}</a></td>
                            	<td>{{$aLeave['created_at']}}</td>
                            	<td><a href="{{url('/')}}/admin/{{$aLeave['user_id']}}/edit">{{$aLeave['name']}}</a></td>
                                <td>{{$aLeave['leave_from']}}</td>
                                <td>{{$aLeave['leave_to']}}</td>
                                <td>{{$aLeave['no_working_days']}}</td>
                                <td>
                                                                
                                <div class="tooltip-demo">
                                <span data-toggle="tooltip" data-original-title="{{$aLeave['reason']}}"><?php echo substr($aLeave['reason'],0, 55); ?>...</span></div>
                                </td>
                                <td><span class="updatestatus" id="{{$aLeave['leave_id']}}">{{$aLeave['status']}}</span>
                                
                                <!-- 
                                <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <span id="updatedstatus{{$aLeave['leave_id']}}">{{$aLeave['status']}}</span>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        @foreach($allStatus as $k => $aStatus)                                    
                                        <li><a href="#"><span class="updatestatus" id="{{$aLeave['leave_id']}}-{{$k}}">{{$aStatus}}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                                -->
                            
                                </td>
                                <td>{{$aLeave['category']}}</td>
                                <td>{{$aLeave['type']}}</td>
                                <td><input type="checkbox" name="leave_id[]" value="{{$aLeave['leave_id']}}"></td>
                            </tr>
           					                    
                        @endforeach     
							
						</tbody>
                    </table>			
                    
                    <div class="form-group" style='text-align:left;'>
                        Bulk Action: {!! Form::select('actiontaken',$allStatus, null, ['class'=>'form-control','style'=>'width:250px;', 'id'=>'actiontaken']) !!}
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>                                            
                    </div>  
                     {!! Form::hidden('fromDashboard', 1) !!}
                                        			
  					{!! Form::close() !!}
                
            </div>
              <!-- /.row -->
              <?php } ?>
               
<script>
document.getElementById("checkallleaves").addEventListener("click", function(){
	var allCheckboxes = document.getElementsByName("leave_id[]");
	for(i=0; i< allCheckboxes.length; i++){
		allCheckboxes[i].checked = document.getElementById("checkallleaves").checked;
	}
});
</script>
                      
    @endsection