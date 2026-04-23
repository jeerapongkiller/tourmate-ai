<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="<?php echo $main_description; ?>">
    <meta name="keywords" content="<?php echo $main_keywords; ?>">
    <meta name="author" content="<?php echo $main_author; ?>">
    <title>Cars Center - <?php echo $main_title; ?></title>
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

            let masterPoolData = []; // 🌟 เก็บของแท้ห้ามแก้
            let waitingPoolData = []; // ข้อมูลที่โดนตัดแบ่งแล้ว (เอาไปโชว์ในตาราง)
            let maxVanCapacity = 12;

            // 1. กดปุ่มดึงข้อมูลจริงจากระบบ
            $('#btn-fetch-waiting').on('click', function() {
                let travelDate = $('#waiting-date').val();
                let productIds = $('#waiting-programs').val();
                let zoneIds = $('#waiting-zones').val();

                if (!productIds || productIds.length === 0) {
                    Swal.fire('แจ้งเตือน', 'กรุณาเลือกโปรแกรมทัวร์อย่างน้อย 1 โปรแกรม', 'warning');
                    return;
                }

                $.blockUI({
                    message: 'กำลังค้นหาพิกัดและเส้นทาง...'
                });

                $.ajax({
                    url: "pages/car-center/function/get-unassigned-json.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        travel_date: travelDate,
                        product_ids: productIds,
                        zone_ids: zoneIds,
                    },
                    success: function(res) {
                        // console.log('Raw Response:', res);
                        if (typeof res === 'string') {
                            res = JSON.parse(res);
                        }

                        if (res.status === 'success') {
                            // 🌟 แอบเพิ่มข้อมูลพื้นฐานให้ JSON ดิบ และแก้ปัญหา ID ซ้ำกัน
                            let processedData = res.data.map(b => {
                                let uniqueUI_ID = b.bt_id + '_' + b.transfer_type_tag; // สร้าง ID ไม่ให้ซ้ำ (เช่น 7_pickup, 7_dropoff)
                                return {
                                    ...b,
                                    db_bt_id: b.bt_id, // 🌟 เก็บ ID แท้ๆ ไว้ส่งให้ Database ตอน Save
                                    bt_id: uniqueUI_ID, // หลอกหน้าบ้านให้ใช้ ID ที่ไม่ซ้ำกัน Checkbox จะได้ไม่รวน
                                    original_bt_id: uniqueUI_ID, // สำหรับระบบ Merge
                                    base_guest_name: b.guest_name, // จำชื่อแท้ไว้
                                    is_split: false
                                };
                            });

                            masterPoolData = JSON.parse(JSON.stringify(processedData));
                            waitingPoolData = JSON.parse(JSON.stringify(processedData));

                            renderTables();
                        }
                    },
                    complete: function() {
                        $.unblockUI();
                    }
                });
            });

            // ---------------------------------------------------------
            // 3. วาดตาราง (Render Tables)
            // ---------------------------------------------------------
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

                    // 🌟 เพิ่มป้าย Badge เพื่อให้พนักงานรู้ว่าบรรทัดไหนคือขากลับ
                    let typeBadge = '';
                    if (b.transfer_type_tag === 'dropoff') typeBadge = '<span class="badge badge-light-danger ml-50">Dropoff</span>';
                    else if (b.transfer_type_tag === 'overnight') typeBadge = '<span class="badge badge-light-info ml-50">Overnight</span>';

                    // HTML ของแต่ละ Row
                    let tr = `
                        <tr id="row-${b.bt_id}">
                            <td class="text-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input chk-booking" id="chk-${b.bt_id}" data-id="${b.bt_id}">
                                    <label class="custom-control-label" for="chk-${b.bt_id}"></label>
                                </div>
                            </td>
                            <td>
                                <span class="badge" style="background-color: ${b.color_hex || '#ccc'}; color: #1f2937;">${b.zone_name}</span>
                                <br><small class="text-muted">Time: ${b.action_time}</small>
                            </td>
                            <td>${b.hotel_name} ${typeBadge}<br><small class="text-muted">Room: ${b.room_no}</small></td>
                            <td>${b.guest_name}<br><small class="text-muted">Nation: ${b.nationality}, Tel: ${b.guest_phone}</small></td>
                            <td>${b.voucher_no}<br><small class="text-muted">Agent: ${b.company_name}</small></td>
                            <td class="text-center">${b.product_name}</td>
                            <td class="text-center font-weight-bold text-primary">${b.pax_total}</td>
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
                                    <td colspan="9" style="background-color: #f0fdf4; color: #166534; font-weight: 600; text-align: center; border-top: 2px dashed #22c55e; border-bottom: 2px dashed #22c55e; padding: 6px;">
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
                                    <td colspan="9" style="background-color: #f0fdf4; color: #166534; font-weight: 600; text-align: center; border-top: 2px dashed #22c55e; border-bottom: 2px dashed #22c55e; padding: 6px;">
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
                        ${b.hotel_name} - ${b.guest_name} 
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

            // ---------------------------------------------------------
            // 5. ระบบตัดแบ่งคน (Split Logic ✂️)
            // ---------------------------------------------------------
            // เมื่อเปลี่ยนรถ ให้ดึง Seat มาอัปเดต Max Capacity
            $('#van-select').on('change', function() {
                // สมมติว่าดึง data-seat จาก option ที่เลือก
                // maxVanCapacity = parseInt($(this).find(':selected').data('seat'));
                updateVanBuilderPanel();
            });

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
                let vanId = $('#van-waiting').val();
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
                            bt_id: b.db_bt_id, // 🌟 ใช้ db_bt_id ที่เป็นเลข 7 เพียวๆ ส่งกลับให้ Database
                            transfer_type: b.transfer_type_tag, // pickup, dropoff, overnight
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
                    car_id: $('#van-waiting').val() || 0,
                    seat: $('#van-waiting option:selected').attr('data-seat') || 12,
                    driver_id: $('#driver-waiting').val() || 0,
                    manage_id: 0, // 0 = เปิดรถใหม่
                    bookings: selectedBookings
                };

                // 3. ยิงไปหา API ที่เราเพิ่งเขียน
                $.ajax({
                    url: 'pages/car-center/function/save-van-builder.php',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function(res) {
                        // console.log(res);
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
                                $('#btn-fetch-waiting').trigger('click');
                            });
                        } else {
                            // สำเร็จ 100%
                            Swal.fire({
                                icon: 'success',
                                title: 'จัดรถสำเร็จเรียบร้อย!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                // 🌟 สั่งให้จำลองการกดปุ่ม "ค้นหา" เพื่อรีเฟรชข้อมูลอัตโนมัติ
                                $('#btn-fetch-waiting').trigger('click');
                            });
                        }
                    }
                });
            });

            $('#van-waiting').on('change', function() {
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
            $('#waiting-park').on('change', function() {
                let selectedParkId = $(this).val();
                let $programSelect = $('#waiting-programs');

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