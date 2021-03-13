# Developer Test project

This is a laravel test project developed by Abraham Maleko to demonstrate my experience with Laravel Livewire, Alpine.js and TailwindCSS

## Setting up

  1. Clone the repository 
  
  2. Perform composer update inside the directory to include the laravel vendor files

        ```bash
         composer update
        ```
  3. Rename the .env example to env

  4. Create a database of name 'Dev_test'.

  5. Run all migration with seeders with this command 
     
        ```bash
         php artisan migrate:fresh --seed
        ```
  6. Create a symlink to the storage folder with this command.

       ```bash
         php artisan storage:link
        ```
   7. Configure the mail settings in the .env with your mailtrap configurations to receive successful notifications
   
    After following all those steps, you will be all set up you can start the project by 

     ```bash
         php  artisan serve
        ```