<p align="center"><a href="https://laravel.com" target="_blank"><img src="./docs/images/logo.svg" width="250" alt="Tuwaiq Logo"></a></p>
<p align="center"><strong>Tuwaiq Academy</strong> — <strong>أكادمية طويق</strong></p>
<h1 align="center">E-commerce</h1>
<p align="center">
<img src="./docs/images/header.ar.gif" width="80%" alt="Arabic Website's Home Page">
</p>

## About the Project
This is a robust and user-friendly ecommerce website, built using the Laravel framework. The project was developed as part of a Laravel course offered by [Tuwaiq Academy](https://tuwaiq.edu.sa/).

Project Duration: 3 Weeks   
Active Development Days: 12 Days

## Key Features
This project offers a comprehensive set of features for an ecommerce website, including: 
- Essential ecommerce website pages such as Explore, Product, Checkout, Invoice, Orders, etc.
- A robust authentication and authorization system.
- Comprehensive validation systems.
- Utilization of database migrations, factories, and seeders.
- Eloquent models, and more. 

The following sections will provide an overview of the features.
### Migrations, Factories, and Seeders
With the help of [Laravel Eloquent](https://laravel.com/docs/9.x/eloquent), tables can be effectively managed and be interacted with through a corresponding model. The relationships between the tables are already been defined and can be conveniently accessed using Eloquent methods. The following is the entity relationship diagram (ERD) of the database:
<p align="center">
  <img src="./docs/images/erd.png" width="75%" alt="Entity Relationship Diagram">
</p>

Additionally, I utilized Laravel factories and seeders to populate the tables with testing data.  

| Migration + Seeding | Tables |
| :----:        |    :----:   |
| <img src="./docs/images/migrate_seed.gif" width="100%" alt="Migrate and Seed Command"> | <img src="./docs/images/tables.gif" width="100%" alt="Tables"> |

### Authentication System
The system features a comprehensive authentication system that includes essential features like sign-in, sign-up, sign-out, email verification, and more.

<p align="center"><strong>Sign-Up</strong></p>
<p align="center"><img src="./docs/images/signup.gif" width="75%" alt="Signup"></p> 

<p align="center"><strong>Email Verification</strong></p>
<p align="center"><img src="./docs/images/email_verify.gif" width="75%" alt="Email Verification"></p>

<p align="center"><strong>Sign-In</strong></p>
<p align="center"><img src="./docs/images/signin.gif" width="75%" alt="Sign In"></p> 

<p align="center"><strong>Sign-Out</strong></p>
<p align="center"><img src="./docs/images/signout.gif" width="75%" alt="Sign Out"></p>

### Authroization System
To ensure secure and protected interactions among users, I implemented policies that authorize user actions. For instance, a user is unable to access another user's invoices.
<p align="center">
  <img src="./docs/images/unauth.gif" width="75%" alt="Error on accessing other users invoices">
</p>

### Validation System
All user submissions such as registration and checkout forms are validated both on the frontend for improved efficiency and on the backend for thorough security.
<p align="center">
  <img src="./docs/images/validation.gif" width="75%" alt="Checkout validation">
</p>

### Localization
The website is fully equipped to support both Arabic and English languages, allowing users to switch between the two by selecting the preferred language from the navigation bar.
<p align="center">
  <img src="./docs/images/localization.gif" width="75%" alt="Change Language">
</p>

### Fully Functional Pages
#### Explore
The Explore page is where you can see the latest and greatest products. I've also included a pagination feature to prevent your device from exploding... just kidding, to make browsing easier.
<p align="center">
  <img src="./docs/images/explore.gif" width="75%" alt="Explore Page">
</p>

#### Product
The Product page provides a detailed view of the product including information such as its description, comments, ratings, and more.
<p align="center">
  <img src="./docs/images/product.gif" width="75%" alt="Product Page">
</p>

#### Checkout
The Checkout page is the final step in the purchase process, where the user can review their shopping cart and enter their payment information to place the order.
<p align="center">
  <img src="./docs/images/checkout.gif" width="75%" alt="Checkout Page">
</p>

#### Invoice
After completing the checkout process, the user is redirected to the Invoice page, where they can review and keep a record of their transaction.
<p align="center">
  <img src="./docs/images/invoice.png" width="75%" alt="Invoice Page">
</p>

#### Profile
Signed-in users have the ability to access and update their profile information, such as their name, email, and password, from the Profile page.
<p align="center">
  <img src="./docs/images/profile.gif" width="75%" alt="Profile Page">
</p>

#### Orders
The Orders page provides users with an overview of their past orders, including information and details on each order.
<p align="center">
  <img src="./docs/images/orders.png" width="75%" alt="Orders Page">
</p>

## Building the Project
### Prerequisites
- Docker: Download and install the latest version of [Docker Desktop](https://www.docker.com/products/docker-desktop/).
- WSL2: If you are using Windows, please make sure that Windows Subsystem for Linux 2 (WSL2) is installed and enabled on your system. For more information on how to install WSL2, please refer to [this guide](https://learn.microsoft.com/en-us/windows/wsl/install). Once you have installed WSL2, please [configure Docker to use it](https://docs.docker.com/desktop/windows/wsl/).

### Deployment Steps
1. Open your terminal and clone this project (i.e., `git clone ...`).
2. Navigate to the project directory (i.e., `cd <project_name>`).
2. Run the following commands in your terminal:
  ```bash
   ./vendor/bin/sail up -d
   ./vendor/bin/sail php artisan migrate --seed # remove `--seed` if you don't want to seed the database tables
   ./vendor/bin/sail npm run dev
  ```
The application will now be accessible in your web browser at: http://localhost/.