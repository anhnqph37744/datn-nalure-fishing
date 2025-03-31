<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>INSPINIA | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link href="{{ asset('admin/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/plugins/dropzone/basic.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/plugins/codemirror/codemirror.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/iCheck/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/cropper/cropper.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/switchery/switchery.css') }}" rel="stylesheet">


    <link href="{{ asset('admin/css/plugins/nouslider/jquery.nouislider.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">


    <link href="{{ asset('admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}"
        rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/clockpicker/clockpicker.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('admin/css/plugins/select2/select2.min.css') }}" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <link href="{{ asset('admin/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/plugins/dualListbox/bootstrap-duallistbox.min.css') }}" rel="stylesheet">


</head>

<body>
    <div id="wrapper">
        @include('admin.layouts._nav')

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                @include('admin.layouts.__nav')
            </div>
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('admin/js/jquery-3.1.1.min.js') }}"></script>

    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.pie.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo/peity-demo.js') }}"></script>

    <script src="{{ asset('admin/js/inspinia.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/pace/pace.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('admin/js/demo/sparkline-demo.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/chartJs/Chart.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/toastr/toastr.min.js') }}"></script>


    <script src="{{ asset('admin/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/codemirror/mode/xml/xml.js') }}"></script>


    <script src="{{ asset('admin/js/plugins/chosen/chosen.jquery.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/jsKnob/jquery.knob.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/nouslider/jquery.nouislider.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/switchery/switchery.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/ionRangeSlider/ion.rangeSlider.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>


    <script src="{{ asset('admin/js/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/clockpicker/clockpicker.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/cropper/cropper.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/fullcalendar/moment.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/daterangepicker/daterangepicker.js') }}"></script>

    {{-- <script src="{{ asset('admin/js/plugins/select2/select2.full.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <script src="{{ asset('admin/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            @if (session('success'))
                toastr.success("{{ session('success') }}", "Thành công");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}", "Lỗi");
            @endif

            @if (session('warning'))
                toastr.warning("{{ session('warning') }}", "Cảnh báo");
            @endif

            @if (session('info'))
                toastr.info("{{ session('info') }}", "Thông báo");
            @endif
        });
    </script>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: "slideDown",
                    timeOut: 4000,
                };
                toastr.success("Responsive Admin Theme", "Welcome to INSPINIA");
            }, 1300);

            var data1 = [
                [0, 4],
                [1, 8],
                [2, 5],
                [3, 10],
                [4, 4],
                [5, 16],
                [6, 5],
                [7, 11],
                [8, 6],
                [9, 11],
                [10, 30],
                [11, 10],
                [12, 13],
                [13, 4],
                [14, 3],
                [15, 3],
                [16, 6],
            ];
            var data2 = [
                [0, 1],
                [1, 0],
                [2, 2],
                [3, 0],
                [4, 1],
                [5, 3],
                [6, 1],
                [7, 5],
                [8, 2],
                [9, 3],
                [10, 2],
                [11, 1],
                [12, 0],
                [13, 2],
                [14, 8],
                [15, 0],
                [16, 0],
            ];
            $("#flot-dashboard-chart").length &&
                $.plot($("#flot-dashboard-chart"), [data1, data2], {
                    series: {
                        lines: {
                            show: false,
                            fill: true,
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4,
                        },
                        points: {
                            radius: 0,
                            show: true,
                        },
                        shadowSize: 2,
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#d5d5d5",
                        borderWidth: 1,
                        color: "#d5d5d5",
                    },
                    colors: ["#1ab394", "#1C84C6"],
                    xaxis: {},
                    yaxis: {
                        ticks: 4,
                    },
                    tooltip: false,
                });

            var doughnutData = {
                labels: ["App", "Software", "Laptop"],
                datasets: [{
                    data: [300, 50, 100],
                    backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"],
                }, ],
            };

            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false,
                },
            };

            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {
                type: "doughnut",
                data: doughnutData,
                options: doughnutOptions,
            });

            var doughnutData = {
                labels: ["App", "Software", "Laptop"],
                datasets: [{
                    data: [70, 27, 85],
                    backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"],
                }, ],
            };

            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false,
                },
            };

            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {
                type: "doughnut",
                data: doughnutData,
                options: doughnutOptions,
            });
        });
    </script>

 <script>
    $(document).ready(function(){



        var $image = $(".image-crop > img")
        $($image).cropper({
            aspectRatio: 1.618,
            preview: ".img-preview",
            done: function(data) {
            }
        });

        var $inputImage = $("#inputImage");
        if (window.FileReader) {
            $inputImage.change(function() {
                var fileReader = new FileReader(),
                        files = this.files,
                        file;

                if (!files.length) {
                    return;
                }

                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    fileReader.readAsDataURL(file);
                    fileReader.onload = function () {
                        // $inputImage.val("");
                        $image.cropper("reset", true).cropper("replace", this.result);
                    };
                } else {
                    showMessage("Please choose an image file.");
                }
            });
        } else {
            $inputImage.addClass("hide");
        }


        $("#setDrag").click(function() {
            $image.cropper("setDragMode", "crop");
        });

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('#data_2 .input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        $('#data_3 .input-group.date').datepicker({
            startView: 2,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('#data_4 .input-group.date').datepicker({
            minViewMode: 1,
            keyboardNavigation: false,
            forceParse: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true
        });

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, { color: '#1AB394' });

        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

        var elem_3 = document.querySelector('.js-switch_3');
        var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

        var elem_4 = document.querySelector('.js-switch_4');
        var switchery_4 = new Switchery(elem_4, { color: '#f8ac59' });
            switchery_4.disable();

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('.demo1').colorpicker();

        var divStyle = $('.back-change')[0].style;
        $('#demo_apidemo').colorpicker({
            color: divStyle.backgroundColor
        }).on('changeColor', function(ev) {
                    divStyle.backgroundColor = ev.color.toHex();
                });

        $('.clockpicker').clockpicker();

        $('input[name="daterange"]').daterangepicker();

        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));




    var drag_fixed = document.getElementById('drag-fixed');

    noUiSlider.create(drag_fixed, {
        start: [ 40, 60 ],
        behaviour: 'drag-fixed',
        connect: true,
        range: {
            'min':  20,
            'max':  80
        }
    });
})


</script>
</body>

</html>
