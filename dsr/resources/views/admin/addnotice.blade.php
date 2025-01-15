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
                    <h3 class="page-header">Add Notice</h3>
                </div>
                
                
                {!! Form::open(['method' => 'post', 'action' => 'EmployeesController@addnotice', 'files' => true ]) !!} 
				{{ csrf_field() }}
								
				<textarea name="notice" rows='10' cols="100" id="notice">{{$not->notice}}</textarea>
				<br><br>
				<button type="submit" class="btn btn-primary">Submit</button>
				{!! Form::close() !!}
                </div>
                <!-- /.col-lg-12 -->
                
                                 
                    
            </div>
            <!-- /.row -->



@endsection