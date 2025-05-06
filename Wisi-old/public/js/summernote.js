//== Class definition

var SummernoteDemo = function () {
    //== Private functions
    var demos;
    demos = function () {
        $('.summernote').summernote({
            height: 150,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    };

    return {
        // public functions
        init: function() {
            demos();
        }
    };
}();

//== Initialization
jQuery(document).ready(function() {
    SummernoteDemo.init();

});