<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="<?php echo $main_description; ?>">
    <meta name="keywords" content="<?php echo $main_keywords; ?>">
    <meta name="author" content="<?php echo $main_author; ?>">
    <title>Management Transfer - <?php echo $main_title; ?></title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/dragula.min.css">
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
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-user.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-wizard.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-drag-drop.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/fontawesome/css/all.css" rel="stylesheet">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

    <style>
        .list-group-flush>.list-group-item {
            border-width: 0;
        }

        .list-group-item {
            padding: 0;
        }

        .table th,
        .table td {
            padding: 0.72rem 1rem;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #6E6B7B;
        }

        .table thead th {
            border-bottom: 1px solid #6E6B7B;
        }

        /* ปรับแต่ง Scrollbar ของตารางให้ดูสะอาดตา */
        .table-waiting-pool {
            max-height: 60vh;
            overflow-y: auto;
        }

        /* เส้นคั่นแบ่ง AI Suggestion */
        .ai-divider-row td {
            background-color: #f0fdf4 !important;
            /* สีเขียวอ่อนๆ */
            color: #166534;
            font-weight: 600;
            text-align: center;
            border-top: 2px dashed #22c55e !important;
            border-bottom: 2px dashed #22c55e !important;
            padding: 5px !important;
        }

        /* กล่องสรุปยอดด้านขวา */
        .van-builder-panel {
            background-color: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        /* ตัวเลขจำนวนคน */
        .pax-counter-text {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
        }

        .selected-booking-item {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 8px 12px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }
    </style>
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
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="app-assets/js/scripts/node_modules/dom-to-image/src/dom-to-image.js"></script>
    <script src="app-assets/fonts/fontawesome/js/all.js"></script>
    <script src="app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <script src="app-assets/vendors/js/extensions/dragula.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN Sweetalert2 JS -->
    <script src="app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END Sweetalert2 JS -->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script src="app-assets/js/scripts/header.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script type="text/javascript">
        $(document).ready(function() {
            var jqFormTransfer = $('#transfer-form'),
                jqFormDriver = $('#driver-car-search-form'),
                FormEdTransfer = $('#edit-manage-form'),
                picker = $('#dob'),
                DatePicker = $('.date-picker'),
                dtPicker = $('#dob-bootstrap-val'),
                select = $('.select2'),
                horizontalWizard = document.querySelector('.horizontal-wizard-example');

            // dragula([document.getElementById('basic-list-group')]);


            //Numeral
            $('.numeral-mask').toArray().forEach(function(field) {
                new Cleave(field, {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand'
                });
            });

            // Time
            $('.time-mask').toArray().forEach(function(field) {
                new Cleave(field, {
                    time: true,
                    timePattern: ['h', 'm']
                });
            });

            if (DatePicker.length) {
                DatePicker.flatpickr({
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

            // select2
            if (select.length) {
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
            }

            if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
                var horizontaStepper = new Stepper(horizontalWizard, {
                    linear: false
                });
                $(horizontalWizard)
                    .find('.btn-next')
                    .on('click', function() {
                        horizontaStepper.next();
                    });
                $(horizontalWizard)
                    .find('.btn-prev')
                    .on('click', function() {
                        horizontaStepper.previous();
                    });

                $(horizontalWizard)

            }

            // Picker
            if (picker.length) {
                picker.flatpickr({
                    onReady: function(selectedDates, dateStr, instance) {
                        if (instance.isMobile) {
                            $(instance.mobileInput).attr('step', null);
                        }
                    }
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

            // Ajax Search
            // --------------------------------------------------------------------
            FormEdTransfer.on("submit", function(e) {
                var serializedData = $(this).serialize();
                $.blockUI({
                    message: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>',
                    css: {
                        backgroundColor: 'transparent',
                        border: '0'
                    },
                    overlayCSS: {
                        opacity: 0.8
                    }
                });
                $.ajax({
                    url: "pages/manage-driver/function/edit-manage-transfer.php",
                    type: "POST",
                    data: serializedData,
                    success: function(response) {
                        // console.log(response);
                        if (response != false && response > 0) {
                            location.reload(); // refresh page
                        } else {
                            Swal.fire({
                                title: "Please try again.",
                                icon: "error",
                            });
                        }
                    },
                    error: function() {
                        console.log('Plases contact admininstator!');
                    },
                    complete: function() {
                        $.unblockUI();
                    }
                });
                e.preventDefault();
            });

            if (jqFormTransfer.length) {
                $.validator.addMethod("regex", function(value, element, regexp) {
                    return this.optional(element) || regexp.test(value);
                }, "Please check your input.");

                $.validator.addMethod("requireOne", function(value, element) {
                    let driver = $('select[name="driver"]').val();
                    let car = $('select[name="car"]').val();
                    return (driver && driver !== "" && driver > 0) || (car && car !== "" && car > 0);
                }, "กรุณาเลือก Driver หรือ Car อย่างน้อยหนึ่งอย่าง");

                jqFormTransfer.validate({
                    rules: {
                        'product_id': {
                            required: true
                        },
                        'driver': {
                            requireOne: true
                        },
                        'car': {
                            requireOne: true
                        }
                    },
                    messages: {
                        'product_id': {
                            remote: "This name is already taken! Try another."
                        },
                    },
                    submitHandler: function(form) {

                        $.blockUI({
                            message: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>',
                            css: {
                                backgroundColor: 'transparent',
                                border: '0'
                            },
                            overlayCSS: {
                                opacity: 0.8
                            }
                        });

                        var action = ($('#manage_id').val() !== '' && $('#manage_id').val() > 0) ? 'edit' : 'create';

                        // update ajax request data
                        var formData = new FormData(form);
                        formData.append('action', action);
                        formData.append('travel_date', $('#search_travel_date').val());
                        $.ajax({
                            url: "pages/manage-driver/function/" + action + "-transfer.php",
                            type: "POST",
                            processData: false,
                            contentType: false,
                            data: formData,
                            success: function(response) {
                                // console.log(response);
                                if (response != false && response > 0) {
                                    location.reload();
                                } else {
                                    Swal.fire({
                                        title: "Please try again.",
                                        icon: "error",
                                    });
                                }
                            },
                            error: function() {
                                console.log('Plases contact admininstator!');
                            },
                            complete: function() {
                                $.unblockUI();
                            }
                        });
                    }
                });
            }

            search_start_date('today', '<?php echo $today; ?>');
            search_start_date('tomorrow', '<?php echo $tomorrow; ?>');
            search_start_date('custom', '<?php echo $get_date; ?>');
        });

        function search_start_date(type, date) {
            var formData = new FormData();
            formData.append('action', 'search');
            formData.append('type', type);
            formData.append('date', date);
            $.ajax({
                url: "pages/manage-driver/function/search-report.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    if (response != 'false') {
                        $('#' + type).html(response);
                    }
                }
            });
        }

        function checkbox(type, programe_id) {
            var checkbox_all = type == 'booking' ? document.getElementById('checkbo_all' + programe_id).checked : document.getElementById('checkmanage_all').checked;
            var checkbox = type == 'booking' ? document.getElementsByClassName('checkbox-' + programe_id) : document.getElementsByClassName('checkbox-manage');

            if (checkbox_all == true && checkbox.length > 0) {
                for (let index = 0; index < checkbox.length; index++) {
                    checkbox[index].checked = true;
                }
            } else if (checkbox_all == false && checkbox.length > 0) {
                for (let index = 0; index < checkbox.length; index++) {
                    checkbox[index].checked = false;
                }
            }

            sum_checkbox();
        }

        function sum_checkbox() {
            var bookings = document.getElementsByClassName('checkbox-book');
            var manage = document.getElementsByClassName('checkbox-manage');
            var sum_true = 0;
            var sum_false = 0;
            var sum_toc_true = 0;
            var sum_toc_false = 0;
            var toc = 0;
            if (bookings.length > 0) {
                for (let index = 0; index < bookings.length; index++) {
                    toc = document.getElementById('toc-bookings' + bookings[index].value).innerHTML;
                    if (bookings[index].checked == true) {
                        sum_true = Number(sum_true + 1);
                        sum_toc_true = Number(sum_toc_true) + Number(toc);
                    } else {
                        sum_false = Number(sum_false + 1);
                        sum_toc_false = Number(sum_toc_false) + Number(toc);
                    }
                }
            }
            if (manage.length > 0) {
                for (let index = 0; index < manage.length; index++) {
                    toc = document.getElementById('toc-manage' + manage[index].dataset.manage).innerHTML;
                    if (manage[index].checked == true) {
                        sum_true = Number(sum_true + 1);
                        sum_toc_true = Number(sum_toc_true) + Number(toc);
                    } else {
                        sum_false = Number(sum_false + 1);
                        sum_toc_false = Number(sum_toc_false) + Number(toc);
                    }
                }
            }
            document.getElementById('booking-true').innerHTML = sum_true;
            document.getElementById('booking-false').innerHTML = sum_false;
            document.getElementById('toc-true').innerHTML = sum_toc_true;
            document.getElementById('toc-false').innerHTML = sum_toc_false;
        }

        function modal_transfer(travel_date, manage_id, i, type) {
            document.getElementById('text-travel-date').innerHTML = '<b>' + travel_date + '</b>';
            if (manage_id > 0) {
                var arr_mange = document.getElementById('arr_mange' + manage_id).value;
                var res = $.parseJSON(arr_mange);

                document.getElementById('manage_id').value = res.id[i];
                document.getElementById('car').value = res.car_id[i];
                document.getElementById('product_id').value = res.product[i];
                document.getElementById('driver').value = res.driver_id[i];
                document.getElementById('seat').value = res.seat[i];
                document.getElementById('license').value = res.license[i];
                document.getElementById('telephone').value = res.telephone[i];
                document.getElementById('note').value = res.note[i];
                document.getElementById('outside_driver').value = res.driver_id[i] == 0 ? res.driver_name[i] : '';

                $("#product_id").val(res.product[i]).trigger("change");
                $("#car").val(res.car_id[i]).trigger("change");
                $("#driver").val(res.driver_id[i]).trigger("change");
                $("#seat").val(res.seat[i]).trigger("change");

                document.getElementById('delete_manage').disabled = false;
            } else {
                $("#driver").val(0).trigger("change");
                $("#car").val(0).trigger("change");
                $("#seat").val(0).trigger("change");
                document.getElementById('delete_manage').disabled = true;
                document.getElementById('transfer-form').reset();
            }
        }

        function check_outside(type) {
            if (type == 'driver') {
                var driver = document.getElementById('driver').value
                document.getElementById('frm-driver').hidden = driver == 'outside' ? true : false;
                document.getElementById('frm-driver-outside').hidden = driver == 'outside' ? false : true;
            } else if (typeof type !== undefined && type == 'outside_driver') {
                document.getElementById('frm-driver-outside').hidden = true;
                document.getElementById('frm-driver').hidden = false;
            }
            if (type == 'car') {
                var car = document.getElementById('car').value
                document.getElementById('frm-car').hidden = car == 'outside' ? true : false;
                document.getElementById('frm-car-outside').hidden = car == 'outside' ? false : true;
            } else if (typeof type !== undefined && type == 'outside_car') {
                document.getElementById('frm-car-outside').hidden = true;
                document.getElementById('frm-car').hidden = false;
            }
            if (type == 'guide') {
                var guide = document.getElementById('guide').value
                document.getElementById('frm-guide').hidden = guide == 'outside' ? true : false;
                document.getElementById('frm-guide-outside').hidden = guide == 'outside' ? false : true;
            }
        }

        function check_driver() {
            var driver = document.getElementById('driver');

            document.getElementById('frm-driver').hidden = driver.value == 'outside' ? true : false;
            document.getElementById('frm-driver-outside').hidden = driver.value == 'outside' ? false : true;

            if (driver.value !== 'outside') {
                document.getElementById('license').value = driver.options[driver.selectedIndex].getAttribute("data-license");
                document.getElementById('seat').value = driver.options[driver.selectedIndex].getAttribute("data-seat");
                document.getElementById('telephone').value = driver.options[driver.selectedIndex].getAttribute("data-telephone");
                if (driver.options[driver.selectedIndex].getAttribute("data-seat") > 0) {
                    $("#seat").val(driver.options[driver.selectedIndex].getAttribute("data-seat")).trigger("change");
                }
            }
        }

        function search_booking(travel_date, retrun, manage_id, product, product_name, driver, car, seat) {
            // get data
            var formData = new FormData();
            formData.append('action', 'search');
            formData.append('travel_date', String(travel_date));
            formData.append('return', retrun);
            formData.append('manage_id', manage_id);
            formData.append('product_id', product);
            formData.append('product_name', product_name);
            formData.append('driver', driver);
            formData.append('car', car);
            formData.append('seat', seat);
            $.ajax({
                url: "pages/manage-driver/function/search-manage-booking.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    $('#div-manage-boooking').html(response);
                    sum_checkbox();

                    var tbody = document.querySelector('#list-group tbody');
                    // สร้าง Dragula instance
                    if (tbody) {
                        dragula([tbody], {
                            moves: function(el, container, handle) {
                                return handle.tagName.toLowerCase() === 'td'; // กำหนดให้ลากได้เฉพาะที่ td
                            }
                        }).on('drop', function(el, target, source, sibling) {
                            // console.log('Dropped element:', el);
                        });
                    }

                }
            });
        }

        function submit_booking_manage(t_return, manage_id) {
            var bt_id = document.getElementsByName('bt_id[]');
            var bomange = (document.getElementsByName('bomange[]')) ? document.getElementsByName('bomange[]') : '';
            var before = (document.getElementById('before_bomange')) ? document.getElementById('before_bomange') : '';
            var adult = [];
            var child = [];
            var infant = [];
            var foc = [];
            var transfer = [];
            var bomange_arr = [];
            if (bt_id) {
                for (let index = 0; index < bt_id.length; index++) {
                    if (bt_id[index].checked == true) {
                        transfer.push(bt_id[index].value);
                        adult.push(Number(document.getElementById('adult-bookings' + bt_id[index].value).innerHTML));
                        child.push(Number(document.getElementById('child-bookings' + bt_id[index].value).innerHTML));
                        infant.push(Number(document.getElementById('infant-bookings' + bt_id[index].value).innerHTML));
                        foc.push(Number(document.getElementById('foc-bookings' + bt_id[index].value).innerHTML));
                    }
                }
            }
            if (bomange) {
                for (let index = 0; index < bomange.length; index++) {
                    if (bomange[index].checked == true) {
                        bomange_arr.push(bomange[index].value);
                    }
                }
            }

            if (manage_id > 0) {
                $.blockUI({
                    message: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>',
                    css: {
                        backgroundColor: 'transparent',
                        border: '0'
                    },
                    overlayCSS: {
                        opacity: 0.8
                    }
                });
                var formData = new FormData();
                formData.append('action', 'create');
                formData.append('manage_id', manage_id);
                formData.append('return', t_return);
                formData.append('transfer', JSON.stringify(transfer));
                formData.append('adult', JSON.stringify(adult));
                formData.append('child', JSON.stringify(child));
                formData.append('infant', JSON.stringify(infant));
                formData.append('foc', JSON.stringify(foc));
                formData.append('bomange', JSON.stringify(bomange_arr));
                formData.append('before', before.value);
                $.ajax({
                    url: "pages/manage-driver/function/create_booking_manage.php",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        // console.log(response);
                        if (response != false && response > 0) {
                            location.reload();
                        } else {
                            Swal.fire({
                                title: "Please try again.",
                                icon: "error",
                            });
                        }
                    },
                    error: function() {
                        console.log('Plases contact admininstator!');
                    },
                    complete: function() {
                        $.unblockUI();
                    }
                });
            } else {
                Swal.fire({
                    title: "Please try again.",
                    icon: "error",
                });
            }
        }

        function modal_manage_transfer(type, bt_id, product_id, adult, child, infant, foc, mange_id, type_id) {
            var array_trans = document.getElementById('array_trans').value;

            document.getElementById('edit_bt_id').value = typeof bt_id !== undefined ? bt_id : 0;
            document.getElementById('adult').value = typeof adult !== undefined ? adult : 0;
            document.getElementById('child').value = typeof child !== undefined ? child : 0;
            document.getElementById('infant').value = typeof infant !== undefined ? infant : 0;
            document.getElementById('foc').value = typeof foc !== undefined ? foc : 0;
            document.getElementById('brfore_manage_id').value = typeof mange_id !== undefined ? mange_id : 0;
            document.getElementById('type').value = typeof type !== undefined ? type : 0;
            document.getElementById('type_id').value = typeof type_id !== undefined ? type_id : 0;

            if (array_trans !== '') {
                $('#edit_manage').find('option').remove();
                $('#edit_manage').append("<option value=\"\">กรุญาเลือกรถ...</option>");
                var res = $.parseJSON(array_trans);
                var count = Object.keys(res.id).length;
                if (count) {
                    for (let index = 0; index < count; index++) {
                        if (res.product[index] == product_id) {
                            var car_driver = (res.car[index] != '') ? res.car[index] : res.driver_name[index];
                            car_driver = (car_driver == '') ? res.car_name[index] : car_driver;
                            selected = (mange_id !== undefined && res.id[index] == mange_id) ? 'selected' : '';
                            $('#edit_manage').append("<option value=\"" + res.id[index] + "\" " + selected + ">" + car_driver + "</option>");
                        }
                    }
                }
                $('#edit_manage').append("<option value=\"0\" >ไม่มีการจัดรถ</option>");
            } else {
                $('#edit_manage').find('option').remove();
                $('#edit_manage').append("<option value=\"\">กรุญาเลือกรถ...</option>");
            }
        }

        function delete_transfer() {
            var manage_id = document.getElementById('manage_id');
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

                    $.blockUI({
                        message: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>',
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            opacity: 0.8
                        }
                    });

                    $.ajax({
                        url: "pages/manage-driver/function/delete-manage.php",
                        type: "POST",
                        data: {
                            manage_id: manage_id.value,
                            return: $('#return').val(),
                            action: 'delete'
                        },
                        success: function(response) {
                            // console.log(response);
                            if (response != false) {
                                location.reload();
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
                        },
                        complete: function() {
                            $.unblockUI();
                        }
                    });
                }
            });
        }

        function download_image() {
            var img_name = document.getElementById('name_img').value;
            var node = document.getElementById('div-driver-job-image');
            domtoimage.toJpeg(node, {
                    quality: 0.95
                })
                .then(function(dataUrl) {
                    var link = document.createElement('a');
                    link.download = img_name + '.jpg';
                    link.href = dataUrl;
                    link.click();
                });
        }

        // ==========================================
        // 🪄 ฟังก์ชันจัดรถอัตโนมัติ (Auto Assign)
        // ==========================================
        function auto_assign_transfer(travel_date) {
            Swal.fire({
                title: 'ยืนยันการจัดรถอัตโนมัติ?',
                text: "ระบบจะสร้างรถเปล่าขนาด 12 ที่นั่ง และจัดกลุ่ม Booking (ขาไป) ตามโปรแกรมและโซนให้โดยอัตโนมัติ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, จัดเลย!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    $.blockUI({
                        message: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div><br><span class="text-primary font-weight-bold mt-1 d-block">AI กำลังจัดรถให้คุณ...</span>',
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            opacity: 0.8
                        }
                    });

                    $.ajax({
                        url: "pages/manage-driver/function/auto-assign.php",
                        type: "POST",
                        data: {
                            travel_date: travel_date,
                            action: 'auto_assign'
                        },
                        success: function(response) {
                            console.log(response);
                            // if (response !== 'false' && response !== false) {
                            //     Swal.fire({
                            //         icon: 'success',
                            //         title: 'จัดรถสำเร็จ!',
                            //         text: 'ระบบจัดกลุ่มรถให้คุณเรียบร้อยแล้ว',
                            //         customClass: {
                            //             confirmButton: 'btn btn-success'
                            //         }
                            //     }).then(() => {
                            //         location.reload();
                            //     });
                            // } else {
                            //     Swal.fire({
                            //         icon: 'info',
                            //         title: 'ไม่มีรายการอัปเดต',
                            //         text: 'ไม่มี Booking ที่รอจัดรถในโซนนี้ หรือจัดรถครบหมดแล้ว',
                            //         customClass: {
                            //             confirmButton: 'btn btn-info'
                            //         }
                            //     });
                            // }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'เกิดข้อผิดพลาดจากเซิร์ฟเวอร์!'
                            });
                        },
                        complete: function() {
                            $.unblockUI();
                        }
                    });
                }
            });
        }

        // ==========================================
        // 🗑️ ฟังก์ชันยกเลิกรถทั้งหมด (Reset All)
        // ==========================================
        function cancel_all_transfer(travel_date) {
            Swal.fire({
                title: 'ยืนยันการยกเลิกรถทั้งหมด?',
                text: "รถทุกคันในวันที่ " + travel_date + " จะถูกลบทิ้ง และ Booking จะกลับไปอยู่สถานะ 'รอจัดรถ' (ข้อมูลนี้ไม่สามารถกู้คืนได้)",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, ล้างไพ่เลย!',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-outline-secondary ml-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    $.blockUI({
                        message: '<div class="spinner-border text-danger" role="status"><span class="sr-only">Loading...</span></div><br><span class="text-danger font-weight-bold mt-1 d-block">กำลังล้างข้อมูลจัดรถ...</span>',
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            opacity: 0.8
                        }
                    });

                    $.ajax({
                        url: "pages/manage-driver/function/cancel-all-manage.php",
                        type: "POST",
                        data: {
                            travel_date: travel_date,
                            action: 'cancel_all'
                        },
                        success: function(response) {
                            if (response === 'true') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'เคลียร์ข้อมูลสำเร็จ!',
                                    text: 'ระบบได้ลบรถทั้งหมดในวันนี้เรียบร้อยแล้ว',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'เกิดข้อผิดพลาด!',
                                    text: 'ไม่สามารถยกเลิกรถได้ กรุณาลองใหม่'
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'ติดต่อเซิร์ฟเวอร์ไม่ได้!'
                            });
                        },
                        complete: function() {
                            $.unblockUI();
                        }
                    });
                }
            });
        }

        // ==========================================
        // 🧠 TOURMATE LOGISTICS CENTER (VAN BUILDER)
        // ==========================================

        // ตัวแปรส่วนกลางสำหรับเก็บ State ของหน้าจอ
        let masterPoolData = []; // 🌟 เก็บของแท้ห้ามแก้
        let waitingPoolData = []; // ข้อมูลที่โดนตัดแบ่งแล้ว (เอาไปโชว์ในตาราง)
        let maxVanCapacity = 12;

        $(document).ready(function() {

            // 1. กดปุ่มดึงข้อมูลจริงจากระบบ
            $('#btn-fetch-pool').on('click', function() {
                // let travelDate = $('#logistics-date').val();
                let travelDate = $('#search_travel_date').val();
                let productIds = $('#logistics-programs').val();

                if (!productIds || productIds.length === 0) {
                    Swal.fire('แจ้งเตือน', 'กรุณาเลือกโปรแกรมทัวร์อย่างน้อย 1 โปรแกรม', 'warning');
                    return;
                }

                $.blockUI({
                    message: 'กำลังค้นหาพิกัดและเส้นทาง...'
                });

                $.ajax({
                    url: "pages/manage-driver/function/get-unassigned-json.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        travel_date: travelDate,
                        product_ids: productIds
                    },
                    success: function(res) {

                        console.log('Raw response from server:', res);

                        if (typeof res === 'string') {
                            res = JSON.parse(res);
                        }

                        if (res.status === 'success') {
                            // 🌟 แอบเพิ่มข้อมูลพื้นฐานให้ JSON ดิบ เพื่อใช้ประโยชน์ตอน Split
                            let processedData = res.data.map(b => ({
                                ...b,
                                original_bt_id: b.bt_id, // จำ ID แท้ไว้
                                base_guest_name: b.guest_display, // จำชื่อแท้ไว้ จะได้ไม่ Grp ซ้อน Grp
                                is_split: false
                            }));

                            masterPoolData = JSON.parse(JSON.stringify(processedData)); // ก๊อปปี้ของแท้
                            waitingPoolData = JSON.parse(JSON.stringify(processedData)); // ก๊อปปี้มาใช้งาน

                            renderTables();
                        }
                    },
                    complete: function() {
                        $.unblockUI();
                    }
                });
            });

            // 2. การสร้างตาราง (เพิ่มปุ่ม Merge)
            // function renderTables() {
            //     console.log('test renderTables');
            //     let htmlJoin = '';
            //     let htmlPrivate = '';
            //     let countJoin = 0;
            //     let countPrivate = 0;

            //     waitingPoolData.forEach(function(b) {
            //         let actionBtns = '';

            //         // ถ้าเป็นข้อมูลที่โดนตัด (Split) ให้โชว์ปุ่ม "รวมร่าง" (Merge) สีเหลือง
            //         if (b.is_split) {
            //             actionBtns += `<button type="button" class="btn btn-sm btn-icon btn-flat-warning btn-merge mr-50" data-orig="${b.original_bt_id}" title="รวมกลับคืน"><i data-feather="corner-up-left"></i></button>`;
            //         }
            //         // ถ้าคน > 1 โชว์กรรไกร
            //         if (b.pax_total > 1) {
            //             actionBtns += `<button type="button" class="btn btn-sm btn-icon btn-flat-danger btn-split" data-id="${b.bt_id}" data-pax="${b.pax_total}" title="แบ่งกลุ่ม"><i data-feather="scissors"></i></button>`;
            //         }

            //         let tr = `
            //             <tr id="row-${b.bt_id}">
            //                 <td class="text-center">
            //                     <div class="custom-control custom-checkbox">
            //                         <input type="checkbox" class="custom-control-input chk-booking" id="chk-${b.bt_id}" data-id="${b.bt_id}">
            //                         <label class="custom-control-label" for="chk-${b.bt_id}"></label>
            //                     </div>
            //                 </td>
            //                 <td class="text-center">${b.action_time}</td>
            //                 <td>${b.hotel_name} / Nai Yang<br><small class="text-muted">Zone: ${b.zone_name}</small></td>
            //                 <td class="text-center">${b.room_no || '-'}</td>
            //                 <td>${b.guest_display}</td>
            //                 <td class="text-center font-weight-bold text-primary">${b.pax_total}</td>
            //                 <td class="text-center"><i data-feather="briefcase" class="text-secondary"></i></td>
            //                 <td class="text-center">${actionBtns}</td>
            //             </tr>
            //         `;

            //         if (b.transfer_mode === 'join') {
            //             htmlJoin += tr;
            //             countJoin++;
            //         } else {
            //             htmlPrivate += tr;
            //             countPrivate++;
            //         }
            //     });

            //     $('#tbody-join').html(htmlJoin);
            //     $('#tbody-private').html(htmlPrivate);
            //     $('#badge-join').text(countJoin);
            //     $('#badge-private').text(countPrivate);
            //     if (feather) feather.replace();
            //     updateVanBuilderPanel();
            // }

            // ---------------------------------------------------------
            // 2. ดึงข้อมูลจาก API และแยกตะกร้า Join / Private
            // ---------------------------------------------------------
            function fetchWaitingPool(date, product) {
                // $.ajax({...}) โค้ดดึง JSON จากขั้นตอนที่ 2
                // สมมติว่าดึงสำเร็จและได้ข้อมูลมาอยู่ใน response.data

                // (ตัวอย่างจำลองข้อมูล JSON ที่ได้จาก Backend)
                let responseData = [{
                        bt_id: '101',
                        action_time: '07:00',
                        hotel_name: 'Beyond Kata',
                        room_no: 'A1',
                        guest_display: 'Smith (UK)',
                        pax_total: 18,
                        transfer_mode: 'join',
                        updated_at: '2026-04-10 09:00'
                    },
                    {
                        bt_id: '102',
                        action_time: '07:15',
                        hotel_name: 'Katathani',
                        room_no: 'B2',
                        guest_display: 'Lee (KR)',
                        pax_total: 4,
                        transfer_mode: 'join',
                        updated_at: '2026-04-10 09:05'
                    },
                    {
                        bt_id: '103',
                        action_time: '07:30',
                        hotel_name: 'Amari Patong',
                        room_no: 'C3',
                        guest_display: 'Wang (CN)',
                        pax_total: 8,
                        transfer_mode: 'private',
                        updated_at: '2026-04-10 09:10'
                    }
                ];

                waitingPoolData = responseData; // เก็บลงตัวแปรหลัก
                renderTables();
            }

            // ---------------------------------------------------------
            // 3. วาดตาราง (Render Tables)
            // ---------------------------------------------------------
            // function renderTables() {
            //     let htmlJoin = '';
            //     let htmlPrivate = '';
            //     let countJoin = 0;
            //     let countPrivate = 0;

            //     waitingPoolData.forEach(function(b) {
            //         // สร้างปุ่มกรรไกร ✂️ ถ้าคนมากกว่า 1 คน
            //         let splitBtn = b.pax_total > 1 ?
            //             `<button type="button" class="btn btn-sm btn-icon btn-flat-danger btn-split" data-id="${b.bt_id}" data-pax="${b.pax_total}" title="แบ่งกลุ่ม"><i data-feather="scissors"></i></button>` : '';

            //         let tr = `
            //             <tr id="row-${b.bt_id}">
            //                 <td class="text-center">
            //                     <div class="custom-control custom-checkbox">
            //                         <input type="checkbox" class="custom-control-input chk-booking" id="chk-${b.bt_id}" data-id="${b.bt_id}">
            //                         <label class="custom-control-label" for="chk-${b.bt_id}"></label>
            //                     </div>
            //                 </td>
            //                 <td class="text-center">${b.action_time}</td>
            //                 <td>${b.hotel_name}<br><small class="text-muted">Zone: ${b.zone_name}</small></td>
            //                 <td class="text-center">${b.room_no}</td>
            //                 <td>${b.guest_display}</td>
            //                 <td class="text-center font-weight-bold">${b.pax_total}</td>
            //                 <td class="text-center">${b.voucher_no}</td>
            //                 <td class="text-center">${splitBtn}</td>
            //             </tr>
            //         `;

            //         if (b.transfer_mode === 'join') {
            //             htmlJoin += tr;
            //             countJoin++;
            //         } else {
            //             htmlPrivate += tr;
            //             countPrivate++;
            //         }
            //     });

            //     // ยัด HTML ลงตาราง
            //     $('#tbody-join').html(htmlJoin);
            //     $('#tbody-private').html(htmlPrivate);

            //     // อัปเดตตัวเลขบน Tab
            //     $('#badge-join').text(countJoin);
            //     $('#badge-private').text(countPrivate);

            //     // เรียกใช้ Feather Icons อีกครั้งหลังสร้าง DOM ใหม่
            //     if (feather) feather.replace();

            //     // รีเซ็ตแผงด้านขวา
            //     updateVanBuilderPanel();
            // }
            function renderTables() {
                let htmlJoin = '';
                let htmlPrivate = '';
                let countJoin = 0;
                let countPrivate = 0;

                // 🌟 ตัวแปรนับยอดคนสะสม เพื่อใช้คำนวณการตีเส้นแบ่ง
                let accumulatedJoin = 0;
                let accumulatedPrivate = 0;

                waitingPoolData.forEach(function(b) {
                    let actionBtns = '';

                    // ถ้าเป็นข้อมูลที่โดนตัด (Split) ให้โชว์ปุ่ม "รวมร่าง"
                    if (b.is_split) {
                        actionBtns += `<button type="button" class="btn btn-sm btn-icon btn-flat-warning btn-merge mr-50" data-orig="${b.original_bt_id}" title="รวมกลับคืน"><i data-feather="corner-up-left"></i></button>`;
                    }
                    // ถ้าคน > 1 โชว์กรรไกร
                    if (b.pax_total > 1) {
                        actionBtns += `<button type="button" class="btn btn-sm btn-icon btn-flat-danger btn-split" data-id="${b.bt_id}" data-pax="${b.pax_total}" title="แบ่งกลุ่ม"><i data-feather="scissors"></i></button>`;
                    }

                    // HTML ของแต่ละ Row
                    let tr = `
                        <tr id="row-${b.bt_id}">
                            <td class="text-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input chk-booking" id="chk-${b.bt_id}" data-id="${b.bt_id}">
                                    <label class="custom-control-label" for="chk-${b.bt_id}"></label>
                                </div>
                            </td>
                            <td class="text-center">${b.action_time}</td>
                            <td>${b.hotel_name}<br><small class="text-muted">Zone: ${b.zone_name}</small></td>
                            <td class="text-center">${b.room_no || '-'}</td>
                            <td>${b.guest_name}<br><small class="text-muted">Nation: ${b.nationality}</small></td>
                            <td class="text-center font-weight-bold text-primary">${b.pax_total}</td>
                            <td class="text-center">${b.voucher_no}</td>
                            <td class="text-center">${b.programe_name}</td>
                            <td class="text-center">${actionBtns}</td>
                        </tr>
                    `;

                    // ----------------------------------------------
                    // 🌟 ตรรกะการตีเส้นแบ่ง AI สำหรับกลุ่ม JOIN
                    // ----------------------------------------------
                    if (b.transfer_mode === 'join') {
                        // ถ้ายอดสะสมปัจจุบัน + ยอดคนคิวนี้ มากกว่าความจุรถ (และไม่ใช่บรรทัดแรกสุด)
                        if (accumulatedJoin + parseInt(b.pax_total) > maxVanCapacity && accumulatedJoin > 0) {
                            // แทรกโค้ดเส้นแบ่ง AI
                            htmlJoin += `
                                <tr class="ai-divider-row">
                                    <td colspan="8" style="background-color: #f0fdf4; color: #166534; font-weight: 600; text-align: center; border-top: 2px dashed #22c55e; border-bottom: 2px dashed #22c55e; padding: 6px;">
                                        <i data-feather="zap" width="14" height="14"></i> &gt;&gt; AI SUGGESTION: ${maxVanCapacity} PAX LIMIT &lt;&lt; <i data-feather="zap" width="14" height="14"></i>
                                    </td>
                                </tr>
                            `;
                            // รีเซ็ตยอดสะสมกลับเป็น 0 เพื่อเริ่มนับคันใหม่
                            accumulatedJoin = 0;
                        }

                        // บวกยอดคนเข้าตะกร้าสะสม
                        accumulatedJoin += parseInt(b.pax_total);
                        htmlJoin += tr;
                        countJoin++;
                    }
                    // ----------------------------------------------
                    // 🌟 ตรรกะการตีเส้นแบ่ง AI สำหรับกลุ่ม PRIVATE
                    // ----------------------------------------------
                    else {
                        if (accumulatedPrivate + parseInt(b.pax_total) > maxVanCapacity && accumulatedPrivate > 0) {
                            htmlPrivate += `
                                <tr class="ai-divider-row">
                                    <td colspan="8" style="background-color: #f0fdf4; color: #166534; font-weight: 600; text-align: center; border-top: 2px dashed #22c55e; border-bottom: 2px dashed #22c55e; padding: 6px;">
                                        <i data-feather="zap" width="14" height="14"></i> &gt;&gt; AI SUGGESTION: ${maxVanCapacity} PAX LIMIT &lt;&lt; <i data-feather="zap" width="14" height="14"></i>
                                    </td>
                                </tr>
                            `;
                            accumulatedPrivate = 0;
                        }
                        accumulatedPrivate += parseInt(b.pax_total);
                        htmlPrivate += tr;
                        countPrivate++;
                    }
                });

                // ยัด HTML ลงตาราง
                $('#tbody-join').html(htmlJoin);
                $('#tbody-private').html(htmlPrivate);

                // อัปเดตตัวเลขบน Tab
                $('#badge-join').text(countJoin);
                $('#badge-private').text(countPrivate);

                // เรียกใช้ Feather Icons อีกครั้งหลังสร้าง DOM ใหม่
                if (feather) feather.replace();

                // รีเซ็ตแผงด้านขวา
                updateVanBuilderPanel();
            }

            // ---------------------------------------------------------
            // 4. การคำนวณฝั่งขวา (Active Van Builder) แบบ Real-time
            // ---------------------------------------------------------
            $(document).on('change', '.chk-booking', function() {
                updateVanBuilderPanel();
            });

            function updateVanBuilderPanel() {
                let totalPax = 0;
                let selectedHtml = '';

                // หา checkbox ที่ถูกติ๊กทั้งหมด (ไม่ว่าจะอยู่ Tab ไหน)
                $('.chk-booking:checked').each(function() {
                    let id = $(this).data('id');
                    // ค้นหาข้อมูลเต็มจากตัวแปรหลัก
                    let b = waitingPoolData.find(x => x.bt_id == id);

                    if (b) {
                        totalPax += parseInt(b.pax_total);

                        // สร้างกล่อง Card เล็กๆ ด้านขวา
                        selectedHtml += `
                    <div class="selected-booking-item ${totalPax > maxVanCapacity ? 'border-danger' : ''}">
                        <i data-feather="check-circle" class="text-success mr-50" width="16" height="16"></i> 
                        ${b.hotel_name} - ${b.guest_display} 
                        <span class="badge badge-light-secondary ml-auto">${b.pax_total} Pax</span>
                    </div>
                `;
                    }
                });

                // อัปเดตตัวเลข
                let remaining = maxVanCapacity - totalPax;
                $('.pax-counter-text.text-primary').html(`${totalPax}<span style="font-size:1.5rem;" class="text-secondary">/${maxVanCapacity}</span>`);

                // ควบคุมสีของการแจ้งเตือน Remaining
                let remSpan = $('.pax-counter-text').last();
                if (remaining < 0) {
                    remSpan.removeClass('text-success').addClass('text-danger font-weight-bolder').text(remaining);
                    $('#btn-assign-van').prop('disabled', true); // ปิดปุ่ม Assign ถ้าคนล้น
                } else {
                    remSpan.removeClass('text-danger font-weight-bolder').addClass('text-success').text(remaining);
                    $('#btn-assign-van').prop('disabled', false); // เปิดปุ่ม
                }

                // ยัดรายการที่เลือกลงกล่อง
                $('.flex-grow-1.overflow-auto').html(selectedHtml);
                if (feather) feather.replace();
            }

            // เมื่อเปลี่ยนรถ ให้ดึง Seat มาอัปเดต Max Capacity
            $('#van-select').on('change', function() {
                // สมมติว่าดึง data-seat จาก option ที่เลือก
                // maxVanCapacity = parseInt($(this).find(':selected').data('seat'));
                updateVanBuilderPanel();
            });

            // ---------------------------------------------------------
            // 5. ระบบตัดแบ่งคน (Split Logic ✂️)
            // ---------------------------------------------------------

            // 3. ยืนยันการตัดแบ่ง ✂️ (แก้บั๊กชื่อซ้อนทับ)
            let currentSplitId = null;

            $(document).on('click', '.btn-split', function() {
                currentSplitId = $(this).data('id');
                let totalPax = parseInt($(this).data('pax'));
                $('#split-total-pax').text(totalPax);
                $('#split-booking-id').val(currentSplitId);
                $('#split-group-1').attr('max', totalPax - 1).val('');
                $('#split-group-2').val('');
                $('#modal-split-booking').modal('show');
            });

            // $('#btn-confirm-split').on('click', function() {
            //     let g1 = parseInt($('#split-group-1').val());
            //     let g2 = parseInt($('#split-group-2').val());

            //     let index = waitingPoolData.findIndex(x => x.bt_id == currentSplitId);
            //     if (index !== -1 && g1 > 0 && g2 > 0) {
            //         let original = waitingPoolData[index];
            //         let baseId = original.original_bt_id; // อ้างอิงจาก ID ต้นฉบับเสมอ

            //         // หาว่าเคยโดนหั่นไปแล้วกี่ชิ้น เพื่อตั้งชื่อ Suffix ให้ไม่ซ้ำ (เช่น S1, S2)
            //         let existingPieces = waitingPoolData.filter(x => x.original_bt_id == baseId);
            //         let nextIndex1 = existingPieces.length + 1;
            //         let nextIndex2 = existingPieces.length + 2;

            //         // 🌟 ทริค: ใช้ base_guest_name เสมอ เพื่อไม่ให้ (Grp) ต่อกันยาวๆ
            //         let cloneA = {
            //             ...original,
            //             bt_id: baseId + '-S' + nextIndex1,
            //             pax_total: g1,
            //             is_split: true,
            //             guest_display: original.base_guest_name + ` (กลุ่ม ${nextIndex1})`,
            //             adult: g1,
            //             child: 0,
            //             infant: 0,
            //             foc: 0 // ยัดคนลง adult เพื่อให้จัดรถผ่าน
            //         };
            //         let cloneB = {
            //             ...original,
            //             bt_id: baseId + '-S' + nextIndex2,
            //             pax_total: g2,
            //             is_split: true,
            //             guest_display: original.base_guest_name + ` (กลุ่ม ${nextIndex2})`,
            //             adult: g2,
            //             child: 0,
            //             infant: 0,
            //             foc: 0
            //         };

            //         waitingPoolData.splice(index, 1, cloneA, cloneB);
            //         renderTables();
            //         $('#modal-split-booking').modal('hide');
            //     }
            // });

            // ยืนยันการตัดแบ่ง (สร้าง Virtual Rows)
            // $('#btn-confirm-split').on('click', function() {
            //     let g1 = parseInt($('#split-group-1').val());
            //     let g2 = parseInt($('#split-group-2').val());

            //     // หาต้นฉบับใน Array
            //     let index = waitingPoolData.findIndex(x => x.bt_id == currentSplitId);
            //     if (index !== -1 && g1 > 0 && g2 > 0) {
            //         let original = waitingPoolData[index];

            //         // สร้าง Clone 2 ตัว (เพิ่ม Suffix ให้ ID ไม่ซ้ำกัน)
            //         let cloneA = {
            //             ...original,
            //             bt_id: original.bt_id + '-A',
            //             pax_total: g1,
            //             guest_display: original.guest_display + ' (Grp 1)'
            //         };
            //         let cloneB = {
            //             ...original,
            //             bt_id: original.bt_id + '-B',
            //             pax_total: g2,
            //             guest_display: original.guest_display + ' (Grp 2)'
            //         };

            //         // ลบตัวเดิมทิ้ง แล้วยัดตัว Clone เข้าไปแทนที่
            //         waitingPoolData.splice(index, 1, cloneA, cloneB);

            //         // วาดตารางใหม่
            //         renderTables();
            //         $('#modal-split-booking').modal('hide');
            //     }
            // });

            // ---------------------------------------------------------
            // ✂️ ยืนยันการตัดแบ่ง (แก้บั๊กชื่อซ้อนทับแบบเด็ดขาด)
            // ---------------------------------------------------------
            $('#btn-confirm-split').on('click', function() {
                let g1 = parseInt($('#split-group-1').val());
                let g2 = parseInt($('#split-group-2').val());

                let index = waitingPoolData.findIndex(x => x.bt_id == currentSplitId);
                if (index !== -1 && g1 > 0 && g2 > 0) {
                    let original = waitingPoolData[index];
                    let baseId = original.original_bt_id; // อ้างอิง ID ต้นฉบับ
                    let baseName = original.base_guest_name; // 🌟 ใช้ชื่อต้นฉบับเสมอ (ไม่มีวงเล็บ)

                    // ใช้การสุ่มรหัสต่อท้าย เพื่อป้องกัน ID ซ้ำกันเวลาตัดแบ่งหลายๆ รอบ
                    let uid1 = Math.floor(Math.random() * 10000);
                    let uid2 = Math.floor(Math.random() * 10000);

                    let cloneA = {
                        ...original,
                        bt_id: baseId + '-SP' + uid1,
                        pax_total: g1,
                        is_split: true,
                        adult: g1,
                        child: 0,
                        infant: 0,
                        foc: 0 // ย้ายยอดคนมาใส่ adult ให้จัดรถผ่าน
                    };
                    let cloneB = {
                        ...original,
                        bt_id: baseId + '-SP' + uid2,
                        pax_total: g2,
                        is_split: true,
                        adult: g2,
                        child: 0,
                        infant: 0,
                        foc: 0
                    };

                    // ถอดตัวเดิมออก เอาตัวใหม่ 2 ตัวไปเสียบแทนที่ใน Array
                    waitingPoolData.splice(index, 1, cloneA, cloneB);

                    // 🌟 ทริคจัดระเบียบชื่อ: วนลูปหา Booking ที่โดนหั่นจาก baseId เดียวกัน แล้วจับเรียงเบอร์ใหม่
                    let groupCounter = 1;
                    waitingPoolData.forEach(item => {
                        if (item.original_bt_id == baseId && item.is_split) {
                            item.guest_display = baseName + ` (กลุ่ม ${groupCounter})`;
                            groupCounter++;
                        }
                    });

                    renderTables();
                    $('#modal-split-booking').modal('hide');
                }
            });

            // ---------------------------------------------------------
            // 🔄 ฟังก์ชันรวมร่างกลับคืน (Merge / Undo)
            // ---------------------------------------------------------
            $(document).on('click', '.btn-merge', function() {
                let origId = $(this).attr('data-orig');

                // 1. หาตำแหน่งบรรทัดแรกสุดของเศษที่ถูกตัด เพื่อจะได้เอาของแท้ไปวางคืนที่เดิม
                let firstIndex = waitingPoolData.findIndex(x => x.original_bt_id == origId);

                if (firstIndex !== -1) {
                    // 2. ลบชิ้นส่วนที่ถูกตัดทั้งหมด (ที่มาจาก origId เดียวกัน) ทิ้งไปจากหน้าจอ
                    waitingPoolData = waitingPoolData.filter(x => x.original_bt_id != origId);

                    // 3. ไปดึงข้อมูลของแท้ (Master Data) จากตะกร้าที่ซ่อนไว้
                    let masterRecord = masterPoolData.find(x => x.original_bt_id == origId);

                    if (masterRecord) {
                        // 4. แทรกของแท้กลับเข้าไปในตำแหน่งเดิม (ใช้ JSON.parse เพื่อตัดขาดการอ้างอิงข้อมูล)
                        waitingPoolData.splice(firstIndex, 0, JSON.parse(JSON.stringify(masterRecord)));
                    }

                    // 5. วาดตารางใหม่
                    renderTables();
                }
            });

            // คำนวณกลุ่มที่ 2 อัตโนมัติเมื่อพิมพ์กลุ่มที่ 1
            $('#split-group-1').on('input', function() {
                let g1 = parseInt($(this).val()) || 0;
                let total = parseInt($('#split-total-pax').text());

                if (g1 > 0 && g1 < total) {
                    $('#split-group-2').val(total - g1);
                    $('#btn-confirm-split').prop('disabled', false);
                } else {
                    $('#split-group-2').val('');
                    $('#btn-confirm-split').prop('disabled', true);
                }
            });

            $('#btn-assign-van').on('click', function() {
                // 🌟 ดักจับ: ต้องเลือกรถก่อนบันทึก
                let vanId = $('#van-logistics').val();
                if (!vanId || vanId === 'Select Cars ...' || vanId == '0') {
                    Swal.fire('แจ้งเตือน', 'กรุณาเลือกรถ (Van) ที่จะจัดลงก่อนทำการบันทึก', 'warning');
                    return;
                }

                // 1. ดึงข้อมูลรายการที่กำลังติ๊กเลือกอยู่
                let selectedBookings = [];
                $('.chk-booking:checked').each(function() {
                    let id = $(this).data('id');
                    let b = waitingPoolData.find(x => x.bt_id == id);
                    if (b) {
                        selectedBookings.push({
                            bt_id: b.original_bt_id, // 🌟 เปลี่ยนตรงนี้ ดึง ID ต้นฉบับเสมอ
                            transfer_type: b.transfer_type,
                            updated_at: b.updated_at,
                            adult: b.adult,
                            child: b.child,
                            infant: b.infant,
                            foc: b.foc
                        });
                    }
                });

                // 2. จัดเตรียม Payload ส่งไปให้ PHP
                let payload = {
                    action: 'assign_van',
                    travel_date: '2026-04-10', // ดึงจากค่าบนจอ
                    product_id: 1, // ดึงจาก Dropdown
                    car_id: $('#van-select').val() || 0,
                    driver_id: $('#driver-select').val() || 0,
                    manage_id: 0, // 0 = เปิดรถใหม่
                    bookings: selectedBookings
                };

                // 3. ยิงไปหา API ที่เราเพิ่งเขียน
                $.ajax({
                    url: 'pages/manage-driver/function/save-van-builder.php',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function(res) {
                        if (res.failed_count > 0) {
                            // มี Error บางรายการ (Partial Success)
                            let errorHtml = '<ul>';
                            res.failed_details.forEach(err => {
                                errorHtml += `<li><b>${err.vc}</b>: ${err.reason}</li>`;
                            });
                            errorHtml += '</ul>';

                            Swal.fire({
                                icon: 'warning',
                                title: `บันทึกสำเร็จ ${res.passed_count} รายการ`,
                                html: `<b>ไม่สามารถจัดรถได้ ${res.failed_count} รายการเนื่องจาก:</b><br>${errorHtml}`,
                                confirmButtonText: 'รับทราบ (รีเฟรชหน้าจอ)'
                            }).then(() => {
                                // โหลดตารางซ้ายมือใหม่ (เพื่อลบใบที่มีปัญหาออก)
                                fetchWaitingPool('2026-04-10', 1);
                            });
                        } else {
                            // สำเร็จ 100%
                            Swal.fire({
                                icon: 'success',
                                title: 'จัดรถสำเร็จเรียบร้อย!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                fetchWaitingPool('2026-04-10', 1);
                            });
                        }
                    }
                });
            });

            $('#van-logistics').on('change', function() {
                // ดึงค่า data-seat จาก option ที่กำลังถูกเลือก
                let selectedSeat = parseInt($(this).find(':selected').data('seat'));

                // เช็คกันเหนียว: ถ้าไม่ได้เลือก, ไม่มีค่า หรือตั้งไว้ 0 ให้ใช้ค่าพื้นฐานคือ 12
                if (isNaN(selectedSeat) || selectedSeat <= 0) {
                    maxVanCapacity = 12; // ค่า Default 
                } else {
                    maxVanCapacity = selectedSeat;
                }

                // เรียกใช้ฟังก์ชันอัปเดตฝั่งขวามือ เพื่อคำนวณ Remaining และเปลี่ยนสีตัวเลขทันที
                updateVanBuilderPanel();
            });

            // ==========================================
            // 🏝️ ระบบเลือกอุทยาน แล้ว Auto-select โปรแกรม
            // ==========================================
            $('#logistics-park').on('change', function() {
                let selectedParkId = $(this).val();
                let $programSelect = $('#logistics-programs');

                // 1. ล้างค่าโปรแกรมที่ถูกเลือกไว้ก่อนหน้าออกให้หมดก่อน
                $programSelect.val(null);

                // 2. ถ้าไม่ได้เลือก "all" (เลือกอุทยานเจาะจง)
                if (selectedParkId && selectedParkId !== 'all') {

                    let matchedProgramIds = [];

                    // วนลูปหา option ในโปรแกรม ว่าตัวไหนมี data-park ตรงกับอุทยานที่เลือก
                    $programSelect.find('option').each(function() {
                        if ($(this).data('park') == selectedParkId) {
                            matchedProgramIds.push($(this).val());
                        }
                    });

                    // 3. ยัดค่า ID โปรแกรมที่หาเจอ เข้าไปใน Select
                    $programSelect.val(matchedProgramIds);
                }

                // 4. สั่ง Trigger Change เพื่อให้ปลั๊กอิน Select2 อัปเดตหน้าจอ (สำคัญมาก)
                $programSelect.trigger('change');
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