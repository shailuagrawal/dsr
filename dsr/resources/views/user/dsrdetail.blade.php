@extends('layouts.app')

@section('content')

<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">DSR Detail</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">



		<div class="col-lg-12">		
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           {{ $dsrDetail['project_name'] }}
                        </div>
                        <div class="panel-body">
                        @foreach($projectfields as $key => $projectfield)
                        	
                        		@if(isset($projectfield['break']))
                        			<hr>
                        		@else
                        		
                        			<?php
                        			if(isset($projectfield['target']) && ($dsrInfo[$projectfield['field']] < $projectfield['target'])){
                        				$class = 'text-danger';
                        			}elseif(isset($projectfield['target']) && ($dsrInfo[$projectfield['field']] >= $projectfield['target'])){
                        				$class = 'text-success';
                        			}else{
                        				$class = '';
                        			}
                        			?>
                            		<p class='<?php echo $class ?>'><strong>{{ $projectfield['title'] }}: </strong> 
                            		
                            		{{ $dsrInfo[$projectfield['field']] }}
                            		
                            		@if(isset($projectfield['target']))
                            		 / {{ $projectfield['target'] }}
                            		@endif
                            		
                            		</p>
                            	@endif
                            
                        @endforeach    
                        </div>
                        <div class="panel-footer">
                            <strong>Hours worked : </strong> {{ $dsrDetail['hours'] }}
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
      		</div>	              
                

            </div>
            <!-- /.row -->
            
@endsection