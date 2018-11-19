<!DOCTYPE html>
<html>
<head lang='en'>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <meta name='description' content='MarkDoc | Books N' Bytes, Inc.'>
  <meta name='author' content='Books N' Bytes, Inc.'>
  <link rel='icon' href='favicon.ico'>
  <title>MarkDoc | Books N' Bytes, Inc.</title>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
</head>
<body>
    <nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top'>
      <a class='navbar-brand' href='https://www.booksnbytes.net'>MarkDoc</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault' aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>

      <div class='collapse navbar-collapse' id='navbarsExampleDefault'>
        <ul class='navbar-nav mr-auto'>
          <li class='nav-item active'>
            <a class='nav-link' href='/'>Home <span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='/toc'>Table of Contents</a>
          </li>
          <li>
            <a class='nav-link' href='/download'>Download</a>
          </li>
          <!-- <li class='nav-item'><a class='nav-link disabled' href='#'>Disabled</a></li> -->
          <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Help</a>
            <div class='dropdown-menu' aria-labelledby='dropdown01'>
              <a class='dropdown-item' href='/README'>About MarkDoc</a>
              <a class='dropdown-item' href='/LICENSE'>License</a>
              <a class='dropdown-item' href='/CHANGELOG'>Changelog</a>
            </div>
          </li>
        </ul>
<!--
        <form class='form-inline my-2 my-lg-0'>
          <input class='form-control mr-sm-2' type='text' placeholder='Search' aria-label='Search'>
          <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
        </form>
-->
      </div>
    </nav>

    <main role='main' class='container'>
      <div class='starter-template' style='padding-top:80px;'>

<?php

require_once('MarkDoc.php');

$md = new MarkDoc();
echo $md->processRequest($_SERVER['REQUEST_URI']);

?>

      </div>
    </main>

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

    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
</body>
</html>

