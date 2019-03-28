@extends('layouts.default')

@section('link')
    {{--<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">--}}
@endsection
@section('content')
    <main class="app-content">
        @component('admin.component.app_title')
            @slot('app_icon')
            @endslot
            @slot('app_title')
                {{ __('Update Category') }}
            @endslot
            @slot('app_description')
            @endslot
        @endcomponent
        <div class="row">
            <div class="term-tile col-lg-4">
                <div class="tile">
                    <h3 class="tile-title">Edit Category</h3>
                    <div class="tile-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.term.update', ['id' => $taxonomy->id] ) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label class="form-control-label col-sm-2" for="term_title">Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control{{ $errors->has('term_title') ? ' is-invalid' : '' }}" id="term_title" type="text" name="term_title" value="{{ old('term_title') ?: $taxonomy->term->term_title }}" required>
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
                                    <input class="form-control{{ $errors->has('term_slug') ? ' is-invalid' : '' }}" id="term_slug" type="text" name="term_slug" value="{{ old('term_slug') ?: $taxonomy->term->term_slug }}" required>
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
                                        @foreach ($termTaxonomies as $termTaxonomy)
                                            @if ($taxonomy->id != $termTaxonomy->id)
                                                @if ( $taxonomy->term_taxonomy_parent == $termTaxonomy->id )
                                                    <option value="{{ $termTaxonomy->id }}" selected="selected">{!! str_repeat("&nbsp;&nbsp;&nbsp;",$termTaxonomy->getLevel()) !!}{{ $termTaxonomy->term->term_title }}</option>
                                                @else
                                                    <option value="{{ $termTaxonomy->id }}">{!! str_repeat("&nbsp;&nbsp;&nbsp;",$termTaxonomy->getLevel()) !!}{{ $termTaxonomy->term->term_title }}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--<div class="form-group row">
                                <label class="form-control-label col-sm-2" for="term_priority">Priority</label>
                                <div class="col-sm-9">
                                    <input class="form-control{{ $errors->has('term_priority') ? ' is-invalid' : '' }}" id="term_priority" name="term_priority" type="number" placeholder="Priority">
                                    @if ($errors->has('term_priority'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('term_priority') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>--}}
                            <div class="tile-footer">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-primary btn-sm " href="{{ Route::has('admin.term.index') ? route('admin.term.index') : '#' }}">{{ __('Cancel') }}</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearix"></div>
        </div>
    </main>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/vali.js') }}"></script>
@endsection
