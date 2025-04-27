<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logged'])) {
        $_SESSION['logged'] = $_POST['logged'];
    }
    if (isset($_POST['role'])) {
        $_SESSION['role'] = $_POST['role'];
    }
    if (isset($_POST['userId'])) {
        $_SESSION['userId'] = $_POST['userId'];
    }

    header('Content-Type: application/json');
    echo json_encode([
        "message" => "Session data saved successfully!",
        "data" => $_SESSION['logged']
    ]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script>
        let logged = localStorage.getItem("logged");
        let role = localStorage.getItem("role");
        let userId = localStorage.getItem("userId");

        let bodyData =
            "logged=" + encodeURIComponent(logged) +
            "&role=" + encodeURIComponent(role) +
            "&userId=" + encodeURIComponent(userId);

        fetch("index.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: bodyData
        })
            .then(res => res.text())
            .then(data => {
                console.log("Server response:", data);

                const logged = JSON.parse(data).data;
                if (logged === "true") {
                    window.location.href = "post/index.php";
                } else {
                    window.location.href = "login/index.php";
                }
            });
    </script>
</head>
<body class="container mt-4">
</body>
</html>
