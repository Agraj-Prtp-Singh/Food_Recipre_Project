<?php
session_start();
require "../config/db.php";
require "../includes/csrf.php";

// Auth guard — must be logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    die("Invalid recipe ID");
}

// CSRF: delete must be triggered via a POST form, not a bare GET link
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request method. Deletions must be submitted via POST.");
}

// Verify CSRF token
if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
    die("Invalid security token. Please try again.");
}

try {
    // Fetch the recipe — only allow deletion if user owns it
    $stmt = $pdo->prepare("SELECT image FROM recipes WHERE id = ? AND user_id = ?");
    $stmt->execute([$id, $_SESSION['user_id']]);
    $recipe = $stmt->fetch();
    
    if ($recipe) {
        // Delete the image file if it exists
        if ($recipe['image'] && file_exists("../uploads/recipe_images/" . $recipe['image'])) {
            unlink("../uploads/recipe_images/" . $recipe['image']);
        }
        
        // Delete recipe (ingredients will be deleted automatically due to CASCADE)
        $stmt = $pdo->prepare("DELETE FROM recipes WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $_SESSION['user_id']]);
    } else {
        die("Recipe not found or you do not have permission to delete it.");
    }
    
    header("Location: index.php");
    exit;
    
} catch (Exception $e) {
    die("Error deleting recipe: " . $e->getMessage());
}
