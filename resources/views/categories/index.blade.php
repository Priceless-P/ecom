@include('partials.admin.header')
 <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
@if (session()->has('message'))
<div class="container">
<div class="alert alert-danger" role="alert">
    {{ session()->get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
<div class="container m-5 ">
    <table class="table">
      <h2 class="text-center text-xl">Category List</h2>
      <thead>
        <tr>

          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="p-4">
@foreach ($categories as $category)
<tr>
    <td scope="row"><img src="./category/<? echo $category->image; ?>" style="height:100px; width:100px;"></td>
<td>{{ $category->name }}</td>

<td>
<a href={{ route('categories.edit', $category->id) }} class="btn btn-primary">Edit</a>

<form action={{ route('categories.delete', $category->id) }} method="POST">
    @csrf
    @method('DELETE')
    <button class="btn bg-red-500 text-slate-100" type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
      </tbody>
    </table>

</div>
 </x-app-layout>
