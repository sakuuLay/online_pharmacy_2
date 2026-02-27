# online_pharmacy_2
Online pharmacy web app using PHP &amp; MySQL with product categories, user accounts, cart &amp; orders, admin actions, and support features—built for small-to-medium retailers to sell health and personal care items online.

# Online Pharmacy Web Application

A small PHP & MySQL based online pharmacy web application that lets users browse categorized product pages, register and log in, add items to a shopping cart, and place orders. The project includes account management, order handling under the `action/` folder, and a provided SQL dump to create the database schema.

Features
- Browse products and categories (e.g., Mother & Baby, Kids, Pet Care)
- User registration, login, profile and password updates
- Shopping cart: add, remove, view items and place orders
- Admin/processing scripts in `action/` (register, login, order, upload, delete)

Requirements
- PHP 7.4+ (or compatible) with `mysqli` or `pdo_mysql`
- MySQL / MariaDB
- A web server (Apache, Nginx) or PHP built-in server for local testing

Quick setup
1. Place the project folder in your web server document root (e.g., `htdocs` or `www`).
2. Create a new MySQL database and import `online_pharmacy.sql` to create tables and seed data.
3. Update database credentials in the project files where the DB connection is made (search for `mysqli_connect` or `PDO`).
4. Open the app in your browser (e.g., `http://localhost/online_pharmacy_2/index.php`).

Notable files
- `index.php` — landing page with featured slider
- `shop.php`, `product.php` — product/category views
- `cart.php`, `add_to_cart.php`, `remove_from_cart.php`, `show_cart.php` — cart flow
- `registration.php`, `login.php`, `user_account.php` — user auth & profile
- `action/` — server-side handlers: `login.php`, `register.php`, `order.php`, etc.
- `online_pharmacy.sql` — database schema & seed data
- `nav.css` — navigation and basic styles

Usage
- Use the site as a typical small e-commerce store: register an account, browse categories, add items to cart, and place orders.

Contributing
- Fork the repo, make changes, and submit pull requests. For schema or connection changes, document required steps in this README.

License
- No license specified. Add a `LICENSE` file if you plan to publish this project publicly.
