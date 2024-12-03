<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>

    <form action="/employees/update/<?= $employee['id'] ?>" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?= esc($employee['name']) ?>" required><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= esc($employee['email']) ?>" required><br>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="<?= esc($employee['phone']) ?>" required><br>

        <label for="position">Position</label>
        <input type="text" id="position" name="position" value="<?= esc($employee['position']) ?>" required><br>

        <label for="hire_date">Hire Date</label>
        <input type="date" id="hire_date" name="hire_date" value="<?= esc($employee['hire_date']) ?>" required><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
