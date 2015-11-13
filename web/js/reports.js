var Reports = function () {

    return {
        //main function to initiate the module
        init: function () {

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

            var oTable = $('#erf_report_datatable').dataTable({
                "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                },
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "dom": "B<'clear'><'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
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
                ],
                buttons: [
                    'print',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });

            jQuery('#erf_report_datatable_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#erf_report_datatable_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
            jQuery('#erf_report_datatable_wrapper .dataTables_length select').select2({
                showSearchInput: false //hide search box with special css class
            }); // initialize select2 dropdown

            var oTable = $('#payment_report_checkout').dataTable({
                "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                    /*
                     * Calculate the total market share for all browsers in this table (ie inc. outside
                     * the pagination)
                     */
                    var iTotalMarket = 0;
                    for (var i = 0; i < aaData.length; i++)
                    {
                        iTotalMarket += parseInt(aaData[i][3] * 1);
                    }

                    /* Calculate the market share for browsers on this page */
                    var iPageMarket = 0;
                    for (var i = iStart; i < iEnd; i++)
                    {
                        iPageMarket += parseInt(aaData[ aiDisplay[i] ][3] * 1);
                    }

                    /* Modify the footer row to match what we want */
                    var nCells = nRow.getElementsByTagName('th');
                    nCells[1].innerHTML = 'R ' + iPageMarket +
                            ' (R' + iTotalMarket + ' total)';
                },
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "dom": "B<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
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
                ],
                buttons: [
                    'print',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });

            jQuery('#payment_report_checkout_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#payment_report_checkout_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
            jQuery('#payment_report_checkout_wrapper .dataTables_length select').select2({
                showSearchInput: false //hide search box with special css class
            }); // initialize select2 dropdown

            var oTable = $('#section_report_datatable').dataTable({
                "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                    /*
                     * Calculate the total market share for all browsers in this table (ie inc. outside
                     * the pagination)
                     */
                    var iTotalMarket = 0;
                    for (var i = 0; i < aaData.length; i++)
                    {
                        iTotalMarket += parseInt(aaData[i][3] * 1);
                    }

                    /* Calculate the market share for browsers on this page */
                    var iPageMarket = 0;
                    for (var i = iStart; i < iEnd; i++)
                    {
                        iPageMarket += parseInt(aaData[ aiDisplay[i] ][3] * 1);
                    }

                    /* Modify the footer row to match what we want */
                    var nCells = nRow.getElementsByTagName('th');
                    nCells[1].innerHTML = 'R ' + iPageMarket +
                            ' (R' + iTotalMarket + ' total)';
                },
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "dom": "B<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
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
                ],
                buttons: [
                    'print',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });

            jQuery('#section_report_datatable_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#section_report_datatable_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
            jQuery('#section_report_datatable_wrapper .dataTables_length select').select2({
                showSearchInput: false //hide search box with special css class
            }); // initialize select2 dropdown

            var intVal = function (i) {
                return typeof i === 'string' ?
                        i.replace(/[\$R,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
            };

            var oTable = $('#location_report_datatable').dataTable({
                "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                    /*
                     * Calculate the total market share for all browsers in this table (ie inc. outside
                     * the pagination)
                     */
                    var iTotalMarket1 = 0;
                    var iTotalMarket2 = 0;
                    var iTotalMarket3 = 0;
                    var iTotalMarket4 = 0;

                    for (var i = 0; i < aaData.length; i++)
                    {
                        iTotalMarket1 += intVal(aaData[i][1]);
                        iTotalMarket2 += intVal(aaData[i][2]);
                        iTotalMarket3 += intVal(aaData[i][3]);
                        iTotalMarket4 += intVal(aaData[i][3]);
                    }

                    /* Calculate the market share for browsers on this page */
                    var iPageMarket1 = 0;
                    var iPageMarket2 = 0;
                    var iPageMarket3 = 0;
                    var iPageMarket4 = 0;

                    for (var i = iStart; i < iEnd; i++)
                    {
                        iPageMarket1 += intVal(aaData[ aiDisplay[i] ][1]);
                        iPageMarket2 += intVal(aaData[ aiDisplay[i] ][2]);
                        iPageMarket3 += intVal(aaData[ aiDisplay[i] ][3]);
                        iPageMarket4 += intVal(aaData[ aiDisplay[i] ][4]);
                    }

                    /* Modify the footer row to match what we want */
                    var nCells = nRow.getElementsByTagName('th');

                    nCells[1].innerHTML = iPageMarket1;

                    nCells[2].innerHTML = iPageMarket2;

                    nCells[3].innerHTML = iPageMarket3;

                    nCells[4].innerHTML = 'R ' + iPageMarket4;
                },
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "dom": "B<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
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
                ],
                buttons: [
                    'print',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });

            jQuery('#location_report_datatable_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#location_report_datatable_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
            jQuery('#location_report_datatable_wrapper .dataTables_length select').select2({
                showSearchInput: false //hide search box with special css class
            }); // initialize select2 dropdown
        }
    };
}();