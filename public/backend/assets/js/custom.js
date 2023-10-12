(function($){
    $(document).ready(function(){

        // Confirm Status
        $(document).on('click', '#confirm', function(e){
            e.preventDefault();
            let link = $(this).attr('href');

            Swal.fire({
            title: 'Are you sure to Confirm',
            text: "Once Confirm, You will not able to pending again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Confirm!',
                'Confirm Changes.',
                'success'
                )
            }
            })

        });

        // processing
        $(document).on('click','#processing',function(e){
            e.preventDefault();
            var link = $(this).attr("href");


                    Swal.fire({
                        title: 'Are you sure to Processing?',
                        text: "Once Processing, You will not be able to Confirm again",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Processing!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Processing!',
                            'Processing Changes',
                            'success'
                        )
                        }
                    })


        });

        //picked
        $(function(){
            $(document).on('click','#picked',function(e){
                e.preventDefault();
                var link = $(this).attr("href");


                        Swal.fire({
                            title: 'Are you sure to Picked?',
                            text: "Once Picked, You will not be able to processing again",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Picked!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'Picked!',
                                'Picked Changes',
                                'success'
                            )
                            }
                        })


            });

        });

        // shipped
        $(function(){
            $(document).on('click','#shipped',function(e){
                e.preventDefault();
                var link = $(this).attr("href");


                        Swal.fire({
                            title: 'Are you sure to shipped?',
                            text: "Once shipped, You will not be able to picked again",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, shipped!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'shipped!',
                                'shipped Changes',
                                'success'
                            )
                            }
                        })


            });

        });

        //delivered
        $(function(){
            $(document).on('click','#delivered',function(e){
                e.preventDefault();
                var link = $(this).attr("href");


                        Swal.fire({
                            title: 'Are you sure to delivered?',
                            text: "Once delivered, You will not be able to shipped again",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delivered!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'delivered!',
                                'delivered Changes',
                                'success'
                            )
                            }
                        })


            });

        });

        // cancel
        $(function(){
            $(document).on('click','#cancel',function(e){
                e.preventDefault();
                var link = $(this).attr("href");


                        Swal.fire({
                            title: 'Are you sure to cancel?',
                            text: "Once cancel, You will not be able to delivered again",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, cancel!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = link
                            Swal.fire(
                                'cancel!',
                                'cancel Changes',
                                'success'
                            )
                            }
                        })


            });

        });

        $(function() {
            ClassicEditor
                .create(document.querySelector('#summary-ckeditor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });

        })
        $(function() {
            $(document).on('change', 'input[name="image"]', function (e) {
                e.preventDefault();
                let url = URL.createObjectURL(e.target.files[0]);
                $('img#image').attr('src', url).width('400px').height('200px');
            });


            $('.multi_tag').select2();

        })


        $(function() {
            $(document).on('change', 'input[name="icon"]', function (e) {
                e.preventDefault();

                let url = URL.createObjectURL(e.target.files[0]);
                $('img#icon').attr('src', url).width('150px').height('150px');
            })
        })

        $(function() {
            $(document).on('change', 'input[name="icon"]', function (e) {
                let url = URL.createObjectURL(e.target.files[0]);
                $('img#icon').attr('src', url).width('150px').height('150px');
            })

        })

        $(function() {
            ClassicEditor
                .create(document.querySelector('#summary-ckeditor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });

        })

        $(function() {
            $(document).on('change', 'input[name="image"]', function (e) {
                e.preventDefault();
                let url = URL.createObjectURL(e.target.files[0]);
                $('img#image').attr('src', url).width('400px').height('200px');
            });

            $('.multi_tag').select2();

        });



        $(function() {

            $(document).ready(function(){
                //<!-- Start Input Multiple Input Field -->
                // Product Attributes Add/Remove script
                var maxField = 10; //Input fields increment limitation
                var addButton = $('.add_button'); //Add button selector
                var wrapper = $('.field_wrapper'); //Input field wrapper
                var fieldHTML = '<div><input type="text" name="weight[]" value="" placeholder="Weight" style="width: 120px; margin-right: 3px; margin-top: 3px;" /><input type="text" name="sku[]" value="" placeholder="SKU" style="width: 120px; margin-right: 3px; margin-top: 3px;" /><input type="number" name="sale_price[]" value="" placeholder="Sale Price" style="width: 120px; margin-right: 3px; margin-top: 3px;" /><input type="number" name="regular_price[]" value="" placeholder="Regular Price" style="width: 120px; margin-right: 3px; margin-top: 3px;" /><input type="text" name="color[]" value="" placeholder="Color" style="width: 120px; margin-right: 3px; margin-top: 3px;" /><input type="number" name="stock[]" value="" placeholder="Stock" style="width: 120px; margin-right: 3px; margin-top: 3px;" /><a href="javascript:void(0);" title="Remove" class="remove_button btn btn-rounded btn-danger btn-sm">Remove</a></div>'; //New input field html
                var x = 1; //Initial field counter is 1

                //Once add button is clicked
                $(addButton).click(function(){
                    //Check maximum number of input fields
                    if(x < maxField){
                        x++; //Increment field counter
                        $(wrapper).append(fieldHTML); //Add field html
                    }
                });

                //Once remove button is clicked
                $(wrapper).on('click', '.remove_button', function(e){
                    e.preventDefault();
                    $(this).parent('div').remove(); //Remove field html
                    x--; //Decrement field counter
                });
                //<!-- End Input Multiple Input Field -->


                // Confirm Data is Deleted
                $('.confirmDelete').click(function(){
                    let record = $(this).attr('record');
                    let recordId = $(this).attr('recordId');


                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = `/delete-${record}`+'/'+recordId;
                        }
                    })
                });


            })

        });







            CKEDITOR.replace( 'summary-ckeditor' );


        $(function() {
            $(document).ready(function () {
                $(document).on('change', 'input[name="thumbnail"]', function (e) {
                    e.preventDefault();
                    let url = URL.createObjectURL(e.target.files[0]);
                    $('img#thumbnail').attr('src', url).width('200px').height('200px');
                });

                $(document).on('change', 'input[name="hover_img"]', function (e) {
                    e.preventDefault();
                    let url = URL.createObjectURL(e.target.files[0]);
                    $('img#hover').attr('src', url).width('200px').height('200px');
                });

                $(document).on('change', 'input[id="multi"]', function (e) {
                    e.preventDefault();

                    let multi_img = '';
                    for (let i = 0; i < e.target.files.length; i++) {
                        let img_url = URL.createObjectURL(e.target.files[i]);
                        multi_img += '<img style="width: 100px;height: 100px;" src="' + img_url + '" alt=""/>';
                    }
                    $('#multipic').html(multi_img);
                });


                $('#multi_tag').select2();

                //if it is checked

                $(document).on('click', 'input[id="deals_day"]', function (e) {
                    var id = parseInt($(this).val(), 10);
                    if ($(this).is(":checked")) {
                        $('#timer').show();
                    } else {
                        $('#timer').hide();
                    }
                });

                $(document).on('click', 'input#add', function (e) {
                    e.preventDefault();
                    $('form#product').submit();
                });


            })

        })

        $(function() {
            $(document).on('change', 'input[name="icon"]', function (e) {

                let url = URL.createObjectURL(e.target.files[0]);

                $('img#icon').attr('src', url).width('150px').height('150px');
            })

        });


        $(function (){
            $(document).on('change','input[name="icon"]',function(e){

                let url = URL.createObjectURL(e.target.files[0]);

                $('img#icon').attr('src',url).width('150px').height('150px');
            })
        })

        $(function (){

                CKEDITOR.replace('summary-ckeditor');



                $(document).ready(function(){
                $(document).on('change','input[name="thumbnail"]',function(e){
                    e.preventDefault();
                    let url = URL.createObjectURL(e.target.files[0]);
                    $('img#thumbnail').attr('src',url).width('200px').height('200px');
                });
                $(document).on('change','input[name="hover_img"]',function(e){
                e.preventDefault();
                let url = URL.createObjectURL(e.target.files[0]);
                $('img#hover').attr('src',url).width('200px').height('200px');
            });

                $(document).on('change','input[id="multi"]',function(e){
                e.preventDefault();

                let multi_img ='';
                for (let i=0;i<e.target.files.length;i++){
                let img_url = URL.createObjectURL(e.target.files[i]);
                multi_img += '<img style="width: 100px;height: 100px;" src="'+img_url+'" alt=""/>';
            }
                $('#multipic').html(multi_img);
            });


                $('#multi_tag').select2();

                //edit product checked or unchecked

                // $(document).on('click','input#deals_date',function(e){
                //         e.preventDefault();
                //     if($(this).is(":checked")) {
                //         $('#timer_id').show();
                //     }else{
                //         $('#timer_id').hide();
                //     }
                // });


            })

        });


        $(function (){
            $('#image').change(function(e){
                let reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        })


        $(function (){
            $(document).on('change','input[name="welcome_image"]',function(e){
                e.preventDefault();
                let url = URL.createObjectURL(e.target.files[0]);
                $('img#welcome_image').attr('src',url).width('80px').height('80px');
            });


            $(document).on('change','input[name="performance_image_one"]',function(e){
                e.preventDefault();
                let url = URL.createObjectURL(e.target.files[0]);
                $('img#performance_image_one').attr('src',url).width('80px').height('80px');
            });


            $(document).on('change','input[id="gallery"]',function(e){
                e.preventDefault();

                let multi_img ='';
                for (let i=0;i<e.target.files.length;i++){
                    let img_url = URL.createObjectURL(e.target.files[i]);
                    multi_img += '<img style="width: 80px;height: 80px;" src="'+img_url+'" alt=""/>';
                }
                $('#welcome_gallery').html(multi_img);
            });
        });

        $(function (){
            $(document).on('change','input[name="logo"]',function(e){
                e.preventDefault();
                let url = URL.createObjectURL(e.target.files[0]);
                $('img#logo').attr('src',url).width('215px').height('66px');
            });


            $(document).on('change','input[name="favicon"]',function(e){
                e.preventDefault();
                let url = URL.createObjectURL(e.target.files[0]);
                $('img#favicon').attr('src',url).width('78px').height('60px');
            });

            $(document).on('change','input[name="header"]',function(e){
                e.preventDefault();
                let url = URL.createObjectURL(e.target.files[0]);
                $('img#header').attr('src',url).width('78px').height('60px');
            });
        })

        $(function (){
            $(document).on('change','select[id="division_id"]',function (e) {
                e.preventDefault();
                let main_url = 'http://localhost:8000';
                let id = $(this).val();

                if (id) {
                    $.ajax({
                        url: main_url + "/district/load/" + id,
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                            var d = $('select[name="district_id"]').empty();

                            $('select[name="district_id"]').append('<option value="">-select-</option>');

                            $.each(data, function (key, value) {
                                $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                            })
                        }
                    });
                } else {
                    alert('danger');
                }


            })
        });

        $(function (){
            $(document).on('change','select[name="division_id"]',function (e) {
                e.preventDefault();
                let main_url = 'http://localhost:8000';
                let id = $(this).val();

                if (id) {
                    $.ajax({
                        url: main_url + "/state/edit/district/load/" + id,
                        method: "GET",
                        dataType: "json",
                        success: function (data) {
                            var d = $('select[name="district_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                            })
                        }
                    });
                } else {
                    alert('danger');
                }


            })
        });



        // $(function (){
        //     $(document).on('change','select[name="division_id"]',function (e) {
        //         e.preventDefault();
        //         let main_url = 'http://localhost:8000';
        //         let id = $(this).val();
        //
        //         if (id) {
        //             $.ajax({
        //                 url: main_url + "/district/load/" + id,
        //                 method: "GET",
        //                 dataType: "json",
        //                 success: function (data) {
        //                     var d = $('select[name="district_id"]').empty();
        //
        //                     $('select[name="district_id"]').append('<option value="">-select-</option>');
        //
        //                     $.each(data, function (key, value) {
        //                         $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
        //                     })
        //                 }
        //             });
        //         } else {
        //             alert('danger');
        //         }
        //
        //
        //     })
        // });

        // $(function (){
        //     $(document).on('change','select[name="district_id"]',function (e) {
        //         e.preventDefault();
        //         let main_url = 'http://localhost:8000';
        //         let id = $(this).val();
        //
        //         if (id) {
        //             $.ajax({
        //                 url: main_url + "/state/edit/state/load/" + id,
        //                 method: "GET",
        //                 dataType: "json",
        //                 success: function (data) {
        //                     var d = $('select[name="district_id"]').empty();
        //                     $.each(data, function (key, value) {
        //                         $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
        //                     })
        //                 }
        //             });
        //         } else {
        //             alert('danger');
        //         }
        //
        //
        //     })
        // })


    });
})(jQuery);
