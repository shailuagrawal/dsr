@extends('layouts.app')

@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Absentees Report</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

          <!-- /.row -->
            <div class="row">
					{!! Form::open(['method' => 'post', 'action' => 'UserController@absenteeReport', 'files' => true ]) !!}	

                <div class="col-lg-2">
                    {!! Form::label('title', 'From') !!}
                    {!! Form::date('fromDate', $requestData['fromDate'], ['class'=>'form-control', 'id'=>'fromDate']) !!}                                              
                </div>  	              
                <div class="col-lg-2">
                    {!! Form::label('title', 'To') !!}
                    {!! Form::date('toDate', $requestData['toDate'], ['class'=>'form-control', 'id'=>'toDate']) !!}                                              
                </div>
                <div class="col-lg-2">
                {!! Form::label('title', '&nbsp;') !!}
                <br>
                    <button type="submit" class="btn btn-primary">Submit Button</button>
                </div>                
            	
            	 {!! Form::close() !!}                                                            
            </div>
            <!-- /.row -->
            <p>&nbsp;</p>
            
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

                   
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
@endsection