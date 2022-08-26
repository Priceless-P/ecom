
 @include('partials.admin.header')
 <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>


      <div class="container m-2 p-5 flex justify-center justify-items-center">
        <div class="card w-2/6 md:w-full bg-blue-900 p-8 text-slate-200  mr-3">
            <div class="card-body">
              <h5 class="card-title text-3xl">Total Products</h5>

              <p class="card-text">{{ $totalproducts }}</p>
              <a  class="card-link" href="{{ route('products.index') }}">View Products</a>
            </div>
          </div>

              <div class="clearfix"> </div>

                <div class="card w-2/6 md:w-full bg-blue-900 p-8 text-slate-200  mr-3" >
                    <div class="card-body">
                      <h5 class="card-title text-3xl">Total Categories</h5>

                      <p class="card-text">{{ $totalcategories }}</p>
                      <a href="{{ route('categories.index') }}" class="card-link">View Categories</a>
                    </div>
                  </div>



                        <div class="card w-2/6 md:w-full bg-blue-900 p-8 text-slate-200  mr-3">
                            <div class="card-body">
                              <h5 class="card-title text-3xl">Total Users</h5>

                              <p class="card-text">{{ $totalusers }}</p>
                              <a href="{{ route('users.index') }}" class="card-link">View Users</a>
                            </div>
                          </div>

                </div>
                <div class="clearfix"> </div>
                @include('partials.admin.scripts')
</x-app-layout>
