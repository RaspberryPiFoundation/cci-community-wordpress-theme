# Code Club Style Guide

## What is This?

This style guide will provide you with everything you'll need to build your own Code Club website. Inside you'll find information about the layout of pages, the styles of your HTML components, and bigger modules that bring many components together. There's also some guidance about how to use the Code Club brand, and our colour palette.

Each component is provided with usage notes, a visual example and the HTML required to add to your site. Think of these elements as building blocks required to create a Code Club website.

**PLEASE NOTE** that you may only use these styles if you have been given permission from Code Club World Ltd. Any other use is unauthorised.

## How to download the Code Club assets

You'll need to use [Bower](http://bower.io) to include download and include the assets to your site. If you don't already have it installed, head to [the Bower installation guide](http://bower.io/#install-bower) and follow the instructions.

When you have that installed and you're ready to download the Code Club assets package, open a Terminal window, navigate to the root of your site, and run the following command:

`bower install code-club`

That will grab the latest release, and will download it to the default location of `./bower_components/code-club` - this website will assume that the assets are located there in relation to the root of your site.

## Updating the assets

It's worth periodically checking to see if there's a new version of these assets available to download. We'll be adding new components and fixing browser-related issues as and when we need to, so the styles are definitely going to update.

To see if a new release is available, run the following Bower command from your site's root directory:

`bower list`

And if there's an update available, run this command to grab the latest styles:

`bower update code-club`

We'll try our best not to break existing components when we update, but sometimes that will be unavoidable. **Please make sure you test the updated styles on a development version of your site before updating the assets on a live website!**

For more help with Bower and its related commands, please see the [documentation on the Bower website](http://bower.io).

### Need more help? Want to suggest something?

If you think something is missing from the styleguide, you'd like to suggest improvements to something that's already there, or if you're just plain stuck and you need help, please email Code Club at [support@codeclub.org.uk](mailto:support@codeclub.org.uk) and we'll see what we can do!

## Legal Stuff

Copyright (c) 2016 Code Club World Ltd.

- [License](LICENSE.txt)
- [Contributing](CONTRIBUTING.txt)

