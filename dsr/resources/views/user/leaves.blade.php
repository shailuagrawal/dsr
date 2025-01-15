@extends('layouts.app')

@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Your Leaves history</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">


 <!-- /.row -->
 		<!-- 
            <div class="row">
					{!! Form::open(['method' => 'post', 'action' => 'UserController@leaves', 'files' => true ]) !!}	

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
          -->  
            
	<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                        <thead>
                            <tr>
                            	<th>Leave Id</th>
                                <th>Request Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Days</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th>Category</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>                        
                        @foreach($data as $k => $aLeave)     

						<?php
                            $statusclass=""; 
                            $rowColor = '';
                            switch ($aLeave['status_key']) {
                                case 1:
                                    $statusclass="";
                                    break;
                                case 2:
                                    $statusclass="text-success";
                                    break;
                                case 3:
                                    $statusclass="text-danger";
                                    break;
                                case 4:
                                    $statusclass="text-warning";
                                    break;
                                default:
                                    $statusclass="";
                            }
                             
                            if($aLeave['type']=='Post'){
                                $rowColor = '#f2dede';
                            }
                            
                            if($aLeave['category']=='VVS'){
                                $rowColor = '#faebcc';
                            }
                            
                             ?>
                                                                  
                            <tr style="background-color:<?php echo $rowColor; ?>">
                            	<td><a href="{{url('/')}}/leave/{{$aLeave['id']}}/edit">LA{{$aLeave['id']}}</a></td>
                                <td>{{$aLeave['created_at']}}</td>
                                <td>{{$aLeave['leave_from']}}</td>
                                <td>{{$aLeave['leave_to']}}</td>
                                <td>{{$aLeave['no_working_days']}}</td>
                                <td class='<?php echo $statusclass; ?>'><strong>{{$aLeave['status']}}</strong></td>
                                <td><?php echo $aLeave['remark']; ?></td>
                                <td>{{$aLeave['category']}}</td>
                                <td>{{$aLeave['type']}}</td>
                                
                            </tr>
           					                    
                        @endforeach     
							
						</tbody>
                    </table>								                             

                   
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
@endsection