@extends('layouts.app')

@section('content')
@guest
<div class="content">
    <div class="title m-b-md">
        School Grading System
    </div>

    <div class="links">
        <div class="row container-fluid">
            <div class="col-lg-4">
                <img src="images/school.png" width="128">
            </div>
            <div class="col-lg-4">
                <img src="images/coding.png" width="128">
            </div>
            <div class="col-lg-4">
                <img src="images/testing.png" width="128">
            </div>
        </div>
    </div>
</div>
@else
@php
    header('Location: /home');
    exit;
@endphp
@endguest
@endsection


