<?php

require_once("Parsedown.php");

function startsWith($haystack, $needle)
{
  $length = strlen($needle);
  return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
  $length = strlen($needle);
  if ($length == 0) {
    return true;
  }

  return (substr($haystack, -$length) === $needle);
}

function getDirContents($dir, $fileType, &$results = array()){
  $files = scandir($dir);

  foreach($files as $key => $value){
    $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
    if(!is_dir($path) && endsWith($path, $fileType)) {
      $results[] = $path;
    } else if($value != "." && $value != "..") {
      getDirContents($path, $fileType, $results);
      if(endsWith($path, $fileType)) {
        $results[] = $path;
      }
    }
  }

  return $results;
}

function generateTOC() {
  // Regen the ToC file
  $baseDir = "/home/dev/public_html/";
  $allFiles = getDirContents($baseDir, '.md');

  $toc = fopen("toc.md", "w");
  fwrite($toc, "# Master Sitemap\r\n");
  fwrite($toc, "## &copy; 2018 [Books N' Bytes, Inc.](https://www.booksnbytes.net)\r\n\r\n");

  foreach($allFiles as &$p) {
    $tmp = str_replace($baseDir, '', $p);
    fwrite($toc, ' * [' . str_replace(".md",'',$tmp) . '](http://' . $_SERVER["SERVER_NAME"] . '?p=' . $tmp . ")\r\n");
  }
  fclose($toc);
}

function dumpWP() {
  $q = "SELECT CONCAT('Posted by ', U.display_name, ' at ', P.post_date) as posted_by, P.post_title, P.post_content FROM wp_posts P LEFT JOIN wp_users U ON P.post_author=U.ID WHERE post_type='post' and post_status='publish'";

  $conn = new mysqli('localhost', 'docs', 'P@ssword1!', 'docs');
  $res = $conn->query($q);

  if($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
      $fn = "posts/" . str_replace(" ", "_", $row["post_title"]) . ".md";
      $contents = "# " .
          $row["post_title"] .
          "\r\n\r\n### " .
          $row["posted_by"] .
          "\r\n\r\n" .
          $row["post_content"];
      file_put_contents($fn, $contents);
    }
  }
}

function processRequest() {
  // Find the requested file
  $page = htmlspecialchars($_GET["p"]);
  // Failover to index
  if($page == null || $page == '') {
    $page = "index.php";
  }
  // No parent relative paths
  $page = str_replace("..", "", $page);
  // Make sure we're only looking at markdown files
  if(!endsWith($page, '.md')) {
    $page = $page . ".md";
  }
  if($page == "dump.md") {
    // Pull everything out of WP db
    dumpWP();
    $page = "tic.md";
  }
  if($page == "tic.md") {
    // Regenerate the TOC
    generateTOC();
    $page = "toc.md";
  }
  // Failover to index if requirest file does not exist
  if(!file_exists($page)) {
    $page = "index.md";
  }

  // Read and render the markdown file
  $md = file_get_contents($page);
  $Parsedown = new Parsedown();
  echo $Parsedown->text($md);
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="MarkDoc | Books N' Bytes, Inc.">
  <meta name="author" content="Books N' Bytes, Inc.">
  <link rel="icon" href="favicon.ico">
  <title>MarkDoc | Books N' Bytes, Inc.</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="?p=index">Mark Doc</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="?p=index">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?p=toc">Table of Contents</a>
          </li>
          <!-- <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Changelog</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="?p=changelog">Most Recent</a>
              <a class="dropdown-item" href="?p=changes/v2.8x">v2.8</a>
              <a class="dropdown-item" href="?p=changes/v2.7x">v2.7</a>
              <a class="dropdown-item" href="?p=changes/v2.6x">v2.6</a>
              <a class="dropdown-item" href="?p=changes/v2.5x">v2.5</a>
              <a class="dropdown-item" href="?p=changes/v2.4x">v2.4</a>
              <a class="dropdown-item" href="?p=changes/v2.3x">v2.3</a>
              <a class="dropdown-item" href="?p=changes/v2.2x">v2.2</a>
              <a class="dropdown-item" href="?p=changes/v2.1x">v2.1</a>
              <a class="dropdown-item" href="?p=changes/v2.0x">v2.0</a>
              <a class="dropdown-item" href="?p=changes/v1.9x">v1.9</a>
              <a class="dropdown-item" href="?p=changes/v1.8x">v1.8</a>
              <a class="dropdown-item" href="?p=changes/v1.7x">v1.7</a>
              <a class="dropdown-item" href="?p=changes/v1.6x">v1.6</a>
              <a class="dropdown-item" href="?p=changes/v1.5x">v1.5</a>
              <a class="dropdown-item" href="?p=changes/v1.4x">v1.4</a>
              <a class="dropdown-item" href="?p=changes/v1.3x">v1.3</a>
              <a class="dropdown-item" href="?p=changes/v1.2x">v1.2</a>
              <a class="dropdown-item" href="?p=changes/v1.1x">v1.1</a>
              <a class="dropdown-item" href="?p=changes/v1.0x">v1.0</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <main role="main" class="container">
      <div class="starter-template" style="padding-top:80px;">

<?php processRequest(); ?>

      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
