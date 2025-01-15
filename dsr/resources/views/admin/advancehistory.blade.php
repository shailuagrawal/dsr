@extends('layouts.app')

@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"> </h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <div class="col-lg-12">
                    <h3 class="page-header">Advance History - {{$employee->first_name}} {{$employee->last_name}} (Employee ID: {{$employee->emp_id}})</h3>
                </div>
                                
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                        <thead>
                            <tr>
                                <th>Date </th>
                                <th>Advance Taken</th> 	
                                <th>Amount Returned</th>
                                <th>Balance</th>
                                <th>Comment</th>
                                <th>Delete</th>
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
                                <td><a href="{{url('/')}}/advance/history/{{$advance->foruser->id}}/{{$advance->id}}" class="deleteConfirmation">Delete</a></td>
                            </tr>
                             @endforeach
 						</tbody>
                    </table>  
                    <br>
   
   
  






               <div class="col-lg-12">
                    <div class="panel panel-primary1">
                        <div class="panel-heading1">
                          <h3> Add Entry</h3> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                 
                               
                        {!! Form::open(['method' => 'post', 'action' => ['UserController@advanceHistory', $employee->id], 'files' => true ]) !!}
                        {{ csrf_field() }}
                        
						
						<?php 
						  $curdate = date('Y-m-d');
						?>
						
						 <div class="col-lg-2">
                            {!! Form::label('title', 'Date') !!}
                            {!! Form::date('ondate', $curdate, ['class'=>'form-control', 'id'=>'ondate', 'style'=>'width:150px;']) !!}
                        </div>                        

                        
                        <div class="col-lg-2">
                        {!! Form::label('title', 'Amount') !!}
                        {!! Form::number('amount', "", ['class'=>'form-control', 'id'=>'subject', 'required'=>'required','style'=>'width:150px;']) !!}
                        </div>
                        
                         <div class="col-lg-8">
                        {!! Form::label('title', 'Comment') !!}
                        {!! Form::text('comment', "", ['class'=>'form-control', 'id'=>'comment']) !!}
                        </div>
                                               
						<div class="col-lg-8">
						<br>	                                                
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        </div>                
                        {!! Form::close() !!}
                                
  
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                
                
                       
            </div>
            <!-- /.row -->



@endsection


 @section('javascriptsection')
 <script type="text/javascript">
 $(".deleteConfirmation").click(function(){


     var choice = confirm('are you sure want to delete record ? ');

     if (choice) {
    	 return true;
     }
     
	return false;
	    
	}); 
 </script>
 @endsection