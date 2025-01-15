@extends('layouts.app')




@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Upload Advance History Data File</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    

                                @if($msg!='')
                                	<div class="alert alert-success">{{$msg}}</div>
                                @endif
	
 								{!! Form::open(['method' => 'post', 'action' => 'UserController@importAdvanceHistory', 'files' => true ]) !!} 
                               
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
                                        {!! Form::label('title', 'Advance history Data File (file format: csv)') !!}
                                        <br>Column heading should be (EmployeeID, Date, Amount, Comment)<br><br>
                                        
                                        {!! Form::file('advancehistoryfile', ['id'=>'advancehistoryfile']) !!}
                                    </div>                                        
               
                                    
                                        
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                        </div>
                                    {!! Form::close() !!}



                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



@endsection
