//$(document).ready( function() {
//    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
//        console.log(numFiles);
//        console.log(label);
//    });
//});
//
$(document).on('change', '.btn-file :file', function() {
    /*
    var input = $(this),        
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
   */
    var input = $(this);
    var tmppath = URL.createObjectURL(input.get(0).files[0]);
    $("img").fadeIn("fast").attr('src',tmppath);
    $('#filename').attr('value',input.val().replace(/\\/g, '/').replace(/.*\//, ''));
});

