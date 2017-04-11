
<script type="text/javascript" src='plugins/jquery-ui/jquery-ui.custom.min.js'></script>


<script src="plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="plugins/jquery-file-upload/js/jquery.fileupload.js"></script>





<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'plugins/jquery-file-upload/server/php/';
   
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $("#profileimage").attr('src', 'http://www.domainerelite.com/members/images/members/' + file.name);
            });
            $("#progress").css('visibility','hidden');
            $('#progress .progress-bar').css(
                'width',
                0 + '%'
            );
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $("#progress").css('visibility','visible');
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

$("#profileform").submit(function(e) {
	$.ajax({
           type: "POST",
           url: $("#profileform").attr('action'),
           data: $("#profileform").serialize(), // serializes the form's elements.
           dataType: "json",
           success: function(data)
           {
               if (data.status == 'success') {
    				$('.alert-success').css('display', 'block').fadeOut(5000);
               } else {
					$('.alert-danger').css('display', 'block').fadeOut(5000);
               }
           }
      });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>

