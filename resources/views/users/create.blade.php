@extends('layouts.app')
@section('title', $title)

@section('content')

    <main>

        <!-- Users Create -->
        <div class="col-md-10 offset-md-1">
        <h1>Create User</h1>
        <div class="card-body">
        <form method="POST" action="{{ route('user/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="name">Full Name</label>
            <input type="text" name="name" id="name" placeholder="name" class="form-control @error('name') is-invalid @enderror">
            <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
        </div>

        <div class="form-group">
        <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="email" class="form-control @error('email') is-invalid @enderror">
            <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('email') ? $errors->first('email') : '' }}</div>
        </div>

        <div class="form-group">
        <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" placeholder="phone" class="form-control @error('phone') is-invalid @enderror">
            <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('phone') ? $errors->first('phone') : '' }}</div>
        </div>

        <div class="form-group">
        <label for="city">city</label>
            <input type="text" name="city" id="city" placeholder="city" class="form-control @error('city') is-invalid @enderror">
            <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('city') ? $errors->first('city') : '' }}</div>
        </div>

        <div class="form-group">
        <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="password" class="form-control @error('password') is-invalid @enderror">
            <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('password') ? $errors->first('password') : '' }}</div>
        </div>

        <div class="form-group">
        <label for="user_type">User type</label>
           <select name="user_type" id="user_type" class="form-control">
            <option value="user">user</option>
            <option value="admin">admin</option>
           </select>
        </div>

        <input type="text" class="image" name="photo" value="default.jpg" hidden>

        <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-0">
        <button type="submit" class="btn btn-primary">
              {{ __('Register') }}
        </button>
        </div>
        </form>
        </div>
        </div>
        <!-- END Users Create -->

</main>
@endsection



