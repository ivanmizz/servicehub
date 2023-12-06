# ServiceHub
A services booking web app . Businesses can list their services, their departments and staff . Customers can book and track appointments.

## Tech Stack
Built by Laravel, Flowbite(Tailwind), Mysql.

## Running the project 

**Prerequisites**: Composer, PHP 8.1, Node.

Download or clone this repository    
`https://github.com/ivanmizz/servicehub-2.git`

Install dependencies  

  `composer install`

Copy the .env.example into a newly created .env file , then change credentials for your database.

Generate key:  
`php artisan key:generate`

Start the backend development server  
` php artisan serve`

Open new terminal to start frontend development server  
`npm run dev`

Update the dependencies by `npm install` incase of errors

**Open in your browser**  
`http://localhost:8000`


