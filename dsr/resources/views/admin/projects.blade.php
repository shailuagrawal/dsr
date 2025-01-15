@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Projects</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

 <!-- /.row -->
<div class="row">
<div class="col-lg-12">
      
                
                
                

					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Deadline</th>
                                <th>Start Date</th>
                                <th>Completion Date</th>
                                <th>Manager</th>
                                <th>Active?</th>
                                <!--<th>Delete</th>-->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $project)
                            <tr class="odd gradeX">
                                <td><a href="{{url('/')}}/projects/{{$project->id}}/edit">{{$project->project_name}}</a></td>
                                <td>{{$project->dead_line}}</td>
                                <td>{{$project->expected_start}}</td>
                                <td>{{$project->complete_on}}</td>
                                <td>
                                @if(isset($project->manager)) 
                                {{$project->manager->first_name}} {{$project->manager->last_name}}
                                @endif
                                </td>
                                <td>
                                <?php
                                if($project->active){
                                    echo'Active';
                                }else{
                                    echo'Archived';
                                }
                                ?></td>
                                <!--<td>Delete</td>-->
                            </tr>
                        @endforeach    
 						</tbody>
                    </table>
                                                               
                
                   
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->



@endsection