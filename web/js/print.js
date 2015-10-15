var Print = function () {
    var handlePrint = function() {
        $('#print-slip').on('click', function() {
            //Print ele2 with default options
//            $.print("#print-div");
            alert('printing');
        });
    };
    return {
        init: function () {
            handlePrint();
        }
    };
}();