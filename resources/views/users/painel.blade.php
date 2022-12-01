@extends('layouts.app')

@section('title', 'painel')

@section('content')

    <!-- Start Painel View -->

        <div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Events confirmed</h1>
        </div>
        <div class="col-md-10 offset-md-1 dashboard-title-container">
        @if(count($eventAsParticipant)>0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">City</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventAsParticipant as $event)
                            <tr>
                                    <td scropt="row">{{$loop->index + 1}}</td>
                                    <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                                    <td>{{$event->city}}</td>
                                    <td>
                                    <form action="/events/leave/{{$event->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="log-out"></ion-icon> Leave event</button>
                                    </form>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <p>You haven't joined in an event yet, <a href="/">check all available events</a></p>
            @endif
        </div>

     <!-- End Painel View -->

@endsection
