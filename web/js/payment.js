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

            console.log(insAmnt);

            $(document).on('change', '#appbundle_payment_amountReceived', function () {

                if (received.val() === '') {
                    outstanding.val(outAmnt);
                    balance.val(balAmnt);
                    return;
                } else if ((parseFloat(received.val()) >= insAmnt && parseFloat(received.val()) < balAmnt) || parseFloat(received.val()) === balAmnt) {
                    outstanding.val('0.00');
                } else if (parseFloat(received.val()) < insAmnt) {
                    var new_out = (insAmnt - parseFloat(received.val()));
                    outstanding.val(new_out);
                } else {
                    received.val('');
                    outstanding.val(outAmnt);
                    return;
                }
                var bal = (balAmnt - parseFloat(received.val()));
                balance.val(bal.toFixed(2));
            });
        }
    };

    var handleSearch = function () {

        $(document).on('change', '#appbundle_payment_erf', function (e) {

            $.get(Routing.generate('erf_get_by_id', {id: $(this).val()}), function (data) {
                console.log(data);
                if (typeof data.message !== 'undefined') {
                    alert(data.message);
                }
            }).done(function () {
                alert("second success");
            }).fail(function () {
                alert("error");
            });

        });
    };

    return {
        init: function () {
            handlePayment();
            handleSearch();
        }

    };
}();