@extends('layouts.app')

@section('content')

    <main>

        <!-- START Event Edit -->

    <div id="event-create-container" class="col-md-10 offset-md-1">
    <h1>Edit: {{$event->title}}</h1>
    <form action="update/{{$event->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="photo">Image</label>
            <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror">
            <img src="/storage/{{$event->photo}}" alt="{{$event->title}}" class="img-preview">
             {{ $errors->has('photo') ? $errors->first('photo') : '' }}
    </div>

    <div class="form-group">
        <label for="title">Event</label>
            <input type="text" name="title" id="title" placeholder="Nome do evento" class="form-control @error('title') is-invalid @enderror" value="{{$event->title}}">
             <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('title') ? $errors->first('title') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="date">Date of event</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{$event->date->format('Y-m-d')}}">
         <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('date') ? $errors->first('date') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="time">Time of event</label>
            <input type="time" name="time" id="time" class="form-control @error('time') is-invalid @enderror"  value="{{$event->time}}">
        <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('time') ? $errors->first('time') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="city">City</label>
            <input type="text" name="city" id="city" placeholder="Local do evento" class="form-control @error('city') is-invalid @enderror" value="{{$event->city}}">
        <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('city') ? $errors->first('city') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="description">Description  </label>
           <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Quais são os requisitos...">{{$event->title}}</textarea>
        <div class="invalid-feedback"><ion-icon name="alert"></ion-icon> {{ $errors->has('description') ? $errors->first('description') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="items">Add infrastructure items:</label>
        <div class="form-group @error('items') is-invalid @enderror">
            <input type="checkbox" name="items[]" id="items" value="Chairs"> Chairs
            <input type="checkbox" name="items[]" id="items" value="Stage"> Stage
            <input type="checkbox" name="items[]" id="items" value="Drinks"> Drinks
            <input type="checkbox" name="items[]" id="items" value="Foods"> Foods
            <input type="checkbox" name="items[]" id="items" value="Gifts"> Gifts
        </div>
    </div>
    <div class="form-group">
        <label for="private">Type of event</label>
           <select name="private" id="private" class="form-control">
            @foreach ($event as $event)
                <option value="{{$event->id}}">{{$event->private}}<option>
            @endforeach
           </select>
    </div>
    <input type="submit" value="Update Event" class="btn btn-primary">
</form>


        <!-- END Events Edit -->

</main>
@endsection



