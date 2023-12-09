# Online EBook Store

This Online EBook Store is built using Laravel 9, Bootstrap, jQuery, and MySQL. It provides a responsive interface for exploring and downloading books.

## Features

### General:

-   **Explore Books:**
    -   Browse and explore available books.
-   **Download Books:**

    -   Download eBooks available on the platform.

    ### Admin:

-   **Manage Users:**
    -   Change roles, suspend accounts, or ban users.
-   **Content Management:**
    -   Create books, authors, categories, etc.
-   **Manage User Interactions:**
    -   Handle user contacts, comments, and orders.

### User:

-   **Account Creation:**
    -   Users can create accounts to access additional functionalities.
-   **Comment on Books:**
    -   Users can leave comments on books.
-   **Order Books:**
    -   Place orders for desired books.
-   **Contact Admin:**
    -   Users can contact the admin for inquiries or support.

## Technologies Used

-   **Laravel 9:** PHP web application framework for backend development.
-   **Bootstrap:** Frontend framework for responsive web design.
-   **jQuery:** JavaScript library for DOM manipulation and interactions.
-   **MySQL:** Database management system for storing application data.

## Installation

1. **Clone the Repository:**
    ```bash
    git clone https://github.com/akwhtun/Ebook.git
    ```
2. **Install Dependencies:**

-   Navigate to the project directory and install Composer dependencies:

    ```bash
    composer install
    ```

3. **Copy Environment Variables:**

-   Duplicate the `.env.example` file to `.env` and set up your environment configurations:

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key:**

```bash
php artisan key:generate

```

5. **Database Setup:**

-   Configure your database credentials in the .env file, then run migrations:

```bash
php artisan migrate

```

6. **Run the Application:**

```bash
php artisan serve

```

Access the application at http://localhost:8000

## Usage

### Admin:

-   **Credentials:**

    -   **Email:** aung955910@gmail.com
    -   **Password:** admin123

    Log in with the provided admin credentials to access admin functionalities.

### User:

-   **User Credentials:**
    -   Register an account or use provided user credentials to access user features.
