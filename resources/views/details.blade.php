@include('layout')




<div class="col-lg-7 mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="h2">{{ $products->name }}</h1>
            <p class="h3 py-2">${{ $products->price }}</p>
            <img src="../product/<? echo $products->image; ?>" style="height:300px; width:300px;">


                    <h6>Category:</h6>


                    <p >{{ $products->category }}</p>



            <h6>Description:</h6>
            <p>{{ $products->description }}</p>


                </div>
                <div class="row pb-3">


                        <a href="{{ route('add.to.cart', $products->id) }}" class="btn btn-success ">Add To Cart</a>

                </div>
        </div>
    </div>
</div>
</div>

@include('partials.scripts')
@include('partials.footer')
