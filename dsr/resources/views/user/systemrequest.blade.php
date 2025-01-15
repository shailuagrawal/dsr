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
                
                 {!! Form::open(['method' => 'post', 'action' => 'PcController@storesr', 'files' => true ]) !!} 
                               
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
                                                {!! Form::label('title', 'System Name') !!}
                                                {!! Form::select('pc_id',$pcs, null, ['class'=>'form-control', 'id'=>'pc_id']) !!}
                                            </div>

											<div class="form-group">
                                                {!! Form::label('title', 'Location') !!}
                                                {!! Form::select('location',$locations, null, ['class'=>'form-control', 'id'=>'location']) !!}
                                            </div>                                            
                                            
											<div class="form-group">
                                                {!! Form::label('title', 'Request Area') !!}
                                                {!! Form::select('request_area',$RequestArea, null, ['class'=>'form-control', 'id'=>'request_area']) !!}
                                            </div>

                                            <div class="form-group">
                                                 {!! Form::label('title', 'Detail') !!}
                                                {!! Form::textarea('detail', null, ['class'=>'form-control', 'rows'=>3, 'id'=>'detail']) !!}                                                                                         
                                            </div>

                                            <div class="form-group">
                                            {!! Form::label('title', ' Verbally Notified to:') !!}
                                            {!! Form::text('verbally_notified_to', null, ['class'=>'form-control', 'id'=>'verbally_notified_to']) !!}
                                            <p><small>(Keep it blank if you haven't notified to anybody)</small></p> 
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