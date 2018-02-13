@extends('layouts/app')
@section('content')



<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>



              </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>

    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          {{ Auth::user()->name }}
        </li>
        <li class="breadcrumb-item active">
          <a href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              Logout
          </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
       </li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
           @if (session('message'))
             {{session('message')}}
           @endif
         </div>
        <div class="card-body">
            <a href="{{route('meeting/create')}}" class="btn btn-primary btn-xs">create meeting</a> <br> <br>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>title</th>
                  <th>Description</th>
                  <th>Time</th>
                  <th>Tempat</th>
                  <th>Opsi</th>
                  </tr>
              </thead>
              <tbody>
                @php
                  $no=1;
                @endphp
                @foreach ($meetings as $meeting)
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$meeting->title}}</td>
                    <td>{{$meeting->waktu}}</td>
                    <td>{{$meeting->place}}</td>
                    <td>{{$meeting->description}}</td>
                    <td>
                      <a href="{{route('meeting/join',$meeting)}}">join</a>&nbsp;|
                      <a href="{{route('meeting/unjoin',$meeting)}}">unjoin</a>&nbsp;|
                      <a href="{{route('meeting/show',$meeting)}}">detail</a>&nbsp;|
                      @if (Auth::user()->id == $meeting->user_id)
                        <a href="{{route('meeting/edit',$meeting)}}">edit</a>&nbsp;|
                        <a href="{{ route('meeting/destroy',$meeting) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                            delete</a>
                        <form action="{{route('meeting/destroy',$meeting)}}" id="delete-form" style="display:none;" method="post" >
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                        </form>
                      @endif


                    </td>
                  </tr>
                  @php
                    $no++;
                  @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
@endsection
