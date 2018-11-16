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
### Using the installer package
1. Download the MarkDoc package at [https://www.booksnbytes.net/markdoc](https://www.booksnbytes.net/markdoc). MarkDoc is packaged as both .zip and .tar.gz archives, use whichever one you prefer.
2. Upload the archive to your web server using FTP/SFTP.
3. Extract the contents of the archive to the directory where you will host your website from.
4. Configure Apache with a new site (point it at the directory where the MarkDoc files live), and enable the site.
5. Open a web browser, and navigate to the URL where your MarkDoc site is configured, you should see this readme!

### Using the install script
On Linux webservers, you can [download and run the following script](https://www.booksnbytes.net/markdoc/install-markdoc.sh) to automatically install and configure a MarkDoc installation. Be sure to take a look at the script before you execute it (NEVER run a script unless you know what it does! That's just not a safe thing to do). This script will perform the same steps as you would by using the installer package.

## Upload your Markdown Files
Once your new MarkDoc site is installed, you will be ready to start adding pages to it. Using a FTP/SFTP client, start uploading your Markdown documents to your website. If you have your documents nested in folders/directories, that's OK! MarkDoc will be able to find them. Keep in mind that the location of your markdown files will determine the URL used to view them in the website.

Here's an example of what your website's URLs could look like:

```
- /markdoc               <-- Markdoc install directory, base site URL of http://markdoc.long-technical.com/
|-- MyFirstPage.md       <-- http://markdoc.long-technical.com/MyFirstPage
|-- AnotherPage.md       <-- http://markdoc.long-technical.com/AnotherPage
|-- faqs/
|---- Question1.md       <-- http://markdoc.long-technical.com/faqs/Question1
|-- contact/
|---- social.md          <-- http://markdoc.long-technical.com/contact/social
|---- ...
```

## Generate a Table of Contents
After you have uploaded your Markdown content files, you will want to generate a Table of Contents for your website. This will build a master list of every content page available on your website, along with a link to each individual page. This simplifies the process of figuring out how to get to your content pages, by doing it for you.

To generate a Table of Contents for the first time, click on the [Table of Contents](/toc) link in the navigation bar. In the default Table of Contents, click on the [Generate a Table of Contents](/tic) link.

Note: If you ever upload new content to your website, it is a good idea to Regenerate your table of contents. If you need to do this, just [click here](/tic).

## Customize your website
Your website is probably up and running now, and has some of your own customized content uploaded. But...it looks boring! Try modifying the index.php file that is installed with MarkDoc to change the style of your website. By default, MarkDoc uses a very simple [Bootstrap](http://getbootstrap.com/) starter theme, which can be customized however you like. Just make sure that you leave the PHP code in place that actually powers MarkDoc.
