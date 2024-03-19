@extends('frontend.layouts.app')

@section('content')

<section class="login_section">
    <section class="top_section">
        <div class="login_bar w-100">
            <div class="container login_container">
                <div class="login_form">
                    <div class="form_main">
                        <h1 class="login_title">Login</h1>
                        <form id="loginform" role="form" action="{{ route('user.login') }}" method="POST">
                            @csrf
                            <div class="textbar">
                                <input type="email" class="form-control login_textbox" form="loginform" name="email" id="email" placeholder="Email Address" required>
                                <input type="password" class="form-control login_textbox" form="loginform" placeholder="Password" id="password" name="password" required>
                                <div class="form-check checkbox_main">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} form="loginform">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                            </div>
                            
                            <button type="submit" form="loginform" class="btn login_button w-100">Login</button>
                            <p class="no_account">Don't have an account? <a href="{{ route('user.registration') }}" class="signup_here">Sign up here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

    
    
@endsection

@section('script')
@endsection
