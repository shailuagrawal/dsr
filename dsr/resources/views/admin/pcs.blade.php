@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">{{$heading}}</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

 <!-- /.row -->
<div class="row">
<div class="col-lg-12">


                    <div class="panel panel-primary">
                    <div class="panel-heading">
                      Summary of PCs
                    </div>
                    <div class="panel-body">
                    
                    	<?php 
                    	$counter = 0;
                    	echo'<table  width="100%"><tr><td valign="top">';
                    	    foreach($reports['machine_location'] as $k2 => $rep){
                    	        if($counter==3){
                    	            $counter=0;
                    	            echo'</td><td valign="top">';
                    	        }
                    	        echo "<strong>{$k2}: </strong> ".count($rep).'<br>';
                    	        $counter++;
                    	    }
                    	echo'</td></tr></table>';
                    	?>
                    	<hr>
                    	<?php 
                    	echo'<table  width="30%"><tr>';
                    	    foreach($reports['status'] as $k2 => $rep){
                    	        echo'<td valign="top" align="left">';
                    	        echo "<strong>{$k2}: </strong> ".count($rep);
                    	        echo'</td>';
                    	    }
                        echo '</tr></table>';
                    	?>
                    	                    	
                    </div>
                    <!-- /.panel-body -->
                    </div>

					
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Machine Number</th> 	
                                <th>Machine Name</th> 	
                                <th>Purchase Date</th> 	
                                <th>Location</th> 	
                                <th>Status</th> 	
                                <th>Processor</th>		
                                <th>Motherboard</th> 	
                                <th>RAM Total</th> 	
                                <th>RAM Slot 1</th> 	
                                <th>RAM Slot 2</th> 	
                                <th>RAM Type</th> 	
                                <th>Harddisk Size</th> 	
                                <th>Harddisk Partition</th> 	
                                <th>Monitor Info</th> 	
                                <th>Comment Info</th> 	
                                <th>Driver Files</th>                            
                            </tr>
                        </thead>
                        <tbody>
							 @foreach($pcWorking as $pc)
                            <tr class="odd gradeX">
                                <td>{{$pc->machine_no}}</td> 	
                                <td><a href="{{url('/')}}/pcs/{{$pc->id}}/edit" class='curPc' id="{{$pc->id}}"  data-toggle="popover{{$pc->id}}">{{$pc->machine_name}}</a></td> 	
                                <td>
                                <?php 
                                echo date("M j, Y", strtotime($pc->purchase_date));
                                
                                ?>
                                </td> 	
                                <td>{{$pc->machine_location}}</td> 	
                                <td>{{$pc->machine_status}}</td> 	
                                <td>{{$pc->processor_info}}</td>		
                                <td>{{$pc->motherboard_info}}</td> 	
                                <td>{{$pc->ram_total}}</td> 	
                                <td>{{$pc->ram_slot1}}</td> 	
                                <td>{{$pc->ram_slot2}}</td> 	
                                <td>{{$pc->ram_type}}</td> 	
                                <td>{{$pc->harddisk_size}}</td> 	
                                <td>{{$pc->harddisk_partition}}</td> 	
                                <td>{{$pc->monitor_info}}</td> 	
                                <td>{{$pc->comment}}</td> 	
                                <td>
                                	@if($pc->driver_files!='')
                                		<?php 
                                		
                                		$driversDir = public_path().'/drivers/'.$pc->driver_files;
                                		$files = [];
                                		if(is_dir($driversDir)){
                                		  $files = scandir(public_path().'/drivers/'.$pc->driver_files);
                                		}
                                		
                                		foreach($files as $k => $file){
                                		    if($file!='.' && $file!='..'){ ?>
                                		    	@if($k > 2)
                                		    	<br> 
                                		    	@endif
                                		        <a href="{{url('/')}}/drivers/{{$pc->driver_files}}/{{$file}}">{{$file}}</a>
                                		    <?php }
                                		}
                                		
                                		?>
                                	 	
                                	@endif
                                	                                	
                                </td>      
                            </tr>
                         	@endforeach
 						</tbody>
                    </table>
                    
                    <br><br>
                    <h2>Sold/Dumped</h2>
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
                        <thead>
                            <tr>
                                <th>Machine Number</th> 	
                                <th>Machine Name</th> 	
                                <th>Purchase Date</th> 	
                                <th>Location</th> 	
                                <th>Status</th> 	
                                <th>Processor</th>		
                                <th>Motherboard</th> 	
                                <th>RAM Total</th> 	
                                <th>RAM Slot 1</th> 	
                                <th>RAM Slot 2</th> 	
                                <th>RAM Type</th> 	
                                <th>Harddisk Size</th> 	
                                <th>Harddisk Partition</th> 	
                                <th>Monitor Info</th> 	
                                <th>Comment Info</th> 	
                                <th>Driver Files</th>                            
                            </tr>
                        </thead>
                        <tbody>
							 @foreach($pcsoldDump as $pc)
                            <tr class="odd gradeX">
                                <td>{{$pc->machine_no}}</td> 	
                                <td><a href="{{url('/')}}/pcs/{{$pc->id}}/edit" class='curPc' id="{{$pc->id}}"  data-toggle="popover{{$pc->id}}">{{$pc->machine_name}}</a></td> 	
                                <td>
                                <?php 
                                echo date("M j, Y", strtotime($pc->purchase_date));
                                
                                ?>
                                </td> 	
                                <td>{{$pc->machine_location}}</td> 	
                                <td>{{$pc->machine_status}}</td> 	
                                <td>{{$pc->processor_info}}</td>		
                                <td>{{$pc->motherboard_info}}</td> 	
                                <td>{{$pc->ram_total}}</td> 	
                                <td>{{$pc->ram_slot1}}</td> 	
                                <td>{{$pc->ram_slot2}}</td> 	
                                <td>{{$pc->ram_type}}</td> 	
                                <td>{{$pc->harddisk_size}}</td> 	
                                <td>{{$pc->harddisk_partition}}</td> 	
                                <td>{{$pc->monitor_info}}</td> 	
                                <td>{{$pc->comment}}</td> 	
                                <td>
                                	@if($pc->driver_files!='')
                                		<?php 
                                		
                                		$driversDir = public_path().'/drivers/'.$pc->driver_files;
                                		$files = [];
                                		if(is_dir($driversDir)){
                                		  $files = scandir(public_path().'/drivers/'.$pc->driver_files);
                                		}
                                		
                                		foreach($files as $k => $file){
                                		    if($file!='.' && $file!='..'){ ?>
                                		    	@if($k > 2)
                                		    	<br> 
                                		    	@endif
                                		        <a href="{{url('/')}}/drivers/{{$pc->driver_files}}/{{$file}}">{{$file}}</a>
                                		    <?php }
                                		}
                                		
                                		?>
                                	 	
                                	@endif
                                	                                	
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

