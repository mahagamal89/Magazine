@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="register-form-inner">
                <h3 class="category-headding ">سجل الان!</h3>
                <div class="headding-border bg-color-1"></div>
                <form  method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @csrf
                    <label>اسمك الأول <sup>*</sup></label>
                    <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" id="name_email_3" placeholder="اسمك الأول" required autofocus>
                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                    <label>اسم العائلة <sup>*</sup></label>
                    <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" id="name_email_3" placeholder="اسم العائلة" required autofocus>
                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                    <label>البريد الالكتروني <sup>*</sup></label>
                    <input type="text" id="name_email_3" name="email" placeholder="البريد الالكتروني" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <label>كلمه السر <sup>*</sup></label>
                    <input type="password" id="pass_2" name="password" placeholder="إرسال كلمة المرور الخاصة بك هنا ..." class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <label>اعد كلمة السر <sup>*</sup></label>
                    <input type="password" id="pass_3" placeholder="إعادة كتابة كلمة المرور الخاصة بك هنا ..." class="form-control" name="password_confirmation" required>
                    <button type="submit" class="btn btn-style">سجل الان!</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
