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
          <table class="table table-bordered" >
            <tr>
              <td width="20%" >title</td>
              <td> <?php echo $meeting['title']; ?> </td>
            </tr>
            <tr>
              <td width="20%" >description</td>
              <td> <?php echo $meeting['description']; ?> </td>
            </tr>
            <tr>
              <td width="20%" >time</td>
              <td> <?php echo $meeting['waktu']; ?> </td>
            </tr>
            <tr>
              <td width="20%" >place</td>
              <td> <?php echo $meeting['place']; ?> </td>
            </tr>
            <tr>
              <td width="20%" >joined</td>
              <td>{{count($joined)}}</td>
            </tr>
            <tr>
              <td width="20%" >list joined</td>
              <td>
                <?php foreach ($joined as $join): ?>
                  <ul>
                    <li> <?php echo $join->name ?> </li>
                  </ul>
                <?php endforeach; ?>

              </td>
            </tr>
          </table>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  @endsection
