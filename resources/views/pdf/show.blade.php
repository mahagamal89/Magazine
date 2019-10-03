
<?php require_once base_path('resources/views').'/pdf/plugin/test.php'; ?>
<!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>3D FlipBook</title>
        <style type="text/css">
          body {
              margin: 0;
              padding: 0;
          }
          .solid-container {
            height: 100vh;
          }
        </style>
      </head>
      <body>


      <div class="flip-book-container solid-container" src="/images/pdfs/{{$magazine->pdf_path}}">

</div>