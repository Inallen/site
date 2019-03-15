ClassicEditor
    .create( document.querySelector( '.ckeditor' ), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        language: locale,
        ckfinder: {
            uploadUrl: uploadUrl,
        },
    } )
    .then( editor => {
        editor.ui.view.editable.editableElement.style.height = '460px';
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
