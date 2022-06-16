<?php

namespace App\Http\Controllers\userDashboard;
use App\Models\User;
use App\Models\Skill;
use App\Models\Experience;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class UserDashboardController extends Controller
{
    //
    function showUserDashboard(){
        $role = DB::table('role_user')->get()->first();
        $user = User::find(Auth::id());
        $skills = User::with(['userSkill'])->get();
        $experience = User::with('userExperience')->where('id', $role->user_id)->get();
        $qualifcations = User::with('userQualifcation')->where('id', $role->user_id)->get();
        $courses = User::with('userCourse')->where('id', $role->user_id)->get();
        return view('userDashboard.index', [
            'user'     => $user,
            'skills'    => $skills,
            'experience'    => $experience,
            'qualifcations'    => $qualifcations,
            'courses'    => $courses,
        ]);
    }
    function showSkills(){
        $user = User::find(Auth::id());
        $skills = Skill::where('user_id', $user->id)->get();
        if($skills){
            return response()->json([
                'status'    => 1,
                'skills'     => $skills
            ]);
        }else{
            return response()->json(['status' => 0, 'error'=> 'Not Found']);
        } 
    }
    function insertSkillUserDashboard(Request $request){
        $validte = Validator::make($request->all(), [
            'user_id'   => 'required',
            'name'      => 'required',
            'percent'   => 'required'
        ]);
        if(!$validte->passes()){
            return response()->json(['status' => 0, 'error'=> $validte->errors()->toArray()]);
        }else{
            $skills = new Skill;
            $skills->name = $request->name;
            $skills->percent = $request->percent;
            $skills->user_id = $request->user_id;
            if($skills->save())
            return response()->json(['status' => 1, 'success'=>'Skill Inserted Successful']);
            return back()->with(['error'=>'can not create user']);
        }
    }
    function edit_skill($id){
        $skill = Skill::find($id);
        if($skill){
            return response()->json([
                'status'    => 1,
                'skill'     => $skill
            ]);
        }else{
            return response()->json(['status' => 0, 'error'=> 'Not Found']);
        }
    }
    function editSkillUserDashboard(Request $request){
        $validte = Validator::make($request->all(), [
            'name'      => 'required',
            'percent'   => 'required'
        ]);
        if(!$validte->passes()){
            return response()->json(['status' => 0, 'error'=> $validte->errors()->toArray()]);
        }else{
            
            $id = $request->input('id');
            $editSkill = Skill::find($id);
            $editSkill->name = $request->input('name');
            $editSkill->percent = $request->input('percent');

            if($editSkill->update())
            return response()->json(['status' => 1, 'success'=>'Skill Inserted Successful']);
            return back()->with(['error'=>'can not create user']);
        }
    }
    function deleteSkillUserDashboard(Request $request){
        $id = $request->id;
        $delete = Skill::find($id);
        if($delete->delete()){
            return response()->json([
                'status'    => 1,
                'success'     => 'Skill Delete Successfull'
            ]);
        }else{
            return response()->json(['status' => 0, 'error'=> 'Not Found']);
        }
    }

    function showExperience(){
        $user = User::find(Auth::id());
        $experience = Experience::where('user_id', $user->id)->get();
        if($experience){
            return response()->json([
                'status'            => 1,
                'experience'        => $experience
            ]);
        }else{
            return response()->json(['status' => 0, 'error'=> 'Not Found']);
        } 
    }

    function insertExperienceUserDashboard(Request $request){
        $validte = Validator::make($request->all(), [
            'name'      => 'required',
            'years'   => 'required'
        ]);
        if(!$validte->passes()){
            return response()->json(['status' => 0, 'error'=> $validte->errors()->toArray()]);
        }else{
            $experience = new Experience;
            $experience->user_id = $request->userid;
            $experience->name = $request->name;
            $experience->years = $request->years;
            if($experience->save())
            return response()->json(['status' => 1, 'success'=>'Experience Inserted Successful']);
            return back()->with(['error'=>'can not inserted']);
        }
    }
    
    function edit_experience($id){
        $experience = Experience::find($id);
        if($experience){
            return response()->json([
                'status'    => 1,
                'experience'     => $experience
            ]);
        }else{
            return response()->json(['status' => 0, 'error'=> 'Not Found']);
        }
    }
    function editExperienceUserDashboard(Request $request){
        $validte = Validator::make($request->all(), [
            'name'      => 'required',
            'years'   => 'required'
        ]);
        if(!$validte->passes()){
            return response()->json(['status' => 0, 'error'=> $validte->errors()->toArray()]);
        }else{
            
            $id = $request->input('id');
            $editExperience = Experience::find($id);
            $editExperience->name = $request->input('name');
            $editExperience->years = $request->input('years');

            if($editExperience->update())
            return response()->json(['status' => 1, 'success'=>'Experience Updated Successful']);
            return back()->with(['error'=>'can not Updated']);
        }
    }
    function deleteExperienceUserDashboard(Request $request){
        $id = $request->experienceid;
        $deleteExperience = Experience::find($id);
        if($deleteExperience->delete())
        return response()->json(['status' => 1, 'success'=>'Experience Deleted Successful']);
        return response()->json(['error'=>'can not Deleted']);
    }
    function insertQualifcationsUserDashboard(Request $request){
        $userid = $request->userid;
        $name = $request->name;
        $depart = $request->depart;
        $university = $request->university;
        $qualifcations = DB::table('qualifcations')->insert([
            'name'      => $name,
            'depart'   => $depart,
            'university'   => $university,
            'user_id'   => $userid
        ]);
        if($qualifcations){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> inserted successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function editQualifcationsUserDashboard(Request $request){
        $qualifid = $request->qualifid;
        $name = $request->name;
        $depart = $request->depart;
        $university = $request->university;
        $qualifcations = DB::table('qualifcations')->where('id', $qualifid)->update([
            'name'      => $name,
            'depart'   => $depart,
            'university'   => $university,
        ]);
        if($qualifcations){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> Updated successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }

    function deleteQualifcationsUserDashboard(Request $request){
        $id = $request->qualifid;
        $qualifcations = DB::table('qualifcations')->where('id', $id)->delete();
        if($qualifcations){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> Deleted successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function addCoursesUser(Request $request){
        $userid = $request->userid;
        $name = $request->name;
        $courses = DB::table('courses')->insert([
            'name'      => $name,
            'user_id'   => $userid
        ]);
        if($courses){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> inserted successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }

    function editCoursesUser(Request $request){
        $courseid = $request->courseid;
        $name = $request->name;
        $courses = DB::table('courses')->where('id', $courseid)->update(['name'      => $name ]);
        if($courses){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> Updated successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }
    function deleteCoursesUser(Request $request){
        $id = $request->courseid;
        $courses = DB::table('courses')->where('id', $id)->delete();
        if($courses){?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <?php
            $mes = "<div class='alert alert-success'> Deleted successful</div>";
            $this->redirectHome($mes, 'back', 5);
            return redirect('userDashboard');
        }else{
            return back()->with(['error'=>'can not create user']);
        }
    }

}
