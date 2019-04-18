# Part 1 - Laravel Blog - CRUD

 Part 1 of a Laravel CRUD (Create, Read, Update, Delete) series, showing how to build a blog with blade

[Article](https://stevencotterill.com/articles/part-1-laravel-crud-blog-blade)

![Laravel Blog](https://raw.githubusercontent.com/stevie-c91/web-development-blog/master/assets/img/lb1-view-post.png)


## Setup

```bash
# Install dependencies
$ composer install

# Generate Vagrantfile and Homestead.yaml
# Windows
$ vendor\\bin\\homestead make
# Mac/Linux
$ php vendor/bin/homestead make

# Add IP and URL found in homestead.yaml to your hosts file (change these if you want)

# Rename .env.example to .env
$ mv .env.example .env

# Start Virtual Machine
$ vagrant up

# SSH into VM
$ vagrant ssh

# Change to code directory
$ cd code

# Generate application key
$ php artisan key:generate

# Run database migrations
$ php artisan migrate
```

The blog can then be accessed locally at the URL specified in the Homestead.yaml file.