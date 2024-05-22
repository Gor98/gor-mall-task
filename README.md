# Gor Task
## Hi guys so beside the task I also decided to do some extra things to app
## so here I added 
* docker
* tests
* some abstractions

### Clone project from Github
```
git clone git@github.com:Gor98/gor-mall-task.git
```
### Move to project and copy .env file
```
cp env.example .env
```
### Next let docker create environment for you
#### our containers are
* api-core - workspace where our files located
* api-db - MySql database
* api-webserve - nginx webserver
```
docker-compose up
```


### After your docker is ready migrate and seed database
```
docker-compose exec api-core /bin/bash
php artisan migrate
php artisan db:seed
```

### To run tests
```
docker-compose exec api-core /bin/bash
php artisan test
```
### Open all permission for storage directory (only for development we do like this)
```
sudo chmod -R 777 storage/
```
### Web page is available at
```
http://0.0.0.0:8080/
```

## Requests
### all products
```
GET http://0.0.0.0:8080/api/products
```
### single product
```
GET http://0.0.0.0:8080/api/products/{id}
```
### delete product
```
DELETE http://0.0.0.0:8080/api/products/{id}
```
### update product
```
PUT http://0.0.0.0:8080/api/products/{id}
{
    "title":"aaaaaaaaa",
    "description":"www"
}
```
### create product
```
POST http://0.0.0.0:8080/api/products
{
    "title":"sdfsdfsd",
    "description": "dsfsdfdf",
    "category_id": 2,
    "price":1111
}
```
