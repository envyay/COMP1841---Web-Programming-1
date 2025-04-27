<?php
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sending Email to Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include '../header/header.php'; ?>
<body class="container mt-5 bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📧 Sending Email to Admin</h4>
        </div>
        <div class="card-body">
            <form action="../../controller/email/MailController.php" method="post">
                <div class="mb-3">
                    <label for="subject" class="form-label">✉️ Title</label>
                    <input type="text" class="form-control" name="subject" id="subject" required placeholder="Email title">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">📝 Content</label>
                    <textarea class="form-control" name="body" id="body" rows="6" required placeholder="Enter the content you want to send..."></textarea>
                </div>

                <button type="submit" class="btn btn-success">📤 Send </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


