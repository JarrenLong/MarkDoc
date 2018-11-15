<?php

require_once("Parsedown.php");

class MarkDoc {

  protected function startsWith($haystack, $needle) {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
  }

  protected function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
      return true;
    }

    return (substr($haystack, -$length) === $needle);
  }

  protected function getDirContents($dir, $fileType, &$results = array()){
    $files = scandir($dir);

    foreach($files as $key => $value){
      $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
      if(!is_dir($path) && $this->endsWith($path, $fileType)) {
        $results[] = $path;
      } else if($value != "." && $value != "..") {
        $this->getDirContents($path, $fileType, $results);
        if($this->endsWith($path, $fileType)) {
          $results[] = $path;
        }
      }
    }

    return $results;
  }

  // Regenerate the Table of Contents file
  protected function generateTOC() {
    $baseDir = getcwd() . "/";
    $allFiles = $this->getDirContents($baseDir, '.md');

    $toc = fopen("toc.md", "w");
    fwrite($toc, "# Table of Contents\n");
    fwrite($toc, "## &copy; 2018 [Books N' Bytes, Inc.](https://www.booksnbytes.net)\n\n");

    foreach($allFiles as &$p) {
      $tmp = str_replace($baseDir, '', $p);
	  $tmp = str_replace(".md",'',$tmp);
      fwrite($toc, ' * [' . $tmp . '](http://' . $_SERVER["SERVER_NAME"] . '?p=' . $tmp . ")\n");
    }
    fclose($toc);
  }

  protected function dumpWP() {
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

  public function processRequest() {
    // Find the requested file
    $page = htmlspecialchars($_GET["p"]);
    // Failover to README file
    if($page == null || $page == '') {
      $page = "README.md";
    }
    // No parent relative paths
    $page = str_replace("..", "", $page);
    // Make sure we're only looking at markdown files
    if(!$this->endsWith($page, '.md')) {
      $page = $page . ".md";
    }
    if($page == "dump.md") {
      // Pull posts out of a WP db and dump them into MD files
      $this->dumpWP();
      $page = "tic.md";
    }
    if($page == "tic.md") {
      // Regenerate the TOC
      $this->generateTOC();
      $page = "toc.md";
    }
    // Failover to index if required file does not exist
    if(!file_exists($page)) {
      $page = "README.md";
    }

    // Read and render the markdown file
    $md = file_get_contents($page);
    $Parsedown = new Parsedown();
    echo $Parsedown->text($md);
  }

}
?>
