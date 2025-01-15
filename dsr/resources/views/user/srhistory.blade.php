@extends('layouts.app')

@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Your System Requests</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                
                
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                        <thead>
                            <tr>
                                <th>Request ID</th> 	
                                <th>Date of Request</th> 	
                                <th>System</th> 	
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
                                <td>{{$sr->created_at}}</td> 	
                                <td>{{$sr->forPc->machine_name}}</td> 	
                                <td>{{$sr->location}}</td>		
                                <td>{{$sr->request_area}}</td> 	
                                <td>
                                <?php 
                                
                                switch ($sr->status) {
                                    case 0:
                                        echo "Pending";
                                        break;
                                    case 1:
                                        echo "In Process";
                                        break;
                                    case 2:
                                        echo "Solved";
                                        break;
                                    case 3:
                                        echo "Nonviable";
                                        break;
                                    case 4:
                                        echo "Close";
                                        break;
                                    default:
                                        echo "Pending";
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