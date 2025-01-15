@extends('layouts.app')

@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">System Request</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                
  
                               
								{{ csrf_field() }}
    									
                              									
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        

    						<div class="row show-grid">
                                <div class="col-md-2"><strong>Request ID:</strong></div>
                                <div class="col-md-10">SR{{$sysObj->id}}</div>
                            </div>
    						
    						<div class="row show-grid" >
                                <div class="col-md-2"><strong>Request From:</strong></div>
                                
                                <div class="col-md-10">
                                <span data-toggle="popoverimage">
                                @if(Auth::user()->role_id == 1)
                                <a href="{{url('/')}}/admin/{{$sysObj->requestedBy->id}}/edit">{{$sysObj->requestedBy->first_name}} {{$sysObj->requestedBy->last_name}}</a>
                                @else
                                {{$sysObj->requestedBy->first_name}} {{$sysObj->requestedBy->last_name}}
                                @endif
                                </span>
                                </div>
                                
                            </div>
                                                        
    						<div class="row show-grid">
                                <div class="col-md-2"><strong>Request Date:</strong></div>
                                <div class="col-md-10"><?php echo date('F j, Y, g:i a', strtotime($sysObj->created_at)); ?></div>
                            </div>

    						<div class="row show-grid">
                                <div class="col-md-2"><strong>System Name:</strong></div>
                                <div class="col-md-10">
                                @if(Auth::user()->role_id == 1) 
                                	<a href="{{url('/')}}/pcs/{{$sysObj->pc_id}}/edit">{{$pcs[$sysObj->pc_id]}}</a>
                                 @else
                               		{{$pcs[$sysObj->pc_id]}}
                                @endif
                                </div>
                            </div>

    						<div class="row show-grid">
                                <div class="col-md-2"><strong>Location:</strong></div>
                                <div class="col-md-10">{{$locations[$sysObj->location]}}</div>
                            </div>
											
	    					<div class="row show-grid">
                                <div class="col-md-2"><strong>Request Area:</strong></div>
                                <div class="col-md-10">{{$RequestArea[$sysObj->request_area]}}</div>
                            </div>										                                                                                        

	    					<div class="row show-grid">
                                <div class="col-md-2"><strong>Detail:</strong></div>
                                <div class="col-md-10">{{$sysObj->detail}}</div>
                            </div>										                                                                                        

	    					<div class="row show-grid">
                                <div class="col-md-2"><strong>Verbally Notified to:</strong></div>
                                <div class="col-md-10">{{$sysObj->verbally_notified_to}}&nbsp;</div>
                            </div>			                                      
                                            
	    					<div class="row show-grid ">
                                <div class="col-md-2"><strong>Current Status:</strong></div>
                                <div class="col-md-10 ">
                                    <?php 
                                                                                    
                                       switch ($sysObj->status) {
                                            case 0:
                                                echo "<span class='alert-danger'>Pending</span>";
                                                break;
                                            case 1:
                                                echo "<span class='alert-warning'>In Process</span>";
                                                break;
                                            case 2:
                                                echo "<span class='alert-success'>Solved</span>";
                                                break;
                                            case 3:
                                                echo "<span class='alert-info'>Nonviable</span>";
                                                break;
                                            case 4:
                                                echo "<span class='alert-success'>Close</span>";
                                                break;
                                            default:
                                                echo "<span class='alert-danger'>Pending</span>";
                                        } 
                                        
                                    ?> 
								</div>
                            </div>		







                    

                        {!! Form::open(['method' => 'PATCH', 'action' => ['PcController@srdetail', $sysObj->id], 'files' => true ]) !!}                          
                                 	 <div class="col-lg-6">

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                            
                            	@foreach($srComObj as $srCom)
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="{{url('/')}}/images/employees/{{$srCom->commentBy->photo}}" style="max-width:50px; max-height:50px;" alt="User Avatar" class="img-circle">
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">{{$srCom->commentBy->first_name}} {{$srCom->commentBy->last_name}}</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> <?php echo date('F j, Y, g:i a', strtotime($srCom->created_at)); ?>
                                            </small>
                                        </div>
                                        <p>
                                            {{$srCom->comment}}
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        
                        
                        
                                                    <div class="form-group">
                                                         {!! Form::label('title', 'Comment') !!}
                                                        {!! Form::textarea('comment', null, ['class'=>'form-control', 'rows'=>3, 'id'=>'detail']) !!}                                                                                         
                                                    </div>
                        				
                                                 @if(Auth::user()->role_id == 1)	
                                                	<div class="form-group">
                                                	<br>
                                                        <label>Chage Status: </label>
                                                		<?php $checked = false; ?>
                                                		@foreach($allStatus as $statusKey => $aStatus)
                                                        <label class="radio-inline">
                                                            <!-- <input name="status" id="status" value="{{$statusKey}}" type="radio">{{$aStatus}} -->
															<?php
                                                            if($statusKey==$sysObj->status){
                                                                $checked = true; 
                                                            }else{
                                                                $checked = false;
                                                            }    
                                                            ?>
                                                            {!! Form::radio('status', $statusKey, $checked) !!}{{$aStatus}}
                                                        </label>
                                                        @endforeach
                                                    </div>
                                                @endif    
                                                                                     	                    

                                                	 
                                                                                                                                                                                
                                                              
                                                            
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-primary">Reset</button>
                                        
                        			</div>
                         {!! Form::close() !!} 
                                                                                                 

                       </div>
                      
                                

						
					
                    
                
                
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



@endsection


@section('javascriptsection')
              
<script type="text/javascript">
<!--
 
$('[data-toggle="popoverimage"]').popover({
    placement : 'right',
    trigger : 'hover',
    html : true,
    content : '<div class="media"><a href="#" class="pull-left"><img src="{{url('/')}}/images/employees/{{$sysObj->requestedBy->photo}}" class="media-object" width="244" alt="{{$sysObj->requestedBy->first_name}} {{$sysObj->requestedBy->last_name}}"></a><div class="media-body"></div></div>'
});


-->

</script>
    
@endsection