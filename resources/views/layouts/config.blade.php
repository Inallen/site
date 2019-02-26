@include('ckfinder::setup')
<script type="text/javascript">
    var uploadUrl = "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images&responseType=json";
    var locale = "{{ config('app.locale') }}";
</script>
