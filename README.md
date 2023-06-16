# Welcome to MarkDoc!
Welcome to MarkDoc, the only product documentation tool you'll ever need!

## What is MarkDoc?
MarkDoc is a tool that allows you to quickly generate a website for your product, without having to learn how to build a website from scratch. MarkDoc takes documents that you can write using a simple text editor (like Notepad or nano), and converts them into beautiful websites with the click of a button by leveraging the power of the [Markdown](https://en.wikipedia.org/wiki/Markdown) language.

## Getting Started:
Using MarkDoc is very easy, and can be set up and running in under five minutes using the following process:

1. Install MarkDoc on your web host
2. Upload your Markdown files, or Import them from a WordPress website
3. Generate a Table of Contents
4. Customize your website

## Software Requirements
* Apache webserver with mod_rewrite enabled
* PHP v5.2 or newer

## Installing MarkDoc
1. Download the MarkDoc package at [https://markdoc.booksnbytes.net/download](https://markdoc.booksnbytes.net/download). MarkDoc is packaged as both .zip and .tar.gz archives, use whichever one you prefer.
2. Upload the archive to your web server using FTP/SFTP.
3. Extract the contents of the archive to the directory where you will host your website from.
4. Configure Apache with a new site (point it at the directory where the MarkDoc files live), and enable the site.
5. Modify the .htaccess file that comes with MarkDoc to use the mod_rewrite rules that match your version of Apache (see comments in .htaccess).
6. Open a web browser, and navigate to the URL where your MarkDoc site is configured, you should see this readme!

## Upload your Markdown Files
Once your new MarkDoc site is installed, you will be ready to start adding pages to it. Using a FTP/SFTP client, start uploading your Markdown documents to your website. If you have your documents nested in folders/directories, that's OK! MarkDoc will be able to find them. Keep in mind that the location of your markdown files will determine the URL used to view them in the website.

Here's an example of what your website's URLs could look like:

```
| markdoc/                  <-- Markdoc install directory, base site URL of http://markdoc.booksnbytes.net/
|-- MyFirstPage.md          <-- http://markdoc.booksnbytes.net/MyFirstPage
|-- AnotherPage.md          <-- http://markdoc.booksnbytes.net/AnotherPage
|-- faqs/
|---- Question1.md          <-- http://markdoc.booksnbytes.net/faqs/Question1
|-- contact/
|---- social.md             <-- http://markdoc.booksnbytes.net/contact/social
|---- ...
```

## Generate a Table of Contents
After you have uploaded your Markdown content files, you will want to generate a Table of Contents for your website. This will build a master list of every content page available on your website, along with a link to each individual page. This simplifies the process of figuring out how to get to your content pages, by doing it for you.

To generate a Table of Contents for the first time, click on the [Table of Contents](/toc) link in the navigation bar. In the default Table of Contents, click on the [Generate a Table of Contents](/tic) link.

Note: If you ever upload new content to your website, it is a good idea to Regenerate your table of contents. If you need to do this, just [click here](/tic).

## Customize your website
Your website is probably up and running now, and has some of your own customized content uploaded. But...it looks boring! Try modifying the index.php file that is installed with MarkDoc to change the style of your website. By default, MarkDoc uses a very simple [Bootstrap](http://getbootstrap.com/) starter theme, which can be customized however you like. Just make sure that you leave the PHP code in place that actually powers MarkDoc.

## Using MarkDoc with your own website
You might decide that you want to just integrate MarkDoc into your own website, we completely get it. And, it's _really easy to do_. Start out by downloading and unpacking the MarkDoc installer package into your existing website. Be sure to exclude the index.php file.

Now, use a text editor to edit the PHP file that you want to leverage MarkDoc, and add the following code:

```
require_once('MarkDoc.php');

$md = new MarkDoc();
echo $md->processRequest($_SERVER['REQUEST_URI']);
```

Save and close the file, and refresh your browser. You should now see the default index.md page that comes with MarkDoc rendered in your page as HTML.
