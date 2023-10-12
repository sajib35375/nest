(function($){
    $(document).ready(function(){

        $('#user_image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

       $(document).on('click','.weight_id',function(e){
            e.preventDefault();
            let id = $(this).attr('price_id');

           let main_url = "http://localhost:8000";
            $.ajax({
                url : main_url + "/single/product/price/change/"+id,
                type : "GET",
                dataType:'json',
                success : function(data){
                    $('.current-price').html(data.sale_price);
                    $('.old-price').html(data.regular_price);
                    $('a#sku').html(data.sku);
                }
            });
       });

       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       $("body").on('keyup', '#search', function(){
            let text = $(this).val();
            let main_url = "http://localhost:8000/";

            if(text.length > 0){
                $.ajax({
                    data: { search: text },
                    url: main_url + "search-product",
                    method: "POST",
                    success: function(result){
                        $("#advanceProductSearch").html(result);
                    }
                });
            }

            if(text.length > 1){
                $("#advanceProductSearch").html("");
            }else{
                $("#advanceProductSearch").empty();
            }

       });

       $("body").on('focus', '#search', function(){
            $('#advanceProductSearch').slideDown();
       });

       // $("body").on('blur', '#search', function(){
       //      $('#advanceProductSearch').slideUp();
       // });


        $(document).on('click','a.product_cart', function(e){
            e.preventDefault();
            let id = $(this).attr('product-id');

            let main_url = "http://localhost:8000";

            $.ajax({
                type:'GET',
                url: main_url + '/quick-view/'+id,
                dataType:'json',
                success:function(data){
                    $('.modal-body img#img').attr('src',main_url+'/backend/assets/imgs/products/'+data.product.thumbnail);
                    $('h1#ProductName').text(data.product.product_name);
                    $('span#brand').text(' '+data.product.brand_name);
                    $('span#saleP').text(' '+data.product.sale_price);
                    $('span#regularP').text(' '+data.product.regular_price);
                    $('span#catPro').text(' '+data.product.categories.name);

                    $('.product_id').val(id);

                    $('select[name="weight"]').empty();
                    $('ul#ul').empty();
                    let total=0;
                    $('select[name="weight"]').append('<option value="">All</option>');
                    $.each(data.product_attribute,function (key,value){
                        $('select[name="weight"]').append(`<option value="${value.id}">${value.weight}</option>`)

                        total += isNaN(parseInt(value.stock)) ? 0 : parseInt(value.stock);

                    });
                    if (total>0){
                        $('ul#ul').append(`<li class="list-group-item">${total}</li>`);
                    }else{
                        $('ul#ul').append(`<li style="background-color: red;color: white;" class="list-group-item">Stock Out</li>`);
                    }

                }
            });
        });

        $(document).on('change','select[name="weight"]',function (e){
            e.preventDefault();
            let id = $(this).val();
            $.ajax({
                url: '/modal/change/value/'+id,
                type: 'GET',
                dataType: 'json',
                success:function (data){
                    $('#saleP').html(data.sale_price);
                    $('#regularP').html(data.regular_price);
                    $('ul#ul').empty();
                    $('ul#ul').append(`<li class="list-group-item active">${data.stock}</li>`);
                }
            });

        });

        /////////wishlist count//////////

        function wishlistCount(){
            $.ajax({
                url: '/count-wishlist',
                type: "GET",
                dataType: "json",
                success:function (data){
                    $('span#wish_count').html(data);
                }
            })
        }
        wishlistCount();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','.addToCart',function (e){
            e.preventDefault();
            let id = $('.product_id').val();
            let brand = $('span#brand').text();
            let product_name = $('h1#ProductName').text();
            let sale_price = $('span#saleP').text();
            let regular_price = $('span#regularP').text();
            let category = $('span#catPro').text();
            let weight = $('select[name="weight"] option:selected').text();
            let weight_id = $('select[name="weight"] option:selected').val();
            let quantity = $('#quantity').val();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    product_name:product_name,
                    brand:brand,
                    quantity:quantity,
                    sale_price:sale_price,
                    regular_price:regular_price,
                    category:category,
                    weight:weight,
                    weight_id:weight_id,
                },
                url:"/add-to-cart-store/"+id,
                success: function (data){
                    addToMiniCart();
                    $('#cartViewModal').modal('hide');
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }

                }

            })

        });

        $(document).on('click','#singleAddToCart',function (e){
            e.preventDefault();

            let id = $('#single_product_id').val();
            let quantity = $('input[name="quantity"]').val();
            let weight = $('li.active a.weight_id').text();
            let single_sale = $('#single_sale_price').text();
            let single_regular = $('#single_regular_price').text();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    quantity:quantity,
                    weight:weight,
                    single_sale:single_sale,
                    single_regular:single_regular,
                },
                url:"/single-add-to-cart-store/"+id,
                success: function (data){
                    addToMiniCart();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }

                }
            })
        });



        function addToMiniCart(){

                let main_url = "http://localhost:8000";
                $.ajax({
                    type: 'GET',
                    url: main_url+'/add-to-mini-cart',
                    dataType: 'json',
                    success: function (data){
                        console.log(data)
                        $('span#total').text(data.CartsTotal);
                        $('span#CartQty').text(data.CartsQTY);
                        let miniCart='';
                        $.each(data.Carts,function (key,value){
                            miniCart += `<li>
                            <div class="shopping-cart-img">
                                <a href="/single/product/${value.id}"><img alt="Nest" src="${main_url}/backend/assets/imgs/products/${value.options.image}" /></a>
                            </div>
                            <div class="shopping-cart-title">
                                <h4><a href="/single/product/${value.id}">${value.name}</a></h4>

                                <h4><span>${value.qty} × </span>${value.price}৳</h4>
                            </div>
                            <div class="shopping-cart-delete">
                                <a href="#" id="${value.rowId}" class="removeMiniCart"><i class="fi-rs-cross-small"></i></a>
                            </div>
                        </li>`;
                        });

                        $('#miniCart').html(miniCart)
                    }
                });
        }

        addToMiniCart();


        // remove mini cart



        $(document).on('click','.removeMiniCart',function (e){
            e.preventDefault();
            let id = $(this).attr('id');
            let main_url = "http://localhost:8000";
            $.ajax({
                type: 'GET',
                url: main_url+'/remove-mini-cart/'+id,
                dataType: 'json',
                success:function (data){
                    addToMiniCart();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            });

        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','a#wish',function (e){
            e.preventDefault();
            let product_id = $(this).attr('product_id');
            let main_url = "http://localhost:8000";
            $.ajax({
                type: 'POST',
                url: main_url+'/add-to-wishlist/'+product_id,
                dataType: 'json',
                success: function (data){
                    wishlistCount();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            })
        })


        function wishListView(){
            let main_url = "http://localhost:8000";
            $.ajax({
                type: 'GET',
                url: '/wish/view/product/',
                dataType: 'json',
                success: function (data){
                    let wishList = '';
                    $.each(data,function (key,value){

                        wishList += `<tr class="pt-30">
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td>
                                <td class="image product-thumbnail pt-40"><img src="${main_url}/backend/assets/imgs/products/${value.product.thumbnail}" alt="#" /></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10" href="#">${value.product.product_name}</a></h6>

                                </td>
                                <td class="price" data-title="Price">
                                    <h3 class="text-brand">${value.product.sale_price}৳</h3>
                                </td>

                                <td class="text-right" data-title="Cart">
                                    <a data-bs-toggle="modal" data-bs-target="#cartViewModal" product-id="${value.product.id}" class="btn btn-sm product_cart">Add to cart</a>
                                </td>
                                <td class="action text-center" data-title="Remove">
                                    <a type="submit" href="#" delete_id="${value.product.id}" class="text-body deleteWish"><i class="fi-rs-trash"></i></a>
                                </td>
                            </tr>`;
                    });
                    $('#wishProduct').html(wishList);
                }
            })
        }

        wishListView();



        $(document).on('click','a.deleteWish',function (e){
            e.preventDefault();
            let id = $(this).attr('delete_id');

            $.ajax({
                type: 'GET',
                url: 'wish/product/delete/'+id,
                dataType: 'json',
                success: function (data){
                    wishlistCount();
                    wishListView();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            })
        })


                function AllCartProduct() {

                    $.ajax({
                        type: 'GET',
                        url: '/cart/page/load/',
                        dataType: 'json',
                        success: function (data) {
                            // couponCalculation();
                            let cart = '';
                            let main_url = 'http://localhost:8000';
                            $.each(data.Carts, function (key, value) {
                                cart += `<tr class="pt-30">

                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td>

                                <td class="image product-thumbnail pt-40"><img src="${main_url}/backend/assets/imgs/products/${value.options.image}" alt="#"></td>

                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="/single/product/${value.id}">${value.name}</a></h6>

                                </td>

                                <td class="price" data-title="Price">
                                    <h4 class="text-body">${value.price}৳</h4>
                                </td>

                                <td class="text-center detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <div class="detail-qty border radius">
                                            <a href="#" decrease="${value.rowId}" id="qty-decrease" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <input type="text" name="quantity" id="quantity" class="qty-val" value="${value.qty}" min="1">
                                            <a href="#" increase="${value.rowId}" id="qty-increase" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </div>
                                </td>

                                <td class="price" data-title="Price">
                                    <h4 class="text-brand">${value.subtotal}৳</h4>
                                </td>

                                <td class="action text-center" data-title="Remove"><a href="#" id="${value.rowId}" class="text-body remove-cart"><i class="fi-rs-trash"></i></a></td>
                            </tr>`;
                            });

                            $('#viewCart').html(cart);

                        }
                    });
                }
        AllCartProduct();


        $(document).on('click','.remove-cart',function (){
            let rowId = $(this).attr('id');

            $.ajax({
                type: 'GET',
                url: '/cart/product/remove/'+rowId,
                dataType: 'json',
                success: function (data){
                    addToMiniCart();
                    couponCalculation();
                    AllCartProduct();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            })
        });

        $(document).on('click','a#qty-increase',function (e){
            e.preventDefault();
            let id = $(this).attr('increase');
            let main_url = 'http://localhost:8000';
            $.ajax({
                type: 'GET',
                url: main_url+'/cart/qnty/increase/'+id,
                dataType: 'json',
                success: function (data){
                    AllCartProduct();
                    addToMiniCart();
                    couponCalculation();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            })
        });

        $(document).on('click','a#qty-decrease',function (e){
            e.preventDefault();
            let main_url = 'http://localhost:8000';
            let id = $(this).attr('decrease');
            $.ajax({
                type: 'GET',
                url: main_url+'/cart/qnty/decrease/'+id,
                dataType: 'json',
                success: function (data){
                    AllCartProduct();
                    addToMiniCart();
                    couponCalculation();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            })
        });

            $(document).on('click','#couponApply',function (e){
                e.preventDefault();
                let coupon_name = $('input[id="Coupon_name"]').val();
                let main_url = "http://localhost:8000";
                $.ajax({
                    url: main_url+'/coupon/apply',
                    type: 'POST',
                    dataType: 'json',
                    data: { coupon_name:coupon_name },
                    success: function (data){
                        $('#couponArea').hide();
                        couponCalculation();
                        const Toast = Swal.mixin({
                            toast:true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        });
                        if( $.isEmptyObject(data.error) ){
                            Toast.fire({
                                type : 'success',
                                icon: 'success',
                                title : data.success,
                            });
                        }else{
                            Toast.fire({
                                type : 'error',
                                icon: 'error',
                                title : data.error,
                            });
                        }
                    }
                })

            });





        function couponCalculation(){
            let main_url = "http://localhost:8000";
            let ship_charge = localStorage.getItem('charge');

            $.ajax({
                url: main_url+'/coupon/calculation',
                type: 'GET',
                dataType: 'json',
                success: function (data){
                    let subTotal = data.subtotal;

                    let result = parseInt(ship_charge) + parseInt(subTotal);

                    let discount = data.discount_amount;

                    let coupon_result = parseInt(result) - parseInt(discount);

                    $('tbody#calculate_data').empty();

                  if ( data.total ){

                      $('tbody#calculate_data').html(`
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Subtotal</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${data.subtotal}৳</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-muted">Coupon Name</div>
                                    </td>
                                     <td>
                                        <div class="text-end text-muted">( ${data.coupon_name} )</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Shipping charge</h6>
                                    </td>
                                    <td class="shipping_charge">
                                        <h6 class="text-brand text-end">${ship_charge}৳</h6>

                                     </td>
                                 </tr>
                                 <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Coupon Discount</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h6 class="text-heading text-end text-brand">${data.coupon_discount}%</h6></td>
                                </tr>

                                 <tr>
                                    <td>
                                        <h6 class="text-muted">Coupon Discount Amount</h6>
                                    </td>
                                     <td>
                                        <h6 class="text-brand text-end">${data.discount_amount}৳</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 id="h6" class="text-muted">Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${coupon_result}৳</h4>
                                    </td>
                                </tr>

                        `)
                  }else{
                      $('tbody#calculate_data').html(`
                                  <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Sub Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${data.subtotal}৳</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Shipping charge</h6>
                                    </td>
                                    <td class="shipping_charge">
                                            <h6 class="text-brand text-end">${ship_charge}৳</h6>
                                     </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${result} ৳</h4>
                                    </td>
                                </tr>
                        `)

                  }
                }
            })
        }

        couponCalculation();


        $(document).on('click','button#removeCoupon',function (e){
            e.preventDefault();
            let main_url = "http://localhost:8000";
            $.ajax({
                url: main_url+'/remove/coupon/',
                type: 'GET',
                dataType: 'json',
                success: function (data){
                    $('#couponArea').show();
                    couponCalculation();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            })
        });


        $('select[name="division_id"]').change(function (){
            let id = $(this).val();
            let main_url = "http://localhost:8000";
            if (id){
                $.ajax({
                    url: main_url+'/select-district/'+id,
                    type:"GET",
                    dataType:"json",
                    success:function (data){
                        var d = $('select[name="district_id"]').empty();
                        $('select[name="district_id').append('<option value="">Select</option>');
                        $.each(data,function (key,value){
                            $('select[name="district_id').append('<option value="'+value.id+'">'+value.district_name+'</option>');
                        })
                    }
                });
            }else{
                alert('danger');
            }
        });



        $('select[name="district_id"]').change(function (){
            let id = $(this).val();
            let main_url = "http://localhost:8000";
            if (id){
                $.ajax({
                    url: main_url+'/select-state/'+id,
                    type:"GET",
                    dataType:"json",
                    success:function (data){
                        var d = $('select[name="state_id"]').empty();
                        $('select[name="state_id').append('<option value="">Select</option>');
                        $.each(data,function (key,value){
                            $('select[name="state_id"]').append('<option value="'+value.id+'">'+value.state_name+'</option>');

                        })
                    }
                });
            }else{
                alert('danger');
            }
        });


        $(document).on('change','select[name="state_id"]',function (e){
            e.preventDefault();
            let id = $(this).val();
            let main_url = "http://localhost:8000";

            if (id){
             $.ajax({
                url: main_url+'/select-charge/'+id,
                type:"GET",
                dataType:"json",
                success:function (data){
                    // window.location.reload();
                    couponCalculation();
                 $('select[name="delivery_charge"]').empty();
                    $('td.shipping_charge').empty();

                $('#charge').append('<option value="'+data.id+'">'+data.delivery_charge+'</option>');
                 let charge = $('select[name="delivery_charge"] option:selected').text();
                 $('td.shipping_charge').append(`<h6>${charge}৳</h6>`);
                 localStorage.setItem('charge',charge);
                 }
            });
         }else{
              alert('danger')
         }

        })

        $(document).on('change','select[name="division_id"]',function (e){
            e.preventDefault();
            let id = $(this).val();
            let main_url = "http://localhost:8000";
            $.ajax({
                url: main_url+'/get-division/'+id,
                type: "GET",
                dataType: 'json',
                success: function (data){

                    couponCalculation();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            })
        });

        $(document).on('change','select[name="district_id"]',function (e){
            e.preventDefault();
            let id = $(this).val();
            let main_url = "http://localhost:8000";
            $.ajax({
                url: main_url+'/get-district/'+id,
                type: "GET",
                dataType: 'json',
                success: function (data){

                    couponCalculation();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            })
        });





        $(document).on('change','select[name="state_id"]',function (e){
            e.preventDefault();
            let id = $(this).val();


            let main_url = "http://localhost:8000";
            $.ajax({
                url: main_url+'/get-state/'+id,
                type: "GET",
                dataType: 'json',
                success: function (data){

                    couponCalculation();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            })
        });





        $(document).on('change','select#state',function (e){
            e.preventDefault();
            let id = $(this).val();
            let main_url = "http://localhost:8000";

            $.ajax({
                url: main_url+'/get-charge/'+id,
                type: "GET",
                dataType: 'json',
                success: function (data){

                    couponCalculation();
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            })
        });







/////////////////////////////place order/////////////////////////





        ////////////////////////localStorage/////////////////////////////

        let charge = localStorage.getItem('charge');
        $('h6#shipCharge span').html(charge);


        // checkout page

        function checkoutShipCharge(){
            let charge = localStorage.getItem('charge');

            let main_url = "http://localhost:8000";
            $.ajax({
                url: main_url+'/checkout/cal/'+charge,
                type: "GET",
                dataType: "json",
                success:function (data){
                    if (data.coupon_name){
                        $('span#coupon_name').html(data.coupon_name);
                    }
                    if (data.discount){
                        $('span#discount').html(data.discount);
                    }
                    if (data.discount_amount){
                        $('span#amount').html(data.discount_amount);
                    }
                    if (data.cart_total){
                        $('span#grand_total').html(data.cart_total);
                    }else{
                        $('span#grand_total').html(data.coupon_total);
                    }



                }
            })
        }
        checkoutShipCharge();
        /////////////compare//////////////////////////////
        $(document).on('click','#compare',function (e){
            e.preventDefault();

            let id = $(this).attr('product_id');
            $.ajax({
                type: 'POST',
                url: '/compare/add/',
                dataType: 'json',
                data: {id:id},
                success:function (data){
                    const Toast = Swal.mixin({
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    if( $.isEmptyObject(data.error) ){
                        Toast.fire({
                            type : 'success',
                            icon: 'success',
                            title : data.success,
                        });
                    }else{
                        Toast.fire({
                            type : 'error',
                            icon: 'error',
                            title : data.error,
                        });
                    }
                }
            })
        })


    });
})(jQuery);

