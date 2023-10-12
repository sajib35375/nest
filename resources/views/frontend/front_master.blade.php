<!DOCTYPE html>
<html class="no-js" lang="en">
    @php
        $seo = \App\Models\Seo::findOrFail(1);
    @endphp
    <head>
        <meta charset="utf-8" />
        <title>{{ $seo->meta_title }}</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="{{ $seo->meta_description }}" />
        <meta name="keywords" content="{{ $seo->meta_keyword }}" />
        <meta name="author" content="{{ $seo->meta_author }}" />
        <meta name="brand_name" content="{{ $seo->meta_title }}" />
        <meta name="apple-mobile-web-app-title" content="{{ $seo->meta_title }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Google Analytics -->

        <script>
            {!! $seo->google_analytics !!}
        </script>
        <!-- Google Verification -->
        <noscript>
        {!! $seo->google_verification !!}
        </noscript>
        <!-- Alexa Analytics -->
        <script>
        {!! $seo->alexa_analytics !!}
        </script>
        <meta property="og:title" content="{{ $seo->og_title }}" />
        <meta property="og:type" content="{{ $seo->og_type }}" />
        <meta property="og:url" content="{{ $seo->og_url }}" />
        <meta property="og:image" content="{{ $seo->og_image_link }}" />

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('upload/theme/'.$seo->favicon) }}" />
        <!--leaflet map-->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=621cb8f8b846610019d3dc86&product=inline-share-buttons" async="async"></script>



        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/') }}/assets/css/plugins/slider-range.css" />
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/animate.min.css" />
        <link rel="stylesheet" href="{{ asset('font-awesome/css/all.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/main.css?v=5.5" />
        <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/custom/custom.css" />
        <script src="{{ asset('frontend/') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>

    </head>

    <body>


         @include('frontend.layout.QuickView')
{{--        <div class="showQuickViewModal"></div>--}}


        @include('frontend.layout.header')

        @section('frontend')
        @show

        <!-- Preloader Start -->
{{--        <div id="preloader-active">--}}
{{--            <div class="preloader d-flex align-items-center justify-content-center">--}}
{{--                <div class="preloader-inner position-relative">--}}
{{--                    <div class="text-center">--}}
{{--                        <img src="{{ URL::to('frontend/assets/imgs/theme/loading.gif') }}" alt="" />--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- Vendor JS-->


        <script src="{{ asset('frontend/') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/vendor/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/slick.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/jquery.syotimer.min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/waypoints.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/wow.js"></script>
        <script src="{{ asset('frontend/') }}/assets/js/plugins/slider-range.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/perfect-scrollbar.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/magnific-popup.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/select2.min.js"></script>
        <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/waypoints.js"></script>
        <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/images-loaded.js"></script>
        <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/scrollup.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/jquery.vticker-min.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/jquery.theia.sticky.js"></script>
        <script src="{{ asset('frontend') }}/assets/js/plugins/jquery.elevatezoom.js"></script>
        {{--// SWEET ALERT--}}
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Template  JS -->
        <script src="{{ asset('frontend') }}/assets/js/plugins/leaflet.js"></script>
        <script src="{{ asset('frontend/') }}/assets/js/main.js?v=5.5"></script>
        <script src="{{ asset('frontend/') }}/assets/js/shop.js?v=5.5"></script>
        <script src="{{ asset('frontend') }}/assets/js/custom/custom.js"></script>

        <!-- Notify js -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <style type="text/css">
            .notifyjs-corner{
                z-index: 10000 !important;
            }
        </style>

        {{-- Nofity --}}
        @if(session()->has('success'))
            <script text="text/javascript">
                $(function(){
                    $.notify("{{session()->get('success')}}", {globalPosition: 'top right', className:'success'});
                });
            </script>
        @endif
        @if(session()->has('warn'))
            <script text="text/javascript">
                $(function(){
                    $.notify("{{session()->get('warn')}}", {globalPosition: 'top right', className:'warn'});
                });
            </script>
        @endif
        @if(session()->has('error'))
            <script text="text/javascript">
                $(function(){
                    $.notify("{{session()->get('error')}}", {globalPosition: 'top right', className:'error'});
                });
            </script>
        @endif

        <!--- Google Translate Script -->
        <script>
            function googleTranslateElementInit(){
            var config={
                pageLanguage: 'en',
                includedLanguages:'en,hi,bn,ar',
                layout:google.translate.TranslateElement.InlineLayout.SIMPLE
            };
            var langOptionsID='google_translate_element';
            new google.translate.TranslateElement(config,langOptionsID);
            }
        </script>

        <!--- Google Translate API CDN -->
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <!--- DisQus API CDN -->
        <script>
            (function() {
            var d = document, s = d.createElement('script');
            s.src = 'https://e-aroth.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
        </script>

        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

        <script>
            (function (window, document) {
                var loader = function () {
                    var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                    script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                    tag.parentNode.insertBefore(script, tag);
                };

                window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
            })(window, document);
        </script>
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
    </body>

</html>
