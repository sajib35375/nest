<!DOCTYPE html>
<html lang="en">
@php
    $seo = \App\Models\Seo::findOrFail(1);
@endphp
    <head>
        <meta charset="utf-8" />
        <title>E-Aroth Dashboard</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/r-2.3.0/rg-1.2.0/sc-2.0.7/sb-1.3.4/sl-1.4.0/datatables.min.css"/>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('upload/theme/'.$seo->favicon) }}" />
        <!-- Template CSS -->
        <link href="{{ asset('backend') }}/assets/css/main.css?v=1.1" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    </head>

    <body>
        <div class="screen-overlay"></div>

        @include('admin.layouts.sidebar')

        <main class="main-wrap">

            @include('admin.layouts.header')

            @section('admin')
            @show
            {{-- @yield('content') --}}

            @include('admin.layouts.footer')

        </main>

        {{-- <script src="{{ asset('backend/assets/js/app.js') }}"></script> --}}
        <script src="{{ asset('backend') }}/assets/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/vendors/select2.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/vendors/perfect-scrollbar.js"></script>
        <script src="{{ asset('backend') }}/assets/js/vendors/jquery.fullscreen.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/vendors/chart.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/r-2.3.0/rg-1.2.0/sc-2.0.7/sb-1.3.4/sl-1.4.0/datatables.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/custom.js"></script>
        <script>
            $(document).ready( function () {
                $('#table_id').DataTable();
            });
        </script>
        <!-- Main Script -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>

            jQuery(document).ready(function (){
                jQuery(document).on('click','#delete',function (e){
                    e.preventDefault();
                    let link = $(this).attr('href');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to delete this?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = link;
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })


                })
            })



        </script>
        <script src="{{ asset('backend') }}/assets/js/main.js?v=1.1" type="text/javascript"></script>
        <script src="{{ asset('backend') }}/assets/js/custom-chart.js" type="text/javascript"></script>
        <!-- Toaster JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
        <script>
            @if (Session::has('message'))
                let type = "{{ Session::get('alert-type', 'info') }}";
                switch (type) {
                    case 'info':
                        toastr.info("{{ Session::get('message') }}")
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('message') }}")
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}")
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('message') }}")
                        break;

                    default:
                        break;
                }
            @endif
        </script>

        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace('summary-ckeditor');
        </script>

    </body>
</html>
