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
                <li class="breadcrumb-item">{{ config('ckfinder.backends.default.root') }}</li>
                <li class="breadcrumb-item"><a href="#">{{ config('ckfinder.backends.default.baseUrl') }}</a></li>
            </ul>
        </div>
        <div class="col-lg-12">
            <form class="tile row">
                <div class="col-lg-8">
                    <h3 class="tile-title"></h3>
                    <div class="tile-body">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control ckeditor" placeholder="Content"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card form-horizontal">
                        <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6 row">
                                <label class="control-label col-sm-6">Visibility</label>
                                <div class="toggle-flip col-sm-6">
                                    <label>
                                        <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6 row">
                                <label class="control-label col-md-5" for="illusion_priority">Priority</label>
                                <div class="col-md-6 offset-sm-1" >
                                    <input class="form-control form-control-sm" id="illusion_priority" type="text" placeholder="Priority">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-md-4" for="categories">Categories</label>
                            <input class="form-control col-md-6" id="categories" type="text">
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-md-4" for="thumbnail">Featured Image</label>
                            <img class="col-md-6 illusion-featured-image" id="featured_image" src="" alt="Featured Image" style="display: none">
                            <button class="btn btn-outline-secondary col-md-6" id="set_featured_image" type="button">Set featured image</button>
                            <input class="form-control col-md-6" id="thumbnail" type="hidden">
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-md-4" for="excerpt">Excerpt</label>
                            <textarea class="form-control col-md-6" id="excerpt" rows="3"></textarea>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-primary offset-lg-5" type="button">Save</button>
                    <a class="btn btn-secondary offset-sm-1" href="#">Cancel</a>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </main>
@endsection
@section('script')
    <script src="{{ asset('plugins/ckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('plugins/ckeditor5/translations/zh-cn.js') }}"></script>
    <script src="{{ asset('plugins/index.js') }}"></script>
    <script src="{{ asset('js/vali.js') }}"></script>
@endsection
