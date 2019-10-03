@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="login-reg-inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="login-form-inner">
                                <h3 class="category-headding ">تسجيل الدخول إلى حسابك</h3>
                                <div class="headding-border bg-color-1"></div>
                                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @csrf
                                    <label>البريد الالكتروني<sup>*</sup></label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="name_email_2" name="email" placeholder="البريد الالكتروني" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    <label>كلمه السر <sup>*</sup></label>
                                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="*******">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <label class="checkbox-inline"> <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>تذكرنى</label>
                                    <button type="submit" class="btn btn-style">تسجيل الدخول</button>
                                    <div class="foeget"><a href="{{ route('password.request') }}">نسيت اسم المستخدم / كلمة السر؟</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
