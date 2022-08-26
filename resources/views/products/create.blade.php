@include('partials.admin.header')
 <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <div class="container bg-blue-900 p-8 text-slate-200 w-4/5 mt-5 grid place-items-center">
<h1 class="text-slate-200 text-lg">Add new Product</h1>
<form method = "POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Product name"required >
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Price</label>
    <input type="text" name="price" class="form-control" id="formGroupExampleInput2" placeholder="Price"required>
  </div>
  <div class="form-group">
      <label for="formGroupExampleInput3" >Category</label>
      <select name="category" class="text-slate-800" required>
        @foreach ($categories as $category)
        <option value="{{ $category->name }}">{{ $category->name }}</option>
        @endforeach
     
      </select>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput4">Description</label>
      <input type="text" name="description" class="form-control" id="formGroupExampleInput4" placeholder="Description"required>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput5">Product Image</label>
      <input type="file" name="image" class="form-control" id="formGroupExampleInput5" required>
    </div>
    <button class="btn btn-primary"type="submit"> Save</button>
</form>
    </div>
 </x-app-layout>
