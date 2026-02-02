# Food Recipe Website

A simple yet functional recipe management platform built using PHP and MySQL, featuring user authentication, recipe management, ingredient tracking, search functionality, and AJAX-powered interactions.

## Setup Instructions

### Open the website on the student server:

```
https://student.heraldcollege.edu.np/~np03CS4A240347/public/
```

1. **Clone the repository**

   ```
   git clone https://github.com/Agraj-Prtp-Singh/Food_Recipre_Project
   ```

2. **Configure the database**
   - Create a MySQL database named `food_recipe_db`
   - Import the database schema (if provided)
   - Update database credentials in `config/db.php` if needed

3. **Access the website**
   - Place the project in your web server directory (e.g., `htdocs` for XAMPP)
   - Navigate to `http://localhost/food_recipe_project/public/index.php` in your browser
   - Login using the provided credentials:
     - **Username:** admin
     - **Password:** admin123

## Features

### User System

- User registration & login
- Secure password hashing
- Session-based authentication
- Password change functionality
- CSRF protection

### Recipe Management

- Create, edit, and delete recipes
- Upload recipe images
- Set difficulty levels (Easy, Medium, Hard)
- Add cuisine type
- Only recipe owners can edit/delete their posts

### Ingredients System

- Add multiple ingredients per recipe
- Ingredient autocomplete functionality
- Display ingredient previews on recipe cards
- AJAX-powered ingredient suggestions

### Search & UI

- Keyword-based recipe search
- Search by recipe title, cuisine, or ingredients
- AJAX search with real-time results
- Clean and responsive layout
- Recipe cards with images and metadata

### Security Features

- CSRF token protection on forms
- Password hashing using PHP's password functions
- Session management
- Input validation and sanitization

## Project Structure

```
food_recipe_project/
├── assets/
│   ├── css/
│   │   └── style.css          # Main stylesheet
│   └── js/
│       ├── autocomplete.js    # Ingredient autocomplete
│       └── search.js          # AJAX search functionality
├── config/
│   └── db.php                 # Database connection
├── includes/
│   ├── csrf.php               # CSRF token handling
│   ├── footer.php             # Page footer
│   ├── header.php             # Page header & navigation
│   └── search-form.php        # Search form component
├── public/
│   ├── add.php                # Add new recipe
│   ├── ajax_ingredients.php   # Ingredient autocomplete endpoint
│   ├── ajax_search.php        # Search results endpoint
│   ├── change-password.php    # Password change page
│   ├── delete.php             # Delete recipe
│   ├── edit.php               # Edit recipe
│   ├── index.php              # Homepage with all recipes
│   ├── login.php              # User login
│   ├── logout.php             # User logout
│   ├── register.php           # User registration
│   └── search.php             # Search results page
└── uploads/
    └── recipe_images/         # Uploaded recipe images
```

## Technologies Used

- **Backend:** PHP (PDO for database operations)
- **Database:** MySQL
- **Frontend:** HTML5, CSS3, JavaScript
- **Features:** AJAX for dynamic content loading

## Default Login Credentials

- **Username:** admin
- **Password:** admin123

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- mod_rewrite enabled (if using .htaccess)

## Future Enhancements

- User ratings and reviews
- Recipe favorites/bookmarks
- Cooking time and serving size
- Nutritional information
- Recipe categories and tags
- Social sharing features
- Print-friendly recipe view

## License

This project is open-source and available for educational purposes.
