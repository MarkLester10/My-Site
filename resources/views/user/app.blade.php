<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.layouts.app')
</head>

<body>

 @include('user.layouts.header')

  @yield('content')

@include('user.layouts.footer')

</body>

</html>
