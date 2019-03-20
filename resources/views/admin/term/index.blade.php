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
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="term-tile col-lg-4">
                <div class="tile">
                    <h3 class="tile-title">Add New Category</h3>
                    <div class="tile-body">
                        {{$errors}}
                        <form class="form-horizontal" method="POST" action="{{ route('admin.term.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="form-control-label col-sm-2" for="term_title">Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control{{ $errors->has('term_title') ? ' is-invalid' : '' }}" id="term_title" type="text" name="term_title" value="{{ old('term_title') }}" required>
                                    @if ($errors->has('term_title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('term_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-sm-2" for="term_slug">Slug</label>
                                <div class="col-sm-9">
                                    <input class="form-control{{ $errors->has('term_slug') ? ' is-invalid' : '' }}" id="term_slug" type="text" name="term_slug" value="{{ old('term_slug') }}" required>
                                    @if ($errors->has('term_slug'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('term_slug') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-sm-2" for="term_taxonomy_parent">Parent Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="term_taxonomy_parent" name="term_taxonomy_parent">
                                        <option value="0">None</option>
                                        <option>&nbsp;&nbsp;&nbsp;2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label col-sm-2" for="term_priority">Priority</label>
                                <div class="col-sm-9">
                                    <input class="form-control{{ $errors->has('term_priority') ? ' is-invalid' : '' }}" id="term_priority" name="term_priority" type="number" placeholder="Priority">
                                    @if ($errors->has('term_priority'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('term_priority') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row">
                                    <div class="col-sm-9 col-md-offset-3">
                                        <button class="btn btn-primary" type="submit">Add New Category</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearix"></div>
            <div class="col-lg-8">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Updated At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($terms as $term)
                                <tr>
                                    <td>{{ $term->id }}</td>
                                    <td>{{ $term->term_title }}</td>
                                    <td>{{ $term->term_slug }}</td>
                                    <td>{{ $term->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="{{ asset('js/vali.js') }}"></script>
@endsection
