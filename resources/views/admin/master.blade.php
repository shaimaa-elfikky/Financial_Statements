<!doctype html>
<html lang="en">
@include('admin.parcials.head')

<body class="vertical  light  @if ($dir =  LaravelLocalization::getCurrentLocale() == 'ar' ) rtl

@endif">
    <div class="wrapper">
        @include('admin.parcials.navbar')
        @include('admin.parcials.sidebar')
        <!-- main -->
    <main role="main" class="main-content">
        @yield('content')
    </main>
    </div> <!-- .wrapper -->
    @include('admin.parcials.script')

    <script>

       function confirmDelete(id){

        if(confirm('Are You Sure You Want TO delete !')){
              document.getElementById('deleteForm' + id).submit();
        }

     }

    </script>
</body>

</html>
