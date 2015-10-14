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
                    console.log(data);
                    $('#appbundle_erf_section').html('');
                    $.each(data, function (k, v) {
                        $('#appbundle_erf_section').append('<option value="' + v + '">' + k + '</option>');
                    });

                }
            });
            return false;
        });
    };

    var handleDataTable = function () {
        var oTable = $('#sample_editable_1').dataTable({
            "aLengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 5,
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page",
                "oPaginate": {
                    "sPrevious": "Prev",
                    "sNext": "Next"
                }
            },
            "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0]
                }
            ]
        });
        jQuery('#sample_editable_1_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
        jQuery('#sample_editable_1_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
        jQuery('#sample_editable_1_wrapper .dataTables_length select').select2({
            showSearchInput: false //hide search box with special css class
        }); // initialize select2 dropdown
    };

    return {
        init: function () {
            handleDataTable();
            handleErf();
            handleLocation();
        }
    };
}();