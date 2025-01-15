@extends('layouts.app')

@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Leave Application</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                   <strong>{{$otherinfo['employeeName']}} (Current Project: {{$otherinfo['employeeProject']}})</strong> 
                </div>
                <div class="panel-body">              
                    <div class="col-lg-12">
                    	<div class="col-lg-6">
                    		@if($isEditable)
                                 {!! Form::open(['method' => 'post', 'action' => 'UserController@saveleave', 'files' => true ]) !!}
                                   {{ csrf_field() }}  
                                             
                                        {!! Form::hidden('leave_id', $leave->id) !!}
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif          					 
        
                                             <div class="form-group">
                                                {!! Form::label('title', 'Leave From') !!}
                                                {!! Form::date('leave_from', $leave->leave_from, ['class'=>'form-control', 'id'=>'leave_from']) !!}
                                             </div>   
                                                
                                             <div class="form-group">
                                                {!! Form::label('title', 'Leave To') !!}
                                                {!! Form::date('leave_to', $leave->leave_to, ['class'=>'form-control', 'id'=>'leave_to']) !!}                                              
                                            </div>   
                                                                                                   					                    
                                             <div class="form-group">
                                                {!! Form::label('title', 'Number Of Working Days') !!}
                                                {!! Form::number('no_working_days', $leave->no_working_days, ['class'=>'form-control', 'id'=>'no_working_days']) !!}
                                            </div>   
        
        									<div class="form-group">
                                                {!! Form::label('title', 'Select Leave Category') !!}
                                                {!! Form::select('leave_category_id',$leave_categories, $leave->leave_category_id, ['class'=>'form-control', 'id'=>'leave_categories']) !!}
                                                <p><small>(for ex. General, VVS, Medical) </small></p>
                                            </div> 
        
        									<div class="form-group">
                                                {!! Form::label('title', 'Reason for leave') !!}
                                                {!! Form::textarea('reason', $leave->reason, ['class'=>'form-control', 'id'=>'reason' ]) !!}
                                            </div>                                        		
        								
        									<!-- 
                                            <div class="form-group">
                                                {!! Form::label('title', 'Take approval of') !!}<br>
                                                	@foreach($managers as $man_id => $man)
                                                	<?php 
                                                	
                                                	if(in_array($man_id, $allSelectedManagers)){
                                                	    $checkedOrNot = true;
                                                	}else{
                                                	    $checkedOrNot = false;
                                                	}
                                                	
                                                	if($empManager->project->manager_id==$man_id){
                                                        $disabled = ['disabled'=>'disabled'];
                                                    }else{
                                                        $disabled = '';
                                                    }
                                                    
                                                	?>
                                                		{!! Form::checkbox('managers[]', $man_id) !!} {{$man}} <br>  
                                                	@endforeach
                                                	<p><small>[Select checkbox whom you need to send your Application for approval.]</small></p>
                                            </div>
                                             -->         

        									<div class="form-group">
                                                {!! Form::label('title', 'Status: ') !!}
                                                
                                                 
                                                <?php
                                                
                                                switch ($leave->status) {
                                                    case 0:
                                                        echo '<strong>Pending</strong>';
                                                        break;
                                                    case 1:
                                                        echo '<p class="text-muted"><strong>In Process</strong></p>';
                                                        break;
                                                    case 2:
                                                        echo '<p class="text-success"><strong>Approved</strong></p>';
                                                        break;
                                                    case 3:
                                                        echo '<p class="text-danger"><strong>Rejected</strong></p>';
                                                        break;
                                                    case 4:
                                                        echo '<p class="text-warning"><strong>Cancelled</strong></p>';
                                                        break;
                                                    default:
                                                        echo '<strong>Pending</strong>';
                                                }
                                                
                                                ?>
                                                
                                                
                                            </div>              
                                                                       
                                                                       
                                        <button type="submit" class="btn btn-primary">Submit Button</button>
                                        <button type="reset" class="btn btn-primary">Reset Button</button>

                                        <p>&nbsp;</p>
    
                							{!! Form::close() !!}
            				@else
                                    
                                    <table width="100%" class="table table-striped table-bordered1 table-hover" id="dataTables-example">
                                    	<tr>
                                        	<td style="width:35%"><strong>Requested On:</strong></td>
                                        	<td><?php echo date("F j, Y, g:i a", strtotime($leave->created_at)) ?></td>
                                    	</tr>
                                    	<tr>
                                    		<td><strong>Leave From:</strong></td>
                                    		<td><?php echo date("F j, Y", strtotime($leave->leave_from)) ?></td>
                                        </tr>
                                        <tr>
                                    		<td><strong>Leave To:</strong></td>
                                    		<td><?php echo date("F j, Y", strtotime($leave->leave_to)) ?></td>
                                        </tr>
                                        <tr>
                                    		<td><strong>Number Of Working Days:</strong></td>
                                    		<td>{{$leave->no_working_days}}</td>
                                        </tr>    
                                        <tr>
                                    		<td><strong>Category:</strong></td>
                                    		<td>{{$leave_categories[$leave->leave_category_id]}}</td>
                                        </tr>        
                                        <tr>
                                    		<td><strong>Reason for leave:</strong></td>
                                    		<td>{{$leave->reason}}</td>
                                        </tr>        
                                    	<tr>
                                    		<td><strong>Leave Type:</strong></td>
                                    		<td> <?php echo $leave->leave_type > 0 ? 'Pre' : 'Post'; ?></td>
                                        </tr>  
                                    	<tr>
                                    		<td><strong>Status:</strong></td>
                                    		<td>
                                    			<?php 
                                    			
                                    			switch ($leave->status) {
                                    			    case 0:
                                    			        echo '<strong>Pending</strong>';
                                    			        break;
                                    			    case 1:
                                    			        echo '<p class="text-muted"><strong>In Process</strong></p>';
                                    			        break;
                                    			    case 2:
                                    			        echo '<p class="text-success"><strong>Approved</strong></p>';
                                    			        break;
                                    			    case 3:
                                    			        echo '<p class="text-danger"><strong>Rejected</strong></p>';
                                    			        break;
                                    			    case 4:
                                    			        echo '<p class="text-warning"><strong>Cancelled</strong></p>';
                                    			        break;
                                    			    default:
                                    			        echo 'Pending';
                                    			}
                                    			
                                    			?>
                                    		</td>
                                        </tr> 
                                        
                                        
                                        @if($displayEditLink)
                                        <tr>
                                        <td colspan='2'><a href="{{url('/')}}/leave/<?=$leave->id?>/edit/1">EDIT</a></td>
                                        </tr>
                                        @endif 
                                                                                 
                                    </table>   
                                    <br><br>
                                    
                                    @if($otherinfo['isAdmin'])
                                      
                                    {!! Form::open(['method' => 'post', 'action' => 'ProjectsController@leaveupdate', 'files' => true ]) !!}
                                   {{ csrf_field() }}  
                                    	<?php 
                                    	   
                                    	    $allstatus = [];
                                    	    //$allstatus[0] = 'Pending';
                                    	    //$allstatus[1] = 'In Process';
                                    	    $allstatus[2] = 'Approved';
                                    	    $allstatus[3] = 'Rejected';
                                    	    $allstatus[4] = 'Cancelled';
                                    	?>
                                    	 {!! Form::hidden('leave_id', $leave->id) !!}
                                            
        									<div class="form-group">
                                                {!! Form::label('title', 'Action:') !!}<br>
                                                @foreach($allstatus as $actionStatus => $stat)
                                                <?php 
                                                $isChecked = false;
                                                if($actionStatus==2){
													$isChecked = true;
												}
												?>
                                                {!! Form::radio('actiontaken', $actionStatus, $isChecked) !!} {{$stat}} &nbsp;&nbsp;&nbsp;&nbsp; 
                                                @endforeach
                                            </div>     
                                            
        									<div class="form-group">
                                                {!! Form::label('title', 'Comments(if any):') !!}
                                                {!! Form::textarea('comment', '', ['class'=>'form-control', 'id'=>'reason' ]) !!}
                                            </div>    
									
											@if($otherinfo['canStatusBeUpdated'])
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-primary">Reset</button>
                                        <p>&nbsp;</p>
											@endif                                                                                                                                
                                    {!! Form::close() !!}
                                    @endif
            				@endif


					<!-- Comment History starts -->
					
					<?php if(count($editedLeave)>0){ ?>
						<h4>EDITED</h4>
    					<ul>
    					@foreach($editedLeave as $verKey => $version) 
    					<li><a href="" data-toggle="modal" data-target="#myModal<?=$verKey?>"><?php echo date("F j, Y, g:i a", strtotime($version->updated_at)); ?></a></li>
    					<?php 
    					
    					$applicationData = unserialize($version->differences);
    					
    					$fieldNames = array();
    					$fieldNames['leave_from'] = 'Leave From';
    					$fieldNames['leave_to'] = 'Leave To';
    					$fieldNames['no_working_days'] = 'Number Of Working Days';
    					$fieldNames['reason'] = 'Reason for leave';
    					$fieldNames['leave_category_id'] = 'Category';
    					
    					?>
    					<div class="modal fade" id="myModal<?=$verKey?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;width:90%;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                            <h4 class="modal-title" id="myModalLabel">See The Difference</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                        <tr>
                                        <th style="width:20%;">Field</th>
                                        <th>Old</th>
                                        <th>New</th>
                                        </tr>
                                        <?php foreach($applicationData['original'] as $key => $original){ 
                                         
                                            if($key=='leave_from' || $key=='leave_to'){
                                                $original = date('F j, Y',strtotime($original));
                                                $applicationData['updated'][$key] = date('F j, Y',strtotime($applicationData['updated'][$key]));
                                            }
                                            if($key=='leave_category_id'){
                                                $original = $leave_categories[$original];
                                                $applicationData['updated'][$key] = $leave_categories[$applicationData['updated'][$key]];
                                            }
                                            
                                            
                                            $color = '';
                                        if($original!=$applicationData['updated'][$key]){
                                            $color = 'background-color:#dff0d8;';
                                        } 
                                        ?>
                                        <tr style="<?php echo $color;?>">
                                        <td><b><?php echo $fieldNames[$key]; ?></b></td>
                                        <td><?php echo $original; ?></td>
                                        <td><?php echo $applicationData['updated'][$key]; ?></td>
                                        </tr>
                                        <?php } ?>
                                        </table>
                                            
                                            
                                        
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            
    					@endforeach
    					</ul>
    					<br>
					<?php } ?>
										
					<h4>Comment History - Leave Application No. : LA{{$leave->id}}</h4>
                    
                         <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                            <thead>
                                <tr>
                                	<th>Comment ID</th>
                                    <th>Date of Comment</th>
                                    <th>Comment By</th>
                                    <th>Action</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>                        
                            @foreach($allComments as $appKey => $approvalFrom)     
                                <?php 
                                
                                
                                ?>         
                                <tr>
                                	<td>{{$approvalFrom['comment_id']}}</td>
                                	<td>{{$approvalFrom['updated_at']}}</td>
                                    <td>{{$approvalFrom['manager']}}</td>
                                    <td class="{{$approvalFrom['class']}}">{{$approvalFrom['status']}}</td>
                                    <td>{{$approvalFrom['comment']}}</td>
                                </tr>
               					                    
                            @endforeach     
    							
    						</tbody>
                        </table>	
   					<!-- Comment ends -->                     
                                                    
                            </div>
    						
    						<div class="col-lg-6">
    						
    						
    							<?php if(count($leaveRecods)>0){ ?>
    							<h4>Member(s) on leave in this project (7 days +/-)</h4>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                                        <thead>
                                                            <tr>
                                                            	<th>Date</th>
                                                            	<th>Number of Absentees</th>
                                                            	<th>Names</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>     
                                                  
                                                        @foreach($leaveRecods as $k => $ab)     
                                                                     
                                                            <tr>
                                                            	<td><?php echo date("F j, Y", strtotime($k)) ?></td>
                                    	<td><?php echo count($ab); ?></td>
                                    	<td>
                                    	<?php echo implode(', ', $ab); ?>
                                        	</td>
                                        </tr>
                                		                    
                                    @endforeach     
                                		
                                	</tbody>
                                </table>
                                <br>
                                <?php } ?>
                                		
    								<?php 
    								
    								$forMonth = date('m', strtotime($leave->foruser->date_allotted)); 
    								
    								if($forMonth <= 6){
    								    $session = "Session : Jan ". date('Y', strtotime($leave->foruser->date_allotted)) . " to Jun " . date('Y', strtotime($leave->foruser->date_allotted));
    								}else{
    								    $session = "Session : Jul ". date('Y', strtotime($leave->foruser->date_allotted)) . " to Dec " . date('Y', strtotime($leave->foruser->date_allotted));
    								}
    								?>
    								<h4>Leave status of applicant <br> {{$session}}</h4>
    								<ul>
    								 <li><strong>Leaves :</strong> (Allotted: {{$leave->foruser->leaves_allotted}}, Forwarded: {{$leave->foruser->leaves_forward}}, Other: {{$leave->foruser->other_leaves_allotted}}): {{$userLeaveHistory['totalAllotted']}}</li>
    								 <li><strong>Leaves Taken:</strong> {{$userLeaveHistory['leaveTaken']}}</li>
    								 <?php
    								 $leaveBalColor = '';
    								 if($userLeaveHistory['leaveBalance']<0){
    								     $leaveBalColor = 'red';
    								 }
    								 ?>
    								 <li style="color:{{$leaveBalColor}}"><strong >Leaves Balance:</strong> {{$userLeaveHistory['leaveBalance']}}</li>
 									<li><strong>Leaves Type:</strong> {{$userLeaveHistory['leaveType'][1]}} Pre ({{$userLeaveHistory['prePercent']}}%), {{$userLeaveHistory['leaveType'][0]}} Post ({{$userLeaveHistory['postPercent']}}%)</li>
    								</ul> 
    								
    								
    								
    								
    								<br>
    								<h4>Details of leave history</h4>
    
                                    <ul>
                                    <li><strong>Total Leaves :</strong> {{$otherinfo['total_leaves']}}</li>
                                    @foreach($leaveCategories as $cat => $catCount)
                                    <li><strong>{{$cat}} :</strong> {{$catCount}}</li>
                                    @endforeach
    
                                    <li><strong>Leaves Type:</strong> {{$otherinfo['preLeave']}} Pre ({{$otherinfo['prePercent']}}%), {{$otherinfo['postLeave']}} Post ({{$otherinfo['postPercent']}}%)</li>
                                    </ul>
    								
    								<br>
    								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                            <thead>
                                <tr>
                                	<th>ID</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Days</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>                        
                            @foreach($data as $k => $aLeave)     
                                         
                                <?php 
                                $rowStyle = '';
                                if($aLeave['type']=='Post'){ 
                                    $rowStyle = 'background-color:#f2dede';
                                }
                                
                                ?>
                                         
                                <tr style="{{$rowStyle}}">
                                	<td><a href="{{url('/')}}/leave/{{$aLeave['id']}}/edit">LA{{$aLeave['id']}}</a></td>
                                    <td>{{$aLeave['leave_from']}}</td>
                                    <td>{{$aLeave['leave_to']}}</td>
                                    <td>{{$aLeave['no_working_days']}}</td>
                                    <td>{{$aLeave['status']}}</td>
                                    <td>{{$aLeave['category']}}</td>
                                    <td>{{$aLeave['type']}}</td>
                                    
                                </tr>
               					                    
                            @endforeach     
    							
    						</tbody>
                        </table>				
    								</div>   
    								                   
                    </div>
                    <!-- 
                    <h4>Comment History - Leave Application No. : LA{{$leave->id}}</h4>
                    
                         <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                            <thead>
                                <tr>
                                	<th>Comment ID</th>
                                    <th>Date of Comment</th>
                                    <th>Comment By</th>
                                    <th>Action</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>                        
                            @foreach($allComments as $appKey => $approvalFrom)     
                                <?php 
                                
                                
                                ?>         
                                <tr>
                                	<td>{{$approvalFrom['comment_id']}}</td>
                                	<td>{{$approvalFrom['updated_at']}}</td>
                                    <td>{{$approvalFrom['manager']}}</td>
                                    <td class="{{$approvalFrom['class']}}">{{$approvalFrom['status']}}</td>
                                    <td>{{$approvalFrom['comment']}}</td>
                                </tr>
               					                    
                            @endforeach     
    							
    						</tbody>
                        </table>	
                         -->
                    <!-- /.col-lg-12 -->
                	</div>
                	
                	
                	
                </div>
                
                

                        
                
            </div>
            <!-- /.row -->
            
@endsection