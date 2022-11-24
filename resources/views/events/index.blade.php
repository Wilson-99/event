@extends('layouts.app')

@section('content')

    <main>
         <!-- Events Table -->
        <div class="card">
        <div class="card-header">
            <h1 class="card-title ml-5 mt-2 text-bold">Events</h1>
            <a href="{{route ('create')}}"><button class="btn btn-primary float-right"><i class="fa-solid fa-user-plus"></i> Add event</button></a>
        </div>
        <div class="card-body">
        <table class="table table-striped table-hover" id="datatables">
        <thead>
            <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Infraestructure</th>
            <th scope="col">Schedule</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr class="text-center">
            <td scope="row">{{$loop->index + 1}}</td>
            <td><img src="/storage/{{$event->photo}}" style="width:50px; height:35px; border-radius:20%;"></td>
            <td>{{$event->title}}</td>
            <td>@foreach($event->items as $item)
            {{$item}}{{($loop->last)? ' ' : ', '}}
            @endforeach
            </td>
            <td>{{$event->date->format('d-m-Y')}} {{$event->time}}</td>
            <td><a href="edit/{{$event->id}}" class="btn btn-info"><i class="fa-solid fa-user-pen"></i></a>
            <form action="delete/{{$event->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
            </form></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
        </div>
        <!-- END Events Table -->
</main>
@endsection



