@extends('layouts.app')

@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"> </h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
                           <div class="col-lg-12">
                    <div class="panel panel-primary1">
                        
                        <div class="panel-body">
                            <div class="row">
  						{!! Form::open(['method' => 'post', 'action' => ['UserController@downloadstatement'], 'files' => true ]) !!}
                        {{ csrf_field() }}
                        
                         <div class="col-lg-3">
                        {!! Form::label('title', 'Employee') !!}
                        {!! Form::select('user_id', $employees, $selectedEmp, ['class'=>'form-control', 'id'=>'user_id']) !!}
                        </div>
                                               
                        {!! Form::close() !!}
 						
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                
            <!-- /.row -->
            <div class="row">
						<div class="panel-heading1">
                          <h3> Statement - <?php echo $employees[$selectedEmp]; ?></h3> 
                        </div>
                                
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                        <thead>
                            <tr>
                            	<th>Employee</th>
                                <th>Date </th>
                                <th>Advance Taken</th> 	
                                <th>Amount Returned</th>
                                <th>Balance</th>
                                <th>Comment</th>
                                <!-- <th>Delete</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $balance = 0;
                        	if(count($userAdvance)==0){
                        	echo'<tr><td colspan="10" >No advance taken yet.</td></tr>';
                        	}
                        	?>
							 @foreach($userAdvance as $advance)
							 <?php $balance = $balance + $advance->amount; ?>
                            <tr class="odd gradeX">
                            	<td><?php echo $employees[$advance->user_id]; ?></td>
                                <td><?php echo date("F j, Y", strtotime($advance->ondate)); ?></td>
                                <?php if($advance->amount>0){ ?>
                                <td>{{$advance->amount}}</td> 	
                                <td>-</td>
                                <?php }else{ ?>
                                <td>-</td> 	
                                <td><?php echo trim($advance->amount,'-'); ?></td>
                                <?php } ?>
                                <td>{{$balance}}</td>
                                <td>{{$advance->comment}}</td>
                                <!--  <td><a href="{{url('/')}}/advance/history/599/{{$advance->id}}" class="deleteConfirmation">Delete</a></td>-->
                            </tr>
                             @endforeach
 						</tbody>
                    </table>  
                    <br>
   				
   				            <?php 
                            
                        	if(count($userAdvance)>0){
                        	    echo"<div><a href='".url('/')."/download/statement/{$selectedEmp}'><i class='fa fa-download fa-fw'></i> Download Statement</a></div>";
                        	}
                        	?>
                
                   </div>     
            </div>
            <!-- /.row -->



@endsection


 @section('javascriptsection')
 <script type="text/javascript">
$(document).ready(function() {
    $('#user_id').on('change', function() {
        this.form.submit();
    });
});
 </script>
 @endsection