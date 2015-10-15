var Payment = function () {

    var handlePayment = function () {

        if ($('#appbundle_payment_amountDue').length) {

            //cache fields

            var installment = $('#appbundle_payment_amountDue');
            var received = $('#appbundle_payment_amountReceived');
            var outstanding = $('#appbundle_payment_amountOutstanding');
            var balance = $('#appbundle_payment_totalOutstanding');

            //cache fields amounts

            var insAmnt = parseFloat(installment.val());
            var recAmnt = parseFloat(received.val());
            var outAmnt = parseFloat(outstanding.val());
            var balAmnt = parseFloat(balance.val());

            if (balance.val() == 0) {
//                received.prop('disabled', true);
            }

            $(document).on('change', '#appbundle_payment_amountReceived', function () {


                if (isNaN(balAmnt)) {
                    balAmnt = parseFloat(balance.val());
                }

                var rec = parseFloat(received.val()).toFixed(2);

                if (received.val() === '') {
                    outstanding.val(outAmnt);
                    balance.val(balAmnt);
                    return;
                } else if ((rec >= insAmnt && rec < balAmnt) || rec == balAmnt) {
                    outstanding.val('0.00');
                } else if (rec < insAmnt) {
                    var new_out = (insAmnt - rec);
                    outstanding.val(new_out);
                } else if (rec > balAmnt) {
                    alert('Account being overpaid by: R' + parseFloat(rec - balAmnt).toFixed(2));
                    received.val('');
                    outstanding.val(outAmnt);
                    balance.val(balAmnt);
                    return;
                } else if (rec < balAmnt) {
                    var new_out = (insAmnt - rec);
                    outstanding.val(new_out);
                } else {
                    received.val('');
                    outstanding.val(outAmnt);
                    balance.val(balAmnt);
                    return;
                }

                var bal = (balAmnt - rec);
                balance.val(bal.toFixed(2));
            });
        }
    };

    var handleSearch = function () {

        $(document).on('change', '#appbundle_payment_erf', function (e) {

            $.get(Routing.generate('erf_get_by_id', {id: $(this).val()}), function (data) {
                if (typeof data.message !== 'undefined') {
                    console.log(data.message);
                }

                var address = data.street + ', ' + data.section + ', ' + data.location;
                var owner = data.first_name + ' ' + data.last_name;
                $('#erfAddress').val(address);
                $('#erfOwner').val(owner);

                $('#appbundle_payment_totalOutstanding').val(data.balance);

            }).done(function () {
//                alert("second success");
            }).fail(function () {
                alert("error-this and that");
            });

        });
    };

    var handleSelect2 = function () {
        $('#appbundle_payment_erf').select2({
            placeholder: {id: "", text: "Select Erf #"},
            allowClear: true
        });
    };

    var handleDataTable = function () {
        var oTable = $('#recent_payments_data_table').dataTable({
            "bSort": false,
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
        jQuery('#recent_payments_data_table_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
        jQuery('#recent_payments_data_table_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
        jQuery('#recent_payments_data_table_wrapper .dataTables_length select').select2({
            showSearchInput: false //hide search box with special css class
        }); // initialize select2 dropdown
    };

    var handlePrint = function () {
        $('#print-slip').on('click', function () {
            //Print ele2 with default options http://devzone.co.in/print-page-or-section-of-page-using-jquery/
//            $.print("#print-div");
            $("#print-div").print({
                addGlobalStyles: true,
                stylesheet: null,
                rejectWindow: true,
                noPrintSelector: ".no-print",
                iframe: true,
                append: null,
                prepend: null
            });
        });
    };

    return {
        init: function () {
            handleSelect2();
            handlePayment();
            handleSearch();
            handleDataTable();
            handlePrint();
        }

    };
}();