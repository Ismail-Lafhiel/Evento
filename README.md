
# Evento

Welcome to Evento! Discover the passion behind our platform, designed to simplify and elevate event planning. Learn about our mission to connect event organizers with the perfect venues, vendors, and services.



## Docuementation
#### How to install Evento locally
**Make sure:** you have composer and node module installed
```
git clone https://github.com/Ismail-Lafhiel/Evento.git
```
```
cd Evento
```
```
cp .env.example .env
```
Set up your database name as well as mailer setup.

Then, run:
```
composer update
```
```
php artisan key:generate
```
```
php artisan migrate --seed
```
```
npm i
```
```
npm run dev
```
```
php artisan serv
```
## Features

- Auth syestem.
- Roles and Permissions.
- Admin Dashboard.
- Spectator books Events.
- Organizer can create, edit, delete events.
- Organizer can accept or deny reservations.
- Admin can accept or deny events.
- Admin can create, edit, delete categories.



## Conception

#### UseCase Diagram:
![UseCase Diagram](https://i.postimg.cc/W3r27LSf/Use-Case-Diagram1.jpg)

#### Class Diagram:

![Class Diagram](https://i.postimg.cc/L60skpp2/Class-Diagram1.jpg)

## Tech Stack

**Client:** HTML, Blade(engine), TailwindCSS

**Server:** Laravel

**DataBase Management:** MySQL


## App Logo

#### Main Logo
![Logo](https://i.postimg.cc/FRVhqtkW/evento-logo.png)

#### Dashboard Logo
![Logo](https://i.postimg.cc/ZqmgQWPm/evento-logo-auth.webp)

## Authors

- [@Ismail Lafhiel](https://github.com/Ismail-Lafhiel)

