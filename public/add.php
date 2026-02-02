<?php 
session_start();
require "../config/db.php";
require "../includes/csrf.php";

// Auth guard — must be logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require "../includes/header.php";

$message = '';
$messageType = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verify CSRF token
    if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
        $message = "Invalid security token. Please try again.";
        $messageType = "error";
    } else {
        $title = trim($_POST['title']);
        $cuisine = trim($_POST['cuisine']);
        $difficulty = $_POST['difficulty'];
        $instructions = trim($_POST['instructions']);
        $ingredients = array_filter(array_map('trim', explode(",", $_POST['ingredients'])));

        // Validation
        if (empty($title) || empty($cuisine) || empty($difficulty) || empty($instructions) || empty($ingredients)) {
            $message = "All fields are required!";
            $messageType = "error";
        } else {
            try {
                // Handle image upload
                $imageName = '';
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $imageName = time() . '_' . basename($_FILES['image']['name']);
                    $targetPath = "../uploads/recipe_images/" . $imageName;
                    
                    // Validate image type
                    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                    $imageType = $_FILES['image']['type'];
                    
                    if (in_array($imageType, $allowedTypes)) {
                        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                            throw new Exception("Failed to upload image");
                        }
                    } else {
                        throw new Exception("Only JPG, PNG, and GIF images are allowed");
                    }
                }

                // Insert recipe (now includes user_id)
                $stmt = $pdo->prepare(
                    "INSERT INTO recipes (title, cuisine, difficulty, instructions, image, user_id)
                     VALUES (?, ?, ?, ?, ?, ?)"
                );
                $stmt->execute([$title, $cuisine, $difficulty, $instructions, $imageName, $_SESSION['user_id']]);

                $recipeId = $pdo->lastInsertId();

                // Insert ingredients
                $ingStmt = $pdo->prepare(
                    "INSERT INTO ingredients (recipe_id, ingredient_name) VALUES (?, ?)"
                );
                
                foreach ($ingredients as $ingredient) {
                    if (!empty($ingredient)) {
                        $ingStmt->execute([$recipeId, $ingredient]);
                    }
                }

                $message = "Recipe added successfully! 🎉";
                $messageType = "success";
                
                // Clear form after success
                $_POST = [];
            } catch (Exception $e) {
                $message = "Error: " . $e->getMessage();
                $messageType = "error";
            }
        }
    }
}

$csrfToken = getCsrfToken();
?>

<h2>➕ Add New Recipe</h2>

<?php if ($message): ?>
    <div class="message <?= $messageType ?>">
        <?= htmlspecialchars($message) ?>
        <?php if ($messageType === 'success'): ?>
            <br><a href="index.php">View all recipes</a>
        <?php endif; ?>
    </div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data" class="search-form">
    <?= csrfTokenField() ?>
    <div class="search-grid">
        <div class="form-group">
            <label for="title">Recipe Title *</label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   placeholder="e.g., Spaghetti Carbonara"
                   value="<?= htmlspecialchars($_POST['title'] ?? '') ?>"
                   required>
        </div>

        <div class="form-group">
            <label for="cuisine">Cuisine *</label>
            <input type="text" 
                   id="cuisine" 
                   name="cuisine" 
                   placeholder="e.g., Italian"
                   value="<?= htmlspecialchars($_POST['cuisine'] ?? '') ?>"
                   required>
        </div>

        <div class="form-group">
            <label for="difficulty">Difficulty *</label>
            <select id="difficulty" name="difficulty" required>
                <option value="">Select Difficulty</option>
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Recipe Image</label>
            <input type="file" 
                   id="image" 
                   name="image" 
                   accept="image/*">
            <small style="color: #999; margin-top: 5px; display: block;">JPG, PNG, GIF (Optional)</small>
        </div>
    </div>

    <div class="form-group">
        <label for="instructions">Cooking Instructions *</label>
        <textarea id="instructions" 
                  name="instructions" 
                  placeholder="Enter step-by-step cooking instructions..."
                  required><?= htmlspecialchars($_POST['instructions'] ?? '') ?></textarea>
    </div>

    <div class="form-group">
        <label for="ingredients">Ingredients *</label>
        <input type="text" 
               id="ingredients" 
               name="ingredients" 
               placeholder="Enter ingredients separated by commas (e.g., eggs, pasta, cheese)"
               value="<?= htmlspecialchars($_POST['ingredients'] ?? '') ?>"
               required>
        <small style="color: #999; margin-top: 5px; display: block;">Separate each ingredient with a comma</small>
    </div>

    <button type="submit" class="btn btn-primary">Add Recipe</button>
</form>

<?php require '../includes/footer.php'; ?>
