<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="<?php echo $main_description; ?>">
    <meta name="keywords" content="<?php echo $main_keywords; ?>">
    <meta name="author" content="<?php echo $main_author; ?>">
    <title>Invoice - <?php echo $main_title; ?></title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Sweetalert2 CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert2.min.css">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-user.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-wizard.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static menu-collapsed pace-done" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <?php include 'layouts/header.php'; ?>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <?php include 'layouts/main-menu.php'; ?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <?php include 'pages/' . $_GET['pages'] . '.php'; ?>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php include 'layouts/footer.php'; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <script src="app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="app-assets/js/scripts/node_modules/dom-to-image/src/dom-to-image.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN Sweetalert2 JS -->
    <script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END Sweetalert2 JS -->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <?php
    $columntarget = $_SESSION["supplier"]["role_id"] == 1 || $_SESSION["supplier"]["role_id"] == 2 ? '4, 5' : '4, 5';
    ?>

    <!-- BEGIN: Page JS-->
    <script type="text/javascript">
        // Ajax Delete Captain
        // --------------------------------------------------------------------
        function deleteInvoice(invoice_id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "pages/invoice/function/delete.php",
                        type: "POST",
                        data: {
                            invoice_id: invoice_id,
                            action: 'delete'
                        },
                        success: function(response) {
                            if (response != false) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Your item has been deleted.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(function() {
                                    // location.href = './?pages=invoice/list';
                                    location.reload(); // refresh page
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Please try again.',
                                    text: 'Failed to delete data!',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Please try again.',
                                text: 'Failed to delete data!',
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                }
                            });
                        }
                    });
                }
            });
        }

        $(document).ready(function() {
            var jqForm = $('#invoice-search-form'),
                picker = $('.picker'),
                dtPicker = $('#dob-bootstrap-val'),
                range = $('.flatpickr-range'),
                pageBlockSpinner = $('.btn-page-block-spinner'),
                select = $('.select2');

            if (pageBlockSpinner.length) {
                pageBlockSpinner.on('click', function() {
                    $.blockUI({
                        message: '<div class="spinner-grow spinner-grow-sm text-white" role="status"></div>',
                        timeout: 1000,
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            opacity: 0.5
                        }
                    });
                });
            }

            // select2
            select.each(function() {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this
                    .select2({
                        placeholder: 'Select ...',
                        dropdownParent: $this.parent()
                    })
                    .change(function() {
                        $(this).valid();
                    });
            });

            // Picker
            if (picker.length) {
                picker.flatpickr({
                    onReady: function(selectedDates, dateStr, instance) {
                        if (instance.isMobile) {
                            $(instance.mobileInput).attr('step', null);
                        }
                    },
                    static: true,
                    altInput: true,
                    altFormat: 'j F Y',
                    dateFormat: 'Y-m-d'
                });
            }

            // Range
            if (range.length) {
                range.flatpickr({
                    onReady: function(selectedDates, dateStr, instance) {
                        if (instance.isMobile) {
                            $(instance.mobileInput).attr('step', null);
                        }
                    },
                    mode: 'range',
                    // static: true,
                    altInput: true,
                    altFormat: 'j F Y',
                    dateFormat: 'Y-m-d'
                });
            }

            if (dtPicker.length) {
                dtPicker.flatpickr({
                    onReady: function(selectedDates, dateStr, instance) {
                        if (instance.isMobile) {
                            $(instance.mobileInput).attr('step', null);
                        }
                    }
                });
            }

            //Numeral
            $('.numeral-mask').toArray().forEach(function(field) {
                new Cleave(field, {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand'
                });
            });

            // Ajax Search
            // --------------------------------------------------------------------
            jqForm.on("submit", function(e) {
                var serializedData = $(this).serialize();
                $.ajax({
                    url: "pages/invoice/function/search.php",
                    type: "POST",
                    data: serializedData + "&action=search",
                    success: function(response) {
                        if (response != false) {
                            $("#invoice-search-table").html(response);
                        } else {
                            $("#invoice-search-table").html('');
                        }
                    }
                });
                e.preventDefault();
            });
        });

        function modal_check_bill(inv_id, check_bill) {
            document.getElementById('inv_id').value = inv_id;
            document.getElementById('bill1').checked = check_bill == 1 ? true : false;
            document.getElementById('bill2').checked = check_bill == 0 ? true : false;
        }

        function modal_confirm_bill(inv_id, confirm_bill) {
            document.getElementById('inv_id_confirm').value = inv_id;
            document.getElementById('confirm1').checked = confirm_bill == 1 ? true : false;
            document.getElementById('confirm2').checked = confirm_bill == 0 ? true : false;
        }

        function modal_final_check(inv_id, final_check) {
            document.getElementById('inv_id_final').value = inv_id;
            document.getElementById('in_process').checked = final_check == 1 ? true : false;
            document.getElementById('completed').checked = final_check == 2 ? true : false;
            document.getElementById('alert').checked = final_check == 3 ? true : false;
        }

        function checkbox() {
            var checkbox_all = document.getElementById('checkbox_all').checked;
            var checkbox = document.getElementsByClassName('dt-checkboxes');

            if (checkbox_all == true && checkbox.length > 0) {
                for (let index = 0; index < checkbox.length; index++) {
                    checkbox[index].checked = true;
                }
            } else if (checkbox_all == false && checkbox.length > 0) {
                for (let index = 0; index < checkbox.length; index++) {
                    checkbox[index].checked = false;
                }
            }
        }

        function search_agent(type) {
            var travel_inv = document.getElementById('search_travel_inv');
            var array_bill = 0;
            
            if (travel_inv.value || type == 'all') {
                var formData = new FormData();
                formData.append('action', 'search');
                formData.append('type', type);
                formData.append('search_travel', travel_inv.value);
                $.ajax({
                    url: "pages/invoice/function/search-agent.php",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        // $('#div-show').html(response);
                        // console.log(response);
                        if (response != false && travel_inv.value != '') {
                            $('#div-booking-not').find('div').remove();
                            var res = $.parseJSON(response);
                            var counts = Object.keys(res.id).length;
                            var bo_not = '';
                            var class_bg = '';
                            var text_html = '';
                            if (counts) {
                                for (let index = 0; index < counts; index++) {
                                    bo_not = res.not[res.id[index]] !== undefined ? res.not[res.id[index]] : 'Done';
                                    class_bg = res.not[res.id[index]] !== undefined ? 'border' : 'border-success';

                                    if (res.not[res.id[index]] !== undefined) {
                                        text_html += '<div class=\"col-2 p-50\"><a href=\"javascript:void(0);\" onclick=\"search_booking(' + res.id[index] + ', \'' + res.name[index] + '\');\"><div class=\"' + class_bg + ' p-50 text-center\"><h6>' + res.name[index] + '</h6><h2 class=\"fw-bolder\">' + bo_not + '</h2></div></a></div>';
                                    }

                                }
                            }

                            document.getElementById('div-booking-not').innerHTML = text_html;
                        } else {
                            document.getElementById('search_agent_inv').value = 0;
                            $('#div-booking-not').find('div').remove();
                            $('#tbody-booking-form').find('tr').remove();
                        }
                    }
                });
            }
        }

        function search_booking(agent_id, agent_name) {
            document.getElementById('search_agent_inv').value = agent_id;
            document.getElementById('text-agent-name').innerHTML = agent_name;

            var search_travel = document.getElementById('search_travel_inv').value;

            if (search_agent) {
                $.blockUI({
                    message: '<div class="spinner-grow spinner-grow-sm text-white" role="status"></div>',
                    timeout: 500,
                    css: {
                        backgroundColor: 'transparent',
                        border: '0'
                    },
                    overlayCSS: {
                        opacity: 0.5
                    }
                });

                var formData = new FormData();
                formData.append('action', 'search');
                formData.append('page', 'list');
                formData.append('search_agent', agent_id);
                formData.append('search_travel', search_travel);
                $.ajax({
                    url: "pages/invoice/function/search-booking.php",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        // console.log(response);
                        if (response != false) {
                            $('#tbody-booking-form').html(response);

                            var formData = new FormData();
                            formData.append('action', 'search');
                            formData.append('search_agent', agent_id);
                            formData.append('search_travel', search_travel);
                            $.ajax({
                                url: "pages/invoice/function/search-invoice.php",
                                type: "POST",
                                processData: false,
                                contentType: false,
                                data: formData,
                                success: function(response) {
                                    if (response != false) {
                                        $('#invoice').find('option').remove();
                                        var res = $.parseJSON(response);
                                        var counts = Object.keys(res.id).length;
                                        if (counts) {
                                            document.getElementById('div-invoice').hidden = false;
                                            $('#invoice').append("<option value=\"0\" data-from=\"\" data-to=\"\">Select ...</option>");
                                            for (let index = 0; index < counts; index++) {
                                                $('#invoice').append("<option value=\"" + res.id[index] + "\" data-from=\"" + res.date_from[index] + "\" data-to=\"" + res.date_to[index] + "\">" + res.invoice_no[index] + " (" + res.text_date[index] + ")</option>");
                                            }
                                        }
                                    } else {
                                        document.getElementById('div-invoice').hidden = true;
                                        $('#invoice').find('option').remove();
                                        $('#invoice').append("<option value=\"0\" data-from=\"\" data-to=\"\">Select ...</option>");
                                    }
                                }
                            });
                        } else {
                            document.getElementById('search_agent_inv').value = 0;
                            $('#tbody-booking-form').find('tr').remove();
                        }
                    }
                });
            }

        }

        function change_form() {
            var invoice = document.getElementById('invoice').value;
            if (invoice > 0) {
                document.getElementById('booking-form').action = "javascript:void(0);";
                document.getElementById('btn-edit-inv').hidden = false;
                document.getElementById('btn-submit-inv').hidden = true;
            } else {
                document.getElementById('booking-form').action = "./?pages=invoice/create";
                document.getElementById('btn-edit-inv').hidden = true;
                document.getElementById('btn-submit-inv').hidden = false;
            }
        }

        function form_invoice() {
            var invoice = document.getElementById('invoice').value;
            var travel = document.getElementById('search_travel_inv').value;
            var checkbox = document.getElementsByClassName('dt-checkboxes');
            var array_booking = document.getElementById('array_booking').value;
            var before_from = $('#invoice').find(':selected').attr('data-from');
            var before_to = $('#invoice').find(':selected').attr('data-to');

            var booking = [];
            if (checkbox) {
                for (let index = 0; index < checkbox.length; index++) {
                    if (checkbox[index].checked == true && checkbox[index].value !== "on") {
                        booking.push(checkbox[index].value)
                    }
                }
            }

            if (invoice > 0) {
                var formData = new FormData();
                formData.append('action', 'edit-invoice');
                formData.append('invoice', invoice);
                formData.append('travel', travel);
                formData.append('before_from', before_from);
                formData.append('before_to', before_to);
                formData.append('booking', JSON.stringify(booking));
                formData.append('array_booking', array_booking);
                $.ajax({
                    url: "pages/invoice/function/edit-invoice.php",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        // console.log(response);
                        if (response != false && response > 0) {
                            Swal.fire({
                                title: "The information has been updated.",
                                icon: "success",
                            }).then(function(isConfirm) {
                                if (isConfirm) {
                                    // location.reload(); // refresh page
                                    window.location.href = './?pages=invoice/edit&id=' + response; // refresh page
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Please try again.",
                                icon: "error",
                            });
                        }
                    }
                });
            }
        }
    </script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->