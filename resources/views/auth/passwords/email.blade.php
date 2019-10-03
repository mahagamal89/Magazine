@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <section class="login-reg-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="login-form-inner">
                                        <h3 class="category-headding ">البريد الالكتروني</h3>
                                        <div class="headding-border bg-color-1"></div>
                                        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                                            @csrf
                                            <label>البريد الالكتروني<sup>*</sup></label>
                                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="name_email_2" name="email" placeholder="البريد الالكتروني" value="{{ old('email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                            <button type="submit" class="btn btn-style my-3">تسجيل الدخول</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
