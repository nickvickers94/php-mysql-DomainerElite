
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


$.validator.addMethod("currency", function (value, element) {
  return this.optional(element) || /^\$?(\d{1,3}(\,\d{3})*|(\d+))(\.\d{2})?$/.test(value);
}, "Please specify a valid amount");

$(document).ready(function() {
"use strict";	

	$('#addlistingform').validate({
	submitHandler: function(form) {
	$.ajax({
           type: "POST",
           url: $(form).attr('action'),
           data:  $(form).serialize(), // serializes the form's elements.
           dataType: "json",
           success: function(data)
           {
               if (data.status == 'success') {
               		$("#link").val('');
               		$("#domain").val('');
               		$("#price").val('');
    				$('.alert-success').css('display', 'block').fadeOut(5000);
               } else {
               		$('#error').html(data.error);
					$('.alert-danger').css('display', 'block').fadeOut(5000);
               }
           }
      });
	}
	});
	
	$('#editlistingform').validate({
	submitHandler: function(form) {
	$.ajax({
           type: "POST",
           url: $(form).attr('action'),
           data:  $(form).serialize(), // serializes the form's elements.
           dataType: "json",
           success: function(data)
           {
               if (data.status == 'success') {
    				$('.alert-success').css('display', 'block').fadeOut(5000);
               } else {
               		$('#error').html(data.error);
					$('.alert-danger').css('display', 'block').fadeOut(5000);
               }
           }
      });
	}
	});
	
	
	
	$('#profileform').validate({
	submitHandler: function(form) {
	$.ajax({
           type: "POST",
           url: $(form).attr('action'),
           data: $(form).serialize(), // serializes the form's elements.
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

	}
	
	});
});

function deleteListing(id) {
	r = confirm('Do you want to permanently delete this listing?');
	if (r == true) {
		$.ajax({
			type: "POST",
           	url: 'marketplace-delete-listing.php',
           	data: { listing_id: id },
           	dataType: "json",
           	success: function(data)
           {
               if (data.status == 'success') {
               		$('#data-tables').dataTable().fnDraw();
               		var table = $('#data-tables').dataTable();
				table.fnDeleteRow( table.$("#row_" + id)[0] );
     
               } else {
               		alert('Listing could not be deleted.');
               }
            }
		});
	}
}
</script>

