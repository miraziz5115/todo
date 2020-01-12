<!DOCTYPE html>

<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::asset('public/site/images/favicon.png') }}" type="image/x-icon"/>


    <title></title>



    <!-- Bootstrap -->

    <link href="{{ asset('public/site/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->

    <link href="{{ asset('public/site/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- NProgress -->

    <link href="{{ asset('public/site/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->

    <link href="{{ asset('public/site/vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">



    <!-- Custom styling plus plugins -->

    <link href="{{ asset('public/site/build/css/custom.min.css') }}" rel="stylesheet">

    <link href="{{ asset('public/site/css/style.css') }}" rel="stylesheet">

  </head>



  <body class="nav-md">

    <div class="container body">

      <div class="main_container">
        
        <div class="col-md-3 col-md-3 left_col menu_fixed mCustomScrollbar _mCS_1 mCS-autoHide">

          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">

              <a href="" class="site_title"><span></span></a>

            </div>



            <div class="clearfix"></div>



            <!-- menu profile quick info -->

            <div class="profile clearfix">

              

              <div class="profile_info">

                <h2></h2>

              </div>

            </div>

            <!-- /menu profile quick info -->



            <br />



            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">

                <h3></h3>
                <ul class="nav side-menu">
                  <li><a href="{{ route('home')}}">Список задач</a></li>
                  <li><a href="{{ route('todoDone')}}">Выполненные задачи</a></li>
                </ul>

                

              </div>



            </div>

            <!-- /sidebar menu -->



            <!-- /menu footer buttons -->

            <div class="sidebar-footer hidden-small">

              <a data-toggle="tooltip" data-placement="top" title="Settings" href="">

                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>

              </a>

             

            </div>

            <!-- /menu footer buttons -->

          </div>

        </div>



        <!-- top navigation -->

        <div class="top_nav">

          <div class="nav_menu">

            <nav>

              <div class="nav toggle">

                <a id="menu_toggle"><i class="fa fa-bars"></i></a>

              </div>



              <ul class="nav navbar-nav navbar-right">

                <li class="">

                  

                 

                </li>



                <li role="presentation" class="dropdown" style="display: none">

                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">

                    <i class="fa fa-envelope-o"></i>

                    <span class="badge bg-green">6</span>

                  </a>

                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                    <li>

                      <a>


                        <span>


                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <a>


                        <span>

                          <span>John Smith</span>

                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <a>


                        <span>

                          <span>John Smith</span>

                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <a>


                        <span>

                          <span>John Smith</span>

                          <span class="time">3 mins ago</span>

                        </span>

                        <span class="message">

                          Film festivals used to be do-or-die moments for movie makers. They were where...

                        </span>

                      </a>

                    </li>

                    <li>

                      <div class="text-center">

                        <a>

                          <strong>See All Alerts</strong>

                          <i class="fa fa-angle-right"></i>

                        </a>

                      </div>

                    </li>

                  </ul>

                </li>

              </ul>

            </nav>

          </div>

        </div>

        <!-- /top navigation -->



        @yield('content')

        <!-- footer content -->
        <div class="clearfix"></div>
        <br>
        <footer >
          <div class="clearfix"></div>
        </footer>

        <!-- /footer content -->

      </div>

    </div>



    


    <!-- jQuery -->

    
  <script src="{{ asset('public/site/js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{ asset('public/site/vendors/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('public/site/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('public/site/js/script.js')}}"></script>


  
    <script src="{{ asset('public/site/vendors/jquery/dist/jquery.min.js') }}"></script>


    <!-- Bootstrap -->

    <script src="{{ asset('public/site/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- FastClick -->

    <script src="{{ asset('public/site/vendors/fastclick/lib/fastclick.js') }}"></script>

    <!-- NProgress -->

    <script src="{{ asset('public/site/vendors/nprogress/nprogress.js') }}"></script>

    <!-- bootstrap-wysiwyg -->

    <script src="{{ asset('public/site/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>

    <script src="{{ asset('public/site/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>

    <script src="{{ asset('public/site/vendors/google-code-prettify/src/prettify.js') }}"></script>



    <!-- Custom Theme Scripts -->

    <script src="{{ asset('public/site/build/js/custom.min.js') }}"></script>




  </body>

</html>