@extends('layouts.app')

@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">DSR History: ({{$dataForUser->first_name}} {{$dataForUser->last_name}})</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                        
     		 
            <div class="row">
					{!! Form::open(['method' => 'post', 'url' => "/user/listdsr/{$userID}", 'files' => true ]) !!}	

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
            <p>&nbsp;</p>
                                   
                                     
           					 <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                <thead>
                                    <tr>
                                    	<th>Sr. No</th>
                                    	<th>Subject</th>
                                        <th>Project Name</th>
                                        <th>Date</th>
                                        <th>Hours</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($allDsrs as $k => $dsr)
                                    <tr class="odd gradeX">
                                        <td>{{ $k + 1 }}</td>
                                        <td><a href="{{url('/')}}/user/dsr/{{$dsr['id']}}/detail">{{ $dsr['subject'] }}</a></td>
                                        <td>{{ $dsr['project_name'] }}</td>
                                        <td>{{ $dsr['created_at'] }}</td>
                                        <td>{{ $dsr['hours'] }}</td>
                                    </tr>
   								@endforeach

                                    <tr>
                                    	<td><span  style='visibility:hidden;'>1000000</span></td>
                                        <td></td>
                                        <td></td>
                                        <td align='right'><strong>Total Hours Worked:</strong> </td>
                                        <td><strong>{{$totalHoursDisplay}}</strong></td>
                                    </tr>   								
   								
   								
            					</tbody>
                            </table>                          
                             
							
								                             

                   
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
@endsection