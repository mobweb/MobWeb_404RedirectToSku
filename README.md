# MobWeb_404RedirectToSku extension for Magento

A simple extension for Magento 1. If an URL is accessed that is not found, the extension checks if the path of the URL matches a currently active product's SKU. If it does, it redirects to that product's page.

For example if `http://foo.com/999` is accessed, the extension checks if a product with an SKU of `999` exists. If it does, it redirects to that product's URL.

## Installation

Install using [colinmollenhour/modman](https://github.com/colinmollenhour/modman/).

## Questions? Need help?

Most of my repositories posted here are projects created for customization requests for clients, so they probably aren't very well documented and the code isn't always 100% flexible. If you have a question or are confused about how something is supposed to work, feel free to get in touch and I'll try and help: [info@mobweb.ch](mailto:info@mobweb.ch).