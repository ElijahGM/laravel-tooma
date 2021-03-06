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
Tooma\Laravel\Api\Providers\ToomaServiceProvider::class

```
Once done, publish the config to your config folder using:
```
php artisan vendor:publish --provider="Tooma\Laravel\Api\Providers\ToomaServiceProvider"
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
 Once you get your API key, add it to the ```config/tooma-api.php``` config file, please note you only run this function once, you can also get your API key by going to tooma.co.ke > settings > api  

 ```
 app()->tooma->onSuccess(function($response,$pagination){
          // Logic when Login is successfull
          $apiKey = $response->data->token;

       })->onError(function($response)
       {
           // Logic on Error 
       })->login(['username'=>'YOUR_USERNAME_OR_EMAIL','password'=>'YOUR_PASSWORD']);

 ```

 ### Sending Message
 Sending SMS is as easy as just 
 ```
 $parcel=[
	   ['to'=>'+254XXXXXXXXX','message'=>'Greetings from Tooma'],
	   ......
	];
 app()->tooma->onSuccess(function($response,$pagination){
          // Logic sending is successfull

       })->onError(function($response)
       {
           // Logic on Error 
       })->sendSms($parcel);
  ```

 ### Sending Bulk Messages
 Sending multiple message 
  ```
 $parcel=[
	   ['to'=>'+254XXXXXXXXX','message'=>'Dear XXX Greetings from Tooma'],
	   ['to'=>'+254YYYYYYYYY','message'=>'Dear YYY Greetings from Tooma'],
	   ......
	];
 app()->tooma->onSuccess(function($response,$pagination){
          // Logic sending is successfull
        

       })->onError(function($response)
       {
           // Logic on Error 
       })->sendSms($parcel);
  ```

 ### Retrive All Messages

 ### Retrieve Message Status

 ### Get account balancce
 Getting balance just call balance as follows
 ```
 app()->tooma->onSuccess(function($response,$pagination){
          // Logic sending is successfull
           echo "Your balance is $response->data->balance";

       })->onError(function($response)
       {
           // Logic on Error 
       })->balance();
 ```

 ### Send Message from CSV files
 You can also send message from a csv file as follows
 ```
  $csvPath = "path/to/your/csv.csv";

  app()->tooma->onSuccess(function($response,$pagination){
          // Logic sending is successfull
           echo "Your balance is $response->data->balance";

       })->onError(function($response)
       {
           // Logic on Error 
       })->withCsv($csvPath)
         ->withPhoneColumn('phone') //name of column with phone
         ->withTemplate('Dear :username_column_name your account balance is :balance_column_name')
         ->sendCsv();
 ```

 ### Working with Message templates
 You can also send message from a saved or new templat as follows
 ```
 $data = [
   ['phone'=>'+254WWWWW','name'=>'','other_args'=>'args_val'];

 ];
 app()->tooma->onSuccess(function($response,$pagination){
          // Logic sending is successfull
           echo "Your balance is $response->data->balance";

       })->onError(function($response)
       {
           // Logic on Error 
       })->withParams(['args1'=>'val']) //extra parametaer
         ->withTemplate('Dear :name your account balance is :balance_column_name') //or you can pass a template id
         ->sendFromTemplate($data);
 ```

 ### Schedule Message
 You can send SMS at a later stage by enableing schedule, the shedule format follows the cron format
  ```
  $parcel=[
	   ['to'=>'+254XXXXXXXXX','message'=>'Greetings from Tooma'],
	   ......
	];
  app()->tooma->onSuccess(function($response,$pagination){
          // Logic sending is successfull
           echo "Your balance is $response->data->balance";

       })->onError(function($response)
       {
           // Logic on Error 
       })->schedule("FORMART")
         ->sendSms($parcel);
 ```

## Support
Feel free to post your issues in the issues section.
