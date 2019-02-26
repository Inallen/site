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
        <div class="row">
            <div  class="col-md-12" id="ckfinder-widget">
            </div>
        </div>
    </main>
@endsection
@section('script')
<script type="text/javascript">
    CKFinder.widget( 'ckfinder-widget', {
        width: '100%',
        height: '100%',
        language: locale
    });
</script>
@endsection
