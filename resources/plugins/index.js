ClassicEditor
    .create( document.querySelector( '.ckeditor' ), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        language: locale,
        ckfinder: {
            uploadUrl: uploadUrl,
        },
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
