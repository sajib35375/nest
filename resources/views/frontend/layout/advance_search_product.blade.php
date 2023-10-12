<style>
    body{
    background-color: #eee;
    }

    .card{

    background-color: #fff;
    padding: 15px;
    border:none;
    }

    .input-box{
    position: relative;
    }

    .input-box i {
    position: absolute;
    right: 13px;
    top:15px;
    color:#ced4da;

    }

    .form-control{

    height: 50px;
    background-color:#eeeeee69;
    }

    .form-control:focus{
    background-color: #eeeeee69;
    box-shadow: none;
    border-color: #eee;
    }


    .list{

    padding-top: 20px;
    padding-bottom: 10px;
    display: flex;
    align-items: center;

    }

    .border-bottom{

    border-bottom: 2px solid #eee;
    }

    .list i{
    font-size: 19px;
    color: red;
    }

    .list small{

    color:#dedddd;
    }
</style>
@if($products->isEmpty())
<div class="text-center text-danger">Product Not Found!</div>
@else
<div class="container mt-2">

    <div class="row d-flex justify-content-center ">

      <div class="col-md-12">

          <div class="card">

            @foreach ($products as $product)
            <a href="{{ route('single.product',$product->id) }}" target="_blank">
                <div class="list">
                    <a href="{{ route('single.product',$product->id) }}" target="_blank">
                    <img class="default-img" src="{{ URL::to('backend/assets/imgs/products/'.$product->thumbnail) }}" alt="product" style="width: 30px; height: 30px;" />
                    </a>
                    <a href="{{ route('single.product',$product->id) }}" target="_blank">
                <div class="d-flex flex-column ml-3" style="margin-left: 10px;">
                    <span>{{ $product->product_name }}</span>
                    <small>৳ {{ $product->sale_price }}</small>
                </div>
                    </a>
                </div>
            </a>
            @endforeach

          </div>

      </div>

    </div>

</div>
@endif

