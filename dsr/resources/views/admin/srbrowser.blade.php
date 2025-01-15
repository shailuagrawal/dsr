@extends('layouts.app')

@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">System Requests Report</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                
            <div class="row">
				{!! Form::open(['method' => 'post', 'action' => 'PcController@srbrowser', 'files' => true ]) !!}	

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
                                <th>Request ID</th>
                                <th>Request By</th> 	
                                <th>Date of Request</th> 	
                                <th>Machine</th> 	
                                <th>Hall Number</th> 	
                                <th>Problem Area</th> 	
                                <th>Status</th>		
                                <th>Status Updated On</th> 	
                            </tr>
                        </thead>
                        <tbody>
							 @foreach($srHistory as $sr)
                            <tr class="odd gradeX">
                                <td><a href="{{url('/')}}/srrequest/detail/{{$sr->id}}">SR{{$sr->id}}</a></td>
                                <td><a href="{{url('/')}}/admin/{{$sr->requestedBy->id}}/edit">{{$sr->requestedBy->first_name}} {{$sr->requestedBy->last_name}}</a></td>  	
                                <td>{{$sr->created_at}}</td> 	
                                <td><a href="{{url('/')}}/pcs/{{$sr->forPc->id}}/edit">{{$sr->forPc->machine_name}}</a></td> 	
                                <td>{{$sr->location}}</td>		
                                <td>{{$sr->request_area}}</td> 	
                                <td>
                                <?php 
                                
                                switch ($sr->status) {
                                    case 0:
                                        echo "<font color='red'>Pending</font>";
                                        break;
                                    case 1:
                                        echo "<font color='blue'>In Process</font>";
                                        break;
                                    case 2:
                                        echo "<font color='green'>Solved</font>";
                                        break;
                                    case 3:
                                        echo "Nonviable";
                                        break;
                                    case 4:
                                        echo "Close";
                                        break;
                                    default:
                                        echo "<font color='red'>Pending</font>";
                                } 
                                
                                ?>
                                </td> 	
                                <td>                                
                                <?php echo date("F j, Y, g:i a", strtotime($sr->updated_at)); ?>
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