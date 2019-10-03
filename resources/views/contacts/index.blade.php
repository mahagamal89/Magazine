@extends('layouts.app')
@section('content')

<section class="block-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>اتصل بنا</h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li><i class="pe-7s-home"></i> <a href="home-style-one.html" title="">الصفحة الرئيسية</a></li>
                            <li><a href="#" title="">اتصال</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="contact-title">
                    <h2>الحصول على اتصال</h2>
                    <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز <br>
                        على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"> 
                <div class="contact-address"> <!-- Address -->
                    <h3>عنوان</h3>
                    <i class="pe-7s-map-2 top-icon"></i>
                    <ul>
                        <li>14L.E Goulburn St, </li>
                        <li>Sydney 2000NSW</li>
                    </ul>

                </div>
            </div>
            <div class="col-sm-4"> 
                <div class="contact-address"> <!-- Phone -->
                    <h3>هاتف</h3>
                    <i class="pe-7s-headphones top-icon"></i>
                    <ul>
                        <li><i class="fa fa-mobile"></i> +8801620214460</li>
                        <li><i class="fa fa-mobile"></i> +8801821450144</li>
                    </ul>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-address"> <!-- Email -->
                    <h3>البريد الإلكتروني</h3>
                    <i class="pe-7s-global top-icon"></i>
                    <ul>
                        <li><i class="fa fa-envelope-o"></i> bdtask@gmail.com</li>
                        <li><i class="fa fa-globe"></i>  www.companyweb.com</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form-area">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="input">
                                    <input class="input_field" type="text" id="input-1">
                                    <label class="input_label" for="input-1">
                                        <span class="input_label_content" id="f_name" data-content="الاسم الاول">الاسم الاول</span>
                                    </label>
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <span class="input">
                                    <input class="input_field" type="text" id="input-2">
                                    <label class="input_label" for="input-2">
                                        <span class="input_label_content" id="l_name" data-content="الكنية">الكنية</span>
                                    </label>
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <span class="input">
                                    <input class="input_field" type="text" id="input-3">
                                    <label class="input_label" for="input-3">
                                        <span class="input_label_content" id="emai" data-content="بريدك الالكتروني">بريدك الالكتروني</span>
                                    </label>
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <span class="input">
                                    <input class="input_field" type="text" id="input-4">
                                    <label class="input_label" for="input-4">
                                        <span class="input_label_content" id="subject" data-content="موضوع">موضوع</span>
                                    </label>
                                </span>
                            </div>
                            <div class="col-sm-12">
                                <span class="input">
                                    <textarea class="input_field" id="message"></textarea>
                                    <label class="input_label" for="message">
                                        <span class="input_label_content" data-content="رسالتك">رسالتك</span>
                                    </label>
                                </span>
                                <button type="button" class="btn btn-style">عرض</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="map"></div>
            </div>
        </div>
    </div>
    
@endsection