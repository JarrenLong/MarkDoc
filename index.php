<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="MarkDoc | Books N' Bytes, Inc.">
  <meta name="author" content="Books N' Bytes, Inc.">
  <link rel="shortcut icon" href="markdoc.png">
  <title>MarkDoc | Books N' Bytes, Inc.</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style type="text/css">
  body {
    font-family: 'Open Sans', arial, sans-serif;
    color: #494d55;
    font-size: 14px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
  html, body {
    height: 100%;
  }
  a {
    color: #3aa7aa;
    -webkit-transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -o-transition all 0.4s ease-in-out;
  }
  a:hover {
    text-decoration: underline;
    color: #339597;
  }
  a:focus {
    text-decoration: none;
  }
  pre code {
    width: 100%;
    background: #222;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
    padding: 2px 8px;
    padding-top: 4px;
    display: inline-block;
    border: 6px solid #343a40;
    border-radius: 8px;
  }
  table {
    width: 100%;
    text-align: center;
  }
  table, tr, td {
    border: 1px solid #343a40;
  }
  footer {
    width: 100%;
    text-align: center;
    padding: 24px;
    background: #343a40!important;
    color: rgba(255,255,255,0.5);
    position: fixed;
    bottom: 0;
  }
  </style>
</head>
<body>
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="https://www.booksnbytes.net">
        <img src="markdoc.png" alt="MarkDoc" height="44px" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/toc">Table of Contents</a>
          </li>
          <li>
            <a class="nav-link" href="/download">Download</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Help</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="/README">About MarkDoc</a>
              <a class="dropdown-item" href="/LICENSE">License</a>
              <a class="dropdown-item" href="/CHANGELOG">Changelog</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
      <div class="starter-template" style="padding-top:80px;padding-bottom:80px;">

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- MarkDoc -->
        <ins class="adsbygoogle"
          style="display:block"
          data-ad-client="ca-pub-8519280427354162"
          data-ad-slot="5308074992"
          data-ad-format="auto"
          data-full-width-responsive="true"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

<?php

require_once('MarkDoc.php');

$md = new MarkDoc();
echo $md->processRequest($_SERVER['REQUEST_URI']);
?>

      </div>
    </main>

    <br/>

    <footer>
<?php echo $md->renderPage('footer.md'); ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

