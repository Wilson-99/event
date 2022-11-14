@extends('layouts.app')

@section('content')
<section class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h3>{{ __('User Datas') }}</h3></div>
                <form action="/profile" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="form-group">
                  <label><b>Full Name</b></label>
                  <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror" id="name" value="{{Auth::user()->name}}">
                   <div class="invalid-feedback">{{ $errors->has('name') ? $errors->first('name') : '' }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"><b>Email</b></label>
                  <input type="email" name="email" required class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $user->email ?? old('email') }}">
                   <div class="invalid-feedback">{{ $errors->has('email') ? $errors->first('email') : '' }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputSenha1"><b>Password</b></label>
                  <input type="password" name="password" required class="form-control @error('password') is-invalid @enderror" id="senha" value="{{ $user->password ?? old('password') }}">
                   <div class="invalid-feedback">{{ $errors->has('password') ? $errors->first('password') : '' }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputSenha1"><b>Phone</b></label>
                  <input type="text" name="phone" required class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ $user->phone ?? old('phone') }}">
                  <div class="invalid-feedback">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</div>
                </div>
                 <div class="form-group">
                  <label for="exampleInputCity"><b>City</b></label>
                  <input type="text" name="city" required class="form-control @error('city') is-invalid @enderror" id="city" value="{{Auth::user()->city}}">
                </div>
                 <div class="invalid-feedback">{{ $errors->has('city') ? $errors->first('city') : '' }}</div>
                 <div class="form-group">
                <label for="exampleInputSenha1"><b>Image</b></label>
                  <div class="input-group-text">
                  <input type="file" name="photo" class="@error('photo') is-invalid @enderror" value="{{old('photo') ? old('photo') : ''}}">
                  </div>
                   <div class="invalid-feedback">{{ $errors->has('photo') ? $errors->first('photo') : '' }}</div>
                </div>
                </div>
                <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="" class="btn btn-success success-btn">Confirmar</button>
              </div>
                </form>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h3>{{ __('User Profile') }}</h3></div>
                <div class="card-body p-0" style="margin-bottom: 98px; text-align:center;">
                <img src="/user_photos/{{Auth::user()->photo}}" style="width: 200px; border-radius: 100%; margin-top: 30px;">
                <h1>Name: {{Auth::user()->name}}</h1>
                <p>Email: {{Auth::user()->email}}</p>
                <p>Phone: {{Auth::user()->phone}}</p>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                 <form action="/profile" method="POST">
                 @csrf
                 @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn float-right">Delete Account</button>
                </form>
              </div>
            </div>
        </div>
        </div>
    </div>
</div>
</section>
@endsection
