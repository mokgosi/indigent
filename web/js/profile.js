var Profile = function () {

    return {
        //main function to initiate the module
        init: function () {


            $('#updateProfile').live('click', function (e) {
                e.preventDefault();
                alert('here');

                var url = Routing.generate('ajax_setSociale');
                
                var data = $('form.ajax').serialize();
                
                $.post(url, data, function (results) {
                    if (results.success === true) {
                        $(this).parents('ajaxContent').remove();
                        $(this).parents('.openPanel').removeClass('openPanel');
                    } else {
                        alert('False'); //test
                    }
                });

            });
        }
    };
}();