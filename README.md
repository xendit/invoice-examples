# Code Examples

This repository contains code samples demonstrating how Xendit services can be used. 

## Invoice Modal
 - File: `invoice-modal.html`
 - Embedding a Xendit invoice into an iFrame.
 - This assumes that the invoice is already created from your backend, and the invoice URL would be piped to the front end.

## Create Invoice from PHP Landing Page

 - Folder: `php-landing-create-invoice`
 - Example of a PHP landing page that accepts an amount and creates an Invoice.
 - Be sure to set your API key in `config/xendit.config.php`
 - Can be run locally on OSX with `php -S localhost:8000`