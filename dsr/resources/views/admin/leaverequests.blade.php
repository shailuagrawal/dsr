@extends('layouts.app')

@section('content')


            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">Pending Leave Requests</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            
            <?php 
            $allStatus = [];
            //$allStatus[0] = 'Pending';
            $allStatus[2] = 'Approve';
            $allStatus[3] = 'Reject';
            $allStatus[4] = 'Cancel';
            ?>
            
            
            			
            			{!! Form::open(['method' => 'post', 'action' => 'ProjectsController@leaveupdate', 'files' => true ]) !!}
            			     
  						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                        <thead>
                            <tr>
                            	<th>Leave Id</th>
                            	<th>Request Date</th>
                            	<th>Employee</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Days</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th><input type='checkbox' name="checkallleaves" id="checkallleaves" ></th>
                            </tr>
                        </thead>
                        <tbody>                        
                        @foreach($data as $k => $aLeave)     
                                     
                            <tr>
                            	<td><a href="{{url('/')}}/leave/{{$aLeave['leave_id']}}/edit">LA{{$aLeave['leave_id']}}</a></td>
                            	<td>{{$aLeave['created_at']}}</td>
                            	<td><a href="{{url('/')}}/admin/{{$aLeave['user_id']}}/edit">{{$aLeave['name']}}</a></td>
                                <td>{{$aLeave['leave_from']}}</td>
                                <td>{{$aLeave['leave_to']}}</td>
                                <td>{{$aLeave['no_working_days']}}</td>
                                <td><span class="updatestatus" id="{{$aLeave['leave_id']}}">{{$aLeave['status']}}</span>
                                
                                <!-- 
                                <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <span id="updatedstatus{{$aLeave['leave_id']}}">{{$aLeave['status']}}</span>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        @foreach($allStatus as $k => $aStatus)                                    
                                        <li><a href="#"><span class="updatestatus" id="{{$aLeave['leave_id']}}-{{$k}}">{{$aStatus}}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            -->
                            
                                </td>
                                <td>{{$aLeave['category']}}</td>
                                <td>{{$aLeave['type']}}</td>
                                <td><input type="checkbox" name="leave_id[]" value="{{$aLeave['leave_id']}}"></td>
                            </tr>
           					                    
                        @endforeach     
							
						</tbody>
                    </table>			
                    
                    <div class="form-group" style='text-align:left;'>
                        Bulk Action: {!! Form::select('actiontaken',$allStatus, null, ['class'=>'form-control','style'=>'width:250px;', 'id'=>'actiontaken']) !!}
                        <br><button type="submit" class="btn btn-primary">Submit</button>                                            
                    </div>  
                     {!! Form::hidden('fromPendingLeavPage', 1) !!}
                                        			
  					{!! Form::close() !!}
                
            </div>
              <!-- /.row -->
        
    @endsection
    

@section('javascriptsection')
    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
               
<script type="text/javascript">
<!--

$(".updatestatus").click(function(){

	var leave_id;
	var status;
	var leave_status = this.id;

	var row_leave_status = leave_status.split("-");
	
    leave_id = row_leave_status[0];
    status = row_leave_status[1];


    var ajaxUrl = "{{url('/')}}/admin/leave/update";
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    /*
    $.ajax({
        url: 'ajaxUrl',
        type: 'POST',
        data: {_token: CSRF_TOKEN},
        dataType: 'JSON',
        success: function (data) {

        	$("#updatedstatus"+leave_id).html(this.innerHTML);	
        }
    }); 
	*/

    $.ajax({
        type: "get",
        url: ajaxUrl,
        data: {leave_id: leave_id, actiontaken: status, _token: CSRF_TOKEN},
        success: function( data ) {
        	$("#updatedstatus"+leave_id).html(this.innerHTML);	
        }
    });
    

    
    
    
     	    
	//$("#updatedstatus"+leave_id).html(this.innerHTML);

	//$("#otherProjects").html(data);	
	
}); 

//-->
</script>


<script>
document.getElementById("checkallleaves").addEventListener("click", function(){
	var allCheckboxes = document.getElementsByName("leave_id[]");
	for(i=0; i< allCheckboxes.length; i++){
		allCheckboxes[i].checked = document.getElementById("checkallleaves").checked;
	}
});
</script>

@endsection    