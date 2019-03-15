$("#set_featured_image").on("click",function(){
    selectImageFile();
});

var selectImageFile = function () {
    CKFinder.modal( {
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                $("#set_featured_image").hide();
                $("#featured_image").attr('src', file.getUrl()).show();
                $("#thumbnail").val(file.getUrl());
            } );

            finder.on( 'file:choose:resizedImage', function( evt ) {
                var output = document.getElementById('thumbnail');
                output.value = evt.data.resizedUrl;
                $("#set_featured_image").hide();
                $("#featured_image").attr('src', file.getUrl()).show();
                $("#thumbnail").val(file.getUrl());
            } );
        }
    } );
}




