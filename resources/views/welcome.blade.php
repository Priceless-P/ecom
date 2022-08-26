@include('partials.header');
<!-- Close Header -->

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="w-100 pt-1 mb-5 text-right">
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="" method="get" class="modal-content modal-body border-0 p-0">
<div class="input-group mb-2">
<input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
<button type="submit" class="input-group-text bg-success text-light">
    <i class="fa fa-fw fa-search text-white"></i>
</button>
</div>
</form>
</div>
</div>



<!-- Start Banner Hero -->
@include('partials.banner');
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
<div class="row text-center pt-3">
<div class="col-lg-6 m-auto">
<h1 class="h1">Categories</h1>
<p>
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
deserunt mollit anim id est laborum.
</p>
</div>
</div>

<div class="row">
@foreach ($categories as $category)
<div class="col-12 col-md-4 p-5 mt-3">
<a href="#"><img src="./category/<? echo $category->image; ?>" class="rounded-circle img-fluid border"></a>
<h5 class="text-center mt-3 mb-3">{{ $category->name }}</h5>
{{-- <p class="text-center"><a class="btn btn-success">View Products</a></p> --}}
</div>
@endforeach

</div>

</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
{{-- @include('partials.products') --}}


<section class="container py-5 ">
<div class=" text-center pt-3">
<div class="col-lg-6 m-auto">
<h1 class="h1">Products</h1>
<p>
    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
    deserunt mollit anim id est laborum.
</p>
</div>
</div>
<div class="container">
    <div class="row">
@foreach ($products as $product)



    <div class="col-md-4">
        <div class="card mb-4 product-wap rounded-0">
            <div class="card rounded-0">

<img class="card-img rounded-0 img-fluid" src="./product/<? echo $product->image; ?>">
<div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
    <ul class="list-unstyled">
        <li><a class="btn btn-success text-white mt-2" href="{{ route('product_details',$product->id) }}"><i class="far fa-eye"></i></a></li>
        <li><a class="btn btn-success text-white mt-2" href="{{ route('add.to.cart', $product->id) }}"><i class="fas fa-cart-plus"></i></a></li>
    </ul>
</div>
</div>
<div class="card-body">
<a href="{{ route("product_details",$product->id) }}" class="h3 text-decoration-none">{{ $product->name }}</a>


<p class="text-center mb-0">${{ $product->price }}</p>
<p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>

</div>
</div>
</div>
@endforeach
    </div>
</div>
</section>
<!-- End Featured Product -->


<!-- Start Footer -->
@include('partials.footer')
<!-- End Footer -->

<!-- Start Script -->
@include('partials.scripts')
<!-- End Script -->
</body>

</html>
</body>
</html>
