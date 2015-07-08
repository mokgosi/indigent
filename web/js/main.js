var Payments = function () {

    var handlePayment = function () {
        
        if($('#appbundle_payment_amountDue').length) {
            
            
            var due = $('#appbundle_payment_amountDue');
            var received = $('#appbundle_payment_amountReceived');
            var outstanding = $('#appbundle_payment_amountOutstanding');
            var balance = $('#appbundle_payment_totalOutstanding');
            
            if(received == due || received > due) {
                outstanding = received - due;
                
            }
        }
    };
    
    return {
        init: function () {

        }

    };
};