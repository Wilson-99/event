@extends('layouts.app')
@section('title', $title)

@section('content')
 @include('layouts.sidebar')
<div class="py-2 col-lg-9">
    <main>
        <!-- Reports Content -->
        <div class="row g-2">

               <!-- USERS LIST -->
               <section class="col-lg-6 connectedSortable">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">8 New Members</span>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                    @foreach ($users as $user)
                      <li>
                        <img src="user_photos/{{$user->photo}}" alt="User Image">
                        <span class="users-list-name" href="#">{{$user->name}}</span>
                        <span class="users-list-date">{{$user->created_at->format('Y')}}</span>
                      </li>
                    @endforeach
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{route ('users')}}">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
                </div>
              <!-- /.col -->
        </section>
        <!-- END USERS LIST -->

        <!-- EVENT LIST -->
        <section class="col-lg-6 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Events</h3>

                <div class="card-tools">
                  <span class="badge badge-danger">3 New Members</span>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <!-- /.item -->
                   @foreach ($events as $event)
                  <li class="item">
                    <div class="product-img">
                      <img src="storage/{{$event->photo}}" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <span class="product-title">{{$event->title}}<span class="badge badge-secondary float-right">{{$event->date->format('d-m-Y')}}</span></span>
                      <span class="product-description">            {{$event->description}}
                      </span>
                    </div>
                  </li>
                   @endforeach
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{route('events')}}" class="uppercase">View All Events</a>
              </div>
              <!-- /.card-footer -->
            </div>
        </section>
        <!-- END EVENT LIST -->



        </div>
        <!-- END Reports Content -->

    </main>
    </div>
@endsection



