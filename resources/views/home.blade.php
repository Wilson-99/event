@extends('layouts.app')

@section('title', 'HDC Events')

@section('content')

<div class="col-md-12" id="search-container">
    <h1>Find a event</h1>
    <form action="/" method="GET">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
        <input type="submit" value="Search" class="btn btn-secondary">
    </form>
</div>
        <div class="col-md-12" id="events-container">
           @if($search)
            <p>Looking for: <b style="text-transform: uppercase;">{{$search}}</b></p>
           @else
           <h2>Next events</h2>
           <p class="subtitle">Look the next events...</p>
           @endif
           <div class="container">
            <div id="cards" class="row">
                @foreach($events as $event)
                <div class="card col-md-3">
                    <img src="/storage/{{$event->photo}}" alt="{{$event->title}}">
                    <div class="card-body">
                        <p id="card-date">{{date ('d/m/Y', strtotime($event->date))}}</p>
                        <h5 id="card-title">{{$event->title}}</h5>
                        <a href="/events/{{$event->id}}" class="btn btn-primary">More...</a>
                    </div>
                </div>
                @endforeach
                @if(count($events)== 0 && $search)
                    <p>No result for {{$search}}! <a href="/" style="text-decoration: none;">See all.</a></p>
                    @elseif(count($events)== 0)
                    <p>No event available!</p>
                @endif
            </div>
        </div>
        </div>

@endsection
