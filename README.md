# Code Examples

This repository contains code samples demonstrating how Xendit services can be used. 

## Ownership

Team: [TPI Team](https://www.draw.io/?state=%7B%22ids%22:%5B%221Vk1zqYgX2YqjJYieQ6qDPh0PhB2yAd0j%22%5D,%22action%22:%22open%22,%22userId%22:%22104938211257040552218%22%7D)

Slack Channel: [#integration-product](https://xendit.slack.com/messages/integration-product)

Slack Mentions: `@troops-tpi`

## Invoice Modal
 - File: `invoice-modal.html`
 - Embedding a Xendit invoice into an iFrame.
 - This assumes that the invoice is already created from your backend, and the invoice URL would be piped to the front end.

## Create Invoice from PHP Landing Page

 - Folder: `php-landing-create-invoice`
 - Example of a PHP landing page that accepts an amount and creates an Invoice.
 - Be sure to set your API key in `config/xendit.config.php`
 - Can be run locally on OSX with `php -S localhost:8000`
