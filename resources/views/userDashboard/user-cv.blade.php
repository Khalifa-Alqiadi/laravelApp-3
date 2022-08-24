@extends('userDashboard.layout.userDashboard')
@section('content')
<div class="col-sm-10">
    <div id="profile" class="p-5">
        <div class="profile shadow">
            <div class="row">
                <div class="col-sm-4 profile-left">
                    <div class="card-header">
                        <img src="{{URL::asset('storage/'. Auth::user()->profile->avatar)}}" class="img-responsive img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h1 class="text-white">Khalifa AL-Qiadi</h1>
                            <p class="text-white">Web Developer</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="card bg-transparent">
                                <div class="buttom">
                                    <div class="info">
                                        <h4 class="text-white">Contact details</h4>
                                    </div>
                                </div>
                                <p class="text-white"><i class="fa fa-home"></i> Write your address here</p>
                                <p class="text-white"><i class="fa fa-mail"></i> 777khlefawww@gmail.com</p>
                                <p class="text-white left"><i class="fa fa-phone"></i> 738843852</p>
                                <p class="text-white"><i class="fa fa-mail"></i> fiteeralqiadi@gmail.com</p>
                            </div>
                            <div class="card bg-transparent skills">
                                <div class="buttom">
                                    <div class="info">
                                        <h4 class="text-white">Contact details</h4>
                                    </div>
                                </div>
                                <div class="raing">
                                    <p class="text-white">Fist skill</p>
                                    <div class="raing-info"><div class="raing1 stat"></div></div>
                                </div>
                                <div class="raing">
                                    <p class="text-white">Second skill</p>
                                    <div class="raing-info"><div class="raing2 stat"></div></div>
                                </div>
                                <div class="raing">
                                    <p class="text-white">Third skill</p>
                                    <div class="raing-info"><div class="raing3 stat"></div></div>
                                </div>
                                <div class="raing">
                                    <p class="text-white">Fourth skill</p>
                                    <div class="raing-info"><div class="raing4 stat"></div></div>
                                </div>
                                <div class="raing">
                                    <p class="text-white">Fifth skill</p>
                                    <div class="raing-info"><div class="raing5 stat"></div></div>
                                </div>
                            </div>
                            <div class="card dawnload bg-transparent">
                                <div class="buttom">
                                    <div class="info">
                                        <h4 class="text-white"><a href="#">Dawnload CV</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 profile-right">
                    <div class="card">
                        <div class="buttom">
                            <div class="info">
                                <h4 class="text-black">Brief summary</h4>
                            </div>
                        </div>
                        <p class="text-muted">
                            I am Khalifa Alqiadi from Yemen, Graduate of Sana'a
                            University Information Systems, graduated in a year 2019
                        </p>
                        <p class="text-muted">
                            I am currently working as a freelanser and also trained 
                            in the camps of the Foundation Rowad
                        </p>
                    </div>
                    <div class="card steps">
                        <div class="buttom">
                            <div class="info">
                                <h4 class="text-black">Learning</h4>
                            </div>
                        </div>
                        <div class="steps-learning">
                            <div class="all-steps">
                                <h4>Primary stage</h4>
                                <span>2003/2004</span>
                                <p class="text-muted">
                                    I am Khalifa Alqiadi from Yemen, Graduate of Sana'a
                                    University Information Systems, graduated in a year 2019
                                </p>
                            </div>
                            <div class="all-steps">
                                <h4>Central stage</h4>
                                <span>2009/2010</span>
                                <p class="text-muted">
                                    I am Khalifa Alqiadi from Yemen, Graduate of Sana'a
                                    University Information Systems, graduated in a year 2019
                                </p>
                            </div>
                            <div class="all-steps">
                                <h4>Secondary stage</h4>
                                <span>2013/2014</span>
                                <p class="text-muted">
                                    I am Khalifa Alqiadi from Yemen, Graduate of Sana'a
                                    University Information Systems, graduated in a year 2019
                                </p>
                            </div>
                            <div class="all-steps">
                                <h4>Bachelor of</h4>
                                <span>2019/2020</span>
                                <p class="text-muted">
                                    I am Khalifa Alqiadi from Yemen, Graduate of Sana'a
                                    University Information Systems, graduated in a year 2019
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card interests">
                        <div class="buttom">
                            <div class="info">
                                <h4 class="text-black">Interests</h4>
                            </div>
                        </div>
                        <div class="all-rating">
                            <div class="rating">
                                <div class="raing">
                                    <p class="text-muted">Fist skill</p>
                                    <div class="raing-info"><div class="raing1 stat"></div></div>
                                </div>
                                <div class="raing">
                                    <p class="text-muted">Second skill</p>
                                    <div class="raing-info"><div class="raing2 stat"></div></div>
                                </div>
                                <div class="raing">
                                    <p class="text-muted">Third skill</p>
                                    <div class="raing-info"><div class="raing3 stat"></div></div>
                                </div>
                            </div>
                            <div class="rating">
                                <div class="raing">
                                    <p class="text-muted">Fist skill</p>
                                    <div class="raing-info"><div class="raing1 stat"></div></div>
                                </div>
                                <div class="raing">
                                    <p class="text-muted">Second skill</p>
                                    <div class="raing-info"><div class="raing2 stat"></div></div>
                                </div>
                                <div class="raing">
                                    <p class="text-muted">Third skill</p>
                                    <div class="raing-info"><div class="raing3 stat"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="buttom">
                            <div class="info">
                                <h4 class="text-black">Experience</h4>
                            </div>
                        </div>
                        <p class="text-muted">
                            I am Khalifa Alqiadi from Yemen, Graduate of Sana'a
                            University Information Systems, graduated in a year 2019.
                            I am currently working as a freelanser and also trained 
                            in the camps of the Foundation Rowad
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection