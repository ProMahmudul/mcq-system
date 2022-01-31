<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>
          @yield('pageTitle') | Multiple MCQ system
     </title>

     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome Icons -->
     <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
     <!-- Custom styles -->
     @yield("styles")
</head>

<body class="hold-transition sidebar-mini">
     <div class="wrapper">

          <!-- Main Header -->
          @include("include.header")
          <!-- /.Main Header -->

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
               <!-- Content Header (Page header) -->
               <div class="content-header">
                    <div class="container-fluid">
                         <div class="row mb-2">
                              <div class="col-sm-6">
                                   <h1 class="m-0">
                                        MCQ System
                                   </h1>
                              </div><!-- /.col -->
                              <div class="col-sm-6">
                                   <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active">
                                             @yield('title')
                                        </li>
                                   </ol>
                              </div><!-- /.col -->
                         </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
               </div>
               <!-- /.content-header -->

               <div>
                    @if(session('success'))
                    <span class="alert alert-success">{{session('success')}}</span>
                    @endif
                    @if(session('msg'))
                    <span class="alert alert-info">{{session('msg')}}</span>
                    @endif
                    @if(session('error'))
                    <span class="alert alert-danger">{{session('error')}}</span>
                    @endif
               </div>

               <!-- Main content -->
               @yield("content")
               <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->

          <!-- Main Footer -->
          @include("include/footer")
     </div>
     <!-- ./wrapper -->

     <!-- REQUIRED SCRIPTS -->

     <!-- jQuery -->
     <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
     <!-- Bootstrap 4 -->
     <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <!-- AdminLTE App -->
     <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
     <!-- Custom Scripts -->
     @yield("scripts")
</body>

</html>