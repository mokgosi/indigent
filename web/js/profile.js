var Profile = function () {

    return {
        //main function to initiate the module
        init: function () {


            $('body').on('submit', '.fos_user_profile_edit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize()
                }).done(function (data) {
                    if (typeof data.message !== 'undefined') {
                        alert(data.message);
                    }
                    console.log(data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    if (typeof jqXHR.responseJSON !== 'undefined') {
//                        if (jqXHR.responseJSON.hasOwnProperty('form')) {
//                            $('#form_body').html(jqXHR.responseJSON.form);
//                        }

//                        $('.form_error').html(jqXHR.responseJSON.message);
                        alert(jqXHR.responseJSON.message);

                    } else {
                        alert(errorThrown);
                    }
                    alert('fail');

                });

//                
//                var data = $('form.ajax').serialize();
//                
//                $.post(url, data, function (results) {
//                    if (results.success === true) {
//                        $(this).parents('ajaxContent').remove();
//                        $(this).parents('.openPanel').removeClass('openPanel');
//                    } else {
//                        alert('False'); //test
//                    }
//                });

            });
        }
    };
}();