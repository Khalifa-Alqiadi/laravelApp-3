<?php

use App\Http\Livewire;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Owner\HomeOwnerController;
use App\Http\Controllers\Owner\profileOwnerController;
use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\DatialsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CompaniesController;
use App\Http\Controllers\Admin\jobsDashboardController;
use App\Http\Controllers\front\CompaniesController as FrontCompaniesController;
use App\Http\Controllers\front\DetailsController;
use App\Http\Controllers\front\JobsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\userDashboard\UserDashboardController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/register', [AuthController::class, 'loginUser'])->name('register');
Route::post('/registerCompany', [AuthController::class, 'registerCompany'])->name('registerCompany');
Route::post('/user_login', [AuthController::class, 'login'])->name('user_login');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/details', [DatialsController::class, 'detialsShow']);
Route::get('/details/{name}', [DetailsController::class, 'show'])->name('details.show');
Route::get('/job/{name}', [DetailsController::class, 'show'])->name('job.show');
Route::get('jobs', [JobsController::class, 'show'])->name('jobs');
Route::get('/companies', [FrontCompaniesController::class, 'show'])->name('companies-front');
Route::get('/', [IndexController::class, 'show']);
// Route::get('/userLogin', [AuthController::class, 'userLogin']);
Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', [IndexController::class, 'indexShow'])->name('home');





	// Route::livewire('all_jops', 'all-jobs');
	// Abmin Dashboard
	Route::get('/ownerDashboard', [HomeOwnerController::class, 'showOwnerDashboard'])->name('ownerDashboard');
	Route::get('/all_jops', [HomeOwnerController::class, 'allJobs'])->name('all_jops');
	Route::get('/end_jobs', [HomeOwnerController::class, 'endJobs'])->name('end_jobs');
	Route::get('/ownerProfile', [profileOwnerController::class, 'ownerProfile'])->name('ownerProfile');
	// User Dashboard

	Route::get('/userDashboard', [UserDashboardController::class, 'showUserDashboard'])->name('userDashboard');

	Route::get('/showSkills', [UserDashboardController::class, 'showSkills'])->name('showSkills');
	Route::get('/edit_skill/{id}', [UserDashboardController::class, 'edit_skill'])->name('edit_skill');
	Route::post('/add_skill_user', [UserDashboardController::class, 'insertSkillUserDashboard'])->name('add_skill_user');
	Route::post('/edit_skill_user', [UserDashboardController::class, 'editSkillUserDashboard']);
	Route::post('/delete_skill_user', [UserDashboardController::class, 'deleteSkillUserDashboard'])->name('delete_skill_user');
	Route::get('/showExperience', [UserDashboardController::class, 'showExperience'])->name('showExperience');
	Route::post('/add_experience_user', [UserDashboardController::class, 'insertExperienceUserDashboard'])->name('add_experience_user');
	Route::post('/edit_experience_user', [UserDashboardController::class, 'editExperienceUserDashboard'])->name('edit_experience_user');
	Route::get('/edit_experience/{id}', [UserDashboardController::class, 'edit_experience'])->name('edit_experience');
	Route::post('/delete_experience_user', [UserDashboardController::class, 'deleteExperienceUserDashboard'])->name('delete_experience_user');
	Route::post('/add_qualifcations_user', [UserDashboardController::class, 'insertQualifcationsUserDashboard'])->name('add_qualifcations_user');
	Route::post('/edit_qualifcations_user', [UserDashboardController::class, 'editQualifcationsUserDashboard'])->name('edit_qualifcations_user');
	Route::post('/delete_qualifcations_user', [UserDashboardController::class, 'deleteQualifcationsUserDashboard'])->name('delete_qualifcations_user');
	Route::post('/add_Courses_user', [UserDashboardController::class, 'addCoursesUser'])->name('add_Courses_user');
	Route::post('/edit_courses_user', [UserDashboardController::class, 'editCoursesUser'])->name('edit_courses_user');
	Route::post('/delete_courses_user', [UserDashboardController::class, 'deleteCoursesUser'])->name('delete_courses_user');
});

Route::group(['middleware' => 'auth'], function () {
	Route::group(['middleware' => 'role:admin'], function () {


		Route::get('/dashboard', [DashboardController::class, 'adminDash'])->name('dashboard');

		Route::get('/adminUsers', [UsersController::class, 'showUsers'])->name('adminUsers');
		Route::post('/edit_admin_user', [UsersController::class, 'updateUser'])->name('edit_admin_user');
		Route::post('/add_admin_user', [UsersController::class, 'register'])->name('add_admin_user');
		Route::post('/delete_admin_user', [UsersController::class, 'deleteUser'])->name('delete_admin_user');
		Route::post('/active_admin_user', [UsersController::class, 'activeUser'])->name('active_admin_user');
		Route::get('/adminCompanies', [CompaniesController::class, 'showCompanies'])->name('adminCompanies');
		Route::post('/add_admin_company', [CompaniesController::class, 'insertCompany'])->name('add_admin_company');
		Route::post('/edit_admin_company', [CompaniesController::class, 'editCompanies'])->name('edit_admin_company');
		Route::post('/delete_admin_company', [CompaniesController::class, 'deleteCompanies'])->name('delete_admin_company');
		Route::post('/active_admin_company', [CompaniesController::class, 'activeCompanies'])->name('active_admin_company');
		Route::get('/adminJobs', [jobsDashboardController::class, 'showJobs'])->name('adminJobs');
		Route::post('/add_admin_job', [jobsDashboardController::class, 'insertJobsAdmin'])->name('add_admin_job');
		Route::post('/edit_admin_job', [jobsDashboardController::class, 'editJobsAdmin'])->name('edit_admin_job');
		Route::post('/delete_admin_job', [jobsDashboardController::class, 'deleteJobsAdmin'])->name('delete_admin_job');
		Route::post('/active_admin_job', [jobsDashboardController::class, 'activeJobsAdmin'])->name('active_admin_job');
		Route::get('/adminDetails', [jobsDashboardController::class, 'showDetailsAdmin'])->name('adminDetails');
		Route::post('/add_admin_detail', [jobsDashboardController::class, 'insertDetailsAdmin'])->name('add_admin_detail');
		Route::post('/edit_admin_detail', [jobsDashboardController::class, 'editDetailsAdmin'])->name('edit_admin_detail');
		Route::post('/delete_admin_detail', [jobsDashboardController::class, 'deleteDetailsAdmin'])->name('delete_admin_detail');
		Route::post('/active_admin_detail', [jobsDashboardController::class, 'activeDetailsAdmin'])->name('active_admin_detail');
	});

	Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});



Route::post('/do_login', [AuthController::class, 'login'])->name('do_login');

Route::get('/generate_roles', [SettingsController::class, 'generateRoles'])->name('generate_roles');
