# Laravel Error Mailer

Receive instant alerts to stay informed about errors occurring on your website and act swiftly to enhance its stability.
This Laravel package simplifies the sending of emails containing detailed error information, allowing you to effectively
monitor your application's health.

## Installation

To get started with Error Mailer, follow these steps:

1. Install the package using Composer:

```sh
composer require hugomyb/error-mailer -W
```

The -W flag is used to update your composer.json file to add the package as a requirement.

2. Add the Error Mailer service provider to the providers array in your `config/app.php` file:

```php
'providers' => [
    // ...
    \Hugomyb\ErrorMailer\ErrorMailerServiceProvider::class,
],
```

3. Publish the package's configuration file :

```sh
php artisan error-mailer:publish-config
```

This will create a `config/error-mailer.php` file in your Laravel project.

```php
return [
    'email' => [
        'recipient' => 'recipient@example.com',
        'subject' => 'An error was occured - ' . env('APP_NAME'),
    ],

    'disabledOn' => [
        //
    ],
];
```

## Configuration

After publishing the configuration file, you can modify it to suit your needs. Open `config/error-mailer.php` and
customize the following options:

`'recipient'`: Set the email address where error notifications will be sent.

`'subject'`: Define the subject line for error notification emails. You can use placeholders like `env('APP_NAME')` to
dynamically include your application's name.

`'disabledOn'`: You can specify a list of environments (based on `APP_ENV`) where the Error Mailer will be disabled.
For example, if you want to disable the mailer in the local environment, add 'local' to the array:

```php
'disabledOn' => [
    'local',
],
```

<hr/>

> ⚠️ **IMPORTANT ! Make sure to configure a mail server in your .env file :**

```sh
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host.com
MAIL_PORT=587
MAIL_USERNAME=your-smtp-username
MAIL_PASSWORD=your-smtp-password
MAIL_ENCRYPTION=tls
```

If the mail server is not configured in the `.env` file, email notifications will not be sent.

## Usage

Once Error Mailer is configured, it will automatically send email notifications when errors occur in your Laravel
application. The package provides detailed error information in the email content, allowing you to quickly identify and
resolve issues.

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/license/mit/).
