@extends('layouts.register')

@section('content')
    <nav class="navbar navbar-dark bg-dark mb-5 d-flex justify-content-center align-items-center flex-column">
        <a class="navbar-brand" href="#">نظام أوامر لإدارة الأوامر المستديمة</a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-right">الشروط والأحكام</h1>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <p class="text-right">{{ $privacyPolicy->content }}</p>
            </div>
        </div>
    </div>
@endsection
