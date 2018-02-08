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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    @yield('styles')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    {{--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        ::-webkit-scrollbar {
            width: 1px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
    <body>
        <div class="page-container row-fluid">
            <div class="container" style="width: 100%" style="position: relative;">
                <div class="row" id="main-content" style="margin-right: 200px">
                    <div class="wrapper">
                        <div class="content-body" style="width: 100%">
                            <div class="table-responsive ">
                                <table class="table">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><h1>Create New Post</h1></div>
                                        <div class="panel-body">
                                            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                                                {!! csrf_field() !!}

                                                <div class="form-group">
                                                    <label for="category">Select a Category</label>
                                                    <select name="category_id" id="category" class="form-control">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="title">Item Name</label>
                                                    <input type="text" name="title" class="form-control" required autofocus>
                                                </div>

                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="featured">Product Images</label>
                                                    <input type="file" name="featured" class="form-control" required autofocus>
                                                </div>
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="price">Item Price</label>
                                                    <input type="number" name="price" class="form-control" required autofocus>
                                                </div>

                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="content">Description:</label>
                                                    <textarea name="content"  cols="5" rows="5" class="form-control" required autofocus></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <div class="text-center">
                                                        <button class="btn btn-success" type="submit">Create Item</button>
                                                        <a href="{{ route('posts') }}"><button id="product" type="button" class="btn btn-success set-botton" style="height: 33px; width: 80px; margin-left: 20px">Back Nah</button></a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </table>
                            </div>
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
	$(document).ready(function() {
    $('#content').summernote();
});	
</script>
@yield('scripts')
</body>
</html>