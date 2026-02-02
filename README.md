# 🍳 Food Recipe Database - Complete Documentation

A secure, feature-rich PHP web application for managing food recipes with user authentication, CSRF protection, and a clean black & white minimalist design.

---

## 🔐 Login Credentials

### Default Administrator Account

```
Username: admin
Password: admin123
```

### Additional Test Accounts

```
Username: chef
Password: password123

Username: user1
Password: password123
```

**⚠️ IMPORTANT SECURITY NOTE:**

- Change the default `admin` password immediately after installation
- These credentials are for testing purposes only
- Never use default passwords in production environments
- Use the "Change Password" feature after first login

---

## 🚀 Setup Instructions

### Prerequisites

Before you begin, ensure you have:

- ✅ PHP 7.4 or higher
- ✅ MySQL 5.7 or higher
- ✅ Apache web server (XAMPP, WAMP, LAMP, or MAMP)
- ✅ Web browser (Chrome, Firefox, Safari, or Edge)

---

### Step-by-Step Installation

#### Step 1: Extract Files

1. Download the `fr-complete.zip` file
2. Extract it to your web server's document root:
   - **Windows (XAMPP):** `C:\xampp\htdocs\`
   - **Windows (WAMP):** `C:\wamp\www\`
   - **Mac (MAMP):** `/Applications/MAMP/htdocs/`
   - **Linux (LAMP):** `/var/www/html/`

3. Rename the folder (optional):
   ```
   fr-complete → food-recipe
   ```

**Expected location:**

```
C:\xampp\htdocs\food-recipe\
```

---

#### Step 2: Start Web Server

1. Open your server control panel (XAMPP Control Panel / WAMP / MAMP)
2. Start **Apache** service
3. Start **MySQL** service
4. Verify both services are running (green indicators)

---

#### Step 3: Create Database

1. Open your web browser
2. Navigate to: `http://localhost/phpmyadmin`
3. Click on the **"SQL"** tab at the top
4. Open the file: `database_with_auth.sql` from the extracted folder
5. Copy **all content** from the file
6. Paste into the SQL window in phpMyAdmin
7. Click **"Go"** button to execute
8. You should see: "X rows affected" success messages

**Verify Database Creation:**

- In phpMyAdmin, you should now see `food_recipe_db` in the left sidebar
- Click on it to see 3 tables: `users`, `recipes`, `ingredients`

#### Step 4: Configure Database Connection (Optional)

**Only needed if you changed MySQL default settings**

1. Open: `config/db.php` in a text editor
2. Update credentials if needed:

```php
$host = 'localhost';        // Usually 'localhost'
$dbname = 'food_recipe_db'; // Keep this as is
$username = 'root';         // Change if you use different username
$password = '';             // Add password if you set one
```

3. Save the file

---

#### Step 5: Access the Application

Open your web browser and navigate to:

**Homepage:**

```
http://localhost/food-recipe/public/index.php
```

**Login Page:**

```
http://localhost/food-recipe/public/login.php
```

**You should see:**

- ✅ A clean white page with black navigation buttons
- ✅ Sample recipes displayed (if database imported correctly)
- ✅ Login link in the navigation

---

#### Step 6: First Login

1. Click **"Login"** in the navigation
2. Enter credentials:
   - Username: `admin`
   - Password: `admin123`
3. Click **"Login"** button
4. You should be redirected to the homepage
5. Navigation should now show: "Welcome, admin!" and "Logout" button

---

## Features Implemented

### Security Features

#### 1. User Authentication System

- Secure login with username/password
- Password hashing using bcrypt (PASSWORD_DEFAULT)
- Session management with regeneration
- Secure logout with complete session destruction
- User registration with validation
- Password change functionality

#### 2. CSRF Protection

- CSRF tokens on all forms (login, logout, add, edit, delete, register, password change)
- Token generation and validation
- Timing-safe token comparison
- Token expiration (1 hour)
- Automatic token regeneration

#### 3. Input Validation & Sanitization

- SQL injection prevention (PDO prepared statements)
- XSS protection (htmlspecialchars on all outputs)
- Input validation on all forms
- File upload validation (type and size)
- Email validation
- Password strength requirements

#### 4. Additional Security

- Brute force protection (1-second delay on failed login)
- Session fixation prevention
- Secure password verification
- Error message handling (no sensitive info leakage)

---

### User Management

#### 1. Registration System

- New user registration page
- Real-time password strength indicator
- Password confirmation matching
- Username uniqueness check
- Email validation and uniqueness check
- Automatic password hashing

#### 2. Password Management

- Change password page
- Current password verification
- Password requirements checklist
- Real-time password strength meter
- Password match validation
- Secure password update

#### 3. Session Management

