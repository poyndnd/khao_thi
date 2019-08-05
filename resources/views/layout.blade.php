<!DOCTYPE html>
<html>
<head>
    <title>Hệ thống tạo và làm bài kiểm tra</title>
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('css/bootstrap-grid.css') }}" rel="stylesheet">
    <link href="{{ url('css/bootstrap-reboot.css') }}" rel="stylesheet">

    <script src="{{ url('js/bootstrap.js') }}"></script>
    <script src="{{ url('js/bootstrabundle.js') }}"></script>
</head>
<body>
  
<div class="container">
    @yield('content')
</div>
   
</body>
</html>