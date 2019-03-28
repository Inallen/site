@extends('layouts.default')

@section('link')
    {{--<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">--}}
@endsection
@section('content')
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
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Update Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($illusions as $illusion)
                                <tr>
                                    <td>{{ $illusion->id }}</td>
                                    <td>{{ $illusion->title }}</td>
                                    <td>{{ $illusion->illusion_status }}</td>
                                    <td>{{ $illusion->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $illusions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="{{ asset('js/vali.js') }}"></script>
@endsection
