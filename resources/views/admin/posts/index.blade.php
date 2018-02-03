<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link href="{{ asset('assetAdmin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assetAdmin/plugins/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assetAdmin/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assetAdmin/css/animate.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assetAdmin/plugins/perfect-scrollbar/perfect-scrollbar.min.css') }}" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- CORE CSS TEMPLATE - START -->
    <link href="{{ asset('assetAdmin/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assetAdmin/css/responsive.css') }}" rel="stylesheet" type="text/css"/>

    @yield('styles')

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
{{--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
<body>
         <div class="page-container row-fluid">
            <!-- SIDEBAR - START -->
            <div class="page-sidebar">
                <!-- MAIN MENU Sibar - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
                       <!-- USER INFO - START -->
                    <div class="profile-info row">
                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a href="#">
                                <img src="images/user/xs/default.png" class='img-responsive img-circle'>
                            </a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-left">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
           
            </div>
        
         </div>

    <div class="container" style="width: 100%" style="position: relative;">
            <div class="row" id="main-content">
                <div class="pro-button table-responsive" id="myDIV">
                    <a href="{{ route('posts') }}"><button type="button" class="btn btn-success set-botton active">Product</button></a>
                    <a href="{{ route('categories') }}"><button type="button" class="btn  btn-success set-botton" ">Categories</button></a>
                    <a href="{{ route('events') }}"><button type="button" class="btn btn-success set-botton">Event</button></a>
                    <a href="{{ route('suppliers') }}"><button type="button" class="btn btn-success set-botton">Suppliers</button></a>
                    <a href="{{ route('type') }}"><button type="button" class="btn btn-success set-botton">Categories Type</button></a>
                </div>

                <hr style="margin-top: 110px;">

                <div class="addnewitem">
                    <button type="button" class="btn btn-success" style="height: 40px" "><a href="{{ route('post.create') }}">Add New Product</a></button>
                </div>

                <div class="wrapper">
    
                    <div class="content-body" style="width: 100%" id="style-2">
                        <div class="table-responsive">
                            <table class="table">
                              	<div class="panel panel-default">
						    		<div class="panel-body">
									    <table class="table table-hover">
									    	<thead>
									    		<th>
									    			Images
									    		</th>
                                                <th>
                                                    Category
                                                </th>
									    		<th>
									    			Title
									    		</th>
                                                <th>
                                                    Price
                                                </th>
									    		<th>
									    			Descriptions
									    		</th>
									    		<th>
									    			Edit
									    		</th>
									    		<th>
									    			Trash
									    		</th>
									    	</thead>
									    	<tbody>
									    		@foreach($posts as $post)

									    		 	<tr>
									    		 		<td>
									    		 			<img src="{{ $post->featured }}" alt="" width="50px" height="50px">
									    		 		</td>
                                                        <td>
                                                            {{ $post->category->name }}
                                                        </td>
									    		 		<td>
									    		 				{{ $post->title }}
									    		 		</td>
                                                        <td>
                                                                {{ $post->price }}
                                                        </td>
									    		 		<td>
									    		 				{{ $post->content }}
									    		 		</td>
									    		 		<td>
									    		 			<a href="{{ route('post.edit', ['id' => $post->id]	) }}" class="btn btn-xs btn-info">
									    		 				{{-- <span class="glypyicon glyphicon-pancil"></span> --}}
									    		 				Edit
									    		 			</a>
									    		 		</td>
									    		 		<td>
									    		 			<a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-xs btn-danger">
									    		 				{{-- <span class="glypyicon glyphicon-trash"></span> --}}

									    		 				Trash
									    		 			</a>
									    		 		</td>
									    		 	</tr>

									    		@endforeach
									    	</tbody>
									    </table>
						    		</div>
    							</div>	
                           </table>
                        </div>
                    </div>
                </div>
           </div> 
           
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script> 
    <script src="{{ asset('assetAdmin/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assetAdmin/js/jquery.easing.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assetAdmin/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assetAdmin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}" type="text/javascript"></script> 
        <script src="{{ asset('assetAdmin/plugins/viewport/viewportchecker.js') }}" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END -->

        <!-- CORE TEMPLATE JS - START -->
        <script src="{{ asset('assetAdmin/js/scripts.js') }}" type="text/javascript"></script>
    {{-- <script src="/js/toastr.min.js"></script> --}}
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif
    </script>
    <script>
        var header = decument.getElementById("myDIV");
        var btns = header.getEementsByClassName("bnt");
        for(var i = 0; i<bnts.length; i++)
        {
            btns[i].addEventListener("click", function(){
                var current = document.getEementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>

    @yield('scripts')
</body>
</html>
