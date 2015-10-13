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

    var handleLocation = function () {
        $("#appbundle_erf_location").select2({
            placeholder: "Select location",
            allowClear: true
        }).on('change', function (e) {
            var url = Routing.generate('get_sections_by_location_id', {id: $(this).val()});
            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                   $('#appbundle_erf_section').html('');
                    $.each(data, function(k, v) {
                        $('#appbundle_erf_section').append('<option value="' + v + '">' + k + '</option>');
                    });
 
                }
            });
            return false;
        });
    };

    return {
        init: function () {
            handleErf();
            handleLocation();
        }
    };
}();