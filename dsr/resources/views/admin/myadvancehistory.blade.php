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
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	$balance = 0;
                        	if(count($userAdvance)==0){
                        	echo'<tr><td  colspan="10">No advance taken yet.</td></tr>';
                        	}
                        	?>
                        	
							 @foreach($userAdvance as $advance)
							 <?php $balance = $balance + $advance->amount; ?>
							 <?php 
							 $color='';
							 if($advance->viewed==0){
								 $color='#dff0d8';
							 }
							 ?>
                            <tr class="odd gradeX" style="background-color: <?=$color?>">
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
                            </tr>
                             @endforeach
 						</tbody>
                    </table>  

                </div>
                <!-- /.col-lg-12 -->
                
                                 
                    
            </div>
            <!-- /.row -->



@endsection