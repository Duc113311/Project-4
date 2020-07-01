<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

@include('admin.general.header')
@yield('css')
<body>


   @include('admin.general.menuleft')

    <!-- Left Panel -->

    <!-- Right Panel -->

    
    <div id="right-panel" class="right-panel">
      @include('admin.general.menutop')

      @yield('content')
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    
    @include('admin.general.js')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    @yield('js')
  
</body>

</html>
