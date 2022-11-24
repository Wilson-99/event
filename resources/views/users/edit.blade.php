@extends('layouts.app')

@section('content')

    <main>

        <!-- Users edit -->
    <div id="user-create-container" class="col-md-10 offset-md-1">
    <h1>{{$user->name}}'s Profile</h1>
    <form action="{{route('update1', ['user' => $user ])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Full Name</label>
            <input type="text" name="name" id="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
             <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
    </div>
     <div class="form-group">
        <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Email" class="form-control @error('name') is-invalid @enderror" value="{{$user->email}}">
             <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" placeholder="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}">
        <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('phone') ? $errors->first('phone') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="city">City</label>
            <input type="text" name="city" id="city" placeholder="City" class="form-control @error('city') is-invalid @enderror" value="{{$user->city}}">
        <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('city') ? $errors->first('city') : '' }}</div>
    </div>


           <select name="user_type" id="user_type" class="form-control">
            @foreach ($user as $user)
                <option value="{{$user->id}}">{{$user->user_type}}<option>
            @endforeach
           </select>

    <input type="submit" value="Update user" class="btn btn-primary">
</form>
        <!-- END Users edit -->

</main>
@endsection



