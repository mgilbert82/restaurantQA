# Restaurant Quai Antique

#### About this project

This project is carried out within the framework of a case study. This application is intended for a restaurant wishing to give visibility to these customers on these schedules, dishes, menus and formulas. A reservation function by date, cover and time is available. An administration interface allows you to add, modify and delete the following elements : Restaurant schedules, formulas, menus, room management as well as the creation of users for the administration of the interface.

#### Service dependencies

- Nothing

#### Built with

- Php >=7.2.5
- Symfony 5.4 (LTS Version)
- MySql (maria db 10.3.28)
- Doctrine ORM 2.14
- Bootstrap

#### Prerequisites

- Symfony 5.5.5 CLI
- Composer 2.5.5
- Mamp server or Xamp server

## How to run locally

#### Run Sql Server

Download and install Mamp for Mac

```bash
https://www.mamp.info/en/mac/
````

Download and install Mamp for windows
```bash 
https://www.mamp.info/en/windows/
```

For more information about Mamp
```bash
https://documentation.mamp.info/
```

Launch the database server

#### Clone the project

```bash
  git clone https://github.com/mgilbert82/restaurantQA.git
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies

```bash
  composer install
```

Configure the .env.local file on your project directory.

You must replace root with your database password
```bash
DATABASE_URL="mysql://root:root@127.0.0.1:8889/restaurantQA?serverVersion=8&charset=utf8mb4"
```
Create the database

```bash
php bin/console doctrine:database:create
```

Create the schema
```bash
php bin/console doctrine:migrations:migrate
```

Create Fixtures
This command creates automatically fixtures in the database for menu, dish, meal, image for the Carousel.. and also create an admin profile to connect to the admin interface.

user: adminStudi@studi.fr
password: adminstudi1234

```bash
php bin/console doctrine:fixtures:load
```

Clear the cache
```bash
php bin/console cache:clear
php bin/console cache:warmup
```


Run the application

```bash
  symfony serve
```

Checkout the application at

```bash
https://127.0.0.1:8000/
```

For the admin panel

```bash
http://localhost:1337/admin
```