@extends('layouts.app')
@section('title', 'view')

@section('content')
 @include('layouts.sidebar')
    <div class="py-2 col-lg-9">
    <main>
         <!-- Events Table -->
        <div class="card">
        <div class="card-header">
            <h1 class="card-title ml-5 mt-2 text-bold">Users Confirmed in  event</h1>
        </div>
        <div class="card-body">
        <table class="table table-striped table-hover" id="datatables">
        <thead>
            <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Phone</th>
            <th scope="col" class="text-center">City</th>
            <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventAsParticipants as $event)
            <tr class="text-center">
            <td scope="row">{{$loop->index + 1}}</td>
            <td>{{$event->id}}</td>
            <td>
                <form action="/events/leave/{{$event->id}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger delete-btn"><i class="fa-solid fa-right-from-bracket"></i> Remove to event</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
        </div>
        <!-- END Events Table -->
</main>
</div>
@endsection



