<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Payment</title>
</head>
<body>
    <div class="container">
        <h2>Edit Payment</h2>

        <!-- Notifikasi Error -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <!-- Form untuk mengedit payment -->
        <form action="/payments/update/<?= $payment['id']; ?>" method="post">
            <div class="form-group">
                <label for="order_id">Order ID</label>
                <input type="number" class="form-control" name="order_id" value="<?= esc($payment['order_id']); ?>" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" name="amount" value="<?= esc($payment['amount']); ?>" required step="0.01">
            </div>

            <div class="form-group">
                <label for="payment_date">Payment Date</label>
                <input type="date" class="form-control" name="payment_date" value="<?= esc($payment['payment_date']); ?>" required>
            </div>

            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select name="payment_method" class="form-control" required>
                    <option value="cash" <?= ($payment['payment_method'] == 'cash') ? 'selected' : ''; ?>>Cash</option>
                    <option value="credit_card" <?= ($payment['payment_method'] == 'credit_card') ? 'selected' : ''; ?>>Credit Card</option>
                    <option value="bank_transfer" <?= ($payment['payment_method'] == 'bank_transfer') ? 'selected' : ''; ?>>Bank Transfer</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="pending" <?= ($payment['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                    <option value="completed" <?= ($payment['status'] == 'completed') ? 'selected' : ''; ?>>Completed</option>
                    <option value="failed" <?= ($payment['status'] == 'failed') ? 'selected' : ''; ?>>Failed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Payment</button>
            <a href="/payments" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
