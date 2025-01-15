@extends('layouts.app')

@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Edit Project</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Project Information 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                {!! Form::model($project, ['method' => 'PATCH', 'action' => ['ProjectsController@update', $project->id], 'files' => true ]) !!} 
                               
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
                                        {!! Form::label('title', 'Project Name') !!}
                                        {!! Form::text('project_name', null, ['class'=>'form-control', 'id'=>'project_name']) !!}
                                        </div>
                                        <div class="form-group">
                                        {!! Form::label('title', 'Mail to') !!}
                                        {!! Form::text('mail_to', null, ['class'=>'form-control', 'id'=>'mail_to']) !!}
                                        </div>
                                        <div class="form-group">
                                        {!! Form::label('title', 'Mail cc') !!}
                                        {!! Form::text('mail_cc', null, ['class'=>'form-control', 'id'=>'mail_cc']) !!}
                                        </div>                                        

                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="message" class="form-control" rows="3">{{$project->message}}</textarea>
											<span style="font-size:12px;color:green;"><b>Field title|Field type(text,textarea, number)|Target:100
											<br>Ex:<br> </b>
											Number of entries|number|Target:100<br>
											Task Name|text<br>
											Description|textarea<br>
											<font style="color:red">NOTE: Field Title should not be repeated.</font>
											</span>
                                        </div>

                                                         
                                        <div class="form-group">
                                            {!! Form::label('title', 'Dead Line') !!}
                                            {!! Form::date('dead_line', null, ['class'=>'form-control', 'id'=>'dead_line']) !!}                                              
                                        </div>                                        
                                        
                                        <div class="form-group">
                                            {!! Form::label('title', 'Expected Start') !!}
                                            {!! Form::date('expected_start', null, ['class'=>'form-control', 'id'=>'expected_start']) !!}                                              
                                        </div>

 									</div>
                                     <div class="col-lg-6">  
                                                                             
                                        <div class="form-group">
                                            {!! Form::label('title', 'Project Complete on') !!}
                                            {!! Form::date('complete_on', null, ['class'=>'form-control', 'id'=>'complete_on']) !!}                                              
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('title', 'Project Active:') !!}&nbsp;&nbsp;
                                            Yes {!! Form::radio('active', 1) !!}&nbsp;&nbsp;
                                            No {!! Form::radio('active', 0) !!}
                                        </div>                                                                                                                                 

                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <textarea name="remark" class="form-control" rows="3">{{$project->remark}}</textarea>
                                        </div>                                        
                                        
 										<div class="form-group">
                                            {!! Form::label('title', 'Project Manager') !!}
                                            {!! Form::select('manager_id',$managers, null, ['class'=>'form-control', 'id'=>'manager_id']) !!}
                                        </div>                                           
 
                                    
                                        
                                        <button type="submit" class="btn btn-primary">Submit Button</button>
                                        <button type="reset" class="btn btn-primary">Reset Button</button>
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