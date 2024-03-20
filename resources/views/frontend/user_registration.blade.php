@extends('frontend.layouts.app')

@section('content')

<style>
    .c-text {
        margin-left: 35px!important;
    }
</style>

<section class="login_section">
    <section class="reg_top_section">
        <div class="login_bar w-100">
            <div class="container login_container">
                <div class="login_form">
                    <div class="form_main">
                        <h1 class="login_title">Register</h1>
                        <div class="textbar">
                            <input type="text"  form="registerform" class="form-control" placeholder="Full Name" id="name" name="name" required>
                            <input type="email" form="registerform" class="form-control" placeholder="Email" id="email" name="email" required>
                            <input type="password" form="registerform" class="form-control" placeholder="Password" name="password" id="password" required>
                            <input type="password" form="registerform" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="confirmpassword" required>
                        </div>
                        <form id="registerform" role="form" action="{{ route('register') }}" method="POST" onsubmit="return check_agree(this);">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                        <p class="no_account">Already have an account? <a href="{{ route('user.login') }}" class="signup_here">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>


{{--New Code End--}}

@endsection

@section('script')
<script src="https://js.hcaptcha.com/1/api.js" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>

    function check_agree(form) {

        var passwordstring = form.password.value;
        var passwordconfirmstring = form.confirmpassword.value;
        

        if (passwordstring.length >= 8 && passwordconfirmstring == passwordstring && form.terms.checked) {
                return true;
            } else if (passwordstring.length < 8) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password is too short, please choose a password longer than 8 characters'
                })
            } else if (passwordstring.length == null || passwordconfirmstring.length == null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Password can't be empty, please enter password longer than 8 characters"
                })
            } else if (passwordconfirmstring.length < 8) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Confirm Password is too short, please choose a password longer than 8 characters'
                })
            } else if (passwordconfirmstring != passwordstring) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password Mismatched, please try again'
                })
            } else if(!form.terms.checked) {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'You must agree to the Terms and Conditions and Privacy Policy before continuing.'
                })
            }
            return false;
       
    }
</script>
@endsection
