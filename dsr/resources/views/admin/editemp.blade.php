@extends('layouts.app')

@section('content')


<div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Edit Employee</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Employee Personal Information 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                {!! Form::model($user, ['method' => 'PATCH', 'action' => ['EmployeesController@update', $user->id], 'files' => true ]) !!} 
                               
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
                                        {!! Form::label('title', 'First Name') !!}
                                        {!! Form::text('first_name', null, ['class'=>'form-control', 'id'=>'first_name']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('title', 'Middle Name') !!}
                                            {!! Form::text('middle_name', null, ['class'=>'form-control', 'id'=>'middle_name']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('title', 'Last name') !!}
                                            {!! Form::text('last_name', null, ['class'=>'form-control', 'id'=>'last_name']) !!}
                                        </div>
                                        <div class="form-group">
                                        	<div><img src='{{url('/')}}/images/employees/{{$user->photo}}' width="200" /></div>
                                        	
                                            {!! Form::label('title', 'Photo') !!}
                                            {!! Form::file('photo', ['id'=>'photo']) !!}
                                        </div>                                        
                                        <div class="form-group">
                                            {!! Form::label('title', 'Date Of Birth') !!}
                                            {!! Form::date('dob', null, ['class'=>'form-control', 'id'=>'dob']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('title', 'Sex:') !!}&nbsp;&nbsp;
                                            Male {!! Form::radio('sex', 'Male') !!}&nbsp;&nbsp;
                                            Female {!! Form::radio('sex', 'Female') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control" rows="3">{{$user->address}}</textarea>
                                        </div>
                                                                                
                                        <div class="form-group">
                                             {!! Form::label('title', 'City') !!}
                                            {!! Form::text('city', null, ['class'=>'form-control', 'id'=>'city']) !!}
                                                                                        
                                        </div>                                        
                                        <div class="form-group">
                                            <label>Blood group</label>
                                             {!! Form::label('title', 'Blood group') !!}
                                            {!! Form::text('blood_group', null, ['class'=>'form-control', 'id'=>'blood_group']) !!}
                                        </div>
                                        
                                        <h3>Contact Details</h3>
                                        
                                        <div class="form-group">
                                             {!! Form::label('title', 'Mobile number') !!}
                                            {!! Form::text('mobile_number', null, ['class'=>'form-control', 'id'=>'mobile_number']) !!}
                                        </div>                                        
                                        <div class="form-group">
                                             {!! Form::label('title', 'Landline number') !!}
                                            {!! Form::text('landline_number', null, ['class'=>'form-control', 'id'=>'landline_number']) !!}                                            
                                        </div>                                        
   
                                       <div class="form-group">
                                            {!! Form::label('title', 'Other contact') !!}
                                            {!! Form::text('other_contact', null, ['class'=>'form-control', 'id'=>'other_contact']) !!} 
                                        </div>     
                                       
                                       <h3>Professional Skills</h3>
                                        
                                       <div class="form-group">
                                            {!! Form::label('title', 'Qualification') !!}
                                            {!! Form::text('qualification', null, ['class'=>'form-control', 'id'=>'qualification']) !!}                                             
                                        </div>     
                                       <div class="form-group">
                                            {!! Form::label('title', 'Computer skill') !!}
                                            {!! Form::text('computer_skill', null, ['class'=>'form-control', 'id'=>'computer_skill']) !!}                                               
                                        </div>                                             
                                                                
                                       <div class="form-group">
                                            {!! Form::label('title', 'Other skill / Experience') !!}
                                            {!! Form::text('other_skill_experience', null, ['class'=>'form-control', 'id'=>'other_skill_experience']) !!}                                              
                                        </div>                                        

                                        <div class="form-group">
                                            {!! Form::label('title', 'Total Experience') !!}
                                            {!! Form::text('total_experience', null, ['class'=>'form-control', 'id'=>'total_experience']) !!}                                              
                                        </div> 
                                        <div class="form-group">
                                            {!! Form::label('title', 'Pre Employer') !!}
                                            {!! Form::text('pre_employer', null, ['class'=>'form-control', 'id'=>'pre_employer']) !!}                                              
                                        </div>                                                                                           
                                        <div class="form-group">
                                             {!! Form::label('title', 'Typing speed') !!}
                                            {!! Form::text('typing_speed', null, ['class'=>'form-control', 'id'=>'typing_speed']) !!}                                                                                         
                                        </div>

                                        
                                        
                                     <h3>Additional Skills</h3>                          
                                        <div class="form-group">
                                            {!! Form::label('title', 'English:') !!}&nbsp;&nbsp;
                                            None {!! Form::radio('addition_skill_english', 'None') !!}&nbsp;&nbsp;
                                            Moderate {!! Form::radio('addition_skill_english', 'Moderate') !!}&nbsp;&nbsp;
                                            Good {!! Form::radio('addition_skill_english', 'Good') !!}&nbsp;&nbsp;
                                            N/A {!! Form::radio('addition_skill_english', 'N/A') !!}
                                        </div> 
                                        <div class="form-group">
                                            {!! Form::label('title', 'HTML:') !!} &nbsp;&nbsp;
                                            None {!! Form::radio('addition_skill_html', 'None') !!}&nbsp;&nbsp;
                                            Moderate {!! Form::radio('addition_skill_html', 'Moderate') !!}&nbsp;&nbsp;
                                            Good {!! Form::radio('addition_skill_html', 'Good') !!}&nbsp;&nbsp;
                                            N/A {!! Form::radio('addition_skill_html', 'N/A') !!}
                                        </div>
                                        <div class="form-group">
                                        	{!! Form::label('title', 'Photoshop:') !!}&nbsp;&nbsp;
                                            None {!! Form::radio('addition_skill_photoshop', 'None') !!}&nbsp;&nbsp;
                                            Moderate {!! Form::radio('addition_skill_photoshop', 'Moderate') !!}&nbsp;&nbsp;
                                            Good {!! Form::radio('addition_skill_photoshop', 'Good') !!}&nbsp;&nbsp;
                                            N/A {!! Form::radio('addition_skill_photoshop', 'N/A') !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('title', 'PHP:') !!}&nbsp;&nbsp;
                                            None {!! Form::radio('addition_skill_php', 'None') !!}&nbsp;&nbsp;
                                            Moderate {!! Form::radio('addition_skill_php', 'Moderate') !!}&nbsp;&nbsp;
                                            Good {!! Form::radio('addition_skill_php', 'Good') !!}&nbsp;&nbsp;
                                            N/A {!! Form::radio('addition_skill_php', 'N/A') !!}
                                        </div>                                        
                                        <div class="form-group">
                                            {!! Form::label('title', 'Webresearch:') !!}&nbsp;&nbsp;
                                            None {!! Form::radio('addition_skill_webresearch', 'None') !!}&nbsp;&nbsp;
                                            Moderate {!! Form::radio('addition_skill_webresearch', 'Moderate') !!}&nbsp;&nbsp;
                                            Good {!! Form::radio('addition_skill_webresearch', 'Good') !!}&nbsp;&nbsp;
                                            N/A {!! Form::radio('addition_skill_webresearch', 'N/A') !!}
                                        </div>             
                                       
                                       </div>
                                     <div class="col-lg-6">      
                                      
                                        <h3>Office Use</h3>
                                                                                                                                                   
                                        <div class="form-group">
                                             {!! Form::label('title', 'Employee Id') !!}
                                            {!! Form::number('emp_id', null, ['class'=>'form-control', 'id'=>'emp_id', 'disabled']) !!}                                            
                                        </div>



                                        <?php
                                            $allTags = App\User::allTags();
                                            $tagsDropdown = [];
                                            foreach($allTags as $aTag){
                                                $tagsDropdown[$aTag] = $aTag;
                                            }

                                            $userTags = [];
                                            foreach($user->tags as $aTag){
                                                $userTags[$aTag->name] = $aTag->name;
                                            }
                                        ?>   
                                        <div class="form-group">
                                            {!! Form::label('title', 'Tags') !!}
                                            {!! Form::select('user_tag[]',$tagsDropdown, $userTags, ['class'=>'form-control', 'id'=>'user_tags','multiple'=>'multiple']) !!}
                                        </div> 



                                        <div class="form-group">
                                            {!! Form::label('title', 'User Name') !!}
                                            {!! Form::text('user_name', null, ['class'=>'form-control', 'id'=>'user_name']) !!}                                            
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('title', 'Password') !!}
                                            {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}                                            
                                        </div>                                        
                                        <div class="form-group">
                                            {!! Form::label('title', 'Personal Email') !!}
                                            {!! Form::text('personal_email', null, ['class'=>'form-control', 'id'=>'personal_email']) !!}                                            
                                            
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('title', 'Designation') !!}
                                            {!! Form::select('designation',[
    											'None' 			=> 'None',
    											'MD' 			=> 'MD',
    											'Founder' 		=> 'Founder',
    											'Administrator' => 'Administrator',
    											'Sr Programmer' => 'Sr Programmer',
    											'Programmer' 	=> 'Programmer',
    											'SrDEO'		 	=> 'SrDEO',
    											'DEO'		 	=> 'DEO',
    											'CSO'		 	=> 'CSO',
    											'HR'		 	=> 'HR',
    											'Receptionist'	=> 'Receptionist',
    											'Project Manager'	=> 'Project Manager',
    											'INTERN'	=> 'INTERN',
    											'ECA'	=> 'ECA',
    											'SrECA'	=> 'SrECA',
    											'VA'	=> 'VA',
    											'SrVA'	=> 'SrVA',
    											'Accountant'	=> 'Accountant',
    											'Office Attendant'	=> 'Office Attendant',
    											'Office Boy'	=> 'Office Boy',
    											'Chauffeur'	=> 'Chauffeur',
    											'Security Guard'	=> 'Security Guard',
    											'Domestic Worker'	=> 'Domestic Worker',
    											'Housekeeping'	=> 'Housekeeping',
    											'Teacher'	=> 'Teacher',
    											'None'	=> 'None',
											], null, ['class'=>'form-control', 'id'=>'designation']) !!}
                                        </div>                                        
                                        

                                        <div class="form-group">
                                            {!! Form::label('title', 'Company Email') !!}
                                            {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) !!}                                              
                                        </div>                     
                                        <div class="form-group">
                                            {!! Form::label('title', 'Date Of Joining') !!}
                                            {!! Form::date('date_of_joining', null, ['class'=>'form-control', 'id'=>'date_of_joining']) !!}                                              
                                        </div>                                        
                                        
                                                           
                                        <div class="form-group">
                                            {!! Form::label('title', 'User Role') !!}
                                            {!! Form::select('role_id',$roles, null, ['class'=>'form-control', 'id'=>'role_id']) !!}
                                                                                          
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('title', 'Working Status') !!}
                                            {!! Form::select('working_status',[
    											'Working' 			=> 'Working',
    											'Left' 			=> 'Left',
    											'Long Leave' 		=> 'Long Leave',
											], null, ['class'=>'form-control', 'id'=>'working_status']) !!}                                            
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            {!! Form::label('title', 'Login Info') !!}
                                            {!! Form::checkbox('login_info', '1') !!}
                                                                                         
                                        </div>
										-->
										
                                        <div class="form-group">
                                            <label>Remark</label>
                                            <textarea name="remark" class="form-control" rows="3">{{$user->remark}}</textarea>
                                        </div>
                                                                                
                                        <div class="form-group">
                                            {!! Form::label('title', 'Left On') !!}
                                            {!! Form::date('company_left_on', null, ['class'=>'form-control', 'id'=>'company_left_on']) !!}                                             
                                            
                                        </div>          
                                        <h3>Leave Status of employee</h3>                              
                                        <div class="form-group">
                                            {!! Form::label('title', 'Leave Allotted') !!}
                                            {!! Form::text('leave_allotted', null, ['class'=>'form-control', 'id'=>'leave_allotted']) !!}                                                  
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('title', 'Leave Forwarded') !!}
                                            {!! Form::text('leave_forwarded', null, ['class'=>'form-control', 'id'=>'leave_forwarded']) !!}                                                  
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('title', 'Other Leave') !!}
                                            {!! Form::text('other_leave', null, ['class'=>'form-control', 'id'=>'other_leave']) !!}                                                
                                        </div>
                                        <div class="form-group">
                                        {!! Form::label('title', 'Ready for night shift') !!}&nbsp;&nbsp;
                                            Yes {!! Form::radio('ready_for_night_shift', 'yes') !!}&nbsp;&nbsp;
                                            No {!! Form::radio('ready_for_night_shift', 'no') !!}
                                        </div>                                        

                                        <div class="form-group">
                                             {!! Form::label('title', 'Currently working in shift') !!}&nbsp;&nbsp;
                                            
                                            {!! Form::select('working_on_shift',[
    											'07:00 AM' => '07:00 AM',
                                                '07:15 AM' => '07:15 AM',
                                                '07:30 AM' => '07:30 AM',
                                                '07:45 AM' => '07:45 AM',
                                                '08:00 AM' => '08:00 AM',
                                                '08:15 AM' => '08:15 AM',
                                                '08:30 AM' => '08:30 AM',
                                                '08:45 AM' => '08:45 AM',
                                                '09:00 AM' => '09:00 AM',
                                                '09:15 AM' => '09:15 AM',
                                                '09:30 AM' => '09:30 AM',
                                                '09:45 AM' => '09:45 AM',
                                                '10:00 AM' => '10:00 AM',
                                                '19:15 AM' => '19:15 AM',
                                                '10:30 AM' => '10:30 AM',
                                                '10:45 AM' => '10:45 AM',
                                                '11:00 AM' => '11:00 AM',
                                                '11:15 AM' => '11:15 AM',
                                                '11:30 AM' => '11:30 AM',
                                                '11:45 AM' => '11:45 AM',
                                                '12:00 PM' => '12:00 PM',
                                                '12:15 PM' => '12:15 PM',
                                                '12:30 PM' => '12:30 PM',
                                                '12:45 PM' => '12:45 PM',
                                                '01:00 PM' => '01:00 PM',
                                                '01:15 PM' => '01:15 PM',
                                                '01:30 PM' => '01:30 PM',
                                                '01:45 PM' => '01:45 PM',
                                                '01:00 PM' => '01:00 PM',
                                                '01:15 PM' => '01:15 PM',
                                                '01:30 PM' => '01:30 PM',
                                                '01:45 PM' => '01:45 PM',
                                                '02:00 PM' => '02:00 PM',
                                                '02:15 PM' => '02:15 PM',
                                                '02:30 PM' => '02:30 PM',
                                                '02:45 PM' => '02:45 PM',
                                                '03:00 PM' => '03:00 PM',
                                                '03:15 PM' => '03:15 PM',
                                                '03:30 PM' => '03:30 PM',
                                                '03:45 PM' => '03:45 PM',
                                                '04:00 PM' => '04:00 PM',
                                                '04:15 PM' => '04:15 PM',
                                                '04:30 PM' => '04:30 PM',
                                                '04:45 PM' => '04:45 PM',
                                                '05:00 PM' => '05:00 PM',
                                                '05:15 PM' => '05:15 PM',
                                                '05:30 PM' => '05:30 PM',
                                                '05:45 PM' => '05:45 PM',
                                                '06:00 PM' => '06:00 PM',
                                                '06:15 PM' => '06:15 PM',
                                                '06:30 PM' => '06:30 PM',
                                                '06:45 PM' => '06:45 PM',
                                                '07:00 PM' => '07:00 PM',
                                                '07:15 PM' => '07:15 PM',
                                                '07:30 PM' => '07:30 PM',
                                                '07:45 PM' => '07:45 PM',
                                                '08:00 PM' => '08:00 PM',
                                                '08:15 PM' => '08:15 PM',
                                                '08:30 PM' => '08:30 PM',
                                                '08:45 PM' => '08:45 PM',
                                                '09:00 PM' => '09:00 PM',
                                                '09:15 PM' => '09:15 PM',
                                                '09:30 PM' => '09:30 PM',
                                                '09:45 PM' => '09:45 PM',
                                                '10:00 PM' => '10:00 PM',
                                                '10:15 PM' => '10:15 PM',
                                                '10:30 PM' => '10:30 PM',
                                                '10:45 PM' => '10:45 PM',
                                                '11:00 PM' => '11:00 PM',
											], null, ['class'=>'form-control', 'id'=>'working_on_shift']) !!}                                            
                                            
                                        </div>      
 
                                         <div class="form-group">
                                            {!! Form::label('title', 'Working On Project') !!}
                                            {!! Form::select('project_id',$projects, null, ['class'=>'form-control', 'id'=>'project_id']) !!}                                            
                                        </div>                                    

                                         <div class="form-group">
                                            {!! Form::label('title', 'Last Updated By: ') !!}
                                            {{$lastupdatedby}}
                                        </div>                                    
                                        
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                       
                                    {!! Form::close() !!}
                                
					<?php if(count($addUpdates)>0){ ?>
					<h3>Old Contact Details</h3>
					<div class="panel-group" id="accordion">
					@foreach($addUpdates as $k => $Update)
					<div class="panel panel-default">
						<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$k}}" aria-expanded="false" class="collapsed"><?php echo date('F j, Y, g:i a', strtotime($Update->created_at));?></a>
						</h4>
						</div>
						<div id="collapse{{$k}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
						<div class="panel-body">
							<table>

									<tr><th valign="top">Address: </th><td><?php echo str_replace("\n",'<br>', $Update->address); ?></td></tr>
									<tr><td colspan="2">&nbsp;</td></tr>
									<tr><th valign="top">Mobile number: </th><td>{{$Update->mobile_number}}</td></tr>
									<tr><td colspan="2">&nbsp;</td></tr>
									<tr><th valign="top">Landline number: </th><td>{{$Update->landline_number}}</td></tr>
									<tr><td colspan="2">&nbsp;</td></tr>
									<tr><th valign="top">Other contact: </th><td>{{$Update->other_contact}}</td></tr>
									<tr><td colspan="2">&nbsp;</td></tr>
									<tr><th valign="top">Personal Email: </th><td>{{$Update->personal_email}}</td></tr>

							</table>
						</div>
						</div>
					</div>
					@endforeach	
					</div>
					<?php } ?>
 </div>

                            </div>
                            <!-- /.row (nested) -->
                            
                            
                        </div>
                        <!-- /.panel-body -->
                        
                        
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                
              

                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Documents 
                        </div>
                        <div class="panel-body">

                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                        <thead>
                            <tr class="alert alert-success">
                            <th style="text-align:left !important;">Sr. No</th>
                            <th style="text-align:left !important;">Document Title</th>
                            <th style="text-align:left !important;">Document</th>
                            
                            <th style="text-align:center !important;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($documents)>0){?>
                                <?php foreach($documents as $k => $document){ ?>
                                <tr class="odd gradeX">
                                   <td>{{$k+1}}</td> 
                                   <td align="left">{{$document->doc_title}}</td>
                                   <td align="left"><a href="/emp/download_doc/{{$document->id}}">{{$document->file_name}}</a></td>

                                   <td align="center">
                                    <a href="{{url('/')}}/delete/document/{{$document->id}}" class="deleteConfirmation">Delete</a>
                                    </td>
                                </tr> 
                                <?php } ?>                             
                            <?php }else{ ?>
                                <tr><td colspan="4" align="center">No documents found!</td></tr>
                            <?php } ?>

                        </tbody>
                        </table> 

                        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['EmployeesController@upload_document', $user->id], 'files' => true ]) !!} 
                        <h3>Add Document</h3>
                            <b>Document Title:</b> <input type="text" class="form-control" style="width:400px;" required name="doc_title" />
                            <br>
                            <b>File:</b> <input type="file" style="width:400px;" class="form-control" required name="document" />
                            
                            <br>
                            <p><b>Note:</b> The document must be a file of type: doc, pdf, docx, jpeg, jpg, png, gif</p>
                            
                            <p>Max allowed size is: 8MB</p>

                            <br>
                            <input type="submit" name="Submit"  class="btn btn-primary " name="Submit" value="Submit" />
                        </form>


                        </div>
                    </div>
                </div>    
            </div>
            <!-- /.row -->



@endsection

@section('javascriptsection')


<link href="{{url('/')}}/vendor/select2/select2.min.css" rel="stylesheet" />
<script src="{{url('/')}}/vendor/select2/select2.min.js"></script>
    

<script type="text/javascript">
    $("#user_tags").select2({
  tags: true
});

</script>


 <script type="text/javascript">
 $(".deleteConfirmation").click(function(){


     var choice = confirm('are you sure want to delete document ? ');

     if (choice) {
         return true;
     }
     
    return false;
        
    }); 
 </script>
 @endsection