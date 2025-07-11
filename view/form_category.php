<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $category ? 'Edit Category' : 'Add Category'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2><?php echo $category ? 'Edit Category' : 'Add New Category'; ?></h2>
        <form action="index.php?controller=category&action=<?php echo $category ? 'edit&id=' . $category['ID'] : 'create'; ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $category ? htmlspecialchars($category['name']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"><?php echo $category ? htmlspecialchars($category['description']) : ''; ?></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="top" name="top" <?php echo $category && $category['top'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="top">Top Category</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="index.php?controller=category&action=index" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>