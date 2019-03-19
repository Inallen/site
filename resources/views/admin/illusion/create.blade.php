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
        <div class="illusion-tile col-lg-10">
            <form class="tile" method="POST" action="{{ route('admin.illusion.store') }}">
                @csrf
                <h3 class="tile-title"></h3>
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="form-control-label col-sm-2" for="title">Title</label>
                        <div class="col-sm-9">
                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" type="text" name="title" value="{{ old('title') }}" required autofocus>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-control-label col-sm-2" for="content">Content</label>
                        <div class="col-sm-9">
                            <div class="form-ckeditor">
                                <textarea class="ckeditor" id="content" name="content"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-control-label col-sm-2" for="excerpt">Excerpt</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-control-label col-sm-2" for="categories">Categories</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="categories" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-control-label col-sm-2" for="thumbnail">Featured Image</label>
                        <div class="col-sm-4">
                            <img class="illusion-featured-image" id="featured_image" src="" alt="Featured Image" style="display: none">
                            <button class="btn btn-outline-secondary" id="set_featured_image" type="button">Set featured image</button>
                            <input class="form-control" id="thumbnail" name="thumbnail" type="hidden">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-control-label col-sm-2" for="illusion_priority">Priority</label>
                        <div class="col-sm-2">
                            <input class="form-control{{ $errors->has('illusion_priority') ? ' is-invalid' : '' }} form-control-sm" id="illusion_priority" name="illusion_priority" type="number" placeholder="Priority">
                            @if ($errors->has('illusion_priority'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('illusion_priority') }}</strong>
                            </span>
                            @endif
                        </div>
                        <label class="form-control-label col-sm-2" for="illusion_status">Visibility</label>
                        <div class="col-sm-2">
                            <select class="form-control form-control-sm" id="illusion_status" name="illusion_status">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                    <input class="btn btn-primary offset-sm-5" type="submit">
                    <a class="btn btn-secondary offset-sm-1" href="#">Cancel</a>
                    </div>
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
