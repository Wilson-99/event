@extends('layouts.app')
@section('title', $title)

@section('content')

    <main>
        <!-- start: Content -->

    <div id="event-create-container" class="col-md-10 offset-md-1">
    <h1>Create Event</h1>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="photo">Image</label>
            <input type="file" name="photo" id="photo" placeholder="photo" class="form-control-file @error('photo') is-invalid @enderror">
            <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('photo') ? $errors->first('photo') : '' }}</div>
    </div>

    <div class="form-group">
        <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Event title" class="form-control @error('title') is-invalid @enderror">
            <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('title') ? $errors->first('title') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="date">Date of event</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror">
        <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('date') ? $errors->first('date') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="time">Time of event</label>
            <input type="time" name="time" id="time" class="form-control @error('time') is-invalid @enderror">
        <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('time') ? $errors->first('time') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="city">City</label>
            <input type="text" name="city" id="city" placeholder="city of event" class="form-control @error('city') is-invalid @enderror">
        <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('city') ? $errors->first('city') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="description">Description  </label>
           <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="About event..."></textarea>
        <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('description') ? $errors->first('description') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="items">Infrastructure items:</label>
        <div class="form-group @error('items') is-invalid @enderror">
            <input type="checkbox" name="items[]" id="items" value="Chairs"> Chairs
            <input type="checkbox" name="items[]" id="items" value="Stage"> Stage
            <input type="checkbox" name="items[]" id="items" value="Drink"> Drinks
            <input type="checkbox" name="items[]" id="items" value="Food"> Foods
            <input type="checkbox" name="items[]" id="items" value="Gifts"> Gifts
        </div>
    <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('items') ? $errors->first('items') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="private">Type of event</label>
           <select name="private" id="private" class="form-control">
            <option value="0">Public</option>
            <option value="1">Private</option>
           </select>
    </div>
    <input type="submit" value="Create Event" class="btn btn-primary">
</form>
</div>

</main>
@endsection
