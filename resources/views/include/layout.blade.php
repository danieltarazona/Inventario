<!DOCTYPE html>
<html lang="en">
<head>
    <title>InventAR.IO</title>
    @extends('links')

    <style>
        body {
            font-family: 'Helvetica Neue';
            font-weight: 100;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>

<body id="app-layout">

    @extends('navbar')

    <div class="container">

      @yield('content')

      @extends('footer')
    </div>

</body>
</html>
