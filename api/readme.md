## Install notes
1. run **composer install**
2. run **cp .env.example .env** to rename environment file. Needed credentials are prepared there for limited time.
3. run **touch database/database.sqlite** we will store our data inside this file. We are not using mysql in this project
4. run **php artisan migrate:fresh --seed**
5. run **php artisan key:generate**
6. run **php artisan serve**
7. go to **http://127.0.0.1:8000** or some different url shown in console

Admin email: admin@test.com
Admin password: password

## Live version

http://products.tadasjanca.lt/