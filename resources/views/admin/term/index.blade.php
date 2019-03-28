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
                {{ __('Categories') }}
            @endslot
            @slot('app_description')
            @endslot
        @endcomponent
        <div class="row">
            <div class="term-tile col-lg-4">
                <div class="tile">
                    <h3 class="tile-title">Add New Category</h3>
                    <div class="tile-body">
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
                                        @foreach ($termTaxonomies as $termTaxonomy)
                                            <option value="{{ $termTaxonomy->id }}">{!! str_repeat("&nbsp;&nbsp;&nbsp;",$termTaxonomy->getLevel()) !!}{{ $termTaxonomy->term->term_title }}</option>
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
                    <div class="tile-title">

                    </div>
                    <div class="tile-body">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <select class="form-control form-control-sm" id="bulk-actions" name="bulk-actions">
                                    <option value="">{{ __('Bulk Actions') }}</option>
                                    <option value="delete">{{ __('Delete') }}</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-primary btn-sm" id="apply-button" type="button">{{ __('Apply') }}</button>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered" id="termTaxonomyTable">
                            <thead>
                            <tr>
                                <th>
                                    <input class="form-check-parent" type="checkbox">
                                </th>
                                {{--<th>ID</th>--}}
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($termTaxonomies as $termTaxonomy)
                                <tr>
                                    <td><input class="form-check-child" data-id="{{ $termTaxonomy->id }}" type="checkbox"></td>
                                    {{--<td>{{ $termTaxonomy->id }}</td>--}}
                                    <td>{{ str_repeat(" - ",$termTaxonomy->getLevel()) }}{{ $termTaxonomy->term->term_title }}</td>
                                    <td>{{ $termTaxonomy->term->term_slug }}</td>
                                    <td>{{ $termTaxonomy->updated_at }}</td>
                                    <td><a class="btn btn-primary btn-sm" href="{{ Route::has('admin.term.edit') ? route('admin.term.edit', ['id' => $termTaxonomy->id]) : '#' }}"><i class="fa fa-edit"></i>{{ __('Edit') }}</a></td>
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
    <script type="text/javascript" src="{{ asset('js/vali.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $("#termTaxonomyTable").DataTable(
            {
                "paging":   false,
                "info":     false,
                "filter":   false
            }
        );
        $('#apply-button').on('click', function () {
            var checkedIds= [];
            $("input:checkbox[class='form-check-child']:checked").each(function() {
                checkedIds.push($(this).data('id'));
            });
            axios.post('{{ Route::has('admin.term.operate') ? route('admin.term.operate') : '#' }}', {
                action: $("#bulk-actions").val(),
                ids: checkedIds.toString()
            })
            .then(function (response) {
                if (response['status'] == '200' && response['data'] == true) {
                    window.location.reload();
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        });
    </script>
@endsection
