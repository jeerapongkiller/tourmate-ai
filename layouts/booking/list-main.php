<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="<?php echo $main_description; ?>">
    <meta name="keywords" content="<?php echo $main_keywords; ?>">
    <meta name="author" content="<?php echo $main_author; ?>">
    <title>Booking - <?php echo $main_title; ?></title>
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
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/fontawesome/css/all.css" rel="stylesheet">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

    <style>
        /* สไตล์สำหรับโซนลากวางรูปภาพ */
        .ai-drop-zone {
            border: 2px dashed #7367f0;
            background: #f8f8fb;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            height: 180px;
            /* ปรับความสูงตามต้องการ */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .ai-drop-zone:hover,
        .ai-drop-zone.dragover {
            background: #f0efff;
            border-color: #4839eb;
        }

        .ai-drop-zone i {
            font-size: 3rem;
            color: #7367f0;
            margin-bottom: 10px;
        }

        /* ขยาย Textarea ให้สูงเท่ากับ Drop Zone */
        #ai_voucher_text {
            height: 180px;
            resize: none;
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
    <script src="app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="app-assets/fonts/fontawesome/js/all.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <script src="app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN Sweetalert2 JS -->
    <script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END Sweetalert2 JS -->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script src="app-assets/js/scripts/header.js"></script>
    <!-- END: Theme JS-->

    <?php
    $columntarget = $_SESSION["supplier"]["role_id"] == 1 || $_SESSION["supplier"]["role_id"] == 2 ? '5, 6' : '5';
    ?>

    <!-- BEGIN: Page JS-->
    <script type="text/javascript">
        // Ajax Delete Booking
        // --------------------------------------------------------------------
        function deleteBooking(booking_id) {
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
                        url: "pages/booking/function/delete.php",
                        type: "POST",
                        data: {
                            booking_id: booking_id,
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
                                    location.href = './?pages=booking/list';
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
            $('.booking-list-table').DataTable({
                "searching": false,
                order: [
                    // [4, 'desc']
                ],
                dom: '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                    '<"col-lg-12 col-xl-6" l>' +
                    '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                    '>t' +
                    '<"d-flex justify-content-between mx-2 row mb-1"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',
                columnDefs: [{
                    // targets: [<?php echo $columntarget; ?>],
                    orderable: false
                }],
                language: {
                    sLengthMenu: 'Show _MENU_'
                },
                // Buttons with Dropdown
                buttons: [],
                language: {
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                },
            });

            var jqFormBooking = $('#booking-create-form'),
                jqForm = $('#booking-search-form'),
                picker = $('#dob'),
                dtPicker = $('#dob-bootstrap-val'),
                basicPickr = $('.flatpickr-basic'),
                pageBlockSpinner = $('.btn-page-block-spinner'),
                select = $('.select2');

            const dropZone = document.getElementById('drop_zone');
            const fileInput = document.getElementById('ai_voucher_image');

            // เมื่อลากไฟล์เข้ามาทับ
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('dragover');
            });

            // เมื่อลากไฟล์ออกไป
            dropZone.addEventListener('dragleave', () => {
                dropZone.classList.remove('dragover');
            });

            // เมื่อปล่อยไฟล์ลงในโซน
            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('dragover');

                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files; // ยัดไฟล์ที่ลากวางเข้า input
                    previewVoucherImage(fileInput); // สั่ง Preview รูปภาพ
                }
            });

            // Refresh feather icons
            if (typeof feather !== 'undefined') feather.replace();

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

            // Default
            if (basicPickr.length) {
                basicPickr.flatpickr({
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

            if ($('#search_travel').length) {
                $('#search_travel').flatpickr({
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

            $('.time-mask').toArray().forEach(function(field) {
                new Cleave(field, {
                    time: true,
                    timePattern: ['h', 'm']
                });
            });

            //Numeral
            $('.numeral-mask').toArray().forEach(function(field) {
                new Cleave(field, {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand'
                });
            });

            $('.outside-text').on('click', function(e) {
                e.preventDefault();
                document.getElementById('frm-agent').hidden = false;
                document.getElementById('frm-agent-outside').hidden = true;

                $("#agent").val(0).trigger("change");
            });

            $('.extra-charge-repeater').repeater({
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
                isFirstItemUndeletable: true
            });

            // Ajax Search
            // --------------------------------------------------------------------
            jqForm.on("submit", function(e) {

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

                var serializedData = $(this).serialize();
                $.ajax({
                    url: "pages/booking/function/search.php",
                    type: "POST",
                    data: serializedData + "&action=search",
                    success: function(response) {
                        if (response != false) {
                            $("#booking-search-table").html(response);

                            $('.booking-list-table').DataTable({
                                "searching": false,
                                order: [
                                    // [4, 'desc']
                                ],
                                dom: '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                                    '<"col-lg-12 col-xl-6" l>' +
                                    '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                                    '>t' +
                                    '<"d-flex justify-content-between mx-2 row mb-1"' +
                                    '<"col-sm-12 col-md-6"i>' +
                                    '<"col-sm-12 col-md-6"p>' +
                                    '>',
                                columnDefs: [{
                                    // targets: [<?php echo $columntarget; ?>],
                                    orderable: false
                                }],
                                language: {
                                    sLengthMenu: 'Show _MENU_'
                                },
                                // Buttons with Dropdown
                                buttons: [],
                                language: {
                                    paginate: {
                                        // remove previous & next text from pagination
                                        previous: '&nbsp;',
                                        next: '&nbsp;'
                                    }
                                },
                            });

                            if (feather) {
                                feather.replace({
                                    width: 14,
                                    height: 14
                                });
                            }

                            search_start_date('custom', 'booking', $('#search_travel').val());
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

            if (jqFormBooking.length) {
                $.validator.addMethod("regex", function(value, element, regexp) {
                    return this.optional(element) || regexp.test(value);
                }, "Please check your input.");

                jqFormBooking.validate({
                    rules: {
                        // 'voucher_no': {
                        //     required: true,
                        //     remote: {
                        //         url: "pages/booking/function/check-voucher-no.php",
                        //         type: "post",
                        //         data: {
                        //             action: "check",
                        //             voucher_no: function() {
                        //                 return $('[name="voucher_no"]').val();
                        //             },
                        //             agent: function() {
                        //                 return $('[name="agent"]').val();
                        //             },
                        //         }
                        //     }
                        // },
                        'product_id': {
                            required: true
                        },
                        'category_id[]': {
                            required: true
                        }
                    },
                    messages: {
                        // 'voucher_no': {
                        //     remote: "This tat voucher no is already taken! Try another."
                        // }
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

                        // update ajax request data
                        var formData = new FormData(form);
                        formData.append('action', 'create');
                        formData.append('quick', 1);
                        $.ajax({
                            url: "pages/booking/function/create.php",
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
                                            window.location.href = './?pages=booking/list';
                                        }
                                    })
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

            search_start_date('today', 'boat', '');
            search_start_date('tomorrow', 'boat', '');
            search_start_date('today', 'driver', '');
            search_start_date('tomorrow', 'driver', '');
            search_start_date('today', 'booking', '');
            search_start_date('tomorrow', 'booking', '');
            search_start_date('day3', 'booking', '<?php echo $day3; ?>');
            search_start_date('day4', 'booking', '<?php echo $day4; ?>');
            search_start_date('day5', 'booking', '<?php echo $day5; ?>');
            search_start_date('day6', 'booking', '<?php echo $day6; ?>');
            search_start_date('day7', 'booking', '<?php echo $day7; ?>');
        });

        function search_start_date(type_date, type, date) {
            var formData = new FormData();
            formData.append('action', 'search');
            formData.append('type_date', type_date);
            formData.append('type', type);
            formData.append('date', date);
            $.ajax({
                url: "pages/booking/function/search-report.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    if (response != 'false' && type == 'boat') {
                        $('#boat-report-' + type_date).html(response);
                    } else if (response != 'false' && type == 'driver') {
                        $('#driver-report-' + type_date).html(response);
                    } else if (response != 'false' && type == 'booking') {
                        $('#' + type_date).html(response);
                    }
                }
            });
        }

        function search_program() {
            var agent = document.getElementById('agent').value;
            var product_id = document.getElementById('product_id').value;

            document.getElementById('frm-agent').hidden = agent !== 'outside' ? false : true;
            document.getElementById('frm-agent-outside').hidden = agent !== 'outside' ? true : false;

            var formData = new FormData();
            formData.append('action', 'search');
            formData.append('prod_id', product_id);
            $.ajax({
                url: "pages/booking/function/search-category.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    if (response != '' && response != false) {
                        $('#category_id').find('option').remove();
                        var res = $.parseJSON(response);
                        var countcate = Object.keys(res.id).length;
                        if (countcate) {
                            for (let index = 0; index < countcate; index++) {
                                $('#category_id').append("<option value=\"" + res.id[index] + "\" data-name=\"" + res.name[index] + "\" data-transfer=\"" + res.transfer[index] + "\">" + res.name[index] + "</option>");
                            }
                        } else {
                            $('#category_id').append("<option value=\"0\" data-name=\"\"></option>");
                        }

                        // ==========================================
                        // 💡 ไม้ผลัดที่ 2: ค้นหา Category ทั้งหมดที่ AI อ่านได้
                        // ==========================================
                        if (window.aiQueue && window.aiQueue.isProcessing) {
                            let matchedCategories = []; // เก็บ ID ที่หาเจอทั้งหมด

                            // วนลูปดูสัญชาติทั้งหมดที่ AI อ่านเจอ
                            if (window.aiQueue.passengers && window.aiQueue.passengers.length > 0) {
                                window.aiQueue.passengers.forEach(pax => {
                                    let searchCatLower = pax.category.toLowerCase().trim();
                                    let isThai = searchCatLower.includes('thai') || searchCatLower.includes('ไทย') || searchCatLower.includes('th');
                                    let isForeign = searchCatLower.includes('foreign') || searchCatLower.includes('ต่าง') || searchCatLower.includes('eng');

                                    $('#category_id option').each(function() {
                                        let optionTextLower = $(this).text().toLowerCase();
                                        let optVal = $(this).val();
                                        if (!optVal || optVal === "0") return;

                                        // ถ้าตรงกับ Thai หรือ Foreign ให้จับยัดใส่ Array
                                        if (isThai && (optionTextLower.includes('thai') || optionTextLower.includes('ไทย'))) {
                                            if (!matchedCategories.includes(optVal)) matchedCategories.push(optVal);
                                        } else if (isForeign && (optionTextLower.includes('foreign') || optionTextLower.includes('ต่าง') || optionTextLower.includes('eng'))) {
                                            if (!matchedCategories.includes(optVal)) matchedCategories.push(optVal);
                                        }
                                    });
                                });
                            }

                            // ถ้าหาเจอ (ไม่ว่าจะ 1 หรือ 2 สัญชาติ) ให้เลือกทั้งหมด
                            if (matchedCategories.length > 0) {
                                console.log(`💡 AI Category Selected -> IDs:`, matchedCategories);
                                $('#category_id').val(matchedCategories).trigger('change');
                            } else {
                                // ถ้าหาไม่เจอจริงๆ เอาตัวเลือกแรกสุด
                                let firstCategory = $('#category_id option').first().val();
                                if (firstCategory && firstCategory != "0") {
                                    $('#category_id').val([firstCategory]).trigger('change');
                                } else {
                                    check_category();
                                }
                            }
                        } else {
                            check_category();
                        }
                        // ==========================================
                    }
                }
            });
        }

        function check_category() {
            var book_type = document.getElementsByName('booking_type')[0].checked == true ? 1 : 2;
            var agent = document.getElementById('agent').value;
            var product_id = document.getElementById('product_id').value;
            var travel_date = document.getElementById('travel_date').value;
            const selectCategory = document.getElementById('category_id');
            const selectedValues = [];
            for (const option of selectCategory.options) {
                if (option.selected) {
                    selectedValues.push({
                        id: option.value,
                        name: option.dataset.name,
                        transfer: option.dataset.transfer
                    });
                }
            }
            var formData = new FormData();
            formData.append('action', 'search');
            formData.append('agent_id', agent);
            formData.append('product_id', product_id);
            formData.append('categorys', JSON.stringify(selectedValues));
            formData.append('travel_date', travel_date);
            formData.append('book_type', book_type);

            $.ajax({
                url: "pages/booking/function/search-rate.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    $('#div-rates').html(response);

                    if (document.getElementById('include') !== null) {
                        var include = document.getElementById('include').value;
                        if (document.getElementById('pickup_type_2')) document.getElementById('pickup_type_2').checked = (include == 2) ? true : false;
                        if (document.getElementById('pickup_type_1')) document.getElementById('pickup_type_1').checked = (include == 1) ? true : false;
                        if (document.getElementById('start_pickup')) document.getElementById('start_pickup').value = (include == 1) ? '08:15' : '';
                        if (document.getElementById('end_pickup')) document.getElementById('end_pickup').value = (include == 1) ? '08:15' : '';
                    }

                    $('.numeral-mask').toArray().forEach(function(field) {
                        new Cleave(field, {
                            numeral: true,
                            numeralThousandsGroupStyle: 'thousand'
                        });
                    });

                    check_transfer();

                    // ==========================================
                    // 💡 ส่วนของ AI: ไม้ผลัดที่ 3 หยอดจำนวนคนแยกตามสัญชาติ
                    // ==========================================
                    if (window.aiQueue && window.aiQueue.isProcessing && window.aiQueue.passengers) {
                        let isFilled = false;

                        $('#div-rates tbody tr').each(function(index) {
                            if ($(this).find('#text-total').length > 0) return;

                            let rowCategoryName = $(this).find('td:first').text().trim();
                            let rowCategoryNameLower = rowCategoryName.toLowerCase();
                            let isRowThai = rowCategoryNameLower.includes('thai') || rowCategoryNameLower.includes('ไทย') || rowCategoryNameLower.includes('th');
                            let isRowForeign = rowCategoryNameLower.includes('foreign') || rowCategoryNameLower.includes('ต่าง') || rowCategoryNameLower.includes('eng');

                            let matchedPax = window.aiQueue.passengers.find(p => {
                                let pCat = p.category ? p.category.toLowerCase() : '';
                                if (isRowThai && (pCat.includes('thai') || pCat.includes('ไทย') || pCat.includes('th'))) return true;
                                if (isRowForeign && (pCat.includes('foreign') || pCat.includes('ต่าง') || pCat.includes('eng'))) return true;
                                return false;
                            });

                            if (matchedPax) {
                                let adultInput = $(this).find('input[name="adult[]"]');
                                let childInput = $(this).find('input[name="child[]"]');
                                let infantInput = $(this).find('input[name="infant[]"]');

                                if (adultInput.length && matchedPax.adult && parseInt(matchedPax.adult) > 0) {
                                    adultInput.val(parseInt(matchedPax.adult));
                                    isFilled = true;
                                }
                                if (childInput.length && matchedPax.child && parseInt(matchedPax.child) > 0) {
                                    childInput.val(parseInt(matchedPax.child));
                                    isFilled = true;
                                }
                                if (infantInput.length && matchedPax.infant && parseInt(matchedPax.infant) > 0) {
                                    infantInput.val(parseInt(matchedPax.infant));
                                    isFilled = true;
                                }

                                // 💡 หยอดราคา (Rate) ที่เพิ่มเข้ามาใหม่
                                if (matchedPax.rate_adult > 0) {
                                    $('input[name="rates_adult[]"]').eq(0).val(matchedPax.rate_adult);
                                }
                                if (matchedPax.rate_child > 0) {
                                    $('input[name="rates_child[]"]').eq(0).val(matchedPax.rate_child);
                                }
                                if (matchedPax.rate_infant > 0) {
                                    $('input[name="rates_infant[]"]').eq(0).val(matchedPax.rate_infant);
                                }

                                // สั่งคำนวณราคารวมใหม่ (ถ้าคุณมีฟังก์ชันคำนวณอัตโนมัติอยู่แล้ว)
                                if (typeof checke_rate_extar === "function") {
                                    checke_rate_extar();
                                }
                            }
                        });

                        // 🟢 ให้เรียก check_rate() ตรงนี้แทน หลังจาก AI หยอดตัวเลขเสร็จแล้ว
                        // พอมันคำนวณราคาเสร็จ มันจะไปเรียก rows_customer() แล้วก็หยอดชื่อ+จบงานให้เองครับ
                        check_rate();

                    } else {
                        // 🟢 กรณีผู้ใช้งานคีย์เองปกติ ก็ให้คำนวณตามเดิม
                        check_rate();
                    }
                    // ==========================================
                }
            });
        }

        function check_transfer() {
            var pickup_type = document.getElementsByName('pickup_type');
            if (pickup_type[0].checked == true) {
                document.getElementById('div-transfer').hidden = false;
                var pickup = document.getElementsByClassName('div-transfer-pickup');
                for (let index = 0; index < pickup.length; index++) {
                    pickup[index].hidden = false;
                }
            } else if (pickup_type[1].checked == true) {
                document.getElementById('div-transfer').hidden = true;
            } else if (pickup_type[2].checked == true) {
                document.getElementById('div-transfer').hidden = false;
                var pickup = document.getElementsByClassName('div-transfer-pickup');
                for (let index = 0; index < pickup.length; index++) {
                    pickup[index].hidden = true;
                }
            }
        }

        function check_rate() {
            var total_product = 0;
            var book_type = document.getElementById('book_type1').checked == true ? 1 : 2;
            var rate_total = document.getElementById('rate_total');
            var adult = document.getElementsByName('adult[]');
            var child = document.getElementsByName('child[]');
            var infant = document.getElementsByName('infant[]');
            if (book_type == 1) {
                var rates_adult = document.getElementsByName('rates_adult[]');
                var rates_child = document.getElementsByName('rates_child[]');
                var rates_infant = document.getElementsByName('rates_infant[]');
                for (let index = 0; index < adult.length; index++) {
                    total_product += Number(rates_adult[index].value.replace(/,/g, '')) * Number(adult[index].value);
                    total_product += Number(rates_child[index].value.replace(/,/g, '')) * Number(child[index].value);
                    total_product += Number(rates_infant[index].value.replace(/,/g, '')) * Number(infant[index].value);
                }
            } else {
                var rates_private = document.getElementsByName('rates_private[]');
                for (let index = 0; index < rates_private.length; index++) {
                    total_product += Number(rates_private[index].value.replace(/,/g, ''));
                }
            }

            rate_total.value = numberWithCommas(total_product);

            if (document.getElementById('text-total') !== null) {
                document.getElementById('text-total').innerHTML = numberWithCommas(total_product);
            }

            rows_customer();
        }

        function check_time(params) {
            var product_id = document.getElementById('product_id');
            var zone_id = params == 'zone_pickup' ? document.getElementById('zone_pickup') : document.getElementById('zone_dropoff');

            if (Number.isInteger(+zone_id.value)) {
                var formData = new FormData();
                formData.append('action', 'search');
                formData.append('product_id', product_id.value);
                formData.append('zone_id', zone_id.value);
                $.ajax({
                    url: "pages/booking/function/search-time.php",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        var res = JSON.parse(response);
                        document.getElementById('start_pickup').value = typeof res.start_pickup !== 'undefined' ? res.start_pickup : '00:00';
                        document.getElementById('end_pickup').value = typeof res.end_pickup !== 'undefined' ? res.end_pickup : '00:00';
                    }
                });
            }
        }

        function check_outside(params) {
            return false; // ปิดการใช้งาน
            if (typeof params !== undefined && params == 'hotel_pickup' && document.getElementById('hotel_pickup').value == 'outside') {
                document.getElementById('frm-hotel-pickup').hidden = true;
                document.getElementById('frm-hotel-outside').hidden = false;
            } else if (typeof params !== undefined && params == 'hotel_outside') {
                document.getElementById('frm-hotel-outside').hidden = true;
                document.getElementById('frm-hotel-pickup').hidden = false;
            } else if (typeof params !== undefined && params == 'hotel_dropoff' && document.getElementById('hotel_dropoff').value == 'outside') {
                document.getElementById('frm-dropoff').hidden = true;
                document.getElementById('frm-dropoff-outside').hidden = false;
            } else if (typeof params !== undefined && params == 'dropoff_outside') {
                document.getElementById('frm-dropoff').hidden = false;
                document.getElementById('frm-dropoff-outside').hidden = true;
            }
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
        }

        function check_no_agent(voucher_no) {
            var agent = document.getElementById('agent');

            var formData = new FormData();
            formData.append('action', 'check');
            formData.append('agent', agent.value);
            formData.append('voucher_no', voucher_no.value);
            $.ajax({
                url: "pages/booking/function/check-voucher-no.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    document.getElementById("invalid-voucher-no").style.display = (response == 'false') ? "block" : "none";
                }
            });
        }

        function accordion_check(type) {
            var accordion = type == 'note' ? document.getElementById('accordionOne') : document.getElementById('accordionTwo');
            if (accordion.classList[3] !== 'hidden') {
                accordion.classList.remove("show");
                accordion.classList.add("hidden");
            } else {
                accordion.classList.remove("hidden");
                accordion.classList.add("show");
            }
        }

        // Script Function Customer
        // ------------------------------------------------------------------------------------
        function rows_customer() {
            var adult_arr = document.getElementsByName('adult[]');
            var child_arr = document.getElementsByName('child[]');
            var infant_arr = document.getElementsByName('infant[]');
            var foc_arr = document.getElementsByName('foc[]');

            adult = 0;
            child = 0;
            infant = 0;
            foc = 0;

            for (let index = 0; index < adult_arr.length; index++) {
                adult += adult_arr[index].value !== undefined ? Number(adult_arr[index].value) : 0;
                child += child_arr[index].value !== undefined ? Number(child_arr[index].value) : 0;
                infant += infant_arr[index].value !== undefined ? Number(infant_arr[index].value) : 0;
                foc += foc_arr[index].value !== undefined ? Number(foc_arr[index].value) : 0;
            }

            var frm = document.getElementById('frm-customer');
            var sum = Number(adult) + Number(child) + Number(infant) + Number(foc);

            var text = '';
            var text_age = '';
            var cus_age = 0;

            if (sum < 30) {
                for (let index = 0; index < sum; index++) {
                    // console.log(adult.value + ' | ' + child.value + ' | ' + infant.value + ' | ' + foc.value + ' | ' + Number(index + 1));
                    if ((Number(adult) - Number(index + 1)) >= 0) {
                        text_age = 'Adult';
                        cus_age = 1;
                    } else if (((Number(adult) + Number(child)) - Number(index + 1)) >= 0) {
                        text_age = 'Children';
                        cus_age = 2;
                    } else if (((Number(adult) + Number(child) + Number(infant)) - Number(index + 1)) >= 0) {
                        text_age = 'Infant';
                        cus_age = 3;
                    } else {
                        text_age = 'FOC';
                        cus_age = 4;
                    }

                    var head = index == 0 ? 1 : 0;

                    text += '<div class="col-md-1 col-12">' +
                        '<div class="form-group pt-2">' +
                        '<strong>' + text_age + '</strong>' +
                        '<input type="hidden" name="customers[head][]" value="' + head + '" />' +
                        '<input type="hidden" name="customers[cus_age][]" value="' + cus_age + '" />' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-2 col-12">' +
                        '<div class="form-group">' +
                        '<label for="id_card">ID Passport/ ID Card</label>' +
                        '<input type="text" class="form-control" name="customers[id_card][]" value="" />' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-4 col-12">' +
                        '<div class="form-group">' +
                        '<label for="name">Name</label>' +
                        '<input type="text" class="form-control" name="customers[cus_name][]" value="" />' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-2 col-12">' +
                        '<div class="form-group">' +
                        '<label for="birth_date">Birth Date</label>' +
                        '<input type="date" class="form-control birth-date" name="customers[cus_birth_date][]" value="" />' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-3 col-12">' +
                        '<div class="form-group">' +
                        '<label for="nationality_id">Nationality</label>' +
                        '<select class="form-control nationality" id="customers' + index + '" name="customers[cus_nationality_id][]">' +
                        '<option value="0">Please Select Nationality...</option>' +
                        <?php
                        $nations = $bookObj->shownation();
                        foreach ($nations as $nation) {
                        ?> '<option value="<?php echo $nation['id']; ?>" ';
                    text += '><?php echo $nation['name']; ?></option>' +
                    <?php
                        }
                    ?> '</select>' +
                    '</div>' +
                    '</div>';
                }

                frm.innerHTML = text;

                // select2
                $('.nationality').each(function() {
                    var $this = $(this);
                    $this.wrap('<div class="position-relative"></div>');
                    $this.select2({
                            placeholder: 'Select ...',
                            dropdownParent: $this.parent()
                        })
                        .change(function() {
                            $(this).valid();
                        });
                });
            }

            // ==========================================
            // 💡 ไม้ผลัดที่ 4: หยอดชื่อลูกค้า (รองรับหลายชื่อ)
            // ==========================================
            if (window.aiQueue && window.aiQueue.isProcessing) {
                // ดึง Input ช่องกรอกชื่อทั้งหมดที่ระบบเพิ่งสร้างขึ้นมา
                let nameInputs = $('input[name="customers[cus_name][]"]');

                // นำชื่อจาก Array มาหยอดเรียงตามช่อง
                if (window.aiQueue.customerNames && window.aiQueue.customerNames.length > 0) {
                    window.aiQueue.customerNames.forEach((name, index) => {
                        if (nameInputs.eq(index).length > 0) {
                            nameInputs.eq(index).val(name);
                        }
                    });
                }

                // หยอดเบอร์โทรศัพท์ (ถ้ามี)
                if (window.aiQueue.telephone) {
                    $('#telephone').val(window.aiQueue.telephone);
                }

                console.log("✅ Tour Mate AI Auto-Fill Completed Successfully!");
                window.aiQueue.isProcessing = false; // จบกระบวนการ AI
            }
            // ==========================================
        }

        // Script Function Extra Charge
        // ------------------------------------------------------------------------------------
        function chang_extra_charge(select) {
            if (select.value > 0) {
                var ex_name = select.name.replace('[extra_charge]', '[extc_name]');
                document.getElementsByName(ex_name)[0].readOnly = select.value != 0 ? true : false;

                var ex_inp_ad = select.name.replace('[extra_charge]', '[extra_rate_adult]');
                var extar_ad = document.getElementById('extar_ad' + select.value).value;
                document.getElementsByName(ex_inp_ad)[0].value = numberWithCommas(extar_ad);

                var ex_inp_chd = select.name.replace('[extra_charge]', '[extra_rate_child]');
                var extar_chd = document.getElementById('extar_chd' + select.value).value;
                document.getElementsByName(ex_inp_chd)[0].value = numberWithCommas(extar_chd);

                var ex_inp_inf = select.name.replace('[extra_charge]', '[extra_rate_infant]');
                var extar_inf = document.getElementById('extar_inf' + select.value).value;
                document.getElementsByName(ex_inp_inf)[0].value = numberWithCommas(extar_inf);

                var ex_inp_total = select.name.replace('[extra_charge]', '[extra_rate_private]');
                var extar_total = document.getElementById('extar_total' + select.value).value;
                document.getElementsByName(ex_inp_total)[0].value = numberWithCommas(extar_total);
            }
        }

        function check_extar_type(select) {
            var adult = 0;
            var child = 0;
            var infant = 0;
            var adultEle = document.getElementsByName('adult[]');
            var childEle = document.getElementsByName('child[]');
            var infantEle = document.getElementsByName('infant[]');
            for (let index = 0; index < adultEle.length; index++) {
                adult += Number(adultEle[index].value);
                child += Number(childEle[index].value);
                infant += Number(infantEle[index].value);
            }

            var div_name_perpax = select.name.replace('[extra_type]', '[div_extar_perpax]');
            document.getElementsByName(div_name_perpax)[0].hidden = select.value == 1 ? false : true;
            document.getElementsByName(div_name_perpax)[1].hidden = select.value == 1 ? false : true;
            document.getElementsByName(div_name_perpax)[2].hidden = select.value == 1 ? false : true;

            var extra_adult = select.name.replace('[extra_type]', '[extra_adult]');
            document.getElementsByName(extra_adult)[0].value = adult;
            var extra_child = select.name.replace('[extra_type]', '[extra_child]');
            document.getElementsByName(extra_child)[0].value = child;
            var extra_infant = select.name.replace('[extra_type]', '[extra_infant]');
            document.getElementsByName(extra_infant)[0].value = infant;

            var div_name_total = select.name.replace('[extra_type]', '[div_extar_total]');
            document.getElementsByName(div_name_total)[0].hidden = select.value == 2 ? false : true;

            checke_rate_extar();
        }

        function checke_rate_extar() {
            var $div = $('div[id^="div-extra-charge"]');
            for (let index = 0; index < $div.length; index++) {
                var total = 0;
                var extra_type = document.getElementsByName('extra-charge[' + index + '][extra_type]');

                var adult = document.getElementsByName('extra-charge[' + index + '][extra_adult]');
                var rate_adult = document.getElementsByName('extra-charge[' + index + '][extra_rate_adult]');
                var child = document.getElementsByName('extra-charge[' + index + '][extra_child]');
                var rate_child = document.getElementsByName('extra-charge[' + index + '][extra_rate_child]');
                var infant = document.getElementsByName('extra-charge[' + index + '][extra_infant]');
                var rate_infant = document.getElementsByName('extra-charge[' + index + '][extra_rate_infant]');
                var ex_total = document.getElementsByName('extra-charge[' + index + '][extra_num_private]');
                var rate_total = document.getElementsByName('extra-charge[' + index + '][extra_rate_private]');

                total = extra_type[0].value != 0 ? extra_type[0].value == 2 ? Number(ex_total[0].value * rate_total[0].value.replace(/,/g, '')) : Number((adult[0].value * rate_adult[0].value.replace(/,/g, '')) + (child[0].value * rate_child[0].value.replace(/,/g, '')) + (infant[0].value * rate_infant[0].value.replace(/,/g, ''))) : 0;
                document.getElementsByName('extra-charge[' + index + '][extc_total]')[0].innerHTML = numberWithCommas(total);
            }
        }


        // =========================================================
        // 
        // =========================================================
        // ฟังก์ชันค้นหา Option ที่ "ใกล้เคียงที่สุด" (Best Match / Fuzzy Search)
        function selectOptionByText(selectId, searchText) {
            let selectElement = $('#' + selectId);
            if (!searchText || selectElement.length === 0) return {
                success: false,
                score: 0
            };

            let bestMatch = {
                id: "0",
                score: 0,
                text: ""
            };
            let searchLower = searchText.toLowerCase();
            let searchWords = searchLower.split(/\s+/);

            selectElement.find('option').each(function() {
                let optText = $(this).text();
                let optVal = $(this).val();
                if (optVal === "0") return;

                let optLower = optText.toLowerCase();
                let currentScore = 0;

                // --- ระบบให้คะแนน (Score Logic) ---
                if (optLower === searchLower) currentScore += 100; // ตรงกันเป๊ะ
                if (optLower.includes(searchLower) || searchLower.includes(optLower)) currentScore += 10;

                searchWords.forEach(word => {
                    if (word.length > 2 && optLower.includes(word)) currentScore += 5;
                });

                if (currentScore > bestMatch.score) {
                    bestMatch = {
                        id: optVal,
                        score: currentScore,
                        text: optText
                    };
                }
            });

            // 💡 ตั้งเกณฑ์ความมั่นใจ (Threshold) ตรงนี้
            // เช่น ถ้าคะแนนน้อยกว่า 15 ถือว่า "ไม่ชัวร์"
            const CONFIDENCE_THRESHOLD = 20;

            if (bestMatch.score > 0) {
                selectElement.val(bestMatch.id).trigger('change');
                return {
                    success: true,
                    score: bestMatch.score,
                    isLowConfidence: (bestMatch.score < CONFIDENCE_THRESHOLD)
                };
            }

            return {
                success: false,
                score: 0,
                isLowConfidence: false
            };
        }

        function checkMissingAiData(fieldId, aiValue, matchResult = null) {
            let el = $('#' + fieldId);
            if (el.length === 0) return;

            let isSelect2 = el.hasClass('select2-hidden-accessible');
            el.removeClass('is-invalid border-danger border-warning');
            el.nextAll('.ai-missing-warning').remove();
            if (isSelect2) {
                el.next('.select2-container').find('.select2-selection').removeClass('border-danger border-warning');
            }

            let isEmptyAI = (!aiValue || aiValue === "" || aiValue === "0");
            let currentVal = el.val();
            let isUnselected = (currentVal === null || currentVal === "" || currentVal === "0");

            let warningText = '';
            let borderClass = '';

            if (isEmptyAI) {
                // 🔴 สีแดง: หาใน Voucher ไม่เจอเลย
                borderClass = 'border-danger';
                warningText = `<small class="text-danger ai-missing-warning mt-50 d-block"><i data-feather="alert-circle"></i> ไม่พบข้อมูลใน Voucher</small>`;
            } else if (matchResult && matchResult.isLowConfidence) {
                // 🟠 สีส้ม (Case ใหม่): เลือกให้แล้วแต่คะแนนน้อย (ไม่ชัวร์)
                borderClass = 'border-warning';
                warningText = `<small class="text-warning ai-missing-warning mt-50 d-block"><i data-feather="help-circle"></i> ระบบไม่แน่ใจว่า "<b>${aiValue}</b>" คือตัวเลือกนี้ใช่หรือไม่?</small>`;
            } else if (isUnselected) {
                // 🟠 สีส้ม: มีคำใน Voucher แต่หาในระบบไม่เจอเลย
                borderClass = 'border-warning';
                warningText = `<small class="text-warning ai-missing-warning mt-50 d-block"><i data-feather="alert-triangle"></i> พบ "<b>${aiValue}</b>" แต่ไม่มีในระบบ</small>`;
            }

            if (warningText !== '') {
                el.addClass(`is-invalid ${borderClass}`);
                if (isSelect2) {
                    el.next('.select2-container').find('.select2-selection').addClass(borderClass);
                    el.next('.select2-container').after(warningText);
                } else {
                    el.after(warningText);
                }
                if (typeof feather !== 'undefined') feather.replace();
            }

            // 6. สร้าง Event: ลบคำเตือนทิ้งทันที เมื่อพนักงานพิมพ์แก้หรือเลือกข้อมูลใหม่!
            el.one('change keyup', function() {
                $(this).removeClass('is-invalid border-danger border-warning');
                $(this).nextAll('.ai-missing-warning').remove();
                if ($(this).hasClass('select2-hidden-accessible')) {
                    $(this).next('.select2-container').find('.select2-selection').removeClass('border-danger border-warning');
                    $(this).next('.select2-container').nextAll('.ai-missing-warning').remove();
                }
            });
        }

        function processTourMateAI() {
            var fileInput = document.getElementById('ai_voucher_image');
            var textInput = document.getElementById('ai_voucher_text').value;

            if (fileInput.files.length === 0 && textInput.trim() === '') {
                alert('กรุณาแนบรูป Voucher หรือวางข้อความก่อนครับ');
                return;
            }

            var formData = new FormData();
            if (fileInput.files.length > 0) formData.append('voucher_image', fileInput.files[0]);
            if (textInput.trim() !== '') formData.append('voucher_text', textInput);

            $('#btn-process-ai').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> กำลังวิเคราะห์...').prop('disabled', true);

            $.ajax({
                url: "pages/booking/function/ai-parser.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    $('#btn-process-ai').html('<i data-feather="zap"></i> ประมวลผล').prop('disabled', false);
                    if (typeof feather !== 'undefined') feather.replace();

                    try {
                        var aiTextResult = response.candidates[0].content.parts[0].text;
                        var parsedData = JSON.parse(aiTextResult);
                        var voucherData = parsedData.data;

                        console.log("AI Extracted Data:", voucherData);

                        // 1. สร้างคิวข้อมูลแบบรองรับหลายสัญชาติ
                        window.aiQueue = {
                            passengers: voucherData.passengers || [],
                            customerNames: voucherData.passenger_names || [],
                            telephone: voucherData.passenger_telephone_number,
                            categoryName: voucherData.category_name,
                            isProcessing: true,
                            // 💡 เพิ่มการเก็บค่ายอดเงินไว้ในคิว
                            cot: voucherData.price_cot,
                            deposit: voucherData.price_deposit,
                            totalPrice: voucherData.price_total
                        };

                        // 2. หยอดข้อมูลทั่วไป
                        if (voucherData.customerReference) $('#voucher_no').val(voucherData.customerReference).trigger('change');
                        if (voucherData.price_cot) $('#cot').val(voucherData.price_cot);

                        // หยอดเบอร์โทรและหมายเลขห้อง
                        if (voucherData.passenger_telephone_number) $('#telephone').val(voucherData.passenger_telephone_number);
                        if (voucherData.room_no) $('#room_no').val(voucherData.room_no);

                        // 💡 ใช้งานระบบ สถานที่รับ-ส่ง และ Suggestion Box
                        if (voucherData.pickup_address) {
                            $('#pickup_address').val(voucherData.pickup_address);

                            if (typeof searchAddress === "function") {
                                searchAddress(voucherData.pickup_address, 'pickup');
                            } else {
                                $('#pickup_address').trigger('keyup');
                            }
                        }

                        if (voucherData.dropoff_address) {
                            $('#dropoff_address').val(voucherData.dropoff_address);

                            if (typeof searchAddress === "function") {
                                searchAddress(voucherData.dropoff_address, 'dropoff');
                            } else {
                                $('#dropoff_address').trigger('keyup');
                            }
                        }

                        // 1. หยอดชื่อ Sales ลงในช่อง Sender
                        if (voucherData.sender_name) {
                            $('#sender').val(voucherData.sender_name);
                        }

                        // 2. จัดการ Extra Charge Repeater
                        if (voucherData.extra_charges && voucherData.extra_charges.length > 0) {
                            let $repeater = $('.extra-charge-repeater');

                            // เคลียร์รายการเริ่มต้นที่อาจจะมีค้างอยู่ 1 แถว (Optional)
                            // $repeater.find('[data-repeater-item]').not(':first').remove(); 

                            voucherData.extra_charges.forEach((item, index) => {
                                // ถ้า index > 0 ให้เพิ่มแถวใหม่ (ถ้า index = 0 ให้ใช้แถวแรกที่มีอยู่แล้ว)
                                if (index > 0) {
                                    $repeater.find('[data-repeater-create]').click();
                                }

                                // เลือกแถวที่กำลังทำงาน (แถวล่าสุด)
                                let $row = $repeater.find('[data-repeater-item]').last();

                                let $selectCharge = $row.find('select[name*="[extra_charge]"]');
                                let $inputCustom = $row.find('input[name*="[extc_name]"]');

                                // --- Logic Score Matching (เหมือนเดิม) ---
                                let bestMatch = {
                                    val: "0",
                                    score: 0
                                };
                                let searchLower = item.item_name.toLowerCase();
                                $selectCharge.find('option').each(function() {
                                    let optText = $(this).text().toLowerCase();
                                    let optVal = $(this).val();
                                    if (optVal === "0") return;
                                    let currentScore = 0;
                                    if (optText === searchLower) currentScore += 100;
                                    if (optText.includes(searchLower)) currentScore += 10;
                                    if (currentScore > bestMatch.score) {
                                        bestMatch = {
                                            val: optVal,
                                            score: currentScore
                                        };
                                    }
                                });

                                if (bestMatch.score >= 10) {
                                    $selectCharge.val(bestMatch.val).trigger('change');
                                } else {
                                    $selectCharge.val('0').trigger('change');
                                    $inputCustom.val(item.item_name);
                                }

                                // เลือกประเภท
                                $row.find('select[name*="[extra_type]"]').val(item.type).trigger('change');

                                // 💡 หยอดค่าลงในช่องต่างๆ (คราวนี้ adult และ child จะมาพร้อมกันใน item เดียว)
                                if (item.type == 1 || item.type == "1") {
                                    if (item.adult > 0) {
                                        $row.find('input[name*="[extra_adult]"]').val(item.adult);
                                        $row.find('input[name*="[extra_rate_adult]"]').val(item.rate_adult);
                                    }
                                    if (item.child > 0) {
                                        $row.find('input[name*="[extra_child]"]').val(item.child);
                                        $row.find('input[name*="[extra_rate_child]"]').val(item.rate_child);
                                    }
                                    if (item.infant > 0) {
                                        $row.find('input[name*="[extra_infant]"]').val(item.infant);
                                        $row.find('input[name*="[extra_rate_infant]"]').val(item.rate_infant);
                                    }
                                } else {
                                    $row.find('input[name*="[extra_num_private]"]').val(item.privates || 1);
                                    $row.find('input[name*="[extra_rate_private]"]').val(item.rate_private || 0);
                                }
                            });

                            if (typeof checke_rate_extar === "function") {
                                checke_rate_extar();
                            }
                        }

                        // ==========================================
                        // 💡 ใหม่! ระบบ Auto-Select Zone ด้วยระบบให้คะแนน (Fuzzy Match)
                        // ==========================================
                        if (voucherData.pickup_zone) {
                            console.log("🔍 กำลังค้นหา Pickup Zone:", voucherData.pickup_zone);
                            selectOptionByText('zone_pickup', voucherData.pickup_zone);
                        }

                        if (voucherData.dropoff_zone) {
                            console.log("🔍 กำลังค้นหา Dropoff Zone:", voucherData.dropoff_zone);
                            selectOptionByText('zone_dropoff', voucherData.dropoff_zone);
                        }
                        // ==========================================

                        // // 3. เริ่มต้นไม้ผลัดที่ 1: เลือก Agent และ Program
                        // if (voucherData.agent_name_text) {
                        //     selectOptionByText('agent', voucherData.agent_name_text);
                        // }

                        // แก้ปัญหา Flatpickr
                        if (voucherData.travel_date) {
                            let dateInput = document.querySelector('#travel_date');
                            if (dateInput && dateInput._flatpickr) {
                                dateInput._flatpickr.setDate(voucherData.travel_date, true);
                            } else {
                                $('#travel_date').val(voucherData.travel_date).trigger('change');
                            }
                        }

                        // หยอดเวลาและ Radio Button
                        if (voucherData.start_pickup) $('#start_pickup').val(voucherData.start_pickup);
                        if (voucherData.end_pickup) $('#end_pickup').val(voucherData.end_pickup);
                        if (voucherData.booking_type) $('input[name="booking_type"][value="' + voucherData.booking_type + '"]').prop('checked', true).trigger('change');
                        if (voucherData.pickup_type) {
                            $('input[name="pickup_type"][value="' + voucherData.pickup_type + '"]').prop('checked', true).trigger('change');
                            if (typeof check_transfer === "function") check_transfer();
                        }

                        if (voucherData.additional_comments) $('#bp_note').val(voucherData.additional_comments);
                        if (voucherData.pickup_address) {
                            $('#hotel_outside').val(voucherData.pickup_address);
                            $('#frm-hotel-pickup').prop('hidden', true);
                            $('#frm-hotel-outside').prop('hidden', false);
                        }

                        // 3. เริ่มต้นไม้ผลัดที่ 1
                        if (voucherData.agent_name_text) {
                            let result = selectOptionByText('agent', voucherData.agent_name_text);
                            checkMissingAiData('agent', voucherData.agent_name_text, result);
                        }

                        if (voucherData.program_name) {
                            let result = selectOptionByText('product_id', voucherData.program_name);
                            checkMissingAiData('product_id', voucherData.program_name, result);
                        }

                        // ==========================================
                        // 💡 ระบบแจ้งเตือนข้อมูลที่หายไป (Missing Data Alert)
                        // ==========================================
                        checkMissingAiData('agent', voucherData.agent_name_text);
                        checkMissingAiData('voucher_no_agent', voucherData.customerReference);
                        checkMissingAiData('travel_date', voucherData.travel_date);
                        checkMissingAiData('product_id', voucherData.program_name);
                        checkMissingAiData('pickup_address', voucherData.pickup_address);
                        checkMissingAiData('zone_pickup', voucherData.pickup_zone);
                        // คุณสามารถเพิ่มฟิลด์อื่นๆ ที่สำคัญ (Require) ลงไปได้เรื่อยๆ เลยครับ
                        // ==========================================

                        // เปลี่ยนให้ alert แจ้งเตือนแบบไม่ Block การทำงาน
                        setTimeout(() => {
                            alert('วิเคราะห์เสร็จสิ้น! ระบบกำลังหยอดข้อมูล กรุณารอสักครู่...');
                        }, 100);

                    } catch (e) {
                        console.error("Parsing Error:", e);
                        alert("เกิดข้อผิดพลาดในการแปลผลข้อมูลจาก AI");
                    }
                },
                error: function(err) {
                    $('#btn-process-ai').html('<i data-feather="zap"></i> ประมวลผล').prop('disabled', false);
                    alert("ไม่สามารถติดต่อเซิร์ฟเวอร์ AI ได้");
                }
            });
        }

        // =========================================================
        // 🌍 ระบบค้นหาและเลือกสถานที่อัตโนมัติ (DB & Google Maps)
        // =========================================================
        function searchAddress(keyword, type) {

            if (keyword.length < 3) {
                document.getElementById(type + "_suggest").innerHTML = "";
                return;
            }

            fetch("pages/booking/function/search-address.php?q=" + encodeURIComponent(keyword) + "&type=" + type)
                .then(res => res.text())
                .then(data => {
                    document.getElementById(type + "_suggest").innerHTML = data;
                });

        }

        function getGoogleDetail(placeId, type, address) {
            fetch(`pages/booking/function/get-coords.php?place_id=${placeId}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === "OK" && data.results.length > 0) {
                        const result = data.results[0];
                        const loc = result.geometry.location;
                        const lat = loc.lat;
                        const lng = loc.lng;

                        // 💡 สกัดชื่อ Zone (ตำบล หรือ อำเภอ) และ "ล้างคำขยะ" ให้สะอาดหมดจด
                        let zoneName = "";
                        if (result.address_components) {
                            let sublocality = result.address_components.find(c => c.types.includes("sublocality_level_1") || c.types.includes("sublocality"));
                            let locality = result.address_components.find(c => c.types.includes("locality"));

                            let rawZone = sublocality ? sublocality.long_name : (locality ? locality.long_name : "");

                            // ใช้ Regex ล้างคำว่า ตำบล, อำเภอ, Tambon, Amphoe, ต., อ. ออกให้เกลี้ยง
                            zoneName = rawZone.replace(/tambon|amphoe|ตำบล|อำเภอ|ต\.|อ\./gi, "").trim();
                        }

                        selectAddress(address, lat, lng, type, zoneName);
                    } else {
                        console.error("Geocoding failed:", data.status);
                        selectAddress(address, '', '', type, '');
                    }
                })
                .catch(err => {
                    console.error("Fetch error:", err);
                    selectAddress(address, '', '', type, '');
                });
        }

        function selectAddress(address, lat, lng, type, zoneName = '') {
            document.getElementById(type + "_address").value = address;

            if (lat && lat !== '' && lng && lng !== '') {
                let mapUrl = "https://maps.google.com/?q=" + lat + "," + lng;
                document.getElementById(type + "_latitude").value = mapUrl;
            } else {
                document.getElementById(type + "_latitude").value = "";
            }

            document.getElementById(type + "_suggest").innerHTML = "";

            // ======================================================
            // 💡 ระบบจัดการ Zone (ใช้ Score Matching ที่เรามีอยู่แล้ว)
            // ======================================================
            if (zoneName !== '') {
                let selectZoneId = type === 'pickup' ? 'zone_pickup' : 'zone_dropoff';

                console.log(`🔍 ค้นหา Zone ด้วยคำว่า: "${zoneName}"`);

                // 1. เรียกใช้ฟังก์ชันสุดฉลาดของเรา ให้มันหา "Nongtalay" ไปเทียบใน Dropdown
                let matchResult = selectOptionByText(selectZoneId, zoneName);

                // 💡 2. เช็คจาก matchResult.success แทน (ถ้าเป็น false ค่อยสร้างใหม่)
                if (!matchResult.success) {
                    console.log(`➕ ไม่พบโซนที่ใกล้เคียง -> กำลังสร้างโซนใหม่: ${zoneName}`);
                    let selectElement = $('#' + selectZoneId);

                    // บันทึกเฉพาะชื่อที่ล้างคำขยะแล้ว (ไม่มีคำว่า ตำบล)
                    let newOption = new Option(`${zoneName} (โซนใหม่)`, `NEW|${zoneName}`, true, true);
                    selectElement.append(newOption).trigger('change');
                }
            }
        }

        /**
         * ฟังก์ชันสำหรับแสดงตัวอย่างรูปภาพเมื่อมีการแนบไฟล์
         */
        function previewVoucherImage(input) {
            const container = document.getElementById('ai_preview_container');
            const preview = document.getElementById('ai_image_preview');

            // ตรวจสอบว่ามีการเลือกไฟล์จริงหรือไม่
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                // เมื่อ FileReader อ่านไฟล์เสร็จ
                reader.onload = function(e) {
                    // นำ Data URL ที่ได้ไปใส่เป็น src ของรูปภาพ
                    preview.src = e.target.result;
                    // แสดง Container
                    $(container).fadeIn();
                    // Render icon x อีกครั้ง (เผื่อใช้ feather icons)
                    if (typeof feather !== 'undefined') feather.replace();
                }

                // เริ่มอ่านไฟล์ในรูปแบบ Data URL
                reader.readAsDataURL(input.files[0]);
            } else {
                // ถ้าไม่มีการเลือกไฟล์ (เช่น กด Cancel) ให้ซ่อน
                removeVoucherImage();
            }
        }

        /**
         * ฟังก์ชันสำหรับลบรูปภาพตัวอย่างและล้างค่าใน Input
         */
        function removeVoucherImage() {
            const input = document.getElementById('ai_voucher_image');
            const container = document.getElementById('ai_preview_container');
            const preview = document.getElementById('ai_image_preview');

            // ล้างค่าใน input file (สำคัญมาก ไม่งั้นตอนกดแนบรูปเดิมมันจะไม่ trigger)
            input.value = "";
            // ซ่อน container
            $(container).fadeOut(function() {
                // ล้าง src ของรูปภาพเมื่อซ่อนเสร็จ
                preview.src = "#";
            });
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