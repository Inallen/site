@extends('layouts.default')

@section('link')
    {{--<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">--}}
@endsection
@section('content')
    @component('admin.header')
    @endcomponent
    @component('admin.sidebar')
    @endcomponent
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Cards</h1>
                <p>Material design inspired cards</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">UI</li>
                <li class="breadcrumb-item"><a href="#">Cards</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="tile">
                    <h3 class="tile-title">Vertical Form</h3>
                    <div class="tile-body">
                        <form>
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input class="form-control" type="text" placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="email" placeholder="Enter email address">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Address</label>
                                <textarea class="form-control tiny" rows="4" placeholder="Enter your address"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender">Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender">Female
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Identity Proof</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox">I accept the terms and conditions
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">All Items</h3>
                        <p><a class="btn btn-primary icon-btn" href=""><i class="fa fa-plus"></i>Add Item	</a></p>
                    </div>
                    <div class="tile-body">
                        <b>Card with action button </b><br>
                        Hey there, I am a very simple card. I am good at containing small bits of information. I am quite convenient because I require little markup to use effectively.


                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </main>
@endsection
