@extends('layouts.app')

@section('content')

                
              	<?php 
                	$months = [];
                	$months[1] = 'January';
                	$months[2] = 'Fabruary';
                	$months[3] = 'March';
                	$months[4] = 'April';
                	$months[5] = 'May';
                	$months[6] = 'June';
                	$months[7] = 'July';
                	$months[8] = 'August';
                	$months[9] = 'September';
                	$months[10] = 'October';
                	$months[11] = 'November';
                	$months[12] = 'December';
                	
                	$years = [];
                	for($i=2018; $i <= date('Y'); $i++){
                	   $years[$i] = $i;
                	}
                	?>
                	
<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Leaves & Advance Report For - {{$months[ltrim($requestData['month'],"0")]}}, {{$requestData['year']}}</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

          <!-- /.row -->
            <div class="row">
					{!! Form::open(['method' => 'post', 'action' => 'ProjectsController@leavesAdvaceReport', 'files' => true ]) !!}	

                <div class="col-lg-2">

                	                
                    {!! Form::label('title', 'Month') !!}
                    {!! Form::select('month',$months, $requestData['month'], ['class'=>'form-control', 'id'=>'month', 'style'=>'width:150px;']) !!}                                              
                </div>  	              
                <div class="col-lg-2">
                    {!! Form::label('title', 'Year') !!}
                    {!! Form::select('year',$years, $requestData['year'], ['class'=>'form-control', 'id'=>'month', 'style'=>'width:150px;']) !!}                                              
                </div>
                <div class="col-lg-2">
                {!! Form::label('title', '&nbsp;') !!}
                <br>
                    <button type="submit" class="btn btn-primary">Get Report</button>
                </div>                
            	
            	 {!! Form::close() !!}                                                            
            </div>
            <!-- /.row -->
            <p>&nbsp;</p>


 
                                        
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                            	<th>Emp Id</th>
                            	<th>Employee</th>
                            	<th>Month</th>
                            	<th>Leaves</th>
                            	<th>Adavnce</th>
                            	<th>Half Days</th>
                            	<th>Half Days (Dates)</th>
                            	<th>Late Mark</th>
                            	<th>Days Overtime</th>
                            	<th>Sent at</th>
                            </tr>
                        </thead>
                        <tbody>     

                           @foreach($data as $k => $d)     
                           
                            <tr>
								<td>{{$d['emp_id']}}</td>
                                <td>{{$d['employee']}}</td>
                                <td><?php 
                                
                                if(isset($d['month'])){
                                    echo $months[$d['month']].', ';
                                }
                                
                                if(isset($d['year'])){
                                    echo $years[$d['year']]; 
                                }
                                    
                                    ?></td>
                                <td>{{$d['leaves']}}</td>
                                <td>{{$d['advance']}}</td>
                                <td>{{$d['half_day']}}</td>
                                <td>{{$d['half_day_dates']}}</td>
                                <td>{{$d['late_mark']}}</td>
                                <td>{{$d['overtime']}}</td>
                                <td>{{$d['sent_at']}}</td>
                            </tr>
           					@endforeach                    
                             
							
						</tbody>
                    </table>								                             
						
						
                   
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
@endsection