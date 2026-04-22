<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="<?php echo $main_description; ?>">
    <meta name="keywords" content="<?php echo $main_keywords; ?>">
    <meta name="author" content="<?php echo $main_author; ?>">
    <title>Dashboard - <?php echo $main_title; ?></title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
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
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/fontawesome/css/all.css" rel="stylesheet">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

    <style>
        .table th,
        .table td {
            padding: 0.5rem 0.7rem;
            vertical-align: middle;
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
    <script src="app-assets/fonts/fontawesome/js/all.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <script src="app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
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

    <!-- BEGIN: Page JS-->
    <script type="text/javascript">
        $(document).ready(function() {
            var jqFormBooking = $('#booking-create-form'),
                jqForm = $('#booking-search-form'),
                jqFormLT = $('#long-tail-form'),
                jqFormChrage = $('#for-chrage-form'),
                picker = $('#dob'),
                dtPicker = $('#dob-bootstrap-val'),
                basicPickr = $('.flatpickr-basic'),
                pageBlockSpinner = $('.btn-page-block-spinner'),
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

            $('.for-charge-repeater').repeater({
                show: function() {
                    $(this).slideDown();

                    renderRadio($(this));

                    feather && feather.replace();
                },
                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                },
            });

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

            $('.numeral-mask').toArray().forEach(function(field) {
                new Cleave(field, {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand'
                });
            });


            // $('.discount-repeater').repeater({
            //     show: function() {
            //         $(this).slideDown();

            //         feather && feather.replace();
            //     },
            //     hide: function(deleteElement) {
            //         $(this).slideUp(deleteElement);
            //     },
            //     ready: function() {
            //         $(this).slideDown();

            //         console.log($(this));

            //         $('.numeral-mask').toArray().forEach(function(field) {
            //             new Cleave(field, {
            //                 numeral: true,
            //                 numeralThousandsGroupStyle: 'thousand'
            //             });
            //         });
            //         // $('[data-repeater="select2"]').select2(); 
            //     }
            // });

            if (jqFormLT.length) {
                $.validator.addMethod("regex", function(value, element, regexp) {
                    return this.optional(element) || regexp.test(value);
                }, "Please check your input.");

                jqFormLT.validate({
                    rules: {

                    },
                    messages: {

                    },
                    submitHandler: function(form) {
                        var action = ($('#longtail_id').val() == 0) ? 'create' : 'edit';
                        // update ajax request data
                        var formData = new FormData(form);
                        formData.append('action', action);
                        $.ajax({
                            url: "pages/dashboard/function/long-tail.php",
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
                            }
                        });
                    }
                });
            }

            if (jqFormChrage.length) {
                $.validator.addMethod("regex", function(value, element, regexp) {
                    return this.optional(element) || regexp.test(value);
                }, "Please check your input.");

                jqFormChrage.validate({
                    rules: {

                    },
                    messages: {

                    },
                    submitHandler: function(form) {
                        var action = ($('#chrage_id').val() == 0) ? 'create' : 'edit';
                        // update ajax request data
                        var formData = new FormData(form);
                        formData.append('action', action);
                        $.ajax({
                            url: "pages/dashboard/function/for-chrage.php",
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
                            }
                        });
                    }
                });
            }
        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
        }

        $(document).on('input', '#adult, #rates_adult, #child, #rates_child, #infant, #rates_infant, #unit, #rates_private', function() {
            calculateTotals();
        });

        function modal_long_tail(extra_div, bo_id) {
            document.getElementById('longtail_bo').value = bo_id;

            array_extra = extra_div.dataset['extra'];
            var extra = (array_extra !== '') ? $.parseJSON(array_extra) : '';
            document.getElementById('longtail_id').value = (extra.id) ? extra.id : 0;
            document.getElementById('adult').value = (extra.adult) ? extra.adult : 0;
            document.getElementById('child').value = (extra.child) ? extra.child : 0;
            document.getElementById('infant').value = (extra.infant) ? extra.infant : 0;
            document.getElementById('rates_adult').value = (extra.rate_adult) ? extra.rate_adult : 0;
            document.getElementById('rates_child').value = (extra.rate_child) ? extra.rate_child : 0;
            document.getElementById('rates_infant').value = (extra.rate_infant) ? extra.rate_infant : 0;
            document.getElementById('boat_join').checked = (extra.type) ? (extra.type == 1) ? true : false : true;
            document.getElementById('boat_private').checked = (extra.type && extra.type == 2) ? true : false;
            document.getElementById('unit').value = (extra.privates) ? extra.privates : 0;
            document.getElementById('rates_private').value = (extra.rate_private) ? extra.rate_private : 0;

            hide_div('long-tail');
        }

        function update_status(action, id, status) {
            status = (action == 'confirm') ? (document.getElementById('checkbox' + id).checked == true) ? 1 : 0 : status;
            var formData = new FormData();
            formData.append('action', action); // boat | transfer | cot | confirm
            formData.append('id', id);
            formData.append('status', status);

            $.ajax({
                url: "pages/dashboard/function/edit-status.php",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    // console.log(response);
                    location.reload();
                }
            });
        }

        function hide_div(el) {
            if (el === 'long-tail') {
                document.getElementById('div-boat-join').hidden = (document.getElementById('boat_join').checked == false) ? true : false;
                document.getElementById('div-boat-private').hidden = (document.getElementById('boat_join').checked == true) ? true : false;

                calculateTotals();
            } else if (el) {
                let $item = $(el).closest('[data-repeater-item]');
                if (el.id.includes('category') === true) {
                    let category_id = el.value;
                    let rates = (category_id > 0) ? CURRENT_CATEGORY.find(({
                        id
                    }) => id == category_id).rates : [];
                    $item.find('[id^="rates_adult_chrage"]').val(rates.rates_adult);
                    $item.find('[id^="rates_child_chrage"]').val(rates.rates_child);
                    $item.find('[id^="rates_infant_chrage"]').val(rates.rates_infant);

                    $item.find('.total-adult-chrage').html(numberWithCommas(rates.rates_adult));
                    $item.find('.total-child-chrage').html(numberWithCommas(rates.rates_child));
                    $item.find('.total-infant-chrage').html(numberWithCommas(rates.rates_infant));
                } else if (el.name.includes('chrage_type') === true) {

                    if (el.value == 1) {
                        $item.find('.value-type-wrapper').show();
                        $item.find('.percent-adult').show();
                        $item.find('.div-rates-adult').show();
                        $item.find('.rates-adult-chrage').show();

                        $item.find('.percent-child').show();
                        $item.find('.div-rates-child').show();
                        $item.find('.rates-child-chrage').show();

                        $item.find('.percent-infant').show();
                        $item.find('.div-rates-infant').show();
                        $item.find('.rates-infant-chrage').show();
                    } else if (el.value == 2) {
                        $item.find('.value-type-wrapper').hide();
                        $item.find('.percent-adult').hide();
                        $item.find('.div-rates-adult').hide();
                        $item.find('.rates-adult-chrage').hide();

                        $item.find('.percent-child').hide();
                        $item.find('.div-rates-child').hide();
                        $item.find('.rates-child-chrage').hide();

                        $item.find('.percent-infant').hide();
                        $item.find('.div-rates-infant').hide();
                        $item.find('.rates-infant-chrage').hide();

                        $item.find('.total-adult-chrage').html(numberWithCommas($item.find('[id^="rates_adult_chrage"]').val()))
                        $item.find('.total-child-chrage').html(numberWithCommas($item.find('[id^="rates_child_chrage"]').val()))
                        $item.find('.total-infant-chrage').html(numberWithCommas($item.find('[id^="rates_infant_chrage"]').val()))
                    } else if (el.value == 3) {
                        $item.find('.value-type-wrapper').hide();
                        $item.find('.percent-adult').hide();
                        $item.find('.div-rates-adult').hide();
                        $item.find('.rates-adult-chrage').hide();

                        $item.find('.percent-child').hide();
                        $item.find('.div-rates-child').hide();
                        $item.find('.rates-child-chrage').hide();

                        $item.find('.percent-infant').hide();
                        $item.find('.div-rates-infant').hide();
                        $item.find('.rates-infant-chrage').hide();

                        $item.find('.total-adult-chrage').html('-' + numberWithCommas($item.find('[id^="rates_adult_chrage"]').val()))
                        $item.find('.total-child-chrage').html('-' + numberWithCommas($item.find('[id^="rates_child_chrage"]').val()))
                        $item.find('.total-infant-chrage').html('-' + numberWithCommas($item.find('[id^="rates_infant_chrage"]').val()))
                    }
                } else if (el.name.includes('value_type') === true) {
                    // let valueType = $item.find('input[name="value_type"]:checked').val();
                    if (el.value == 1) {

                    } else if (el.value == 2) {

                    }
                }

                // console.log(rates.rates_adult);
                // console.log(el.find('.category-radio-wrapper').find('input[name="chrage_type"]:checked').val());
                // console.log(el.id.includes('category'));
                // console.log($item.find('[id^="rates_adult_chrage"]'));

                // ซ่อน percent ทั้งหมดก่อน
                // $item.find('[id^="percent"]').closest('.form-group').hide();

                // Cancel with charge
                // if (chargeType == 1 && valueType == 1) {
                //     $item.find('[id^="percent"]').closest('.form-group').show();
                // }

                // calculate_row($item);
            }
        }

        let CURRENT_RATES = {};
        let CURRENT_BO_ID = 0;
        let REPEATER_INITED = false;

        function modal_forchrage(bo_id, chrage, discount, rates) {
            document.getElementById('for-chrage-form').reset();

            const adult = rates.adult.reduce((acc, num) => acc + num, 0);
            const child = rates.child.reduce((acc, num) => acc + num, 0);
            const infant = rates.infant.reduce((acc, num) => acc + num, 0);

            document.getElementById('chrage_bo_id').value = bo_id || 0;
            document.getElementById('note').value = document.getElementById('note' + bo_id).value || '';
            document.getElementById('chrage_id').value = chrage.id || 0;
            document.getElementById('chrage-adult').value = chrage.adult || 0;
            document.getElementById('chrage-child').value = chrage.child || 0;
            document.getElementById('chrage-infant').value = chrage.infant || 0;

            html = `
                    <td class="text-center">${adult}</td>
                    <td class="text-center">${child}</td>
                    <td class="text-center">${infant}</td>
                `;

            $('#tr-category-charge').html(html);

            // initRepeater(discount);

            // document.getElementById('for-chrage-form').reset();
            // $('[data-repeater-item]').slice(1).remove();

            // CURRENT_BO_ID = bo_id;
            // CURRENT_CATEGORY = normalizeCategory(category, rates);

            // renderCategoryTable(CURRENT_CATEGORY);

            // initRepeater(CURRENT_CATEGORY);

            // renderRadio(
            //     $('.for-charge-repeater')
            // );
        }

        function initRepeater(discount) {
            html = ``;

            if (discount) {
                for (let index = 0; index < discount.id.length; index++) {
                    html += `
                        <input type="hidden" name="before[]" value="${discount.id[index]}">
                        <div data-repeater-item>
                            <div class="row d-flex align-items-start">
                                <input type="hidden" name="id" value="${discount.id[index]}">
                                <div class="form-group col-7">
                                    <label class="form-label">Detail</label>
                                    <textarea name="detail" class="form-control" rows="3">${discount.detail[index]}</textarea>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label">Charge</label>
                                    <input type="text" class="form-control numeral-mask" name="rates" value="${discount.rates[index]}" placeholder="0" />
                                </div>
                                <div class="col-1 mt-2">
                                    <div class="form-group">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <hr />
                        </div>
                    `;
                }
            } else {
                html += `
                        <input type="hidden" name="before[]" value="0">
                        <div data-repeater-item>
                            <div class="row d-flex align-items-start">
                                <input type="hidden" name="id" value="0">
                                <div class="form-group col-7">
                                    <label class="form-label">Detail</label>
                                    <textarea name="detail" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label">Charge</label>
                                    <input type="text" class="form-control numeral-mask" name="rates" value="" placeholder="0" />
                                </div>
                                <div class="col-1 mt-2">
                                    <div class="form-group">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <hr />
                        </div>
                    `;
            }

            $('#div-discount-repeater').html(html);

            if (REPEATER_INITED) return;

            $('.discount-repeater').repeater({
                show: function() {
                    $(this).slideDown();

                    feather && feather.replace();
                },
                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                },
                ready: function() {

                    $('.numeral-mask').toArray().forEach(function(field) {
                        new Cleave(field, {
                            numeral: true,
                            numeralThousandsGroupStyle: 'thousand'
                        });
                    });

                }
            });

            REPEATER_INITED = true;
        }

        // function normalizeCategory(category, rates) {
        //     let result = [];

        //     category.id.forEach((catId, index) => {
        //         result.push({
        //             id: catId,
        //             name: category.name[index],
        //             rates: rates[catId] ?? null
        //         });
        //     });

        //     return result;
        // }

        // function renderCategoryTable(categories) {
        //     let html = '';

        //     categories.forEach(cat => {
        //         if (!cat.rates) return;

        //         html += `
        //             <tr>
        //                 <td>${cat.name}</td>
        //                 <td class="text-center">${cat.rates.adult}</td>
        //                 <td class="text-center">${cat.rates.child}</td>
        //                 <td class="text-center">${cat.rates.infant}</td>
        //             </tr>
        //         `;
        //     });

        //     $('#tbody-category-charge').html(html);
        // }

        function calculateTotals() {
            let total = 0;
            if (document.getElementById('boat_join').checked == true) {
                let adult = parseFloat($('#adult').val().replace(/,/g, "")) || 0;
                let rates_adult = parseFloat($('#rates_adult').val().replace(/,/g, "")) || 0;
                let child = parseFloat($('#child').val().replace(/,/g, "")) || 0;
                let rates_child = parseFloat($('#rates_child').val().replace(/,/g, "")) || 0;
                let infant = parseFloat($('#infant').val().replace(/,/g, "")) || 0;
                let rates_infant = parseFloat($('#rates_infant').val().replace(/,/g, "")) || 0;

                total_adult = (adult * rates_adult);
                total_child = (child * rates_child);
                total_infant = (infant * rates_infant);

                $('.total-adult').text(total_adult.toLocaleString() + ' ฿');
                $('.total-child').text(total_child.toLocaleString() + ' ฿');
                $('.total-infant').text(total_infant.toLocaleString() + ' ฿');

                total = (total_adult + total_child + total_infant)
            } else {
                let unit = parseFloat($('#unit').val().replace(/,/g, "")) || 0;
                let rates_private = parseFloat($('#rates_private').val().replace(/,/g, "")) || 0;

                total = (unit * rates_private);

                $('.total-private').text(total.toLocaleString() + ' ฿');
            }

            $('.total-amount').text(total.toLocaleString() + ' ฿');
        }

        // function renderRadio($container) {
        //     var categories = CURRENT_CATEGORY;

        //     let html = '';
        //     let rowIndex = $('.category-radio-wrapper').length - 1;

        //     categories.forEach((cat, index) => {
        //         let radioId = `category[${rowIndex}][${cat.id}]`;
        //         let checked = index === 0 ? 'checked' : '';

        //         html += `
        //             <div class="custom-control custom-radio">
        //                 <input type="radio"
        //                     id="${radioId}"
        //                     name="for-charge[${rowIndex}]category_chrage"
        //                     class="custom-control-input"
        //                     value="${cat.id}"

        //                     onclick="hide_div(this);" />
        //                 <label class="custom-control-label" for="${radioId}">
        //                     ${cat.name} ${rowIndex}
        //                 </label>
        //             </div>
        //         `;
        //     });
        //     $container.find('.category-radio-wrapper').html(html);

        //     html = `
        //             <div class="custom-control custom-radio">
        //                 <input type="radio"
        //                     id="cancel_${rowIndex}"
        //                     name="for-charge[${rowIndex}][chrage_type]"
        //                     class="custom-control-input"
        //                     value="1"

        //                     onclick="hide_div(this);">
        //                 <label class="custom-control-label" for="cancel_${rowIndex}">
        //                     Cancel with Charge
        //                 </label>
        //             </div>

        //             <div class="custom-control custom-radio">
        //                 <input type="radio"
        //                     id="show_${rowIndex}"
        //                     name="for-charge[${rowIndex}][chrage_type]"
        //                     class="custom-control-input"
        //                     value="2"
        //                     onclick="hide_div(this);">
        //                 <label class="custom-control-label" for="show_${rowIndex}">
        //                     No Show
        //                 </label>
        //             </div>

        //             <div class="custom-control custom-radio">
        //                 <input type="radio"
        //                     id="out_${rowIndex}"
        //                     name="for-charge[${rowIndex}][chrage_type]"
        //                     class="custom-control-input"
        //                     value="3"
        //                     onclick="hide_div(this);">
        //                 <label class="custom-control-label" for="out_${rowIndex}">
        //                     With out charge
        //                 </label>
        //             </div>
        //         `;

        //     $container.find('.charge-type-wrapper').html(html);

        //     html = `
        //             <div class="custom-control custom-radio">
        //                 <input type="radio"
        //                     id="percent_${rowIndex}"
        //                     name="for-charge[${rowIndex}][value_type]"
        //                     class="custom-control-input"
        //                     value="1"

        //                     onclick="hide_div(this);">
        //                 <label class="custom-control-label" for="percent_${rowIndex}">
        //                     Percent (%)
        //                 </label>
        //             </div>

        //             <div class="custom-control custom-radio">
        //                 <input type="radio"
        //                     id="amount_${rowIndex}"
        //                     name="for-charge[${rowIndex}][value_type]"
        //                     class="custom-control-input"
        //                     value="2"
        //                     onclick="hide_div(this);">
        //                 <label class="custom-control-label" for="amount_${rowIndex}">
        //                     Amount
        //                 </label>
        //             </div>
        //         `;

        //     $container.find('.value-type-wrapper').html(html);

        //     // hide_div($container.find('.category-radio-wrapper').find('.custom-control-input:checked')[0]);
        //     // hide_div($container.find('.charge-type-wrapper').find('.custom-control-input:checked')[0]);
        //     // hide_div($container.find('.value-type-wrapper').find('.custom-control-input:checked')[0]);
        // }

        // function calc_unit(qty, rate, chargeType, valueType, percent) {
        //     if (qty <= 0) return 0;

        //     let base = qty * rate;

        //     // No Show → เก็บเต็ม
        //     if (chargeType == 2) return base;

        //     // Without charge → หักออกหมด
        //     if (chargeType == 3) return 0;

        //     // Cancel with charge
        //     if (valueType == 1) {
        //         return base * (percent / 100);
        //     }

        //     return base;
        // }

        // function calculate_row($item) {
        //     let categoryId = $item.find('input[name="category_chrage"]:checked').val();
        //     let rate = CURRENT_CATEGORY.find(c => c.id == categoryId)?.rates;

        //     let chargeType = $item.find('input[name="chrage_type"]:checked').val();
        //     let valueType = $item.find('input[name="value_type"]:checked').val();

        //     let adult = parseInt($item.find('[name="adult"]').val()) || 0;
        //     let child = parseInt($item.find('[name="child"]').val()) || 0;
        //     let infant = parseInt($item.find('[name="infant"]').val()) || 0;

        //     let totalAdult = calc_unit(adult, rate.rates_adult, chargeType, valueType,
        //         parseFloat($item.find('[name="percent_adult"]').val()) || 0
        //     );

        //     let totalChild = calc_unit(child, rate.rates_child, chargeType, valueType,
        //         parseFloat($item.find('[name="percent_child"]').val()) || 0
        //     );

        //     let totalInfant = calc_unit(infant, rate.rates_infant, chargeType, valueType,
        //         parseFloat($item.find('[name="percent_infant"]').val()) || 0
        //     );

        //     $item.find('.total-adult-chrage').text(numberWithCommas(totalAdult));
        //     $item.find('.total-child-chrage').text(numberWithCommas(totalChild));
        //     $item.find('.total-infant-chrage').text(numberWithCommas(totalInfant));

        //     calculate_grand_total();
        // }

        // function calculate_grand_total() {
        //     let sum = 0;
        //     $('.total-adult-chrage, .total-child-chrage, .total-infant-chrage').each(function() {
        //         sum += parseFloat($(this).text().replace(/,/g, '')) || 0;
        //     });

        //     $('.total-amount').text(numberWithCommas(sum));
        // }
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