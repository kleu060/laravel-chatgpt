## About this project
This is a Laravel application that connect to Chatgpt and generate cover letter for people who is looking for new job.

## Add Chatgpt key
Go to .env and add the ChatGPT key
```
CHATGPT_API_KEY=[your_chatgpt_api_key]
```

## Install barryvdh/laravel-dompdf
This application rely on barryvdh/laravel-dompdf to generate PDf file. Follow below to install the module
1.  ```composer create-project laravel/laravel laravel-pdf --prefer-dist```
2.  Open config/app.php file and incorporate DomPDF service provider in providers array along with DomPDF facade to the aliases array.
```
'providers' => [
  Barryvdh\DomPDF\ServiceProvider::class,
],
'aliases' => [
  'PDF' => Barryvdh\DomPDF\Facade::class,
]
```
3.  Execute the following command to publish the assets from vendor.
```
php artisan vendor:publish
```



run ```php artisan storage:link``` to symbolic link to resources