var TableEditable = function () {

    return {
        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[0] + '">';
                jqTds[1].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[2] + '">';
                jqTds[3].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[3] + '">';
                jqTds[4].innerHTML = '<a class="edit" href="">Save</a>';
                jqTds[5].innerHTML = '<a class="cancel" href="">Cancel</a>';
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 5, false);
                oTable.fnDraw();
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable.fnDraw();
            }

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

            var oTable = $('#erf_report_datatable').dataTable({
                "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                    /*
                     * Calculate the total market share for all browsers in this table (ie inc. outside
                     * the pagination)
                     */
                    //var iTotalMarket = 0;
                    //for (var i = 0; i < aaData.length; i++)
                    //{
                    //    iTotalMarket += parseInt(aaData[i][3] * 1);
                    //}
                    //
                    ///* Calculate the market share for browsers on this page */
                    //var iPageMarket = 0;
                    //for (var i = iStart; i < iEnd; i++)
                    //{
                    //    iPageMarket += parseInt(aaData[ aiDisplay[i] ][3] * 1);
                    //}
                    //
                    ///* Modify the footer row to match what we want */
                    //var nCells = nRow.getElementsByTagName('th');
                    //nCells[1].innerHTML = 'R ' + iPageMarket +
                    //    ' (R' + iTotalMarket + ' total)';
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

            jQuery('#sample_editable_1_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
            jQuery('#sample_editable_1_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
            jQuery('#sample_editable_1_wrapper .dataTables_length select').select2({
                showSearchInput: false //hide search box with special css class
            }); // initialize select2 dropdown

            var nEditing = null;

            $('#sample_editable_1_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '', '',
                    '<a class="edit" href="">Edit</a>', '<a class="cancel" data-mode="new" href="">Cancel</a>'
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#sample_editable_1 a.delete').live('click', function (e) {
                e.preventDefault();

                if (confirm("Are you sure to delete this row ?") == false) {
                    return;
                }

                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);
                alert("Deleted! Do not forget to do some ajax to sync with backend :)");
            });

            $('#sample_editable_1 a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#sample_editable_1 a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "Save") {
                    /* Editing this row and want to save it */
                    saveRow(oTable, nEditing);
                    nEditing = null;
                    alert("Updated! Do not forget to do some ajax to sync with backend :)");
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
        }
    };
}();