- Persistent login sessions
- "Welcome, [Username]" display
- Session regeneration on login
- Complete session cleanup on logout
- Session cookie removal

---

### Recipe Management

#### 1. Recipe CRUD Operations

- **Create:** Add new recipes with title, cuisine, difficulty, instructions
- **Read:** View all recipes with pagination-ready structure
- **Update:** Edit existing recipes with pre-filled forms
- **Delete:** Remove recipes with confirmation

#### 2. Recipe Features

- Recipe title and description
- Cuisine type selection
- Difficulty level (Easy, Medium, Hard) with badges
- Step-by-step cooking instructions
- Recipe image upload
- Multiple ingredients per recipe
- Dynamic ingredient addition (unlimited)
- Timestamp tracking (created_at)

#### 3. Image Management

- Recipe image upload
- Image preview before upload
- File type validation (JPEG, PNG, GIF)
- File size validation
- Automatic image storage
- Image display with fallback placeholder
- Responsive image scaling

---

### Search & Filter System

#### 1. Advanced Search

- ✅ Search by recipe title (partial match)
- ✅ Filter by cuisine type
- ✅ Filter by difficulty level
- ✅ Search by ingredients
- ✅ Combine multiple search criteria
- ✅ Real-time search results

#### 2. Autocomplete Feature

- ✅ Ingredient autocomplete (AJAX-powered)
- ✅ Dynamic suggestion list
- ✅ Click to select suggestions
- ✅ Keyboard navigation support
- ✅ Fast query response
- ✅ Minimum 2 characters to trigger

#### 3. Search UX

- ✅ Clear all filters button
- ✅ Results count display
- ✅ Empty state messages
- ✅ Loading indicators
- ✅ Error handling

---

### 🎨 User Interface

#### 1. Design System

- ✅ **Clean black & white minimalist theme**
- ✅ **All buttons:** Black background, white text
- ✅ **Consistent styling** across all pages
- ✅ **Smooth hover effects** (dark gray on hover)
- ✅ Professional corporate look
- ✅ High contrast for readability

#### 2. Responsive Design

- ✅ Mobile-friendly layout
- ✅ Tablet optimization
- ✅ Desktop wide-screen support
- ✅ Flexible grid system
- ✅ Touch-friendly buttons
- ✅ Adaptive navigation

#### 3. User Experience

- ✅ Intuitive navigation
- ✅ Clear error messages
- ✅ Success confirmations
- ✅ Loading states
- ✅ Empty states with helpful messages
- ✅ Breadcrumb-style navigation

---

### 📊 Database Structure

#### 1. Tables Implemented

- ✅ **users** - User accounts with authentication
- ✅ **recipes** - Recipe information
- ✅ **ingredients** - Recipe ingredients with foreign keys

#### 2. Database Features

- ✅ Proper indexing for performance
- ✅ Foreign key constraints
- ✅ CASCADE delete (ingredients deleted with recipe)
- ✅ UTF-8 character encoding
- ✅ Timestamp tracking
- ✅ Data integrity constraints

---

### 🛠️ Technical Features

#### 1. Code Architecture

- ✅ MVC-like structure (separation of concerns)
- ✅ Reusable components (header, footer, search form)
- ✅ Centralized database connection
- ✅ CSRF utility library
- ✅ Clean, documented code
- ✅ PSR-compatible naming

#### 2. AJAX Implementation

- ✅ Asynchronous search
- ✅ Ingredient autocomplete
- ✅ No page reload for searches
- ✅ JSON response handling
- ✅ Error handling

#### 3. Form Handling

- ✅ POST/GET method separation
- ✅ Form validation (client & server)
- ✅ Error message display
- ✅ Success message display
- ✅ Form data preservation on error
- ✅ CSRF protection on all forms

---

## 🗂️ File Structure

```
food-recipe/
├── assets/
│   ├── css/
│   │   └── style.css                  # Black & white minimalist theme
│   └── js/
│       ├── autocomplete.js            # Ingredient autocomplete
│       └── search.js                  # AJAX search functionality
├── config/
│   └── db.php                         # Database configuration
├── includes/
│   ├── csrf.php                       # CSRF protection utilities
│   ├── header.php                     # Header with navigation
│   ├── footer.php                     # Footer
│   └── search-form.php                # Reusable search form
├── public/
│   ├── index.php                      # Homepage - Recipe list
│   ├── login.php                      # Login page (CSRF protected)
│   ├── logout.php                     # Logout page (CSRF protected)
│   ├── register.php                   # User registration (CSRF protected)
│   ├── change-password.php            # Password change (CSRF protected)
│   ├── add.php                        # Add recipe (CSRF protected)
│   ├── edit.php                       # Edit recipe (CSRF protected)
│   ├── delete.php                     # Delete recipe (CSRF protected)
│   ├── search.php                     # Search recipes
│   ├── ajax_search.php                # AJAX search handler
│   └── ajax_ingredients.php           # AJAX autocomplete handler
├── uploads/
│   └── recipe_images/                 # Uploaded recipe images
├── database_with_auth.sql             # Complete database schema
├── README.md                          # This file
├── INSTALLATION.md                    # Detailed installation guide
├── CSRF_IMPLEMENTATION.md             # CSRF documentation
├── PASSWORD_CHANGE_GUIDE.md           # Password management guide
└── QUICK_START.md                     # 5-minute quick start
```

