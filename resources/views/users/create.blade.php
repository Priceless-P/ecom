@include('partials.admin.header')
 <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <div class="container bg-blue-900 p-8 text-slate-200 w-4/5 mt-5 grid place-items-center">
<h1 class="text-slate-200">Add new User</h1>
<form method = "POST" action="{{ route('users.store') }}">
    @csrf
    <div class="form-group">
      <label for="formGroupExampleInput">Name</label>
      <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Full name">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Email</label>
      <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2"> Temporary Password</label>
        <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="password">
      </div>
      <button class="btn btn-primary"type="submit"> Save</button>

  </form>
    </div>
  </x-app-layout>