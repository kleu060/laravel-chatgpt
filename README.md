## About this project
This is a Laravel application that connect to Chatgpt and generate cover letter for people who is looking for new job.

## Add Chatgpt key
Go to .env and add the ChatGPT key and debug mode
```
CHATGPT_API_KEY=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
CHATGPT_API_KEY_DEBUG = false        #Debug mode, stop system calling chatgpt.  only generate dummy cover letter
```

This application rely on barryvdh/laravel-dompdf to generate PDf file. Follow below to install the module
1.  run ```composer i``` to install dependencies  and libraries
2.  run ```php artisan migrate``` to create table to database
3.  run ```php artisan storage:link``` to symbolic link to resources
4.  run ```npm install``` to install the breeze package
5.  run ```npm run build``` to run the app or run ```npm run dev``` to start development
