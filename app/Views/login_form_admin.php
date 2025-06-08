<!DOCTYPE html>
<html>

<head>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            height: 100%;
            overflow: auto;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE and Edge */
        }

        body::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }

        .full-screen-img {
            position: fixed;
            height: 100%;
            width: 100%;
            object-fit: cover;
            top: 0;
            left: 0;
            z-index: -2;
        }

        .cover-img {
            position: fixed;
            height: 100%;
            width: 100%;
            background-color: black;
            top: 0;
            left: 0;
            opacity: 0.5;
            z-index: -1;
        }

        .form-floating input:focus~label {
            color: #000 !important;
        }

        .form-floating input {
            border-color: #000 !important;
            border-width: 2px !important;
            box-shadow: none !important;
        }
    </style>
</head>

<body>
    <img src="https://images.ctfassets.net/r7p9m4b1iqbp/B8znZdNyICw2UYMAguKk4/01e2c5f7848a87722d659d7e60447d36/Sky-G-Norway-23.jpg?w=1200&fm=webp&q=90" alt="car" class="full-screen-img">
    <div class="cover-img"></div>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="/loginadmin/auth" method="post" class="bg-light p-4 rounded shadow" style="min-width: 400px;">
            <h3 class="text-center mb-5">Admin Dashboard</h3>
            <?= csrf_field() ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autocomplete="off">
                <label for="email">Username</label>
            </div>

            <div class="form-floating mb-5">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required autocomplete="off">
                <label for="password">Password</label>
            </div>

            <div class="d-flex flex-column gap-3 justify-content-center align-items-center mb-5">
                <button type="submit" class="btn w-50" style="background-color: purple; color: white;">Login</button>
            </div>

            <p class="text-center mt-3 mb-0" style="font-size: 12px; cursor: pointer;">
                <span onclick="window.open('/use', '_blank');">Terms of Use</span> |
                <span onclick="window.open('/policy', '_blank');">Privacy Policy</span>
            </p>

        </form>
    </div>
</body>

</html>