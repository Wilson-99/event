@extends('layouts.app')
@section('title', $title)


@section('content')
 @include('layouts.sidebar')
    <div class="py-2 col-lg-9">
    <main>
    <div class="row">
            <!-- start: Content -->
            <div class="py-2 col-lg-12">
                <!-- start: Summary -->
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div href="#"
                            class="text-dark text-decoration-none bg-white p-4 rounded shadow-sm d-flex justify-content-between summary-primary">
                            <div>
                                <i class="fa-solid fa-calendar-xmark"></i>
                                <div>Events</div>
                            </div>
                                  <h4>{{count($events)}}</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div href="#"
                            class="text-dark text-decoration-none bg-white p-4 rounded shadow-sm d-flex justify-content-between summary-indigo">
                            <div>
                               <i class="fa-solid fa-chart-column"></i>
                                <div>Income</div>
                            </div>
                            <h4>$435</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div href="#"
                            class="text-dark text-decoration-none bg-white p-4 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                               <i class="fa-solid fa-bag-shopping"></i>
                                <div>Orders</div>
                            </div>
                            <h4>$435</h4>
                        </div>
                    </div>

                     <div class="col-12 col-sm-6 col-lg-3">
                        <div href="#"
                            class="text-dark text-decoration-none bg-white p-4 rounded shadow-sm d-flex justify-content-between summary-success">
                            <div>
                               <i class="fa-solid fa-user-plus"></i>
                                <div>User Registations</div>
                            </div>
                                  <h4>{{count($users)}}</h4>
                        </div>
                    </div>

                <!-- end: Summary -->
        <section class="col-lg-9 connectedSortable">
                 <!-- START TO DO LIST -->
        <div class="card">
            <div class="card-header">
                <i class="fa-solid fa-table-list"></i> TO DO LIST
                <a href="{{route('admin/create')}}">
                <button type="button" class="btn btn-primary float-right"><i class="fa-solid fa-plus"></i> Add item</button>
                </a>
            </div>
                <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                @foreach ($tasks as $task)
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <span>{{$loop->index + 1}}</span>
                    </span>
                    <!-- checkbox -->
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1">
                      <label for="todoCheck1"></label>
                    </div>
                    <!-- todo text -->
                        <span class="text">{{$task->title}}</span>
                    <!-- Emphasis label -->
                    <small class="badge badge-warning"><i class="far fa-clock"></i> {{$task->created_at}}</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <a href="admin/edit/{{$task->id}}"><i class="fas fa-edit" style="color: #0dcaf0;"></i></a>
                      <form action="admin/delete/{{$task->id}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button><i class="fas fa-trash" style="color: red;"></i></button>
                      </form>
                    </div>
                  </li>
            @endforeach
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                    {{$tasks->links()}}
                </div>
            </div>
            </div>
        <!-- END TO DO LIST -->
        </section>

        </div>
        </div>
        </div>
        </main>
        </div>


@endsection
