<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Service</title>
</head>
<body>
    <h1>Create New Service</h1>
    <form action="/services/store" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required><br>

        <label for="duration">Duration (in minutes):</label>
        <input type="number" id="duration" name="duration" required><br>

        <button type="submit">Create Service</button>
    </form>
</body>
</html>
