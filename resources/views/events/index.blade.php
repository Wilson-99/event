@extends('layouts.app')
@section('title', $title)

@section('content')
 @include('layouts.sidebar')
    <div class="py-2 col-lg-9">
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
            <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Image</th>
            <th scope="col" class="text-center">Title</th>
            <th scope="col" class="text-center">Infraestructure</th>
            <th scope="col" class="text-center">Type</th>
            <th scope="col" class="text-center">Schedule</th>
            <th scope="col" class="text-center">Actions</th>
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
             <td>{{$event->private}}</td>
            <td>{{$event->date->format('d-m-Y')}} {{$event->time}}</td>
            <td><a href="{{route('view', ['event' => $id])}}" class="btn btn-secondary"><i class="fa-solid fa-eye"></i></a>
            <a href="edit/{{$event->id}}" class="btn btn-info"><i class="fa-solid fa-user-pen"></i></a>
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
</div>
@endsection



