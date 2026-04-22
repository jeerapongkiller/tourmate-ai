<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
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
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-wizard.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-invoice.css">
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
    <script src="app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN Sweetalert2 JS -->
    <script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END Sweetalert2 JS -->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script type="text/javascript">
        // Ajax Delete Invoice
        // --------------------------------------------------------------------
        function deleteInvoice() {
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
                            id: $('#id').val(),
                            action: 'delete'
                        },
                        success: function(response) {
                            // console.log(response);
                            if (response != false) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Your item has been deleted.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(function() {
                                    location.href = "./?pages=invoice/list";
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

        function deleteReceipt() {
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
                        url: "pages/invoice/function/delete-receipt.php",
                        type: "POST",
                        data: {
                            id: $('#rec_id').val(),
                            inv_id: $('#id').val(),
                            photo: (document.getElementById('before_photo')) ? document.getElementsByName('before_photo[]')[0].value : '',
                            action: 'delete'
                        },
                        success: function(response) {
                            // console.log(response);
                            if (response != false) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Your item has been deleted.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(function() {
                                    location.reload();
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
            var jqForm = $('#invoice-create-form'),
                jqRecForm = $('#receipt-form'),
                picker = $('.picker'),
                dtPicker = $('#dob-bootstrap-val'),
                range = $('.flatpickr-range'),
                horizontalWizard = document.querySelector('.horizontal-wizard-example'),
                select = $('.select2');

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
                    // static: true,
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
                    static: true,
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

            $('.extra-charge-repeater').repeater({
                initEmpty: false,
                show: function() {
                    $(this).slideDown();

                    $(this).find('[data-extra-repeater="select2"]').select2();

                    $('.numeral-mask').toArray().forEach(function(field) {
                        new Cleave(field, {
                            numeral: true,
                            numeralThousandsGroupStyle: 'thousand'
                        });
                    });

                    // Feather Icons
                    if (feather) {
                        feather.replace({
                            width: 14,
                            height: 14
                        });
                    }
                },
                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                },
                ready: function() {
                    // Init select2
                    $('[data-extra-repeater="select2"]').select2();
                },
                isFirstItemUndeletable: false
            });

            // Horizontal Wizard
            // --------------------------------------------------------------------
            if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
                var horizontalStepper = new Stepper(horizontalWizard, {
                    linear: false
                });
                $(horizontalWizard)
                    .find('.btn-next')
                    .on('click', function() {
                        horizontalStepper.next();
                    });
                $(horizontalWizard)
                    .find('.btn-prev')
                    .on('click', function() {
                        horizontalStepper.previous();
                    });

                $(horizontalWizard)
                // .find('.btn-submit')
                // .on('click', function() {
                //     alert('Submitted..!!');
                // });
                horizontalStepper.to(<?php echo !empty($_GET['tab']) ? $_GET['tab'] : 1; ?>);
            }

            // jQuery Validation
            // --------------------------------------------------------------------
            if (jqForm.length) {
                $.validator.addMethod("regex", function(value, element, regexp) {
                    return this.optional(element) || regexp.test(value);
                }, "Please check your input.");

                $.validator.addMethod('filesize', function(value, element, param) {
                    return this.optional(element) || (element.files[0].size <= param * 1000000)
                }, 'File size must be less than {0} MB');

                jqForm.validate({
                    rules: {
                        'booking[]': {
                            required: true
                        },
                        'invoice_no': {
                            required: true
                        },
                        'date_end': {
                            required: true,
                            date: true
                        },
                        'date_billing': {
                            required: true,
                            date: true
                        }
                    },
                    messages: {},
                    submitHandler: function(form) {
                        // update ajax request data
                        var formData = new FormData(form);
                        formData.append('action', 'edit');
                        $.ajax({
                            url: "pages/invoice/function/edit.php",
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
                                            location.reload(); // refresh page
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
                });
            }

            if (jqRecForm.length) {
                $.validator.addMethod("regex", function(value, element, regexp) {
                    return this.optional(element) || regexp.test(value);
                }, "Please check your input.");

                $.validator.addMethod('filesize', function(value, element, param) {
                    return this.optional(element) || (element.files[0].size <= param * 1000000)
                }, 'File size must be less than {0} MB');

                jqRecForm.validate({
                    rules: {
                        'date_payment': {
                            required: true,
                            date: true
                        },
                        'inv_id': {
                            required: true
                        },
                    },
                    messages: {},
                    submitHandler: function(form) {
                        var action = document.getElementById('rec_id').value > 0 ? 'edit' : 'create';
                        // update ajax request data
                        var formData = new FormData(form);
                        formData.append('action', action);
                        $.ajax({
                            url: "pages/invoice/function/" + action + "-receipt.php",
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
                                            location.reload(); // refresh page
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
                });
            }

            // calculator_amount_preview();
            // calculator_sum_pax();
            // calculator_payment();
            // success_payment();
            calculator_invoice();
            check_diff_date('due_date');
        });

        // Script Function
        // --------------------------------------------------------------------
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
        }

        function calculator_invoice() {
            var vat_total = 0;
            var vat_cut = 0;
            var withholding_total = 0;
            var total = 0;
            var price_amount = document.getElementById('inv-amount');
            var vat = document.getElementById('vat');
            var withholding = document.getElementById('withholding');
            var price_withholding = document.getElementById('inv-withholding');
            var price_total = document.getElementById('inv-total-td');
            var discount = document.getElementById('inv-discount-td');
            var cot = document.getElementById('inv-cot-td');
            var tr_vat = document.getElementById('tr-vat');
            var vat_text = document.getElementById('vat-text');
            var price_vat = document.getElementById('inv-vat');
            var tr_withholding = document.getElementById('tr-withholding');
            var withholding_text = document.getElementById('withholding-text');
            // var amount = document.getElementById('amount');
            tr_vat.hidden = vat.value > 0 ? false : true;
            vat_text.innerHTML = vat.value > 0 ? vat.value == 1 ? 'รวมภาษี 7%' : 'แยกภาษี 7%' : '';
            tr_withholding.hidden = withholding.value > 0 ? false : true;
            withholding_text.innerHTML = withholding.value > 0 ? 'หักภาษี ณ ที่จ่าย ' + withholding.value + ' %' : '';
            // --- sum price total --- //
            total = Number(price_total.innerHTML.replace(/,/g, '') - discount.innerHTML.replace(/,/g, '') - cot.innerHTML.replace(/,/g, ''));
            // --- vat and withholding --- //
            if (vat.value == 1) {
                vat_total = Number(((total * 100) / 107));
                vat_cut = vat_total;
                vat_total = Number(total - vat_total);
                withholding_total = withholding.value > 0 ? Number((vat_cut * withholding.value) / 100) : 0;
                total = Number(total - withholding_total);
            } else if (vat.value == 2) {
                vat_total = Number(((total * 7) / 100));
                total = Number(total) + Number(vat_total);
                withholding_total = withholding.value > 0 ? Number(((total - vat_total) * withholding.value) / 100) : 0;
                total = Number(total - withholding_total);
            }
            price_vat.innerHTML = Number(vat_total).toLocaleString("en-US", {
                maximumFractionDigits: 2
            });
            price_withholding.innerHTML = Number(withholding_total).toLocaleString("en-US", {
                maximumFractionDigits: 2
            });
            price_amount.innerHTML = Number(total).toLocaleString("en-US", {
                maximumFractionDigits: 2
            });

            // change color
            if (vat.value > 0) {
                document.getElementById('tr-invoice').style.backgroundColor = '#960007ff';
                document.getElementById('tr-invoice-2').style.backgroundColor = '#ff3f49ff';
                document.getElementById('tr-invoice-3').style.backgroundColor = '#960007ff';
                document.getElementById('inv-amount').style.backgroundColor = '#960007ff';
            } else {
                document.getElementById('tr-invoice').style.backgroundColor = '#003285';
                document.getElementById('tr-invoice-2').style.backgroundColor = '#0060ff';
                document.getElementById('tr-invoice-3').style.backgroundColor = '#003285';
                document.getElementById('inv-amount').style.backgroundColor = '#003285';
            }
        }

        function check_diff_date(type) {
            var today = document.getElementById('today').value;
            var date_end = document.getElementById(type).value;
            const date1 = new Date(today);
            const date2 = new Date(date_end);
            const diffTime = date2.getTime() - date1.getTime();
            const diffDays = diffTime / (1000 * 60 * 60 * 24);
            var days = diffDays <= 0 ? '' : "อีก " + diffDays + " วัน";
            $('#diff_due_date').html(days);
        }

        function show_detail(office) {
            var selected = office.options[office.selectedIndex];

            document.getElementById('text-name').innerHTML = selected.getAttribute('data-name');
            document.getElementById('text-name-account').innerHTML = selected.getAttribute('data-name_account');
            document.getElementById('text-telephone').innerHTML = selected.getAttribute('data-telephone');
            document.getElementById('text-tat-license').innerHTML = selected.getAttribute('data-tat_license');
            document.getElementById('text-comp-address').innerHTML = selected.getAttribute('data-address');
        }

        function search_booking() {
            var search_agent = document.getElementById('search_agent_inv').value;
            var search_travel = document.getElementById('search_travel_inv').value;
            var bo_id = document.getElementById('bo_id').value;

            if (search_agent) {
                var formData = new FormData();
                formData.append('action', 'search');
                formData.append('page', 'edit');
                formData.append('search_agent', search_agent);
                formData.append('search_travel', search_travel);
                formData.append('bo_id', bo_id);
                $.ajax({
                    url: "pages/invoice/function/search-booking.php",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        if (response != false) {
                            $('#tbody-booking-form').html(response);
                        }
                    }
                });
            }
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

        function calculator_extra() {
            var $div = $('div[id^="div-extra-charge"]');
            for (let index = 0; index < $div.length; index++) {
                var total = 0;
                var adult = document.getElementsByName('extra-charge[' + index + '][adult]');
                var rate_adult = document.getElementsByName('extra-charge[' + index + '][rates_adult]');
                var child = document.getElementsByName('extra-charge[' + index + '][child]');
                var rate_child = document.getElementsByName('extra-charge[' + index + '][rates_child]');
                var rates_private = document.getElementsByName('extra-charge[' + index + '][rates_private]');

                total = Number((adult[0].value * rate_adult[0].value.replace(/,/g, '')) + (child[0].value * rate_child[0].value.replace(/,/g, '')));
                rates_private[0].value = numberWithCommas(Number(total));
            }
        }

        function calculator_amount() {
            var bo_id = $.parseJSON(document.getElementById('bo_id').value);
            for (let index = 0; index < bo_id.length; index++) {
                if (document.getElementById('adult' + bo_id[index]).dataset.type == 1) {
                    var adult = document.getElementById('adult' + bo_id[index]).value.replace(/,/g, '');
                    var child = document.getElementById('child' + bo_id[index]).value.replace(/,/g, '');
                    var rates_adult = document.getElementById('rates_adult' + bo_id[index]).value.replace(/,/g, '');
                    var rates_child = document.getElementById('rates_child' + bo_id[index]).value.replace(/,/g, '');
                    var rates_private = document.getElementById('rates_private' + bo_id[index]);
                    var total = 0;
                    total = (Number(adult) * Number(rates_adult)) + (Number(child) * Number(rates_child));
                    rates_private.value = numberWithCommas(Number(total));
                }
            }

            calculator_sum_pax();
        }

        function check_amount_preview(params, check) {
            var discount = document.getElementById('preview-discount');
            var cot = document.getElementById('preview-cot');

            if (params == 'discount') {
                if (discount.dataset['discount'] > 0) {
                    $('#i-discount').html('<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>');
                    discount.dataset['discount'] = 0;
                } else {
                    $('#i-discount').html('<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>');
                    discount.dataset['discount'] = 1;
                }
            }

            if (params == 'cot') {
                if (cot.dataset['cot'] > 0) {
                    $('#i-cot').html('<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>');
                    cot.dataset['cot'] = 0;
                } else {
                    $('#i-cot').html('<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>');
                    cot.dataset['cot'] = 1;
                }
            }

            var formData = new FormData();
            formData.append('action', params);
            formData.append('inv_id', $('#inv_id').val());
            formData.append('check', (params == 'discount') ? discount.dataset['discount'] : cot.dataset['cot']);
            $.ajax({
                url: "pages/invoice/function/check-preview.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    // console.log(response);
                }
            });

            calculator_amount_preview();
        }

        function calculator_amount_preview() {
            var discount = document.getElementById('preview-discount');
            var cot = document.getElementById('preview-cot');
            var amount = document.getElementById('preview-amount').value.replace(/,/g, '');
            var withholding = document.getElementById('preview-withholding');
            var vat = document.getElementById('preview-vat');
            var total = amount;

            total = (discount.dataset['discount'] == 1) ? Number(total - discount.value.replace(/,/g, '')) : Number(total);

            total = (cot.dataset['cot'] == 1) ? Number(total - cot.value.replace(/,/g, '')) : Number(total);

            if (vat.value == 1) {
                document.getElementById('text-amount').innerHTML = Number(total).toLocaleString("en-US", { // มูลค่าสุทธิรวม
                    maximumFractionDigits: 2
                });

                document.getElementById('pay-text-amount').innerHTML = Number(total).toLocaleString("en-US", { // มูลค่าสุทธิรวม -> รับชำระเงิน
                    maximumFractionDigits: 2
                });

                document.getElementById('pay-text-amount-2').innerHTML = Number(total).toLocaleString("en-US", { // จำนวนที่ต้องชำระ -> รับชำระเงิน
                    maximumFractionDigits: 2
                });

                document.getElementById('totel-net').value = Number(total).toLocaleString("en-US", {
                    maximumFractionDigits: 2
                });

                vat_total = Number(((total * 100) / 107));
                vat_cut = vat_total;
                vat_total = Number(total - vat_total);
                withholding_total = withholding.value > 0 ? Number((vat_cut * withholding.value) / 100) : 0;
                total = Number(total - withholding_total);

                document.getElementById('tax-included').innerHTML = Number(vat_cut).toLocaleString("en-US", { // ยอดรวมก่อนภาษี
                    maximumFractionDigits: 2
                });
            } else if (vat.value == 2) {
                document.getElementById('tax-included').innerHTML = Number(total).toLocaleString("en-US", { // ยอดรวมก่อนภาษี
                    maximumFractionDigits: 2
                });

                vat_total = Number(((total * 7) / 100));
                vat_cut = Number(total) + Number(vat_total);
                total = Number(total) + Number(vat_total);
                withholding_total = withholding.value > 0 ? Number(((total - vat_total) * withholding.value) / 100) : 0;
                total = Number(total - withholding_total);

                document.getElementById('totel-net').value = Number(vat_cut).toLocaleString("en-US", {
                    maximumFractionDigits: 2
                });

                document.getElementById('pay-text-amount').innerHTML = Number(vat_cut).toLocaleString("en-US", { // มูลค่าสุทธิรวม -> รับชำระเงิน
                    maximumFractionDigits: 2
                });

                document.getElementById('pay-text-amount-2').innerHTML = Number(vat_cut).toLocaleString("en-US", { // จำนวนที่ต้องชำระ -> รับชำระเงิน
                    maximumFractionDigits: 2
                });

                document.getElementById('text-amount').innerHTML = Number(vat_cut).toLocaleString("en-US", { // มูลค่าสุทธิรวม
                    maximumFractionDigits: 2
                });
            } else {
                document.getElementById('text-amount').innerHTML = Number(total).toLocaleString("en-US", { // มูลค่าสุทธิรวม
                    maximumFractionDigits: 2
                });

                document.getElementById('pay-text-amount').innerHTML = Number(total).toLocaleString("en-US", { // มูลค่าสุทธิรวม -> รับชำระเงิน
                    maximumFractionDigits: 2
                });

                document.getElementById('pay-text-amount-2').innerHTML = Number(total).toLocaleString("en-US", { // จำนวนที่ต้องชำระ -> รับชำระเงิน
                    maximumFractionDigits: 2
                });

                document.getElementById('totel-net').value = Number(total).toLocaleString("en-US", {
                    maximumFractionDigits: 2
                });
            }

            // console.log(total);

            if (vat.value != 0) {
                document.getElementById('text-vat').innerHTML = Number(vat_total).toLocaleString("en-US", {
                    maximumFractionDigits: 2
                });
            }

            if (withholding.value != 0) {
                if (vat.value == 0) {
                    withholding_total = withholding.value > 0 ? Number((total * withholding.value) / 100) : 0;
                }

                document.getElementById('text-withholding').innerHTML = Number(withholding_total).toLocaleString("en-US", {
                    maximumFractionDigits: 2
                });

                document.getElementById('text-withholding-2').innerHTML = Number(withholding_total).toLocaleString("en-US", {
                    maximumFractionDigits: 2
                });

            }

            document.getElementById('text-pay').innerHTML = Number(total).toLocaleString("en-US", {
                maximumFractionDigits: 2
            });

            document.getElementById('text-baht').innerHTML = '(' + bahtText(Number(total)) + ')';
        }

        function calculator_pomotion() {
            var adult = document.getElementById('pomo-adult');
            var child = document.getElementById('pomo-child');
            var rates_adult = document.getElementById('pomo-rates_adult');
            var rates_child = document.getElementById('pomo-rates_child');
            var rates_private = document.getElementById('pomo-rates_private');
            var total = 0;

            total = Number((adult.value * rates_adult.value.replace(/,/g, '')) + (child.value * rates_child.value.replace(/,/g, '')));
            rates_private.value = numberWithCommas(Number(total));
        }

        function bahtText(amount) {
            const [integer, fraction] = Math.abs(amount).toFixed(2).split('.');

            const baht = convert(integer);
            const satang = convert(fraction);

            let output = amount < 0 ? 'ติดลบ' : '';
            output += baht ? baht + 'บาท' : '';
            output += satang ? satang + 'สตางค์' : 'ถ้วน';

            return baht + satang === '' ? 'ศูนย์บาทถ้วน' : output;
        }

        function convert(number) {
            const values = ['', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า'];
            const places = ['', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน'];
            const exceptions = {
                'หนึ่งสิบ': 'สิบ',
                'สองสิบ': 'ยี่สิบ',
                'สิบหนึ่ง': 'สิบเอ็ด'
            };

            let output = '';

            for (let place = 0; place < number.length; place++) {
                const value = parseInt(number[number.length - place - 1]);

                if (place % 6 === 0 && place > 0) {
                    output = places[6] + output;
                }

                if (value !== 0) {
                    output = values[value] + places[place % 6] + output;
                }
            }

            Object.entries(exceptions).forEach(([search, replace]) => {
                output = output.split(search).join(replace);
            });

            return output;
        }

        function calculator_sum_pax() {
            var adult = document.getElementsByClassName('adult');
            var child = document.getElementsByClassName('child');
            var rates_adult = document.getElementsByClassName('rates_adult');
            var rates_child = document.getElementsByClassName('rates_child');
            var discount = document.getElementsByClassName('discount');
            var rates_private = document.getElementsByClassName('rates_private');
            var cot = document.getElementsByClassName('cot');
            var sum_adult = 0;
            var sum_child = 0;
            var sum_rates_adult = 0;
            var sum_rates_child = 0;
            var sum_discount = 0;
            var sum_rates_private = 0;
            var sum_cot = 0;

            if (adult.length > 0) {
                for (let index = 0; index < adult.length; index++) {
                    sum_adult = adult[index].value != '' ? Number(adult[index].value.replace(/,/g, '')) + Number(sum_adult) : sum_adult;
                    sum_child = child[index].value != '' ? Number(child[index].value.replace(/,/g, '')) + Number(sum_child) : sum_child;
                    sum_rates_adult = rates_adult[index] !== undefined ? Number(rates_adult[index].value.replace(/,/g, '')) + Number(sum_rates_adult) : sum_rates_adult;
                    sum_rates_child = rates_child[index] !== undefined ? Number(rates_child[index].value.replace(/,/g, '')) + Number(sum_rates_child) : sum_rates_child;
                    sum_discount = discount[index].value != '' ? Number(discount[index].value.replace(/,/g, '')) + Number(sum_discount) : sum_discount;
                    sum_rates_private = rates_private[index].value != '' ? Number(rates_private[index].value.replace(/,/g, '')) + Number(sum_rates_private) : sum_rates_private;
                    sum_cot = cot[index].value != '' ? Number(cot[index].value.replace(/,/g, '')) + Number(sum_cot) : sum_cot;
                }
            }

            document.getElementById('text-adult').innerHTML = sum_adult;
            document.getElementById('text-child').innerHTML = sum_child;
            document.getElementById('text-rates_adult').innerHTML = numberWithCommas(sum_rates_adult);
            document.getElementById('text-rates_child').innerHTML = numberWithCommas(sum_rates_child);
            document.getElementById('text-discount').innerHTML = numberWithCommas(sum_discount);
            document.getElementById('text-rates_private').innerHTML = numberWithCommas(sum_rates_private);
            document.getElementById('text-cot').innerHTML = numberWithCommas(sum_cot);
        }

        function input_net_price(product_id) {
            if (product_id) {
                for (let index = 0; index < product_id.length; index++) {
                    var KA = document.getElementsByClassName('KA' + product_id[index]);
                    var PA = document.getElementsByClassName('PA' + product_id[index]);
                    var NA = document.getElementsByClassName('NA' + product_id[index]);
                    if (KA) {
                        for (let i = 0; i < KA.length; i++) {
                            document.getElementsByClassName('KA' + product_id[index])[i].value = document.getElementById('KA' + product_id[index]).value
                            document.getElementsByClassName('KC' + product_id[index])[i].value = document.getElementById('KC' + product_id[index]).value
                        }
                    }
                    if (PA) {
                        for (let i = 0; i < PA.length; i++) {
                            document.getElementsByClassName('PA' + product_id[index])[i].value = document.getElementById('PA' + product_id[index])?.value
                            document.getElementsByClassName('PC' + product_id[index])[i].value = document.getElementById('PC' + product_id[index])?.value
                        }
                    }
                    if (NA) {
                        for (let i = 0; i < NA.length; i++) {
                            document.getElementsByClassName('NA' + product_id[index])[i].value = document.getElementById('NA' + product_id[index]).value
                            document.getElementsByClassName('NC' + product_id[index])[i].value = document.getElementById('NC' + product_id[index]).value
                        }
                    }
                }
            }

            calculator_amount();

            if (product_id) {
                for (let index = 0; index < product_id.length; index++) {
                    var PP = document.getElementsByClassName('PP' + product_id[index]);
                    var PK = document.getElementsByClassName('PK' + product_id[index]);
                    var PN = document.getElementsByClassName('PN' + product_id[index]);
                    if (PK || PP || PN) {
                        for (let i = 0; i < (Math.max(PK.length, PP.length, PN.length)); i++) {
                            if (document.getElementsByClassName('PK' + product_id[index])[i] !== undefined) {
                                document.getElementsByClassName('PK' + product_id[index])[i].value = document.getElementById('PK' + product_id[index]).value;
                            }
                            if (document.getElementsByClassName('PP' + product_id[index])[i] !== undefined) {
                                document.getElementsByClassName('PP' + product_id[index])[i].value = document.getElementById('PP' + product_id[index]).value;
                            }
                            if (document.getElementsByClassName('PN' + product_id[index])[i] !== undefined) {
                                document.getElementsByClassName('PN' + product_id[index])[i].value = document.getElementById('PN' + product_id[index]).value;
                            }
                        }
                    }
                }
            }
            // calculator_amount_preview();
            // calculator_sum_pax();
        }

        // Payment Options Script
        // --------------------------------------------------------------------
        function check_payment() {
            var payments_type = document.getElementById('payments_type').value;
            document.getElementById('div-bank-account').hidden = payments_type == 4 ? false : true;
            document.getElementById('div-bank').hidden = payments_type == 5 ? false : true;
            document.getElementById('div-check-no').hidden = payments_type == 5 ? false : true;
            document.getElementById('div-check-date').hidden = payments_type == 5 ? false : true;
        }

        function modal_payment_options(rec_id, inv_id, withholding, invoice_no, date_payment, vat_id) {
            var formData = new FormData();
            formData.append('action', 'div');
            formData.append('inv_id', inv_id);
            formData.append('invoice_no', invoice_no);
            formData.append('withholding', withholding);
            formData.append('rec_id', rec_id);
            formData.append('date_payment', date_payment);
            formData.append('vat_id', vat_id);
            $.ajax({
                url: "pages/invoice/function/payment-options.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    $('#div-payment-options').html(response);

                    $('.payment-options-repeater').repeater({
                        initEmpty: false,
                        show: function() {
                            $(this).slideDown();

                            $(this).find('[data-payment-repeater="select2"]').select2();

                            $(this).find('[data-payment-repeater="datepicker"]').flatpickr({
                                static: true,
                                altInput: true,
                                altFormat: 'j F Y',
                                dateFormat: 'Y-m-d'
                            });

                            $('.numeral-mask').toArray().forEach(function(field) {
                                new Cleave(field, {
                                    numeral: true,
                                    numeralThousandsGroupStyle: 'thousand'
                                });
                            });

                            // Feather Icons
                            if (feather) {
                                feather.replace({
                                    width: 14,
                                    height: 14
                                });
                            }
                        },
                        hide: function(deleteElement) {
                            $(this).slideUp(deleteElement);
                        },
                        ready: function() {
                            // Init select2
                            $('[data-payment-repeater="select2"]').select2();

                            $('[data-payment-repeater="datepicker"]').flatpickr({
                                static: true,
                                altInput: true,
                                altFormat: 'j F Y',
                                dateFormat: 'Y-m-d'
                            });
                        },
                        isFirstItemUndeletable: false
                    });

                    $('#date_payment').flatpickr({
                        static: true,
                        altInput: true,
                        altFormat: 'j F Y',
                        dateFormat: 'Y-m-d'
                    });

                    $('#a-div-image').click(function() {
                        var div = document.getElementById('div-image');
                        div.hidden = div.hidden == true ? false : true;
                    });

                    $('.numeral-mask').toArray().forEach(function(field) {
                        new Cleave(field, {
                            numeral: true,
                            numeralThousandsGroupStyle: 'thousand'
                        });
                    });

                    var cot = document.getElementById('preview-cot');
                    var total = document.getElementById('text-pay').innerHTML;
                    document.getElementById('text-modal-amount').innerHTML = numberWithCommas($('#pay-amount').val());
                    document.getElementById('text-amount-withholding').innerHTML = total + ' บาท';
                    total = (cot.dataset['cot'] == 1) ? Number(total.replace(/,/g, '')) + Number(cot.value.replace(/,/g, '')) : Number(total.replace(/,/g, ''));

                    if (rec_id == 0) {
                        document.getElementsByName('payment-options[0][amount_received]')[0].value = Number(total).toLocaleString("en-US", {
                            maximumFractionDigits: 2
                        });;
                    }

                    calculator_payment_withholding();
                }
            });

        }

        function change_pay_option(select) {
            var div_cash_cheque = document.getElementsByName(select.name.replace('[bank_account]', '[div-cash-cheque]'));
            if (select.value == 'cash_cheque') {
                div_cash_cheque[0].hidden = false;
            } else {
                div_cash_cheque[0].hidden = true;
            }
        }

        function calculator_payment_withholding() {
            var withholding = document.getElementById('payment_withholding').value.replace(/,/g, '');
            var totel_net = document.getElementById('tax-included').innerHTML.replace(/,/g, '');
            // var totel_net_2 = document.getElementById('totel-net').value.replace(/,/g, '');
            if (totel_net == '') {
                totel_net = document.getElementById('text-amount').innerHTML.replace(/,/g, '');
            }
            var withholding_total = withholding > 0 ? Number((totel_net * withholding) / 100) : 0;

            document.getElementById('text-withholding-3').innerHTML = Number(withholding_total).toLocaleString("en-US", {
                maximumFractionDigits: 2
            }) + ' บาท';

            document.getElementById('text-withholding-4').innerHTML = Number(withholding_total).toLocaleString("en-US", {
                maximumFractionDigits: 2
            });

            calculator_amount_received();
        }

        function calculator_amount_received() {
            var amount = 0;
            var amount_received = document.getElementsByClassName('amount_received');
            var withholding = document.getElementById('text-withholding-4').innerHTML.replace(/,/g, '');
            for (let index = 0; index < amount_received.length; index++) {
                if (amount_received[index].value !== '') {
                    amount = Number(amount) + Number(amount_received[index].value.replace(/,/g, ''));
                }
            }
            document.getElementById('text-amount-withholding').innerHTML = Number(amount).toLocaleString("en-US", {
                maximumFractionDigits: 2
            }) + ' บาท';
            amount = withholding > 0 ? Number(amount) + Number(withholding) : amount;
            document.getElementById('payment_amount').value = Number(amount).toLocaleString("en-US", {
                maximumFractionDigits: 2
            });
        }

        function calculator_payment() {
            var amount_pay = document.getElementById('amount_pay').value;
            var totel_net = document.getElementById('totel-net').value.replace(/,/g, '');
            var withholding = document.getElementById('text-withholding-2').innerHTML.replace(/,/g, '');
            var status_text = 0;
            if (amount_pay > 0) {

                document.getElementById('pay-amount').value = Number(totel_net - (Number(amount_pay) + Number(withholding))).toLocaleString("en-US", {
                    maximumFractionDigits: 2
                });

                document.getElementById('pay-text-all').innerHTML = Number(amount_pay).toLocaleString("en-US", {
                    maximumFractionDigits: 2
                });
                status_text = (document.getElementById('pay-amount').value <= 0) ? 1 : 2;
            } else {

                document.getElementById('pay-amount').value = Number(totel_net).toLocaleString("en-US", {
                    maximumFractionDigits: 2
                });
                document.getElementById('pay-text-all').innerHTML = '00.00';
                status_text = 2;
            }

            var today = document.getElementById('today').value;
            var date_end = document.getElementById('date_end').value;
            const date1 = new Date(today);
            const date2 = new Date(date_end);
            const diffTime = date2.getTime() - date1.getTime();
            const diffDays = diffTime / (1000 * 60 * 60 * 24);
            status_text = (diffDays > 0 || status_text == 1) ? status_text : 3;

            document.getElementById('status-payment').innerHTML = status_text != 1 ? status_text != 3 ? '<span class="badge badge-info">รอชำระเงิน</span>' : '<span class="badge badge-danger">เกินกำหนดชำระ</span>' : '<span class="badge badge-success">ชำระเงินแล้ว</span>';
        }

        function delete_payment(rec_id, inv_id) {
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
                        url: "pages/invoice/function/delete-receipt.php",
                        type: "POST",
                        data: {
                            rec_id: rec_id,
                            inv_id: inv_id,
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
                                    // location.href = "<?php echo $_SERVER['REQUEST_URI']; ?>";
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

        function show_image(image) {
            document.getElementById('img-modal').src = image;
        }

        function success_payment() {
            var pay_amount = Number($('#pay-amount').val().replace(/,/g, ''));
            var success = ''
            <?php // echo $inv_success; 
            ?>;
            // console.log(pay_amount);
            if (pay_amount <= 0 && success == 0) {
                // console.log('update : success = 1');
                var formData = new FormData();
                formData.append('action', 'edit');
                formData.append('id', <?php echo $inv_id; ?>);
                formData.append('success', 1);
                $.ajax({
                    url: "pages/invoice/function/edit-success.php",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        // console.log(response);
                    }
                });
            } else if (Number(pay_amount) > 0 && success != 0) {
                // console.log('update : success = 0');
                var formData = new FormData();
                formData.append('action', 'edit');
                formData.append('id', <?php echo $inv_id; ?>);
                formData.append('success', 0);
                $.ajax({
                    url: "pages/invoice/function/edit-success.php",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        // console.log(response);
                    }
                });
            }
        }

        function togglePreview() {
            var checked = document.querySelector('input[name="preview"]:checked');
            document.getElementById("invoice-preview").hidden = checked.value == 1 ? false : true;
            if (document.getElementById('rec_id').value > 0) {
                document.getElementById("receipt-preview").hidden = checked.value == 2 ? false : true;
            }
        }

        document.getElementById('btnCopy').addEventListener('click', async () => {
            const checked = document.querySelector('input[name="preview"]:checked');
            const target = (checked.value == 1) ? document.getElementById('invoice-preview') : document.getElementById('receipt-preview');

            const canvas = await html2canvas(target, {
                scale: 2, // คม
                backgroundColor: '#fff',
                useCORS: true
            });

            canvas.toBlob(async (blob) => {
                try {
                    await navigator.clipboard.write([
                        new ClipboardItem({
                            'image/png': blob
                        })
                    ]);

                    // alert('📋 Copy Voucher แล้ว! วางได้เลย (Ctrl+V)');
                } catch (err) {
                    // alert('❌ Browser ไม่รองรับ Clipboard Image');
                }
            });
        });
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