# Laravel-tooma
Send and receive SMS anywhere in the world using Tooma web services 


# Integrate TOOMA SMS API with Laravel
Laravel package to provide ntegration for TOOMA SMS service 

## Installation
Require this package with composer:
```
composer require tooma/laravel-sms-api
```
Once the package is added, add the ServiceProvider to the providers array in ```config/app.php```:
```
Tooma\Laravel\Api\ToomaServiceProvider::class

```
Once done, publish the config to your config folder using:
```
php artisan vendor:publish --provider="Tooma\Laravel\Api\ToomaServiceProvider"
```

## Configuration
Once the config file is published, open ```config/tooma-api.php```

### Edit config
Edit default configuration such as 

```apiKey``` : Your API key provider by Tooma

```defaultSSLPath```    : Default path to ssl certificate if using a different certificate from default one 

```defaultSenderName``` : Default sender name defaults to TOOMA_SMS (in Kenya)

## Usage
 ### Retrive ApiKey

 ### Sending Message

 ### Sending Bulk Messages

 ### Retrive All Messages

 ### Retrieve Message Status

 ### Get account balancce

 ### Send Message from CSV files

 ### Working with Message templates

 ### Schedule Message

 

## Support
Feel free to post your issues in the issues section.
