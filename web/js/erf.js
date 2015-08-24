var Erf = function () {

    var handleErf = function () {
        $("#appbundle_erf_owner").select2({
            placeholder: "Select onwer",
            allowClear: true,
        }).on('change', function (e) {
            $.get(Routing.generate('get_erf_owner', {id: $(this).val()}), function (data) {
                if (typeof data.message !== 'undefined') {
                    console.log(data.message);
                }
                $('#ownerFirstName').val(data.firstName);
                $('#ownerLastName').val(data.lastName);
                $('#ownerAddress').val(data.address);
                $('#ownerMobile').val(data.mobile);

            });
        });
    };

    return {
        init: function () {
            handleErf();
        }
    };
}();