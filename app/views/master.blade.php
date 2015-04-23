<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Factura Virtual | {{ isset($title) ? $title : 'Sistema de facturacion virtual' }}</title>    
    <meta name="description" content="{{ isset($description) ? $description : 'Sistema de facturacion virtual acorde a la normativa de impuestos de bolivia.' }}"></meta>

    <meta name="title" content="Facturacion Virtual">
    <meta name="description" content="Sistema de facturacion virtual acorde a la normativa de impuestos de bolivia">
    <meta name="keywords" content="Facturacion Virtual,facturacion,factura,impuestos,bolivia,la paz,cochabamba,santa cruz,oruro,el alto,potosi,beni,pando,tarija,sucre,evo morales,impuestos nacionales,factura virtual,facturacion virtual,iva,it,iue,codigo de control,qr,rnd,sistema de facturacion virtual">
    <meta http-equiv="Content-Language" content="es">
    <meta name="distribution" content="global">
    <meta name="Robots" content="all"/>


    <meta charset="utf-8">
    <meta property="og:site_name" content="Factura Virtual"></meta>
    <meta property="og:url" content="https://cloud.facturavirtual.com.bo"></meta>
    <meta property="og:title" content="Factura Virtual"></meta>
    <meta property="og:description" content="Software de Facturación Online - Su nueva herramienta de gestión financiera"></meta>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_token() ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href='//fonts.googleapis.com/css?family=Roboto:400,700,900,100' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon">    

    <script src="{{ asset('built.js') }}" type="text/javascript"></script>

    <script type="text/javascript">  

    var NINJA = NINJA || {};      
    NINJA.isRegistered = {{ Utils::isRegistered() ? 'true' : 'false' }}; 
    
    window.onerror = function(e) {
      try {
        $.ajax({
          type: 'GET',
          url: '{{ URL::to('log_error') }}',
          data: 'error='+encodeURIComponent(e.message + ' - ' + e.filename + ': ' + e.lineno)+'&url='+encodeURIComponent(window.location)
        });     
      } catch(err) {}
      return false;
    }
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    @yield('head')

  </head>

  <body>

    @if (isset($_ENV['TAG_MANAGER_KEY']) && $_ENV['TAG_MANAGER_KEY'])  
      <!-- Google Tag Manager -->
      <noscript><iframe src="//www.googletagmanager.com/ns.html?id={{ $_ENV['TAG_MANAGER_KEY'] }}"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','{{ $_ENV['TAG_MANAGER_KEY'] }}');</script>      
      <!-- End Google Tag Manager -->

      <script>
        function trackUrl(url) {
          url = '/track' + url.replace('http:/', '');
          dataLayer.push({'event':url, 'eventLabel':this.src});
        }
      </script>
    @elseif (isset($_ENV['ANALYTICS_KEY']) && $_ENV['ANALYTICS_KEY'])  
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
        ga('create', '{{ $_ENV['ANALYTICS_KEY'] }}');        
        ga('send', 'pageview');
        
        function trackUrl(url) {
          url = '/track' + url.replace('http:/', '');
          ga('send', 'pageview', url);  
          //ga('send', 'event', 'photo', 'hover', this.src);
        }
      </script>
    @else
      <script>
        function trackUrl(url) {}
      </script>
    @endif

    @yield('body')

    <script type="text/javascript">
      NINJA.formIsChanged = false;
      $(function() {      
        $('form.warn-on-exit input, form.warn-on-exit textarea, form.warn-on-exit select').change(function() {
          NINJA.formIsChanged = true;      
        }); 
      });
      $('form').submit(function() {
        NINJA.formIsChanged = false;
      });
      $(window).on('beforeunload', function() {
        if (NINJA.formIsChanged) {
          return "{{ trans('texts.unsaved_changes') }}";
        } else {
          return undefined;
        }
      }); 
      //$('a[rel!=ext]').click(function() { $(window).off('beforeunload') });
    </script> 

  </body>

</html>