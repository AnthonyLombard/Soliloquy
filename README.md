##Dev notes

This is a rough version, obviously not something I would launch in a prod environment, however I spent the required amount of time of 3 hours, got snagged for 30 mins on tailwind as i have never used it before, great framework by the way.

This demonstrates basic crud and some extra features like archiving as it was not stated as a requirement but implied by the data explanation

I would like to add more validation, spruce up the validation messages and add user confirmation prompts on successful create and archived actions
## Setup Soliloquy

This application was built for review by Den Creative and or Elixirr

This application requires that a database named "soliloquy" is created on localhost or if you know what you are doing then you can specify required pathing via the .env file located at the root of the project.

I will assume the reviewer understands laravel and how to run and test this web app otherwise briefly :

npm install

npm run dev

php artisan serve
## What it currently does

This web app will allow the user to create and manage messages seemingly to themselves via a create page as well as an archive function, a read / unread indicator and a view screen

Styling is all done with TailwindCSS and validation is performed on the backend using basic laravel validation 
