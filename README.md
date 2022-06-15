

## Fikisha

Web app that helps you plan and organize your order shipments. Fikisha provides you with features, such as:

- Add, Edit, Delete your Customers,Fleet or any Order.
- In the Dashboard you can see how many customers, orders and fleet as well as trending order statuses.
- Send email to order recipient once the order status is dispatched.
- Authentication via sanctum.
- Track fleets on transit.

## Installation Process

Clone this repository-
```sh
git clone https://github.com/jeffubayi/fikisha.git
```
Goto incomeExpense Folde
```sh
cd fikisha
```
Copy .env.example to .env 
```sh
cp .env.example .env
```
Add your database and mail keys on ```.env``` file
Install composer for vendor file
```sh
composer install
```
Create a database and set information to .env


Run migrate (--seed for faker data)
```sh
php artisan migrate --seed
```
Then run 
```sh
php artisan serve
```
GoTo [http://127.0.0.1:8000](http://127.0.0.1:8000) and start managing your orders

For Login:

**email: fikisha@admin.com**

**password: password**



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).