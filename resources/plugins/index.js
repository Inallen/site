class FileUploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }
    upload() {
        return new Promise((resolve, reject) => {
            const data = new FormData();
            data.append('file', this.loader.file);
            data.append('allowSize', 10);//允许图片上传的大小/兆
            axios.post(uploadUrl, data)
            .then(response => {
                if ( response.data.msg == 'success' ) {
                    resolve( {
                        default: response.data.url
                    } );
                } else {
                    reject( response.data.msg );
                }
            })
            .catch(response => {
                reject( 'Upload failed' );;
            });

        });
    }
    abort() {
    }
}


ClassicEditor
    .create( document.querySelector( '.ckeditor' ), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        language: locale,
    } )
    .then( editor => {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) =>{
            return new FileUploadAdapter(loader);
        };
        editor.ui.view.editable.editableElement.style.height = '460px';
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
