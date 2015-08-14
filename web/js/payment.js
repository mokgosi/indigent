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
                } else if( rec < balAmnt) {
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

                $('div#erfAddress').html(data.street);
                $('div#erfSection').html(data.section);
                $('div#erfLocation').html(data.location);

                $('#appbundle_payment_totalOutstanding').val(data.balance);

            }).done(function () {
//                alert("second success");
            }).fail(function () {
                alert("error-this and that");
            });

        });
    };
    
    var handleSelect2 = function() {
      $('#appbundle_payment_erf').select2({
            placeholder: {id: "", text: "Select Erf #"},
            allowClear: true
        });  
    };

    return {
        init: function () {
            handleSelect2();
            handlePayment();
            handleSearch();
        }

    };
}();