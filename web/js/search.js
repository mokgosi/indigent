var Search = function () {

    return {
        //main function to initiate the module
        init: function () {
            if (jQuery().datepicker) {

                var date = new Date();
                var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
//                var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

                $('.date-picker').datepicker({
                    format: "yyyy-mm-dd",
                });
            }
            App.initFancybox();
        }
    };
}();