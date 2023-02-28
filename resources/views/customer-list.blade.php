<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts/head')
@yield('head')
<body>
@include('layouts/header')
@yield('header')
@include('layouts/table')
@yield('table')
@include('layouts/footer')
@yield('footer')
@include('layouts/scripts')
@yield('scripts')
<script type="application/javascript">
    function goDestroy(data) {
        let name = confirm("Você deseja deletar este item?")
        if (name === true) {
            location.href = data
        } else {
            return false
        }
    }
</script>
</body>
</html>