---

## 🐛 Known Issues

### Minor Issues

#### 1. Image Upload Directory Permissions

**Issue:** On some Linux/Mac systems, image uploads may fail due to directory permissions.

**Workaround:**

```bash
chmod 777 uploads/recipe_images/
```

**Permanent Fix:** Set proper ownership:

```bash
chown -R www-data:www-data uploads/
chmod 755 uploads/recipe_images/
```

---

#### 2. Session Timeout

**Issue:** Users may be logged out after 1 hour of inactivity (default PHP session timeout).

**Workaround:** This is intentional for security. Users can simply log in again.

**To Change:** Edit `php.ini`:

```ini
session.gc_maxlifetime = 3600  ; Change to desired seconds
```

---

#### 3. CSRF Token Expiration

**Issue:** CSRF tokens expire after 1 hour. Forms opened for more than 1 hour will fail on submission.

**Workaround:** Refresh the page to get a new token.

**To Change:** Edit `includes/csrf.php` line 21:

```php
if ($tokenAge < 3600) { // Change 3600 to desired seconds
```

---

#### 4. File Upload Size Limit

**Issue:** Default PHP configuration limits file uploads to 2MB.

**Workaround:** Edit `php.ini`:

```ini
upload_max_filesize = 10M
post_max_size = 10M
max_execution_time = 300
```

Then restart Apache.

---

#### 5. Browser Autocomplete on Password Fields

**Issue:** Some browsers ignore `autocomplete="new-password"` attribute and suggest old passwords.

**Impact:** Minimal - This is a browser behavior, not a bug.

**Workaround:** Users can ignore browser suggestions and type manually.

---

### Design Limitations

#### 1. No Email Verification

**Current State:** User registration doesn't require email verification.

**Impact:** Users can register with invalid emails.

**Future Enhancement:** Add email verification with confirmation tokens.

---

#### 2. No Forgot Password Feature

**Current State:** If users forget password, admin must reset it manually.

**Workaround:** See `PASSWORD_CHANGE_GUIDE.md` for manual reset instructions.

**Future Enhancement:** Implement email-based password reset.

---

#### 3. No User Profile Page

**Current State:** Users can only change password, not update email or username.

**Impact:** Limited user account management.

**Future Enhancement:** Add user profile edit page.

---

#### 4. No Recipe Categories or Tags

**Current State:** Only cuisine and difficulty for classification.

**Impact:** Limited organization options for large recipe collections.

**Future Enhancement:** Add tags system and category hierarchy.

---

#### 5. No Recipe Rating or Comments

**Current State:** No user feedback mechanism on recipes.

**Impact:** No community engagement features.

**Future Enhancement:** Add star ratings and comment system.

---

### Performance Considerations

#### 1. Large Image Files

**Issue:** Uploading very large images (>5MB) may slow down page load.

**Recommendation:**

- Resize images before upload
- Consider implementing server-side image compression
- Add file size warnings in UI

---

#### 2. No Pagination

**Issue:** All recipes load on homepage. With 100+ recipes, page may load slowly.

**Current State:** Works fine for up to ~50 recipes.

**Future Enhancement:** Implement pagination (10-20 recipes per page).

---

#### 3. Search Performance

**Issue:** Ingredient search uses LIKE query, which can be slow with large datasets.

**Current State:** Acceptable for <1000 recipes.

**Optimization:** Add full-text search indexes for production use.

---

### Browser Compatibility

#### Tested and Working:

- ✅ Google Chrome (latest)
- ✅ Mozilla Firefox (latest)
- ✅ Microsoft Edge (latest)
- ✅ Safari (latest)
- ✅ Mobile browsers (Chrome, Safari)

#### Known Issues:

- ⚠️ Internet Explorer 11: Some CSS features may not display correctly
- ⚠️ Older browsers (<2020): May have compatibility issues

**Recommendation:** Use modern browsers for best experience.

---

## 🔧 Troubleshooting

### Common Issues and Solutions

#### "Cannot connect to database"

```
✓ Check if MySQL is running
✓ Verify credentials in config/db.php
✓ Ensure database food_recipe_db exists
✓ Test connection in phpMyAdmin
```

---

#### "Invalid CSRF token"

