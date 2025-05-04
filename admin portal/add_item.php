<?php
// Include your database connection
include('db_connection.php'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    // Collect form data
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    // Handle file upload
    $image = $_FILES['image'];
    
    // Check if the file was uploaded without errors
    if ($image['error'] == 0) {
        // Set the target directory for file upload
        $target_dir = "uploads/"; // Ensure this directory exists and is writable
        $target_file = $target_dir . basename($image['name']);
        
        // Check if the file is a valid image (Optional: You can check the MIME type here)
        if (getimagesize($image['tmp_name'])) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($image['tmp_name'], $target_file)) {
                // Insert item details into the database
                $sql = "INSERT INTO baby_shop_items (name, price, image) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $name, $price, $target_file);

                if ($stmt->execute()) {
                    // Success message
                    echo "Item added successfully!";
                } else {
                    echo "Error adding item: " . $stmt->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Uploaded file is not an image.";
        }
    } else {
        echo "Error uploading image: " . $image['error'];
    }
}

?>

<!-- HTML Form to Add Item -->
<div class="form-container">
    <h2>Add Item to Baby Shop</h2>
    <form action="add_item.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Item Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter product name" required>
        </div>

        <div class="form-group">
            <label for="price">Price (KES):</label>
            <input type="number" id="price" name="price" step="0.01" placeholder="Enter price" required>
        </div>

        <div class="form-group">
            <label for="image">Item Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <button type="submit" name="add">Add Item</button>
    </form>
</div>

<?php
// Close database connection
$conn->close();
?>

