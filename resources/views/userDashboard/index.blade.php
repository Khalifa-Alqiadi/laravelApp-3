@extends('userDashboard.layout.userDashboard')
@section('content')
<div class="container-fluid">
        
    <div class="row">
        <div class="col-sm-2 bg-white">
            <div class="d-flex flex-column align-items-cinter justify-content-start">
                
                        <img src="images/{{$user->avatar}}" alt="" class="m-2">
                        <h2 class="mt-3">{{$user->name}}</h2>
                        <p class="mt-3">{{$user->email}}</p>
                    
            </div>
        </div>
        <div class="col-sm-10">
            <h1 class="text-center mb-5">Manage My Dashboard</h1>
            <div class=" latest">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-users"></i> Latest  <span class="btn btn-info numbers">5</span>  Skills 
                                <span class="toggle-info pull-right">
                                    <i class="fa fa-plus fa-lg"></i>
                                </span>
                            </div>
                            <div class="card-body">
                                <ul class=" list-unstyled latest-users list-skill">
                                    
                                    {{-- @foreach($skills as $skill) --}}
                                        {{-- @if(!empty($skill->userSkill)) --}}
                                        {{-- @foreach($skill->userSkill as $skills) --}}
                                            
                                            {{-- @endforeach --}}
                                            {{-- @endif --}}
                                    {{-- @endforeach --}}
                                    
                                </ul>
                                <button type="button" class="mt-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSkill">
                                    add kill
                                </button>
                                
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                <i class="fa fa-tag"></i>Latest  <span class="btn btn-info numbers">5</span>  Experience
                                <span class="toggle-info pull-right">
                                    <i class="fa fa-plus fa-lg"></i>
                                </span>
                            </div>
                            <div class="card-body">
                            <ul class=" list-unstyled latest-users list-experience">
                                    {{-- @foreach($experience as $exper) --}}
                                        {{-- @if(!empty($exper->userExperience)) --}}
                                            
                                        {{-- @endif --}}
                                    {{-- @endforeach --}}
                                </ul>
                                <button type="button" class="mt-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExperience">
                                    add experience
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-comments-o"></i> Latest  <span class="btn btn-info numbers">5</span>  Qualifcations  
                                <span class="toggle-info pull-right">
                                    <i class="fa fa-plus fa-lg"></i>
                                </span>
                            </div>
                            <div class="card-body">

                                <ul class=" list-unstyled latest-users">
                                    @foreach($qualifcations as $qualif)
                                        @if(!empty($qualif->userQualifcation))
                                            <li class="d-flex justify-content-between align-items-center">
                                                <p class="m-0">{{$qualif->userQualifcation->name}}</p>
                                                <p class="m-0">{{$qualif->userQualifcation->depart}} </p>
                                                <p class="m-0">{{$qualif->userQualifcation->university}} </p>
                                                <p class="m-0">
                                                    <a href="" class="btn btn-primary py-0" data-bs-toggle="modal" data-bs-target="#editQualifcations{{$qualif->userQualifcation->id}}">
                                                        <i class="fa fa-edit"></i>Edit   
                                                    </a>
                                                    <a href='' class='btn btn-danger py-0' data-bs-toggle="modal" data-bs-target="#deleteQualifcations{{$qualif->userQualifcation->id}}">
                                                        <i class='fa fa-delete'></i> Delete
                                                    </a> 
                                                </p>
                                                <div class="modal fade" id="editQualifcations{{$qualif->userQualifcation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="edit_qualifcations_user" method="post">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Qualifcations</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="qualifid" value="{{$qualif->userQualifcation->id}}">
                                                                    <input type="text" name="name" value="{{$qualif->userQualifcation->name}}" class="mt-3 form-control" placeholder="Enter Qualifcations Name">
                                                                    <input type="text" name="depart" value="{{$qualif->userQualifcation->depart}}" class="mt-3 form-control" placeholder="Enter Qualifcations Depart">
                                                                    <input type="text" name="university" value="{{$qualif->userQualifcation->university}}" class="mt-3 form-control" placeholder="Enter Qualifcations University">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <input type="submit" class="btn btn-primary" value="Update Qualifcations" />
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="deleteQualifcations{{$qualif->userQualifcation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="delete_qualifcations_user" method="post">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">delete experience</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="qualifid" value="{{$qualif->userQualifcation->id}}">
                                                                    <h2>Are you sure!</h2>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <input type="submit" class="btn btn-primary" value="Delete Qualifcations" />
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                    @endforeach
                                </ul>
                                <button type="button" class="mt-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQualifcations">
                                    add Qualifcations
                                </button>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                <i class="fa fa-comments-o"></i> Latest  <span class="btn btn-info numbers">5</span>  Courses  
                                <span class="toggle-info pull-right">
                                    <i class="fa fa-plus fa-lg"></i>
                                </span>
                            </div>
                            <div class="card-body">

                                <ul class=" list-unstyled latest-users">
                                    @foreach($courses as $course)
                                        @if(!empty($course->userCourse))
                                            <li class="d-flex justify-content-between align-items-center">
                                                <p class="m-0">{{$course->userCourse->name}}</p>
                                                <p class="m-0">
                                                    <a href="" class="btn btn-primary py-0" data-bs-toggle="modal" data-bs-target="#editCourses{{$course->userCourse->id}}">
                                                        <i class="fa fa-edit"></i>Edit   
                                                    </a>
                                                    <a href='' class='btn btn-danger py-0' data-bs-toggle="modal" data-bs-target="#deleteCourses{{$course->userCourse->id}}">
                                                        <i class='fa fa-delete'></i> Delete
                                                    </a> 
                                                </p>
                                                <div class="modal fade" id="editCourses{{$course->userCourse->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="edit_courses_user" method="post">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Courses</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="courseid" value="{{$course->userCourse->id}}">
                                                                    <input type="text" name="name" value="{{$course->userCourse->name}}" class="mt-3 form-control" placeholder="Enter Course Name">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <input type="submit" class="btn btn-primary" value="Update Course" />
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="deleteCourses{{$course->userCourse->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="delete_courses_user" method="post">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">delete Course</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="courseid" value="{{$course->userCourse->id}}">
                                                                    <h2>Are you sure!</h2>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <input type="submit" class="btn btn-primary" value="Delete course" />
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                    @endforeach
                                </ul>
                                <button type="button" class="mt-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourses">
                                    add Courses
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Start Skill --}}
<div class="modal fade" id="addSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="alert alert-success success-text"></span>
            <form action="add_skill_user" method="post" id="skill_form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Skill Name">
                    <span class="text-danger error-text name_error"></span>
                    <input type="text" name="percent" class="mt-3 form-control" placeholder="Enter Skill Percent">
                    <span class="text-danger error-text percent_error"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save skill" />
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade " id="editSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="alert alert-success success-text"></span>
            <form action="edit_skill_user" method="post" class="edit_skill_user">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_skill_id" value="" name="id">
                    <input type="text" id="edit_name" name="name" value="" class="mt-3 form-control" placeholder="Enter Skill Name">
                    <span class="text-danger error-text name_error"></span>
                    <input type="text" id="edit_percent" name="percent" value="" class="mt-3 form-control" placeholder="Enter Skill Percent">
                    <span class="text-danger error-text percent_error"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save skill" />
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="delete_skill_user" method="post" class="delete_skill_user">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="delete_skill_id" name="id" value="">
                    <h2>Are you sure!</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Delete skill" />
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Skill --}}
{{-- End Experience --}}
<div class="modal fade" id="addExperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="alert alert-success success-text"></span>
            <form action="add_experience_user" method="post" id="add_experience_user">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="userid" value="{{$user->id}}">
                    <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Experience Name">
                    <span class="text-danger error-text name_error"></span>
                    <input type="text" name="years" class="mt-3 form-control" placeholder="Enter Experience Years">
                    <span class="text-danger error-text years_error"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save Experience" />
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editExperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="success-text"></span>
            <form action="edit_experience_user" method="post" class="edit_experience_user">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="experienceid" name="id" value="">
                    <input type="text" id="edit_experience_name" name="name" value="" class="mt-3 form-control" placeholder="Enter Skill Name">
                    <span class="text-danger error-text name_error"></span>
                    <input type="text" id="edit_year" name="years" value="" class="mt-3 form-control" placeholder="Enter Skill Percent">
                    <span class="text-danger error-text year_error"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Update experience" />
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteExperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="delete_experience_user" method="post" class="delete_experience_user">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="experience_id" name="experienceid" value="">
                    <h2>Are you sure!</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Delete experience" />
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Experience --}}
<div class="modal fade" id="addQualifcations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="add_qualifcations_user" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="userid" value="{{$user->id}}">
                    <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Qualifcations Name">
                    <input type="text" name="depart" class="mt-3 form-control" placeholder="Enter Qualifcations Departement">
                    <input type="text" name="university" class="mt-3 form-control" placeholder="Enter Qualifcations University">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save Qualifcations" />
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addCourses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="add_Courses_user" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Courses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="userid" value="{{$user->id}}">
                    <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Courses Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save Courses" />
                </div>
            </form>
        </div>
    </div>
</div>

@endsection