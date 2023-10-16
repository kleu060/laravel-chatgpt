## About this project
This is a Laravel application that connect to Chatgpt and generate cover letter for people who is looking for new job.

## Add Chatgpt key
Go to .env and add the ChatGPT key and debug mode
```
CHATGPT_API_KEY=YOUR_CHATGPT_API_KEY
CHATGPT_API_KEY_DEBUG = false        #Debug mode, if set to false,  system will not make request to  chatgpt.  it will only generate dummy cover letter.
```


Follow below to install setup the application
1.  Downlaod the file from github
2.  run ```composer i``` to install dependencies  and libraries
3.  run ```php artisan migrate``` to create table to database
4.  run ```php artisan storage:link``` to symbolic link to resources
5.  run ```npm install``` to install the breeze package
6.  run ```npm run build``` to run the app
7.  run ```php artisan serve``` to start the server