```
✓ Clear browser cookies and cache
✓ Refresh the page
✓ Ensure sessions are enabled in php.ini
✓ Check session save path is writable
```

---

#### "Login failed" with correct credentials

```
✓ Verify user exists in database: SELECT * FROM users WHERE username='admin';
✓ Check password hash is present
✓ Try resetting password (see PASSWORD_CHANGE_GUIDE.md)
✓ Clear browser cookies
```

---

#### "Page not found" errors

```
✓ Ensure you're accessing via public/ folder
✓ Correct: http://localhost/food-recipe/public/index.php
✓ Wrong: http://localhost/food-recipe/index.php
✓ Check file permissions (should be readable)
```

---

#### Images not uploading

```
✓ Check uploads/recipe_images/ exists
✓ Set permissions: chmod 777 uploads/recipe_images/
✓ Verify upload_max_filesize in php.ini
✓ Check Apache error logs
```

---

#### Search not working

```
✓ Check JavaScript is enabled in browser
✓ Open browser console for errors
✓ Verify ajax_search.php is accessible
✓ Test database connection
```

---

## 📚 Additional Documentation

- **INSTALLATION.md** - Detailed step-by-step installation guide
- **QUICK_START.md** - 5-minute quick start guide
- **CSRF_IMPLEMENTATION.md** - Technical details on CSRF protection
- **PASSWORD_CHANGE_GUIDE.md** - How to change passwords (users & admins)

---

## 🔒 Security Recommendations

### For Production Deployment

1. **Change All Default Passwords**

   ```sql
   UPDATE users SET password = 'new_bcrypt_hash' WHERE username = 'admin';
   ```

2. **Enable HTTPS**
   - Install SSL certificate
   - Force HTTPS redirects
   - Set secure cookie flags

3. **Update Database Credentials**
   - Use strong database password
   - Create dedicated database user (not root)
   - Limit user permissions (SELECT, INSERT, UPDATE, DELETE only)

4. **File Permissions**

   ```bash
   chmod 644 config/db.php
   chmod 755 public/
   chmod 755 uploads/recipe_images/
   ```

5. **Disable Error Display**
   In `php.ini`:

   ```ini
   display_errors = Off
   log_errors = On
   error_log = /path/to/error.log
   ```

6. **Enable Security Headers**
   Add to `.htaccess`:

   ```apache
   Header set X-Content-Type-Options "nosniff"
   Header set X-Frame-Options "SAMEORIGIN"
   Header set X-XSS-Protection "1; mode=block"
   ```

7. **Regular Backups**
   - Backup database daily
   - Backup uploaded images weekly
   - Store backups off-server

8. **Update Dependencies**
   - Keep PHP updated
   - Keep MySQL updated
   - Monitor security advisories

---

## 📞 Support & Contact

For issues, questions, or feature requests:

1. Check this README.md for solutions
2. Review INSTALLATION.md for setup help
3. See TROUBLESHOOTING section above
4. Check PASSWORD_CHANGE_GUIDE.md for password issues

---

## 📄 License

This project is open-source and available for personal and commercial use.

---

## 🎯 Quick Reference

### Important URLs

```
Homepage:        http://localhost/food-recipe/public/index.php
Login:           http://localhost/food-recipe/public/login.php
Register:        http://localhost/food-recipe/public/register.php
Change Password: http://localhost/food-recipe/public/change-password.php
Add Recipe:      http://localhost/food-recipe/public/add.php
Search:          http://localhost/food-recipe/public/search.php
phpMyAdmin:      http://localhost/phpmyadmin
```

### Default Login

```
Username: admin
Password: admin123
```

### Key Features Count

- ✅ 15+ Security features
- ✅ 8 User management features
- ✅ 12 Recipe management features
- ✅ 8 Search & filter features
- ✅ 15 UI/UX features
- ✅ 6 Database features

---

## ✅ Testing Checklist

After installation, verify these work:

- [ ] Homepage loads without errors
- [ ] Can login with admin/admin123
- [ ] Navigation shows "Welcome, admin!"
- [ ] Can view existing recipes
- [ ] Can add a new recipe
- [ ] Can upload recipe image
- [ ] Can edit existing recipe
- [ ] Can delete recipe
- [ ] Search by title works
- [ ] Search by cuisine works
- [ ] Search by ingredient works
- [ ] Ingredient autocomplete works
- [ ] Can register new user
- [ ] Can change password
- [ ] Can logout successfully

---

**Version:** 1.0.0  
**Last Updated:** February 2026  
**Status:** Production Ready ✅  
**Theme:** Black & White Minimalist Design

---

## 🎉 You're All Set!

Your Food Recipe Database is ready to use. Start by logging in with the admin account and exploring the features!

**Happy Cooking! 🍳👨‍🍳**
