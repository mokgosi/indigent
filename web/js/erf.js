var Erf = function () {

    var handleErf = function () {
        $("#appbundle_erf_owner").select2({
            placeholder: "Select onwer",
            allowClear: true
        });
    };

    return {
        init: function () {
            handleErf();
        }
    };
}();