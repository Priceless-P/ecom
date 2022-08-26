@include('partials.admin.header')
 <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <div class="container bg-blue-900 p-8 text-slate-200 w-4/5 mt-5 grid place-items-center">
<h1 class="text-slate-200">Edit Product</h1>
<form method = "POST" action="{{ route('products.save', $products->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label for="formGroupExampleInput">Name</label>
      <input type="text" name="name" class="form-control" id="formGroupExampleInput" value={{ $products->name }}>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Price</label>
      <input type="text" name="price" class="form-control" id="formGroupExampleInput2" value={{ $products->price }}>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput3" >Category</label>
      <select name="category" class="text-slate-800" required>
        <option value="{{ $products->category}}">{{ $products->category}}</option>
      

      </select>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Description</label>
        <input type="text" name="description" class="form-control" id="formGroupExampleInput2" value={{ $products->description }}>
      </div>
      <button class="btn btn-primary"type="submit"> Save</button>
  </form>
    </div>
 </x-app-layout>
