<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/images/icons8-calendar-100.png') }}" rel="shortcut icon" type="image/x-icon" />

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')

    {{--  english style  --}}
    <style>
        body {
            font-family: 'Roboto';
            background-color:#f5d7d9;
            background-image: url({{asset("/assets/images/crisp-paper-ruffles.png")}});
        }

        .swal2-popup {
                font-size: 0.9rem !important;
            }
    </style>

    {{--  arabic style  --}}
    @if(app()->getLocale() == 'ar')
    <style>

        input::-webkit-input-placeholder {
        /* WebKit browsers */
        text-align: right;
        }
        input:-moz-placeholder {
        /* Mozilla Firefox 4 to 18 */
        text-align: right;
        }
        input::-moz-placeholder {
        /* Mozilla Firefox 19+ but I'm not sure about working */
        text-align: right;
        }
        input:-ms-input-placeholder {
        /* Internet Explorer 10 */
        text-align: right;
        }
        input::placeholder {
        text-align: right;
        }

        .s2class {
            text-align: right;
        }

        .s1class {
            text-align: right;
        }

        .row {
            text-align: right;
        }

        .page-title {
            text-align: right;
        }

        .card {
            text-align: right;
        }

        body {
            font-size: 1rem !important;
        }

        .btn {
            font-size: 0.9rem !important;
            font-weight:400;
        }
    </style>
    @endif

</head>

<body>
    @include('partials.customermenu')
    <div class="app-body">
        <main class="main">
            <div class="container-fluid">
                @if(session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <br>
                @yield('content')
            </div>
        </main>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(function() {
            let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
            let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
            let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
            let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
            let printButtonTrans = '{{ trans('global.datatables.print') }}'
            let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'

            let languages = {
                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
            };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                style:    'multi+shift',
                selector: 'td:first-child'
                },
                order: [],
                scrollX: true,
                pageLength: 100,
                dom: 'lBfrtip<"actions">',
                buttons: [
                {
                    extend: 'copy',
                    className: 'btn-default',
                    text: copyButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn-default',
                    text: csvButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn-default',
                    text: excelButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn-default',
                    text: pdfButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    className: 'btn-default',
                    text: printButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    className: 'btn-default',
                    text: colvisButtonTrans,
                    exportOptions: {
                    columns: ':visible'
                    }
                }
                ]
            });

            $.fn.dataTable.ext.classes.sPageButton = '';
            });
    </script>
    @yield('scripts')
    {{--  <script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>  --}}
</body>
</html>
