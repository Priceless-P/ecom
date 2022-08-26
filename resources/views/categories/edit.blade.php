@include('partials.admin.header')
 <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
<h1 class="text-slate-200">Edit Category</h1>
<div class="container bg-blue-900 p-8 text-slate-200 w-4/5 mt-5 grid place-items-center">
<form method = "POST" action="{{ route('categories.save', $categories->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label for="formGroupExampleInput">Name</label>
      <input type="text" name="name" class="form-control" id="formGroupExampleInput" value={{ $categories->name }}>
    </div>
      <button class="btn btn-primary"type="submit"> Save</button>
  </form>
</div>
 </x-app-layout>
