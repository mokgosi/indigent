var Print = function () {
    var handlePrint = function() {
        $('#printdetails').on('click', function() {
            //Print ele2 with default options
            $.print("#print-div");
        });
    };
    return {
        init: function () {
            handlePrint();
        }
    };
}();