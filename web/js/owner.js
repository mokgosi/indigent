//var Owner = function () {
//
//    var handleOwner = function () {
//
//        $(".js-data-example-ajax").select2({
//            ajax: {
//                url: "https://localhost:8000/app_dev.php/",
//                dataType: 'json',
//                delay: 250,
//                data: function (params) {
//                    return {
//                        q: params.term, // search term
//                        page: params.page
//                    };
//                },
//                processResults: function (data, page) {
//                    // parse the results into the format expected by Select2.
//                    // since we are using custom formatting functions we do not need to
//                    // alter the remote JSON data
//                    return {
//                        results: data.items
//                    };
//                },
//                cache: true
//            }
//        });
//    };
//
//    return {
//        init: function () {
//            handleOwner();
//        }
//    };
//}();