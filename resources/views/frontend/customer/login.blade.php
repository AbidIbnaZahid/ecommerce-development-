@extends('layouts.app_frontend')

@section('content')
     <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">

                    <h2 class="breadcrumb-title"><i class="fa fa-users" aria-hidden="true"></i>Customer Login</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Login</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- login area start -->
    <div class="login-register-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-bs-toggle="tab" href="#lg1">
                                <h4>login</h4>
                            </a>
                            <a data-bs-toggle="tab" href="#lg2">
                                <h4>register</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                @if (session('success'))
                                    <div class="alert bg-info">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <input type="email" name="email" placeholder="Email" value="{{ (session('email'))? session('email'):"" }}">
                                            <input type="password" name="password" placeholder="Password" />
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" />
                                                    <a class="flote-none" href="javascript:void(0)">Remember me</a>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <button type="submit"><span>Login</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{ route('customer.register') }}" method="POST">
                                            @csrf
                                            <input type="text" name="name" placeholder="Name" />
                                            <input name="email" placeholder="Email" type="email" />
                                            <input type="password" name="password" placeholder="Password" />
                                            <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                                            {{-- captcha Code Here  --}}
                                            <div class="form-group mt-4 mb-4">
                                                <div class="captcha">
                                                    <span>{!! captcha_img() !!}</span>
                                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                        &#x21bb;
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group mb-4">
                                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                            </div>
                                            {{-- captcha Code Here  --}}
                                            <div class="button-box">
                                                 {{-- @if (Route::currentRouteName() == 'product.details')
                                                 <a class="text-white" href="{{route('register')}}?previous_page={{ url()->full() }}">Sign up</a>
                                            @else
                                                <a class="text-white" href="{{route('register')}}">Sign up</a>
                                            @endif --}}
                                                <button type="submit"><span>Register</span></button>
                                            </div>
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
    <!-- login area end -->
@endsection

@section('footer_script')
    <script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endsection
