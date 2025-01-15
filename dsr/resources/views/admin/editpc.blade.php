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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Add System Information 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                 
                               {!! Form::model($pc, ['method' => 'PATCH', 'action' => ['PcController@update', $pc->id], 'files' => true ]) !!}
                               
								{{ csrf_field() }}
								<div class="col-lg-6">

    
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        
    
                                           
                                            <div class="form-group">
                                            {!! Form::label('title', 'Machine Number') !!}
                                            {!! Form::text('machine_no', null, ['class'=>'form-control', 'id'=>'machine_no']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('title', 'Machine Name') !!}
                                                {!! Form::text('machine_name', null, ['class'=>'form-control', 'id'=>'machine_name']) !!}
                                            </div>
            
    										<div class="form-group">
                                                {!! Form::label('title', 'Purchase Date') !!}
                                                {!! Form::date('purchase_date', null, ['class'=>'form-control', 'id'=>'purchase_date']) !!}
                                            </div>
    
                                            <div class="form-group">
                                                {!! Form::label('title', 'Machine Location (Hall Number)') !!}
                                                {!! Form::text('machine_location', null, ['class'=>'form-control', 'id'=>'middle_name']) !!}
                                            </div>
                                            
        		     
    										<div class="form-group">
                                                {!! Form::label('title', 'Machine Status') !!}
                                                {!! Form::select('machine_status',[
        											'Working' 			=> 'Working',
        											'Under Repairing' 	=> 'Under Repairing',
        											'Dumped' 			=> 'Dumped',
        											'Sold' 				=> 'Sold',
    											], null, ['class'=>'form-control', 'id'=>'machine_status']) !!}
                                            </div>
                                            <div class="form-group">
                                                 {!! Form::label('title', 'Processor Information') !!}
                                                {!! Form::text('processor_info', null, ['class'=>'form-control', 'id'=>'processor_info']) !!}                                                                                         
                                            </div>
                                                                                    
                                            <div class="form-group">
                                                 {!! Form::label('title', 'Motherboard Information') !!}
                                                {!! Form::text('motherboard_info', null, ['class'=>'form-control', 'id'=>'motherboard_info']) !!}                                                                                         
                                            </div>
    
                                            <div class="form-group">
                                                 {!! Form::label('title', 'RAM Total') !!}
                                                {!! Form::text('ram_total', null, ['class'=>'form-control', 'id'=>'ram_total']) !!}                                                                                         
                                            </div>
                                            <div class="form-group">
                                                 {!! Form::label('title', 'RAM Slot 1') !!}
                                                {!! Form::text('ram_slot1', null, ['class'=>'form-control', 'id'=>'ram_slot1']) !!}                                                                                         
                                            </div>                                        
                                              <div class="form-group">
                                                 {!! Form::label('title', 'RAM Slot 2') !!}
                                                {!! Form::text('ram_slot2', null, ['class'=>'form-control', 'id'=>'ram_slot2']) !!}                                                                                         
                                            </div>
                                            <div class="form-group">
                                                 {!! Form::label('title', 'RAM Type') !!}
                                                {!! Form::text('ram_type', null, ['class'=>'form-control', 'id'=>'ram_type']) !!}                                                                                         
                                            </div>
                               
                                              

                                       </div>
                                     <div class="col-lg-6">      
                                      
                                            <div class="form-group">
                                                 {!! Form::label('title', 'Harddisk Size') !!}
                                                {!! Form::text('harddisk_size', null, ['class'=>'form-control', 'id'=>'harddisk_size']) !!}                                                                                         
                                            </div>                                               
   											<div class="form-group">
                                                 {!! Form::label('title', 'Harddisk Partition') !!}
                                                {!! Form::text('harddisk_partition', null, ['class'=>'form-control', 'id'=>'harddisk_partition']) !!}
                                                <p><small>(HD partition should be in the format "40+40+90+80")</small></p>                                                                                         
                                            </div>                                           
                                            <div class="form-group">
                                                 {!! Form::label('title', 'Monitor Information') !!}
                                                {!! Form::textarea('monitor_info', null, ['class'=>'form-control', 'rows'=>3, 'id'=>'monitor_info']) !!}                                                                                         
                                            </div>
                                            <div class="form-group">
                                                 {!! Form::label('title', 'Comment') !!}
                                                {!! Form::textarea('comment', null, ['class'=>'form-control', 'id'=>'comment', 'rows'=>3]) !!}                                                                                         
                                            </div>                                        
                                            <div class="form-group">
                                                 {!! Form::label('title', 'Description on System Driver Files') !!}
                                                {!! Form::textarea('description_system_driver', null, ['class'=>'form-control', 'rows'=>3, 'id'=>'description_system_driver']) !!}                                                                                         
                                            </div>                                        
                                                                             
                                            <div class="form-group">
                                                {!! Form::label('title', 'Upload Drivers Files (in zip format)') !!}<br><br>
                                                {!! Form::file('driver_file1', ['id'=>'driver_file1']) !!}<br>
                                                {!! Form::file('driver_file2', ['id'=>'driver_file2']) !!}<br>
                                                {!! Form::file('driver_file3', ['id'=>'driver_file3']) !!}<br>
                                                
                                               @if($pc->driver_files!='')
                                               <table width="100%" class="table table-striped table-bordered table-hover" >
                                            		<?php 
                                            		
                                            		$driversDir = public_path().'/drivers/'.$pc->driver_files;
                                            		
                                            		$files = [];
                                            		if(is_dir($driversDir)){
                                            		  $files = scandir(public_path().'/drivers/'.$pc->driver_files);
                                            		}
                                            		
                                            		foreach($files as $k => $file){
                                            		    if($file!='.' && $file!='..'){ ?>
                                            		        <tr id="file<?=$k?>"><td><a href="{{url('/')}}/drivers/{{$pc->driver_files}}/{{$file}}">{{$file}}</a></td> <td><a href="javascript:void(0)" onClick="javascript:confirmation(<?=$k?>, '{{$pc->driver_files}}/{{$file}}');" >Delete</a></td></tr>
                                            		    <?php }
                                            		}
                                            		
                                            		?>
                                            	</table> 	
                                            	@endif
                                	
                                            </div>                                       
                                        
                                    
                                        
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
                
                


                <div class="col-lg-12">
                    <h3 class="page-header">SR History</h3>
                </div>
                                
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
                    <br>
                    
                    
            </div>
            <!-- /.row -->


<script>
function confirmation(id, filename){
	res = confirm("Are you sure want to delete this file? ");
	if(res==true){
		
		$.get("/ajax/delete/driver/?f="+filename, function(data, status){
			if(data){
				$("#file"+id).html('<font color="red">File Deleted...</font>');
			}else{
				alert('Could not delete file');	
			}
		});
		
		
	}
}
</script>
@endsection