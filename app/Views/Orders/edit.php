<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
</head>
<body>
    <h1>Edit Order</h1>

    <form action="/orders/update/<?= $order['id'] ?>" method="post">
        <label for="customer_id">Customer ID</label>
        <input type="text" id="customer_id" name="customer_id" value="<?= esc($order['customer_id']) ?>" required><br>

        <label for="service_id">Service ID</label>
        <input type="text" id="service_id" name="service_id" value="<?= esc($order['service_id']) ?>" required><br>

        <label for="employee_id">Employee ID</label>
        <input type="text" id="employee_id" name="employee_id" value="<?= esc($order['employee_id']) ?>"><br>

        <label for="order_date">Order Date</label>
        <input type="date" id="order_date" name="order_date" value="<?= esc($order['order_date']) ?>" required><br>

        <label for="start_time">Start Time</label>
        <input type="time" id="start_time" name="start_time" value="<?= esc($order['start_time']) ?>" required><br>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="pending" <?= ($order['status'] == 'pending') ? 'selected' : '' ?>>Pending</option>
            <option value="confirmed" <?= ($order['status'] == 'confirmed') ? 'selected' : '' ?>>Confirmed</option>
            <option value="in_progress" <?= ($order['status'] == 'in_progress') ? 'selected' : '' ?>>In Progress</option>
            <option value="completed" <?= ($order['status'] == 'completed') ? 'selected' : '' ?>>Completed</option>
            <option value="cancelled" <?= ($order['status'] == 'cancelled') ? 'selected' : '' ?>>Cancelled</option>
        </select><br>

        <!-- <label for="total_price">Total Price</label>
        <input type="text" id="total_price" name="total_price" value="<?= esc($order['total_price']) ?>" required><br> -->

        <button type="submit">Update</button>
    </form>
</body>
</html>
