@extends('userDashboard.layout.userDashboard')
@section('content')
    @if (isset(Auth::user()->profile->user_id))
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

                                <ul class=" list-unstyled latest-users list-qualifcations">
                                    
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

                                <ul class=" list-unstyled latest-users list-courses">
                                    
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
    <div class="modal fade" id="addSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Add Skill</h5></x-slot>
            <x-slot name="formData">
                <form action="add_skill_user" method="post" id="skill_form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Skill Name">
                    <span class="text-danger error-text name_error"></span>
                    <input type="text" name="percent" class="mt-3 form-control" placeholder="Enter Skill Percent">
                    <span class="text-danger error-text percent_error"></span>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save skill" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="editSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Edit Skill</h5></x-slot>
            <x-slot name="formData">
                <form action="edit_skill_user" method="post" class="edit_skill_user">
                    @csrf
                    <input type="hidden" id="edit_skill_id" value="" name="id">
                    <input type="text" id="edit_name" name="name" value="" class="mt-3 form-control" placeholder="Enter Skill Name">
                    <span class="text-danger error-text name_error"></span>
                    <input type="text" id="edit_percent" name="percent" value="" class="mt-3 form-control" placeholder="Enter Skill Percent">
                    <span class="text-danger error-text percent_error"></span>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Update skill" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="deleteSkill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Delete Skill</h5></x-slot>
            <x-slot name="formData">
                <form action="delete_skill_user" method="post" class="delete_skill_user">
                    @csrf
                    <input type="hidden" id="delete_skill_id" name="id" value="">
                    <h2>Are you sure!</h2>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Delete skill" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    {{-- End Skill --}}
    {{-- End Experience --}}
    <div class="modal fade" id="addExperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Add Experience</h5></x-slot>
            <x-slot name="formData">
                <form action="add_experience_user" method="post" id="add_experience_user">
                    @csrf
                    <input type="hidden" name="userid" value="{{$user->id}}">
                    <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Experience Name">
                    <span class="text-danger error-text name_error"></span>
                    <input type="text" name="years" class="mt-3 form-control" placeholder="Enter Experience Years">
                    <span class="text-danger error-text years_error"></span>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save Experience" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="editExperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Edit Experience</h5></x-slot>
            <x-slot name="formData">
                <form action="edit_experience_user" method="post" class="edit_experience_user">
                    @csrf
                    <input type="hidden" id="experienceid" name="id" value="">
                    <input type="text" id="edit_experience_name" name="name" value="" class="mt-3 form-control" placeholder="Enter Skill Name">
                    <span class="text-danger error-text name_error"></span>
                    <input type="text" id="edit_year" name="years" value="" class="mt-3 form-control" placeholder="Enter Skill Percent">
                    <span class="text-danger error-text year_error"></span>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Update Experience" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="deleteExperience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Delete Experience</h5></x-slot>
            <x-slot name="formData">
                <form action="delete_experience_user" method="post" class="delete_experience_user">
                    @csrf
                    <input type="hidden" id="experience_id" name="experienceid" value="">
                    <h2>Are you sure!</h2>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Delete Experience" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    {{-- End Experience --}}
    {{-- Start Qualifcations --}}
    <div class="modal fade" id="addQualifcations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Delete Qualifcation</h5></x-slot>
            <x-slot name="formData">
                <form action="add_qualifcations_user" method="post" class="add_qualifcations_user">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Qualifcations Name">
                    <span class="text-danger error-text name_error"></span>
                    <input type="text" name="depart" class="mt-3 form-control" placeholder="Enter Qualifcations Departement">
                    <span class="text-danger error-text depart_error"></span>
                    <input type="text" name="university" class="mt-3 form-control" placeholder="Enter Qualifcations University">
                    <span class="text-danger error-text university_error"></span>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save Qualifcations" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="editQualifcations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Edit Qualifcation</h5></x-slot>
            <x-slot name="formData">
                <form action="edit_qualifcations_user" method="post" class="edit_qualifcations_user">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="hidden" id="qualifcation_id" name="qualifcation_id" value="">
                    <input type="text" id="edit_qualifcation_name" name="name" value="" class="mt-3 form-control" placeholder="Enter Qualifcations Name">
                    <span class="text-danger error-text name_error"></span>
                    <input type="text" id="edit_qualifcation_depart" name="depart" class="mt-3 form-control" placeholder="Enter Qualifcations Departement">
                    <span class="text-danger error-text depart_error"></span>
                    <input type="text" id="edit_qualifcation_university" name="university" class="mt-3 form-control" placeholder="Enter Qualifcations University">
                    <span class="text-danger error-text university_error"></span>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Update Qualifcations" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="deleteQualifcations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Delete Qualifcation</h5></x-slot>
            <x-slot name="formData">
                <form action="delete_qualifcation_user" method="post" class="delete_qualifcation_user">
                    @csrf
                    <input type="hidden" id="delete_qualifcation_id" name="id" value="">
                    <h2>Are you sure!</h2>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Delete Qualifcation" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    {{-- End Qualifcations --}}
    {{-- Start Courses --}}
    <div class="modal fade" id="addCourses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Add Courses</h5></x-slot>
            <x-slot name="formData">
                <form action="add_Courses_user" method="post" class="add_Courses_user">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="text" name="name" class="mt-3 form-control" placeholder="Enter Course Name">
                    <span class="text-danger error-text name_error"></span>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save Courses" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="editCourses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Add Courses</h5></x-slot>
            <x-slot name="formData">
                <form action="edit_Courses_user" method="post" class="edit_Courses_user">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="hidden" id="course_id" name="course_id" value="">
                    <input type="text" id="edit_course_name" name="name" class="mt-3 form-control" placeholder="Enter Course Name">
                    <span class="text-danger error-text name_error"></span>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Update Courses" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    <div class="modal fade" id="deleteCourses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <x-model >
            <x-slot name="title"><h5 class="modal-title" id="exampleModalLabel">Delete Course</h5></x-slot>
            <x-slot name="formData">
                <form action="delete_course_user" method="post" class="delete_course_user">
                    @csrf
                    <input type="hidden" id="delete_course_id" name="id" value="">
                    <h2>Are you sure!</h2>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Delete Course" />
                    </div>
                </form>
            </x-slot>
        </x-model>
    </div>
    @else
        <x-message-access>
            <x-slot name="link">
                <a href="{{route('profile.show', Auth::id())}}" class="text-warning fs-5 mt-5 mb-2 text-center"><i class="fa fa-long-arrow-right p-2 pt-1">Account setting </i></a>
            </x-slot>
        </x-message-access>
    @endif
@endsection