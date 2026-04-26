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

        /* ------------------------------------- */
        /* STYLES สำหรับหน้า Assigned Vans       */
        /* ------------------------------------- */

        .van-card {
            transition: all 0.2s ease-in-out;
            border: 2px solid transparent;
            background-color: #ffffff;
            cursor: pointer;
        }

        .van-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08) !important;
            border-color: #e2e8f0;
        }

        /* สถานะตอนคลิกเลือกรถ */
        .van-card.active {
            border-color: #7367f0 !important;
            background-color: #f3f2fd !important;
            box-shadow: 0 4px 15px rgba(115, 103, 240, 0.2) !important;
        }

        .van-progress {
            height: 6px;
            border-radius: 4px;
            background-color: #e9ecef;
        }

        .assigned-panel-right {
            background-color: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        .assigned-booking-item {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 8px;
            transition: background-color 0.2s;
        }

        .assigned-booking-item:hover {
            background-color: #f8f9fa;
        }

        .cursor-move {
            cursor: grab;
        }

        .cursor-move:active {
            cursor: grabbing;
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

            // =========================================================
            // 🌟 ระบบค้นหาอัตโนมัติ (Auto-Search & Auto-Load)
            // =========================================================

            // 1. ฟังก์ชันดึงตัวกรองแบบ Dynamic (ตามวันที่)
            function fetchActiveFilters(date) {
                $.blockUI({
                    message: 'กำลังดึงข้อมูลเส้นทางประจำวัน...'
                });
                $.ajax({
                    url: 'pages/car-center/function/get-active-filters.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        travel_date: date
                    },
                    success: function(res) {

                        if (typeof res === 'string') res = JSON.parse(res);

                        if (res.status === 'success') {
                            // ยัด HTML ใหม่ลงไปใน Select
                            $('#waiting-park').html(res.html_parks);
                            $('#waiting-programs').html(res.html_programs);
                            $('#waiting-zones').html(res.html_zones);

                            // บังคับให้ Select2 รีเฟรช UI ใหม่ให้สวยงาม
                            $('#waiting-park, #waiting-programs, #waiting-zones').trigger('change.select2');

                            // 💡 ทริค: เมื่อโหลด Filter เสร็จ ให้เลือก "ทุกโปรแกรม" อัตโนมัติ เพื่อกระตุ้นให้โหลดตารางต่อทันที
                            let allProgramIds = [];
                            $('#waiting-programs option').each(function() {
                                if ($(this).val()) allProgramIds.push($(this).val());
                            });

                            // การสั่ง .trigger('change') ตรงนี้ จะไปกระตุ้นให้ fetchCarCenterData ทำงานทันที!
                            $('#waiting-programs').val(allProgramIds).trigger('change');
                        }
                    },
                    complete: function() {
                        $.unblockUI();
                    }
                });
            }

            // 2. ฟังก์ชันโหลดตารางจัดรถ (เหมือนเดิม)
            function fetchCarCenterData() {
                let travelDate = $('#waiting-date').val();
                let productIds = $('#waiting-programs').val();
                let zoneIds = $('#waiting-zones').val();

                if (!productIds || productIds.length === 0) {
                    masterPoolData = [];
                    waitingPoolData = [];
                    renderTables();
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
                        zone_ids: zoneIds
                    },
                    success: function(res) {
                        if (typeof res === 'string') res = JSON.parse(res);
                        if (res.status === 'success') {
                            let processedData = res.data.map(b => {
                                let uniqueUI_ID = b.bt_id + '_' + b.transfer_type_tag; // สร้าง ID หลอกให้หน้าจอ เพื่อไม่ให้ Checkbox ชนกัน
                                return {
                                    ...b,
                                    db_bt_id: b.bt_id, // 🌟 เก็บ ID แท้จาก Database ตรงนี้!
                                    bt_id: uniqueUI_ID,
                                    original_bt_id: uniqueUI_ID,
                                    base_guest_name: b.guest_name,
                                    is_split: false
                                };
                            });

                            masterPoolData = JSON.parse(JSON.stringify(processedData));
                            waitingPoolData = JSON.parse(JSON.stringify(processedData));

                            let totalWaitingPax = processedData.reduce((sum, b) => sum + parseInt(b.pax_total), 0);
                            $('#join-tab .badge').text(`(${totalWaitingPax} คน)`);

                            if (res.summary) {
                                $('#private-tab .badge').text(`(${res.summary.total_vans} คัน / ${res.summary.total_pax} คน)`);
                            }

                            renderTables();
                        }
                    },
                    complete: function() {
                        $.unblockUI();
                    }
                });
            }

            // 🎨 ฟังก์ชันคำนวณสีตัวหนังสือให้ตัดกับสีพื้นหลัง (ดำ/ขาว)
            function getContrastYIQ(hexcolor) {
                if (!hexcolor) return '#1f2937';
                hexcolor = hexcolor.replace("#", "");
                var r = parseInt(hexcolor.substr(0, 2), 16);
                var g = parseInt(hexcolor.substr(2, 2), 16);
                var b = parseInt(hexcolor.substr(4, 2), 16);
                var yiq = ((r * 299) + (g * 587) + (b * 114)) / 1000;
                return (yiq >= 128) ? '#1f2937' : '#ffffff'; // สว่าง=อักษรดำ, มืด=อักษรขาว
            }

            // 🎨 ฟังก์ชันวาดสีให้ Dropdown Zone (รายการที่กางออก)
            function formatZoneResult(zone) {
                if (!zone.id) return zone.text; // สำหรับหัวข้อ Optgroup
                let color = $(zone.element).data('color') || '#ccc';
                let textColor = getContrastYIQ(color);

                let $el = $(`<span style="font-weight:600;">${zone.text}</span>`);

                // ใช้ setTimeout เพื่อแทรกแซงสี CSS ของตัวเลือก (<li>) ให้กลายเป็นแผงสีเต็มๆ
                setTimeout(function() {
                    let $li = $el.closest('.select2-results__option');
                    $li.css({
                        'background-color': color,
                        'color': textColor,
                        'border-bottom': '1px solid #fff',
                        'margin-top': '2px',
                        'border-radius': '4px'
                    });
                    // ลบ hover สีทองทิ้งเวลาเอาเมาส์ชี้ เพื่อให้คงสีของโซนไว้
                    $li.hover(
                        function() {
                            $(this).css('background-color', color);
                        },
                        function() {
                            $(this).css('background-color', color);
                        }
                    );
                }, 0);

                return $el;
            }

            // 🎨 ฟังก์ชันวาดสีให้ Tag ที่ถูกเลือก (บนช่องค้นหา)
            function formatZoneSelection(zone) {
                if (!zone.id) return zone.text;

                // ดึงค่าสีจาก Database ถ้าไม่มีให้ใช้สีเทาเป็นค่าเริ่มต้น
                let color = $(zone.element).data('color') || '#82868b';
                let textColor = getContrastYIQ(color); // คำนวณสีตัวอักษร ขาว/ดำ อัตโนมัติ

                // วาด HTML ของ Tag โดยเพิ่มจุดสีเล็กๆ (Opacity 0.6) ไว้หน้าข้อความ เหมือนในรูปตัวอย่าง
                let $el = $(`
                    <span style="font-weight:600; display:flex; align-items:center;">
                        <span style="display:inline-block; width:10px; height:10px; border-radius:50%; background-color:${textColor}; margin-right:6px; opacity:0.6;"></span>
                        ${zone.text}
                    </span>
                `);

                // แทรกแซงสีพื้นหลังด้วย JS Native เพื่อบังคับใส่ !important ทับ Theme เดิม
                setTimeout(function() {
                    // หากล่อง Tag ที่ครอบตัวมันอยู่
                    let $choice = $el.closest('.select2-selection__choice');

                    if ($choice.length > 0) {
                        // บังคับเปลี่ยนสีพื้นหลังและกรอบ พร้อมใส่ !important
                        $choice[0].style.setProperty('background-color', color, 'important');
                        $choice[0].style.setProperty('border-color', color, 'important');
                        $choice[0].style.setProperty('color', textColor, 'important');

                        // ปรับสีปุ่มกากบาท (x) ให้กลืนกับตัวหนังสือ
                        let $removeBtn = $choice.find('.select2-selection__choice__remove');
                        if ($removeBtn.length > 0) {
                            $removeBtn[0].style.setProperty('color', textColor, 'important');
                        }
                    }
                }, 10); // หน่วงเวลา 10ms ให้ชัวร์ว่า Select2 สร้างกล่องใน DOM เสร็จแล้ว

                return $el;
            }

            // สั่งเปิดใช้งาน สี ให้กับช่องรอจัดรถ-โซน
            $('#waiting-zones').select2({
                placeholder: 'Select ...',
                templateResult: formatZoneResult,
                templateSelection: formatZoneSelection
            });

            // 3. ดักจับเมื่อ "วันที่" เปลี่ยนแปลง ➡️ ให้ไปโหลด Filter ใหม่
            $('#waiting-date').on('change', function() {
                fetchActiveFilters($(this).val());
            });

            // 4. ดักจับเมื่อ "โปรแกรม" หรือ "โซน" เปลี่ยนแปลง ➡️ ให้ไปโหลดตารางจัดรถ
            $('#waiting-programs, #waiting-zones').on('change', function(e) {
                // ป้องกันไม่ให้ trigger ทำงานซ้ำซ้อนตอนที่เรากำลัง load html
                if (e.namespace !== 'select2') {
                    fetchCarCenterData();
                }
            });

            // 5. Auto-load ตอนเปิดหน้าเว็บครั้งแรก (หน่วงเวลา 0.3 วิ)
            setTimeout(function() {
                fetchActiveFilters($('#waiting-date').val());
            }, 300);

            // 3. Auto-load ตอนเปิดหน้าเว็บครั้งแรก
            // 💡 ทริค: เพื่อให้ระบบค้นหาข้อมูลของ "วันนี้" ได้ทันที เราจะสั่งให้มัน 
            // "เลือกทุกโปรแกรม (Select All)" ให้อัตโนมัติ แล้วมันจะวิ่งไปค้นหาให้เองเลย
            setTimeout(function() {
                let allProgramIds = [];
                $('#waiting-programs option').each(function() {
                    if ($(this).val()) allProgramIds.push($(this).val());
                });

                // ยัดค่า ID ทั้งหมดลงไป แล้วสั่ง trigger('change') 
                // ซึ่งมันจะไปกระตุ้นให้ event ในข้อ 2 ทำงานโดยอัตโนมัติ
                $('#waiting-programs').val(allProgramIds).trigger('change');
            }, 300); // หน่วงเวลาเล็กน้อย 0.3 วิ ให้หน้าจอ Render UI เสร็จก่อน

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
                    // 🌟 ถ้ากำลังแก้ไขรถคันนี้อยู่ ไม่ต้องโชว์คนที่มีอยู่ในรถแล้วที่ตารางซ้ายมือ
                    if ($('#builder-manage-id').val() != '0' && activeBuilderOrder.includes(b.bt_id)) return;

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
                    let isChecked = activeBuilderOrder.includes(b.bt_id) ? 'checked' : '';
                    let tr = `
                        <tr id="row-${b.bt_id}">
                            <td class="text-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input chk-booking" id="chk-${b.bt_id}" data-id="${b.bt_id}" ${isChecked}>
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
            // 4. การคำนวณฝั่งขวา (Active Van Builder) แบบ Drag & Drop
            // ---------------------------------------------------------
            let activeBuilderOrder = []; // 🌟 เก็บ ID ตามลำดับที่ถูกเลือก/จัดเรียง
            let builderDragulaInst = null;

            $(document).on('change', '.chk-booking', function() {
                let id = $(this).data('id');
                if ($(this).is(':checked')) {
                    // ถ้าติ๊กเลือก ให้ดันเข้า Array ลำดับล่าสุด
                    if (!activeBuilderOrder.includes(id)) activeBuilderOrder.push(id);
                } else {
                    // ถ้าเอาติ๊กออก ให้ถอดจาก Array
                    activeBuilderOrder = activeBuilderOrder.filter(item => item !== id);
                }
                updateVanBuilderPanel();
            });

            function updateVanBuilderPanel() {
                let totalPax = 0; // 🌟 เริ่มนับจาก 0 (จะบวกรวมจากคนที่อยู่ในกล่องเอง)
                let selectedHtml = '';

                // 1. คัดกรอง ID ให้อยู่เฉพาะคนที่มีข้อมูล (ทั้งจากตารางซ้าย หรือ จากของเดิมที่ติดมากับรถ)
                activeBuilderOrder = activeBuilderOrder.filter(id =>
                    waitingPoolData.find(x => x.bt_id == id) || editingVanBookings.find(x => x.bt_id == id)
                );

                // 2. วาด HTML ฝั่งขวา ตามลำดับของ Array activeBuilderOrder
                activeBuilderOrder.forEach(function(id, index) {
                    let b = waitingPoolData.find(x => x.bt_id == id) || editingVanBookings.find(x => x.bt_id == id);
                    if (b) {
                        // ดึงยอดคน
                        let pax = parseInt(b.pax_total || b.assigned_pax || 0);
                        totalPax += pax;
                        let seqNum = index + 1;

                        let typeBadge = '';
                        if (b.transfer_type_tag === 'dropoff' || b.transfer_type === 'dropoff') typeBadge = '<span class="badge badge-light-danger ml-50">Dropoff</span>';
                        else if (b.transfer_type_tag === 'overnight' || b.transfer_type === 'overnight') typeBadge = '<span class="badge badge-light-info ml-50">Overnight</span>';

                        // 🌟 วางทับ selectedHtml เดิมเลยครับ
                        selectedHtml += `
                        <div class="selected-booking-item ${totalPax > maxVanCapacity ? 'border-danger' : ''}" data-id="${id}">
                            <div class="d-flex w-100 align-items-start">
                                <i data-feather="move" class="text-muted mr-50 mt-25 cursor-move" style="cursor: grab;"></i>
                                
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between mb-25">
                                        <b class="text-dark"><span class="seq-num">${seqNum}.</span> ${b.hotel_name || '-'} ${typeBadge}</b>
                                        <div>
                                            <span class="badge badge-light-secondary mr-50">${pax} Pax</span>
                                            <span class="cursor-pointer ml-50 btn-remove-from-builder no-drag" data-id="${id}">
                                                <i data-feather="x" class="text-danger"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="small text-muted d-flex align-items-center">
                                        <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background-color:${b.color_hex || '#ccc'}; margin-right:6px;"></span>
                                        <span class="text-truncate" style="max-width: 200px;" title="${b.zone_name}">
                                            ${b.zone_name} • ${b.guest_name || b.base_guest_name || '-'}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                    }
                });

                // 3. อัปเดตตัวเลข
                let remaining = maxVanCapacity - totalPax;
                $('.pax-counter-text.text-primary').html(`${totalPax}<span style="font-size:1.5rem;" class="text-secondary">/${maxVanCapacity}</span>`);

                let remSpan = $('.pax-counter-text').last();
                if (remaining < 0) {
                    remSpan.removeClass('text-success').addClass('text-danger font-weight-bolder').text(remaining);
                    // 🌟 ปลดล็อก: ลบบรรทัดที่สั่ง prop('disabled', true) ออก เพื่อให้กดบันทึกได้แม้คนจะล้น
                    $('#btn-assign-van').prop('disabled', false);
                } else {
                    remSpan.removeClass('text-danger font-weight-bolder').addClass('text-success').text(remaining);
                    $('#btn-assign-van').prop('disabled', false);
                }

                // 4. ยัดลงกล่อง
                $('#builder-booking-list').html(selectedHtml);
                if (feather) feather.replace();

                // 5. ผูกระบบ Drag & Drop (สร้างแค่ครั้งเดียว)
                if (!builderDragulaInst) {
                    builderDragulaInst = dragula([document.getElementById('builder-booking-list')], {
                        moves: function(el, container, handle) {
                            if (handle.closest('.no-drag')) return false;
                            return handle.classList.contains('cursor-move');
                        }
                    }).on('drop', function() {
                        activeBuilderOrder = [];
                        $('#builder-booking-list .selected-booking-item').each(function(index) {
                            activeBuilderOrder.push($(this).data('id'));
                            $(this).find('.seq-num').text((index + 1) + ".");
                        });
                        updateVanBuilderPanel();
                    });
                }
            }

            $(document).on('click', '.btn-remove-from-builder', function(e) {
                e.preventDefault();
                e.stopPropagation();

                let id = $(this).data('id');

                activeBuilderOrder = activeBuilderOrder.filter(x => x != id);

                updateVanBuilderPanel();
            });

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

                // 1. ดึงข้อมูลรายการที่อยู่ในกล่อง
                let selectedBookings = [];
                $('#builder-booking-list .selected-booking-item').each(function() {
                    let id = $(this).data('id');
                    let b = waitingPoolData.find(x => x.bt_id == id) || editingVanBookings.find(x => x.bt_id == id);
                    if (b) {
                        selectedBookings.push({
                            // 🌟 ใช้ b.db_bt_id สำหรับคนใหม่ และ b.bt_id สำหรับคนเดิม
                            bt_id: b.db_bt_id ? b.db_bt_id : b.bt_id,
                            transfer_type: b.transfer_type_tag || b.transfer_type,
                            updated_at: b.updated_at || '',
                            adult: b.adult || b.assigned_pax, // 🌟 คนเดิมใช้ assigned_pax แทน
                            child: b.child || 0,
                            infant: b.infant || 0,
                            foc: b.foc || 0
                        });
                    }
                });

                // 2. จัดเตรียม Payload ส่งไปให้ PHP
                let payload = {
                    action: 'assign_van',
                    travel_date: $('#waiting-date').val() || '',
                    product_id: 1,
                    car_id: $('#van-waiting').val() || 0,
                    seat: $('#van-waiting option:selected').attr('data-seat') || 12,
                    driver_id: $('#driver-waiting').val() || 0,
                    // 🌟 ดึง ID จากโหมดเติมรถ (ถ้าโหมดปกติจะเป็น 0 อัตโนมัติ)
                    manage_id: parseInt($('#builder-manage-id').val()) || 0,
                    bookings: selectedBookings
                };

                // 3. ยิงไปหา API ที่เราเพิ่งเขียน
                $.ajax({
                    url: 'pages/car-center/function/save-van-builder.php',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function(res) {

                        if (typeof res === 'string') res = JSON.parse(res);

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
                                resetAppendMode(); // 🌟 คืนค่าหน้าจอกลับเป็นโหมดสร้างรถปกติ
                                fetchCarCenterData();
                            });
                        } else {
                            // สำเร็จ 100%
                            Swal.fire({
                                icon: 'success',
                                title: 'จัดรถสำเร็จเรียบร้อย!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                // 🌟 เก็บค่าไว้ก่อนว่าตะกี้เราอยู่ในโหมดแก้ไขใช่หรือไม่?
                                let wasEditing = $('#builder-manage-id').val() > 0;

                                // 🌟 สั่งล้างหน้าจอ คืนค่ากลับเป็นโหมดปกติ
                                resetAppendMode();

                                // 🌟 โหลดตารางรอจัดรถใหม่
                                fetchCarCenterData();

                                // 🌟 ไม้ตาย UX: ถ้าตะกี้เป็นการ "แก้ไขรถ" ให้ดีดกลับไปแท็บ "จัดรถแล้ว" อัตโนมัติ เพื่อดูผลงาน
                                if (wasEditing) {
                                    $('#private-tab').tab('show');
                                }
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

            // ---------------------------------------------------------
            // Interaction สำหรับคลิกเลือก Van Card
            // ---------------------------------------------------------
            $(document).on('click', '.van-card', function() {
                // เอา class active ออกจากทุกการ์ด
                $('.van-card').removeClass('active');
                // ใส่ class active ให้การ์ดที่ถูกคลิก
                $(this).addClass('active');

                // TODO: ดึง ID ของรถคันนี้ไป Query ข้อมูลรายชื่อลูกค้ามาแสดงฝั่งขวา
                // let manageId = $(this).data('manage-id');
                // fetchAssignedVanDetails(manageId);
            });

            // =========================================================
            // 🚐 ระบบจัดการหน้า "จัดรถแล้ว (Assigned Vans)" & Drag and Drop
            // =========================================================
            let assignedVansData = [];
            let currentSelectedManageId = null;
            let dragulaInst = null; // ตัวแปรเก็บ Instance ของ Drag & Drop

            // 1. ฟังก์ชันดึงข้อมูลรถที่จัดแล้วทั้งหมด
            function fetchAssignedVans() {
                let travelDate = $('#waiting-date').val();
                $.ajax({
                    url: "pages/car-center/function/get-assigned-vans.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        travel_date: travelDate
                    },
                    success: function(res) {
                        if (res.status === 'success') {
                            assignedVansData = res.data;
                            renderAssignedVansGrid();
                        }
                    }
                });
            }

            // 2. ฟังก์ชันวาด Card รถ ฝั่งซ้าย
            function renderAssignedVansGrid() {
                let html = '';
                assignedVansData.forEach((van, index) => {
                    let isFull = van.total_pax >= van.seat;
                    let progressPct = (van.total_pax / van.seat) * 100;
                    if (progressPct > 100) progressPct = 100; // กันหลอดทะลุ

                    let statusHtml = isFull ? `<small class="text-danger font-weight-bold">เต็มแล้ว</small>` : `<small class="text-muted">ว่าง ${van.seat - van.total_pax} ที่นั่ง</small>`;
                    let pBarClass = isFull ? 'progress-bar-danger' : 'progress-bar-primary';

                    // ถ้าไม่มีคันไหนถูกเลือกเลย ให้ Auto-select คันแรก
                    if (!currentSelectedManageId && index === 0) currentSelectedManageId = van.id;
                    let activeClass = (currentSelectedManageId == van.id) ? 'active' : '';

                    html += `
                        <div class="col-xl-4 col-sm-6 mb-2">
                            <div class="card van-card ${activeClass} shadow-sm h-100" data-manage-id="${van.id}">
                                <div class="card-body p-1 d-flex flex-column">
                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                        <div class="avatar ${isFull ? 'bg-light-danger' : 'bg-light-primary'} p-50 mr-1">
                                            <div class="avatar-content"><i data-feather="truck" class="font-medium-5"></i></div>
                                        </div>
                                        <div>
                                            <h5 class="mb-0 font-weight-bolder">${van.car_name || 'รถเสริม'} <span class="${isFull ? 'text-danger' : 'text-warning'}">[${van.total_pax}/${van.seat}]</span></h5>
                                            ${statusHtml}
                                        </div>
                                    </div>
                                    <div class="mb-1 small">
                                        <div><i data-feather="user" width="12"></i> ผู้ขับ: <b>${van.driver_name || 'ไม่ระบุ'}</b></div>
                                        <div class="text-truncate" title="${van.zones_summary}"><i data-feather="map-pin" width="12"></i> โซน: <b>${van.zones_summary || '-'}</b></div>
                                    </div>
                                    <div class="progress ${pBarClass} van-progress mb-1">
                                        <div class="progress-bar" role="progressbar" style="width: ${progressPct}%"></div>
                                    </div>

                                    <div class="mt-auto row mx-0 text-center">
                                        <div class="col-6 px-25">
                                            <button class="btn btn-sm btn-outline-secondary btn-block btn-edit-van" data-id="${van.id}">แก้ไข</button>
                                        </div>
                                        <div class="col-6 px-25">
                                            <button class="btn btn-sm btn-primary btn-block">พิมพ์</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });

                $('#assigned-van-grid').html(html);
                if (feather) feather.replace();

                // วาดรายละเอียดฝั่งขวาตามรถที่ถูกเลือก
                renderAssignedVanDetails();
            }

            // 3. คลิกเปลี่ยนรถ (เปลี่ยนการ์ดสีม่วง)
            $(document).on('click', '.van-card', function() {
                $('.van-card').removeClass('active');
                $(this).addClass('active');
                currentSelectedManageId = $(this).data('manage-id');
                renderAssignedVanDetails();
            });

            // 4. ฟังก์ชันวาดคิวรถฝั่งขวา (หน้าจัดรถแล้ว - เป็นแค่ Info ธรรมดา)
            function renderAssignedVanDetails() {
                let van = assignedVansData.find(v => v.id == currentSelectedManageId);
                if (!van) {
                    $('.assigned-panel-right').hide();
                    return;
                }
                $('.assigned-panel-right').show();

                // สรุปข้อมูล Header
                $('.assigned-panel-right h4 span:first').text(`ข้อมูลสรุป ${van.car_name || 'รถเสริม'}`);
                $('.assigned-panel-right h4 span.badge').text(`${van.total_pax}/${van.seat}`);
                $('.assigned-panel-right .small').html(`
                    <div><b>ผู้ขับ:</b> ${van.driver_name || '-'} (${van.telephone || '-'})</div>
                    <div><b>โซนหลัก:</b> ${van.zones_summary || '-'}</div>
                `);

                // วาดรายชื่อลูกค้าแบบธรรมดา (ไม่มี cursor-move, ไม่มีไอคอนลาก)
                let listHtml = '';
                van.bookings.forEach((b, idx) => {
                    let typeBadge = '';
                    if (b.transfer_type === 'dropoff') typeBadge = '<span class="badge badge-light-danger ml-50">Dropoff</span>';
                    else if (b.transfer_type === 'overnight') typeBadge = '<span class="badge badge-light-info ml-50">Overnight</span>';

                    listHtml += `
                        <div class="assigned-booking-item mb-1">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <b class="text-dark">${idx + 1}. ${b.hotel_name || '-'} ${typeBadge}</b>
                                        <span class="badge badge-light-secondary">${b.assigned_pax} Pax</span>
                                    </div>
                                    <div class="small text-muted">${b.guest_name} (${b.nationality || '-'}) • Rm: ${b.room_no || '-'}</div>
                                    <div class="small text-muted"><i data-feather="clock" width="10"></i> ${b.action_time}</div>
                                </div>
                            </div>
                        </div>
                    `;
                });

                $('#assigned-booking-list').html(listHtml);
                if (feather) feather.replace();

                // 🌟 ปิดการใช้งาน Dragula ในหน้านี้แล้ว (ไม่ต้องมีโค้ด dragulaInst)
            }

            // 5. ดักจับเมื่อกดสลับ Tab ไปที่ "จัดรถแล้ว" ให้โหลดข้อมูล
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                if ($(e.target).attr('id') === 'private-tab') { // id="private-tab" คือแท็บจัดรถแล้วของคุณ
                    currentSelectedManageId = null; // รีเซ็ตเพื่อดึงคันแรกใหม่
                    fetchAssignedVans();
                }
            });

            // ---------------------------------------------------------
            // 💾 6. บันทึกการลากสลับคิว (Save Drag & Drop Arrange)
            // ---------------------------------------------------------
            $('#btn-save-arrange').on('click', function() {
                if (!currentSelectedManageId) return; // ถ้าไม่ได้เลือกรถอยู่ ให้ข้ามไป

                let reorderedBookings = [];

                // วนลูปอ่านค่าจากหน้าจอ (จากบนลงล่าง ตามที่ผู้ใช้ลากสลับแล้ว)
                $('#assigned-booking-list .assigned-booking-item').each(function(index) {
                    let arrangeNum = index + 1; // ลำดับ 1, 2, 3...
                    let btId = $(this).data('btid'); // ID ของ Booking
                    let transferType = $(this).data('type'); // ประเภท pickup, dropoff, overnight

                    reorderedBookings.push({
                        arrange: arrangeNum,
                        bt_id: btId,
                        transfer_type: transferType
                    });
                });

                if (reorderedBookings.length === 0) return;

                $.blockUI({
                    message: 'กำลังบันทึกคิว...'
                });

                // ยิง API บันทึกข้อมูล
                $.ajax({
                    url: 'pages/car-center/function/save-arrange.php',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        manage_id: currentSelectedManageId,
                        bookings: reorderedBookings
                    }),
                    success: function(res) {
                        if (typeof res === 'string') res = JSON.parse(res);
                        if (res.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'บันทึกคิวเรียบร้อย!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                // โหลดข้อมูลใหม่ เพื่อให้ UI ดึงข้อมูลที่เรียงลำดับใหม่จาก DB มาแสดง (อัปเดตเวลาด้วย)
                                fetchAssignedVans();
                            });
                        } else {
                            Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถบันทึกคิวได้ กรุณาลองใหม่', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'ติดต่อเซิร์ฟเวอร์ไม่ได้', 'error');
                    },
                    complete: function() {
                        $.unblockUI();
                    }
                });
            });

            // ---------------------------------------------------------
            // 🗑️ 7. ดีดออก (Remove Van & Unassign Bookings)
            // ---------------------------------------------------------
            $('#btn-remove-van').on('click', function() {
                if (!currentSelectedManageId) return;

                Swal.fire({
                    title: 'ยืนยันการดีดออก?',
                    text: "ระบบจะทำการลบรถคันนี้ทิ้ง และลูกค้าทั้งหมดจะถูกส่งกลับไปที่ตะกร้า 'รอจัดรถ'",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ea5455', // สีแดง
                    cancelButtonColor: '#82868b',
                    confirmButtonText: 'ใช่, ดีดออกเลย!',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.blockUI({
                            message: 'กำลังคืนคิวลูกค้า...'
                        });

                        $.ajax({
                            url: 'pages/car-center/function/remove-van.php',
                            type: 'POST',
                            contentType: 'application/json',
                            data: JSON.stringify({
                                manage_id: currentSelectedManageId
                            }),
                            success: function(res) {
                                if (typeof res === 'string') res = JSON.parse(res);
                                if (res.status === 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'ดีดออกเรียบร้อย!',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then(() => {
                                        // 1. รีเซ็ต ID รถที่ถูกเลือก
                                        currentSelectedManageId = null;

                                        // 2. รีเฟรชฝั่งรถที่จัดแล้ว (รถคันนั้นจะหายไปจากหน้าจอ)
                                        fetchAssignedVans();

                                        // 3. รีเฟรชฝั่งรอจัดรถแบบเงียบๆ (เพื่ออัปเดตตัวเลขคนรอบน Tab ใหม่ให้ถูกต้อง)
                                        fetchCarCenterData();
                                    });
                                } else {
                                    Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถดีดออกได้', 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Error', 'ติดต่อเซิร์ฟเวอร์ไม่ได้', 'error');
                            },
                            complete: function() {
                                $.unblockUI();
                            }
                        });
                    }
                });
            });


            // เมื่อเปลี่ยนรถใน Modal ให้ปรับตัวเลข Seat ให้อัตโนมัติ
            $('#edit-van-car').on('change', function() {
                let seat = $(this).find(':selected').data('seat');
                if (seat) $('#edit-van-seat').val(seat);
            });

            // 2. ฟังก์ชันยกเลิกโหมดเติมรถ (กลับสู่โหมดสร้างรถใหม่)
            function resetAppendMode() {
                $('#builder-manage-id').val(0);
                $('#builder-base-pax').val(0);
                $('#van-waiting').prop('disabled', false).val('0').trigger('change');
                $('#driver-waiting').prop('disabled', false).val('0').trigger('change');
                $('#append-mode-alert').addClass('d-none');
                $('#btn-assign-van').html('<i data-feather="check"></i> ASSIGN CAR');

                editingVanBookings = []; // 🌟 ล้างข้อมูลคนเดิม
                activeBuilderOrder = []; // 🌟 ล้างกล่องขวาให้ว่างเปล่า
                $('.chk-booking').prop('checked', false);

                renderTables();
                updateVanBuilderPanel();
            }

            // เมื่อกดกากบาท (X) ยกเลิกโหมดเติมรถ
            $(document).on('click', '#btn-cancel-append', function() {
                resetAppendMode();
            });

            let editingVanBookings = []; // 🌟 เก็บข้อมูลลูกค้าเดิมที่อยู่ในรถคันที่กำลังแก้

            $(document).on('click', '.btn-edit-van', function(e) {
                e.stopPropagation();
                let manageId = $(this).data('id');
                let van = assignedVansData.find(v => v.id == manageId);

                if (van) {
                    // 1. ตั้งค่าโหมดแก้ไข
                    $('#builder-manage-id').val(van.id);
                    $('#builder-base-pax').val(0); // ในโหมดแก้ไข เราจะนับใหม่ทั้งหมดจากที่อยู่ในกล่อง

                    // 2. ล็อกค่ารถและคนขับ (แต่ไม่ disabled เพื่อให้เปลี่ยนได้)
                    $('#van-waiting').val(van.car_id || 0).trigger('change');
                    $('#driver-waiting').val(van.driver_id || 0).trigger('change');

                    // 3. เตรียมข้อมูลลูกค้าเดิมเข้าระบบ Builder
                    editingVanBookings = JSON.parse(JSON.stringify(van.bookings));
                    activeBuilderOrder = editingVanBookings.map(b => b.bt_id);

                    // 4. แสดง Alert และสลับแท็บ
                    $('#append-van-name').html(`แก้ไข: <b>${van.car_name || 'รถเสริม'}</b>`);
                    $('#append-mode-alert').removeClass('d-none');
                    $('#btn-assign-van').html('<i data-feather="save"></i> UPDATE VAN');

                    $('#join-tab').tab('show');

                    // 5. วาดตารางใหม่ (เพื่อให้ลูกค้าในรถคันนี้หายไปจากตารางซ้ายมือ)
                    renderTables();
                    updateVanBuilderPanel();
                }
            });

            $(document).on('click', '.btn-remove-from-builder', function() {
                let id = $(this).data('id');
                activeBuilderOrder = activeBuilderOrder.filter(item => item !== id);
                $(`#chk-${id}`).prop('checked', false); // ปลดติ๊กที่ตารางซ้าย (ถ้ามี)

                renderTables();
                updateVanBuilderPanel();
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