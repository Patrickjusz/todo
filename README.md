# Todo

A simple todo list (REST API).

## Screenshot

![1](https://user-images.githubusercontent.com/33465063/140967477-aa8bfce1-1ff7-4c56-bd79-5db7b17dfdf7.jpg)
![2](https://user-images.githubusercontent.com/33465063/140967485-60e88970-e00a-46ff-b185-2e975abe8d52.jpg)
![3](https://user-images.githubusercontent.com/33465063/140967487-e57d9620-ea39-4e46-bc1b-ae5ce4c279c4.jpg)
![4](https://user-images.githubusercontent.com/33465063/140967492-32b21306-15bf-486b-b540-b347266aec76.jpg)
![5](https://user-images.githubusercontent.com/33465063/140967494-8cc02b08-594c-490a-8031-e739c6dc9c53.jpg)
![6](https://user-images.githubusercontent.com/33465063/140967500-8ead5b30-b806-4cff-8400-841d70ce5cfb.jpg)
![m_1](https://user-images.githubusercontent.com/33465063/140967502-6f7dc441-f016-4c1d-bbe7-4bf37b50f4cd.jpg)
![m_2](https://user-images.githubusercontent.com/33465063/140967506-c544d8fc-24de-43ef-bad6-187177a64671.jpg)
![m_3](https://user-images.githubusercontent.com/33465063/140967510-ee0a8b6c-3042-4503-a73c-7e192850b8cb.jpg)
![t_1](https://user-images.githubusercontent.com/33465063/140967511-8543cb54-edc9-4ebd-8b69-4149b78e1383.jpg)


## Demo

https://pjastrzebski.pl/todo/tasks

https://www.youtube.com/watch?v=j3zYwvQNnj4

## Getting Started

### Installing

Please check the official Laravel Framework installation guide for server requirements before you start.  [Official Documentation](https://laravel.com/docs/8.x)

Clone the repository
```
https://github.com/Patrickjusz/todo.git
```
Install all the dependencies using composer
```
composer install
```

Install all the dependencies using composer and npm
```
npm install && npm run dev
```

Copy the example env file and make the required configuration changes in the .env file
```
cp .env.example .env
```

Generate a new application key
```
php artisan key:generate
```

Run the database migrations (Set the database connection in .env before migrating)
```
php artisan migrate
```

To create the symbolic link, you may use the storage:link Artisan command:
```
php artisan storage:link
```

Generate a new API key
```
php artisan apikey:generate tasks
php artisan apikey:activate tasks
```

Start the local development server
```
php artisan serve
```

You can now access the server at http://localhost:8000


### Database seeding
```
php artisan db:seed
```

## License

This project is licensed under the [NAME HERE] License - see the LICENSE.md file for details
