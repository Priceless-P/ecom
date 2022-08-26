@include('partials.admin.header')
 <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
@if (session()->has('message'))
<div class="alert alert-danger" role="alert">
    {{ session()->get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif
  <div class="container m-5 ">
  <table class="table">
    <h2 class="text-center text-xl">User List</h2>
    <thead>
      <tr>

        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="p-4">
@foreach ($users as $user)
<tr>
    <th scope="row">{{ $user->name }}</th>
<td>{{ $user->email }}</td>
<td>
<a href={{ route('users.edit', $user->id) }} class="btn btn-primary">Edit</a>

<form action={{ route('users.delete', $user->id) }} method="POST">
    @csrf
    @method('DELETE')
    <button class="btn bg-red-500 text-slate-100" type="submit">Delete</button>
</form>
</td>
</tr>
    </tbody>
  </table>
@endforeach
  </div>
 </x-app-layout>
