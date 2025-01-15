<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Leaves;
use App\Timelog;

class AjaxController extends Controller
{
    //
    public function getUserPhoto($id=0){
        
        $employeeData = [];
        
        $employees = User::findOrfail($id);
        
        //$employees->photo
        
        $employeeData = $employees->photo;
        
        //dd($employees->photo);
        
        return response()->json($employeeData);
    }
    

    public function getUserShift($id=0){
        
        $employeeData = [];
        
        $employees = User::findOrfail($id);
        
        $employeeTime = $employees->working_on_shift;
        
        return response()->json($employeeTime);
    }
    

    public function changeUserShift($id=0, $time=''){
        
        $employeeData = [];
        
        $employees = User::findOrfail($id);
        
        $employees->working_on_shift = $time;
        
        $employees->save();
        
        return response()->json($time);
    }

    
    public function changeUserProject($id=0, $project_id=''){
        
        $employeeData = [];
        
        $employees = User::findOrfail($id);
        
        $employees->project_id = $project_id;
        
        $employees->save();
        
        $project = Project::findOrfail($project_id);

        $array = [4,831,1280];
        $onBenchClass= '';
        if(in_array($project_id, $array)){
            $onBenchClass= 'text-danger';
        }

        $empOnProjects = DB::table('users')->where('working_status', '=', 'Working')->select('project_id', DB::raw('count(*) as totalemp'))->groupBy('project_id')->get();
        $allEmpProject = [];
        foreach ($empOnProjects as $empOnProject){
            $allEmpProject[$empOnProject->project_id] = $empOnProject->totalemp;
        }
        
        $data = "<a href='/projects/{$project->id}/edit' class='{$onBenchClass}' data-toggle='tooltip' data-placement='left' title='Project Members ({$allEmpProject[$project->id]})'>{$project->project_name}</a>";

        return $data;
        //return response()->json($data);
    }
    

    public function getUserProject($id=0){
        
        $employeeData = [];
        
        $employees = User::findOrfail($id);
        
        $employeeProject = $employees->project_id;
        
        return response()->json($employeeProject);
    }
    
    
    
    public function h2m($hours='') {
        
        $t = explode(":", $hours);
        $h = $t[0];
        if(isset($t[1])) {
            $m = $t[1];
        }else{
            $m = 0;
        }
        $mm = ($h * 60) + $m;
        return $mm;
    }
    
    
    public function getTimeLog(Request $request, $id=''){
        
        if($id==''){
            $user = Auth::user();
            $id = $user->id;
        }

        
        $logObj = Timelog::with(['forUser'])->where('user_id', '=', $id)->where('date','>=',"$request->start 00:00:00")->where('date','<',$request->end)->get();
        
        
        $events = [];
        foreach($logObj as $k => $log){
            
            //$interval = date_diff(date('Y-m-d') . ' '. date('g:i a', strtotime($log->incoming_time)),  date(Y-m-d). ' '. $log->forUser->working_on_shift);
            
            $to_time = strtotime(date('g:i a', strtotime($log->incoming_time)));
            $from_time = strtotime($log->forUser->working_on_shift);
            
            if($to_time>$from_time){
                $interval = round(abs($to_time - $from_time) / 60,2). " minute";
            }else{
                $interval = 0;
            }
            
            $events[$k]['title'] = "In: ". date('g:i a', strtotime($log->incoming_time)) ." \n
                                    Out: ". date('g:i a', strtotime($log->outgoing_time)) ."\n 
                                    Duration: " . $log->duration. "\n 
                                    Late: ".$interval;

            $events[$k]['start'] = $log->date;
            
            
            if($interval>0){
                $events[$k]['color'] = '#d9534f';
                $events[$k]['textColor'] = '#FFFFFF';
            }
            
            if($log->incoming_time=='00:00' && $log->outgoing_time=='00:00'){
                $events[$k]['color'] = 'grey';
                $events[$k]['textColor'] = '#FFFFFF';
            }
            
            
        }
        
       // echo'<pre>';
        //print_r($events);
       // echo'</pre>';
       // exit;
        
        return response()->json($events);

    }
    
     public function deletedriver(Request $request) {
	       
		$res = 0;
		if($request->f!=''){
			$res = unlink("drivers/{$request->f}");
		}
		echo $res;
		return;
    }
    
    
	 public function getLateMarks(Request $request) {

		$totalLate = 0;
		if($request->month!='' && $request->user_id){
			
			$request->month = urldecode($request->month);
			$monthYear = $res = date('Y-m', strtotime($request->month));
			
			$logObj = Timelog::with(['forUser'])->where('user_id', '=', $request->user_id)->where('date','LIKE',"$monthYear%")->get();
			
			foreach($logObj as $k => $log){
				$to_time = strtotime(date('g:i a', strtotime($log->incoming_time)));
				$from_time = strtotime($log->forUser->working_on_shift);

				if($to_time>$from_time){
					$interval = round(abs($to_time - $from_time) / 60,2). " minute";
				}else{
					$interval = 0;
				}
				if($interval>0){
					$totalLate = $totalLate+1;
				}
			}
		}
		echo $totalLate;
		return;
	}
    
}
