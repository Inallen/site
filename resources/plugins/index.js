ClassicEditor
    .create( document.querySelector( '.ckeditor' ), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        language: 'zh-cn',
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
