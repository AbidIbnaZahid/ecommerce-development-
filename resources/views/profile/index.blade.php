@extends('dashboard.dashboard_master')
@section('page_title')
Profile 
@endsection

@section('content')
  <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            @if (auth()->user()->portfolio_photo)
                                <img src="{{asset('uploads/profile_photo')}}/{{auth()->user()->portfolio_photo}}" class="img-fluid rounded-circle" alt="Not Found">
                            @else
                                <img src="{{asset('dashboard/images/profile/profile.png')}}" class="img-fluid rounded-circle" alt="Not Found">
                            @endif
                            
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{auth()->user()->name}}</h4>
                                <p>UX / UI Designer</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">{{auth()->user()->email}}</h4>
                                <p>Email</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active">About Me</a>
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Setting</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                {{-- <div id="about-me" class="tab-pane fade active show">
                                    <div class="profile-about-me">
                                        <div class="pt-4 border-bottom-1 pb-3">
                                            <h4 class="text-primary">About Me</h4>
                                            <p class="mb-2">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence was created for the bliss of souls like mine.I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
                                            <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                        </div>
                                    </div>
                                    <div class="profile-skills mb-5">
                                        <h4 class="text-primary mb-2">Skills</h4>
                                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Admin</a>
                                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Dashboard</a>
                                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Photoshop</a>
                                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Bootstrap</a>
                                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Responsive</a>
                                        <a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">Crypto</a>
                                    </div>
                                    <div class="profile-lang  mb-5">
                                        <h4 class="text-primary mb-2">Language</h4>
                                        <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a> 
                                        <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
                                        <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
                                    </div>
                                    <div class="profile-personal-info">
                                        <h4 class="text-primary mb-4">Personal Information</h4>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>Mitchell C.Shay</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>example@examplel.com</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Availability <span class="pull-right">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>Full Time (Free Lancer)</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Age <span class="pull-right">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>27</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Location <span class="pull-right">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>Rosemont Avenue Melbourne,
                                                    Florida</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Year Experience <span class="pull-right">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>07 Year Experiences</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Account Setting</h4>
                                            <form action="{{route('cahage.name')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label>Name</label>
                                                        <input type="text" name="change_name" value="{{auth()->user()->name}}" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Phoen Number</label>
                                                        <input type="text" name="phone_number" value="{{auth()->user()->phone_number}}" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Profile photo</label>
                                                        <input type="file" name="profile_photo"  class="form-control">
                                                    </div>
                                                    <button class="btn btn-sm btn-primary" type="submit">Change</button>
                                                </div>
                                            </form>
                                            <hr>
                                            <hr>

                                            <form action="{{route('change.password')}}" method="post">
                                                @csrf
                                                <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Currernt Password</label>
                                                    <input type="password" placeholder="Enter Currernt Password" class="form-control" name="current_password">
                                                    @if (session('error'))
                                                     <small class="text-danger">{{session('error')}}</small>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>New Password</label>
                                                    <input type="password" placeholder="Enter New Password" class="form-control" name="password">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Confirm Password</label>
                                                    <input type="password" placeholder="Enter Confirm Password" class="form-control" name="confirm_password">
                                                </div>
                                            </div>
                                            <button class="btn btn-success btn-sm" type="submit">Change Password</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
<script>
    @if (session('success'))
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{session('success')}}',
        showConfirmButton: false,
        timer: 1500
        })
    @endif
</script>
@endsection

