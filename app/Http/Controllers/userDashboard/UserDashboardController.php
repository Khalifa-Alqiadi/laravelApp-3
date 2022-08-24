<?php

namespace App\Http\Controllers\userDashboard;

use App\Models\User;
use App\Models\Skill;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserQualifcations;
use App\Models\Course;
use App\Models\Qualifcation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    //
    function showUserDashboard()
    {
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
    function showSkills()
    {
        $user = User::find(Auth::id());
        $skills = Skill::where('user_id', $user->id)->get();
        if ($skills) {
            return response()->json([
                'status'    => 1,
                'skills'     => $skills
            ]);
        } else {
            return response()->json(['status' => 0, 'error' => 'Not Found']);
        }
    }
    function insertSkillUserDashboard(Request $request)
    {
        $validte = Validator::make($request->all(), [
            'user_id'   => 'required',
            'name'      => 'required',
            'percent'   => 'required'
        ]);
        if (!$validte->passes()) {
            return response()->json(['status' => 0, 'error' => $validte->errors()->toArray()]);
        } else {
            $skills = new Skill;
            $skills->name = $request->name;
            $skills->percent = $request->percent;
            $skills->user_id = $request->user_id;
            if ($skills->save())
                return response()->json(['status' => 1, 'success' => 'Skill Inserted Successful']);
            return back()->with(['error' => 'can not create user']);
        }
    }
    function edit_skill($id)
    {
        $skill = Skill::find($id);
        if ($skill) {
            return response()->json([
                'status'    => 1,
                'skill'     => $skill
            ]);
        } else {
            return response()->json(['status' => 0, 'error' => 'Not Found']);
        }
    }
    function editSkillUserDashboard(Request $request)
    {
        $validte = Validator::make($request->all(), [
            'name'      => 'required',
            'percent'   => 'required'
        ]);
        if (!$validte->passes()) {
            return response()->json(['status' => 0, 'error' => $validte->errors()->toArray()]);
        } else {

            $id = $request->input('id');
            $editSkill = Skill::find($id);
            $editSkill->name = $request->input('name');
            $editSkill->percent = $request->input('percent');

            if ($editSkill->update())
                return response()->json(['status' => 1, 'success' => 'Skill Inserted Successful']);
            return back()->with(['error' => 'can not create user']);
        }
    }
    function deleteSkillUserDashboard(Request $request)
    {
        $id = $request->id;
        $delete = Skill::find($id);
        if ($delete->delete()) {
            return response()->json([
                'status'    => 1,
                'success'     => 'Skill Delete Successfull'
            ]);
        } else {
            return response()->json(['status' => 0, 'error' => 'Not Found']);
        }
    }

    function showExperience()
    {
        $user = User::find(Auth::id());
        $experience = Experience::where('user_id', $user->id)->get();
        if ($experience) {
            return response()->json([
                'status'            => 1,
                'experience'        => $experience
            ]);
        } else {
            return response()->json(['status' => 0, 'error' => 'Not Found']);
        }
    }

    function insertExperienceUserDashboard(Request $request)
    {
        $validte = Validator::make($request->all(), [
            'name'      => 'required',
            'years'   => 'required'
        ]);
        if (!$validte->passes()) {
            return response()->json(['status' => 0, 'error' => $validte->errors()->toArray()]);
        } else {
            $experience = new Experience;
            $experience->user_id = $request->userid;
            $experience->name = $request->name;
            $experience->years = $request->years;
            if ($experience->save())
                return response()->json(['status' => 1, 'success' => 'Experience Inserted Successful']);
            return back()->with(['error' => 'can not inserted']);
        }
    }

    function edit_experience($id)
    {
        $experience = Experience::find($id);
        if ($experience) {
            return response()->json([
                'status'    => 1,
                'experience'     => $experience
            ]);
        } else {
            return response()->json(['status' => 0, 'error' => 'Not Found']);
        }
    }
    function editExperienceUserDashboard(Request $request)
    {
        $validte = Validator::make($request->all(), [
            'name'      => 'required',
            'years'   => 'required'
        ]);
        if (!$validte->passes()) {
            return response()->json(['status' => 0, 'error' => $validte->errors()->toArray()]);
        } else {

            $id = $request->input('id');
            $editExperience = Experience::find($id);
            $editExperience->name = $request->input('name');
            $editExperience->years = $request->input('years');

            if ($editExperience->update())
                return response()->json(['status' => 1, 'success' => 'Experience Updated Successful']);
            return back()->with(['error' => 'can not Updated']);
        }
    }
    function deleteExperienceUserDashboard(Request $request)
    {
        $id = $request->experienceid;
        $deleteExperience = Experience::find($id);
        if ($deleteExperience->delete())
            return response()->json(['status' => 1, 'success' => 'Experience Deleted Successful']);
        return response()->json(['error' => 'can not Deleted']);
    }

    // Start Qualifcations

    public function showQualifcations()
    {

        $user = User::find(Auth::id());
        $qualifcations = Qualifcation::where('user_id', $user->id)->get();
        if ($qualifcations) {
            return response()->json([
                'status'            => 1,
                'qualifcations'     => $qualifcations
            ]);
        } else {
            return response()->json(['status' => 0, 'error' => 'Not Found']);
        }
    }
    function insertQualifcationsUserDashboard(Request $request)
    {
        $input = new UserQualifcations();
        $validte = Validator::make($request->all(), $input->rules());
        if (!$validte->passes()) {
            return response()->json(['status' => 0, 'error' => $validte->errors()->toArray()]);
        } else {
            $qualifcations = Qualifcation::create($request->input());
            if ($qualifcations)
                return response()->json(['status' => 1, 'success' => 'Qualifcation Inserted Successful']);
            return response()->json(['error' => 'can not Inserted']);
        }
    }
    function editQualifcation(Qualifcation $id)
    {
        if ($id) {
            return response()->json([
                'status'            => 1,
                'qualifcation'      => $id
            ]);
        } else {
            return response()->json(['status' => 0, 'error' => 'Not Found']);
        }
    }
    function editQualifcationsUserDashboard(Request $request)
    {
        $input = new UserQualifcations();
        $validte = Validator::make($request->all(), $input->rules());
        if (!$validte->passes()) {
            return response()->json(['status' => 0, 'error' => $validte->errors()->toArray()]);
        } else {
            $qualifcations = Qualifcation::find($request->qualifcation_id);
            $qualifcations->update($request->input());
            if ($qualifcations)
                return response()->json(['status' => 1, 'success' => 'Qualifcation Inserted Successful']);
            return response()->json(['error' => 'can not Inserted']);
        }
    }

    function deleteQualifcationsUserDashboard(Request $request)
    {
        $qualifcation = Qualifcation::find($request->id);
        if ($qualifcation->delete())
            return response()->json(['status' => 1, 'success' => 'Qualifcation Deleted Successful']);
        return response()->json(['error' => 'can not Deleted']);
    }

    public function showCourses()
    {
        return response()->json([
            'status'        => 1,
            'courses'       => Course::where('user_id', Auth::id())->get(),
        ]);
    }

    function addCoursesUser(Request $request)
    {
        $validte = Validator::make($request->all(), [
            'name'      => 'required',
        ]);
        if (!$validte->passes()) {
            return response()->json(['status' => 0, 'error' => $validte->errors()->toArray()]);
        } else {
            $courses = Course::create($request->input());
            if ($courses)
                return response()->json(['status' => 1, 'success' => 'Course Inserted Successful']);
            return response()->json(['error' => 'can not Inserted']);
        }
    }

    public function editCourses(Course $id)
    {
        return response()->json([
            'status'        => 1,
            'course'        => $id,
        ]);
    }

    function editCoursesUser(Request $request)
    {
        $validte = Validator::make($request->all(), [
            'name'      => 'required',
        ]);
        if (!$validte->passes()) {
            return response()->json(['status' => 0, 'error' => $validte->errors()->toArray()]);
        } else {
            $course = Course::find($request->course_id);
            if ($course->update($request->input()))
                return response()->json(['status' => 1, 'success' => 'Course updated Successful']);
            return response()->json(['error' => 'can not updated']);
        }
    }
    function deleteCoursesUser(Request $request)
    {
        $course = Course::find($request->id);
        if ($course->delete())
            return response()->json(['status' => 1, 'success' => 'Course Deleted Successful']);
        return response()->json(['error' => 'can not Deleted']);
    }
}
