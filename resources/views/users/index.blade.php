@extends('layouts.app')

@section('content')

    <main>

        <!-- Users Table -->
        <div class="card">
        <div class="card-header">
            <h1 class="card-title ml-5 mt-2 text-bold">Users</h1>
            <a href="{{route ('user/create')}}"><button class="btn btn-primary float-right"><i class="fa-solid fa-user-plus"></i> Add user</button></a>
        </div>
        <div class="card-body">
        <table class="table table-striped table-hover" id="datatables">
        <thead>
            <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">City</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr class="text-center">
            <td scope="row">{{$loop->index + 1}}</td>
            <td><img src="user_photos/{{$user->photo}}" style="width:50px; height:35px; border-radius:50%;"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->city}}</td>
            <td>{{$user->user_type}}</td>
            <td>
            <a href="user/edit/{{$user->id}}" class="btn btn-info edit-btn"><i class="fa-solid fa-user-pen"></i></a>
            <form action="/profile/{{$user->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete-btn"><i class="fa-solid fa-trash-can"></i></button>
            </form>
            </td>
            </tr>
        @endforeach
        </tbody>
        </table>
        </div>
        </div>
        <!-- END Users Table -->

</main>
@endsection



