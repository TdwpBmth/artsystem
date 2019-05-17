JQuery(document).ready(function($){

    Dropzone.options.myDrop = {
        uploadMultiple: true,
        maxFileSize: 2,
        init: function init(){
            this.on()
        }
    }
});