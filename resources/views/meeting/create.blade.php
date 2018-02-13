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
           <p></p>
         </div>
        <div class="card-body">
          <form class='form-inline form-horizontal' method="POST" action="{{route('meeting/store')}}" >
            {{csrf_field()}}
            <table>
              <tr>
                <td><label for="title">Ttitle</label></td>
                <td>&nbsp;&nbsp;</td>
                <td>
                  <input value="{{old('title')}}"  name="title" type="text" class="form-control" id="title">
                  @if ($errors->has('title'))
                        <span class="help-block">
                        <p>{{$errors->first('title')}}</p>
                      </span>
                  @endif
                </td>
              </tr>
              <tr>
                <td><label for="time">Time</label></td>
                <td>&nbsp;&nbsp;</td>
                <td>
                  <input value="{{old('waktu')}}" name="waktu" type="text" class="form-control" id="time">
                  @if ($errors->has('waktu'))
                        <span class="help-block">
                        <p>{{$errors->first('waktu')}}</p>
                      </span>
                  @endif
                </td>
              </tr>
              <tr>
                <td><label for="place">Place</label></td>
                <td>&nbsp;&nbsp;</td>
                <td>
                  <input value="{{old('place')}}" name="place" type="text" class="form-control" id="place">
                  @if ($errors->has('place'))
                        <span class="help-block">
                        <p>{{$errors->first('place')}}</p>
                      </span>
                  @endif
                </td>
              </tr>
              <tr>
                <td><label for="description">Description</label></td>
                <td>&nbsp;&nbsp;</td>
                <td>
                  <textarea  name="description" class='form-control'>{{old('description')}}</textarea>
                  @if ($errors->has('description'))
                        <span class="help-block">
                        <p>{{$errors->first('description')}}</p>
                      </span>
                  @endif
                </td>
              </tr>
              <tr>
                <td><button type="submit" name="submit" value="submit" class="btn btn-xs btn-primary">submit</button></td>
                <td></td>
              </tr>


            </table>
          </form>





        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @endsection
