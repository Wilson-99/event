@extends('layouts.app')

@section('title', $event->title)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div class="col-md-6" id="image-container">
        <img src="/storage/{{$event->photo}}" class="image-fluid" alt="{{$event->title}}">
        </div>
            <div id="info-container" class="col-md-6">
                <h1>{{$event->title}}</h1>
                <p class="event-city"><i class="fa-solid fa-location-dot" style="color: red;"></i>  {{$event->city}}</p>
               @if (!$hasUserJoined)
                    <form action="/events/join/{{$event->id}}" method="POST">
                    @csrf
                    <a href="/events/join/{{$event->id}}" class="btn btn-primary" id="event-submit" onclick="event.preventDefault();this.closest('form').submit();">Confirm presence</a>
                    </form>
               @else
                    <p class="already-joined-msg">You already have confirmed presence in this event.</p>
               @endif
                <h3>The event will have:</h3>
                <ul id="items-list">
                    @foreach($event->items as $item)
                    <li>
                        <i class="fa-solid fa-circle-play"></i> <span>{{$item}}</span>
                    </li>
                    @endforeach
                </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>About event:</h3>
            <p class="event-description">{{$event->description}}</p>
        </div>
    </div>
</div>

@endsection
