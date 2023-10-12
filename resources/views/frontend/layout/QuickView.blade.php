
@php
error_reporting();
@endphp
<div class="modal fade" id="cartViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ProductName"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModel"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="img" src="" alt="">
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Brand Name:<strong/><span id="brand"></span></li>
                            <li class="list-group-item"><strong>Sale Price:<strong/><span id="saleP"></span></li>
                            <li class="list-group-item"><strong>Regular Price:<strong/><span id="regularP"></span></li>
                            <li class="list-group-item"><strong>Product Category:<strong/><span id="catPro"></span></li>

                        </ul>
                       <div class="my-3">
                           <label for="">Products Weight</label>
                           <select class="form-control" name="weight" id="weight">

                           </select>
                       </div>
                        <div class="my-3">
                            <label for="">Product Stock</label>
                            <ul id="ul" class="list-group list-group-horizontal">

                            </ul>
                        </div>
                        <div class="my-3">
                            <label for="">Quantity</label>
                            <input id="quantity"  min="1" class="form-control" type="number">
                        </div>
                        <input class="product_id" type="hidden">
                        <div class="my-3">
                            <button type="button" class="btn btn-sm btn-red addToCart" href=""><i class="fi-rs-shopping-cart mr-5"></i>Add </button>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


<style>
    ul#ul li.active {
        background-color: blue;
    }
</style>
