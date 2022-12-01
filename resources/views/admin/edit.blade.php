@extends('layouts.app')
@section('title', $title)

@section('content')

    <main>

        <!-- Task Create -->

        <div class="col-md-10 offset-md-1">
        <h1>Edit: {{$task->title}}</h1>
        <div class="card-body">
        <form method="POST" action="{{ route('admin/update', ['task' => $task]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="title" class="form-control @error('title') is-invalid @enderror" value="{{$task->title}}">
            <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('title') ? $errors->first('title') : '' }}</div>
        </div>

        <div class="form-group">
        <label for="subject">subject</label>
            <textarea name="subject" id="subject" cols="30" rows="10" class="form-control @error('subject') is-invalid @enderror" placeholder="Quais são os requisitos...">{{$task->subject}}</textarea>
            <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('subject') ? $errors->first('subject') : '' }}</div>
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-0">
        <button type="submit" class="btn btn-primary">
              {{ __('Register') }}
        </button>
        </div>
        </form>
        </div>
        </div>
        <!-- END Task Create -->

</main>
@endsection





