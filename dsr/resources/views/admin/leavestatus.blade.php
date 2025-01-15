@extends('layouts.app')




@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Update Employee Leave Status</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                

                                @if($msg!='')
                                	<div class="alert alert-success">{{$msg}}</div>
                                @endif
	
 								{!! Form::open(['method' => 'post', 'action' => 'UserController@updateLeaveStatus', 'files' => true ]) !!} 
                               
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
                                        {!! Form::label('title', 'Upload Employee Leave Status CSV File') !!}
                                        {!! Form::file('leavestatusfile', ['id'=>'leavestatusfile']) !!}
                                    </div>                                        
               
                                    
                                        
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                        
                                    {!! Form::close() !!}


<br><br><br><br>
 <ul>                   
 <li><a href="{{url('/')}}/download/leavestatus/1">Download last updated employee leave status.</a><br><br></li>

<li><a href="{{url('/')}}/download/leavestatus/2">Download employee last Leave Status details.</a><br><br></li>

<li><a href="{{url('/')}}/download/leavestatus/3">Download employee leave status for next session to update leave status.</a></li> 
</ul>

</div>



                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



@endsection
