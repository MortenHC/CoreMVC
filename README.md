# CoreMVC

This is a small custom and very minimalistic MVC framework build with PHP.

## Getting Started

Getting this basic MVC framework up and running is straight forward, and adding your own pages afterwards should be as easy as copy-paste-customize.

### Prerequisites

You only need a webserver running PHP to make the framework run. PHP version 7.1 was used during the development of CoreMVC.

### Installing

CoreMVC is split into two folders. The content of the `public` folder should be placed at the root of your website. The `app` folder can be placed outside the pubic root, and renamed to whatever you desire.

The `app/CoreMVC.php` file is __not__ a file that you need to change unless you want to tinker with the MVC framework yourself. However, in the `public/index.php` file you will need to make sure that the path from the `public/index.php` file to the `app/CoreMVC.php` file matches your file structure.

```
// Use CoreMVC
require_once '../app/CoreMVC.php';
```

This project also contains a `.htaccess` file that redirects all requests to the `index.php` file. You will need to either use this `.htaccess` file or make sure that all requests are redirected to `index.php` yourself.

_You should now be able to navigate your browser to the root folder and see a **very** basic working website._

## Developting with CoreMVC 

The `app` folder contains subfolders for controllers, models and views. A folder called `misc` contains parent classes and other classes used for bootstrapping and error handling.

It is worth noting that CoreMVC is built around the concept of URLs being structured like this: **http://example.com/`controller`/`action`/`id`**

If the url contains even more elements like this one **http://example.com/`controller`/`action`/`id`/`even`/`more`**, then **`id`/`even`/`more`** will all be inserted into the `$id` variable in the controller as a string.

### Controllers

All controllers must extend the root controller `ControllerRoot`. The root controller contains methods to render the view, and some basic error handling. By default the view named the same as the action will be the one rendered. If another view is desired, then use the `renderAlternativeView()` method instead of the `renderView` method. The root controller is also responsible for calling the `standard()` action if no action is specified in the URL.

The name of a controller file must begin with `Controller` and the class within it must be named exactly as the file. The `Controller` part of the controller name is not used in the URL though. Be aware that if the server is working with a case sensitive filesystem, then you'll need to pay attention to this with e.g. the naming of action methods and view files. Actions within the controller must be named as you want them to appear in the URL, as this is what is used to call them.

Every controller must have an associated folder carrying the same name as the controller in the `views` folder. This folder name is without the `Controller` though, and is explained further in the Views section of this document.

### Models

All models must extend the root model `ModelRoot`. The root model is responsible for creating the dataObject used to transport information to the view. By editing the root model it's easy to define variables used throughout your entire website.

### Views

The views folder contains a subfolder for every controller. Inside the folder associated with a controller is all the views located. Each action should have its own view if you only use the `renderView` method. Views with other names than the action method can be rendered with the `renderAlternativeView()` method instead.

Be aware that all views are inserted into a **template**. By default the `TemplateMain` template is used, unless another is provided as the second argument to the `renderView(dataObject, template)` method, or as the third argument to the `renderAlternativeView(dataObject, viewName, template)` method inside the controller. Templates are perfect for creating default headers and footers for your pages. This makes it possible only to specify the main content of the pages in the individual views.

*NOTE: All template filenames must begin with `Template`, though you should leave this part out when specifying the template in the `renderView()` and `renderAlternativeView()` method.*

### Default responses

CoreMVC includes easy generation of default error pages. To generate one of these pages, simply use the `DefaultResponse` class like this: 

`DefaultResponse::unauthorized();`

The following default responses are implemented:

- badRequest (400)
- unauthorized (401)
- forbidden (403)
- notFound (404)
- methodNotAllowed (405)
- serverError (500)
- unknown (520)

### Default responses

CoreMVC makes sure to set up sessions, so `$_SESSION` should be available whenever needed.

## Docker

If you want to get started quickly, then use the included `docker-compose` files to spin up a quick test. There's two solutions. The default one creates a container with an Apache server, the other one creates an Nginx container solution instead.

## Author

This CoreMVC framework was developed by **Morten Holm Christensen** / **MortenHC** - [GitHub](https://github.com/MortenHC) - [Twitter](https://twitter.com/MortenHC)

## Acknowledgments

This README was written more than a year after the creation of the MVC framework. I used a website as heavy inspiration for this project, but unfortunately I was not able to find it again while writing this. But huge tip of the hat to the person(s) behind the inspiration.

#### But.. But why not just use an existing MVC framwrok!?

I honestly just made this for fun in my spare time :)
