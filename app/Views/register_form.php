<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
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

<body>

    <img src="https://images.ctfassets.net/r7p9m4b1iqbp/B8znZdNyICw2UYMAguKk4/01e2c5f7848a87722d659d7e60447d36/Sky-G-Norway-23.jpg?w=1200&fm=webp&q=90" alt="car" class="full-screen-img">
    <div class="cover-img"></div>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="/register/store" method="post" class="bg-light p-4 rounded shadow" style="min-width: 400px;">
            <h3 class="text-center mb-4">Register</h3>
            <?= csrf_field() ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <?php if (isset($validation)): ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Fullname" required autocomplete="off">
                <label for="fullname">Fullname</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required autocomplete="off">
                <label for="email">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="text" name="address" id="address" placeholder="Address" required autocomplete="off">
                <label for="address">Address</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="tel" name="phone" id="phone" placeholder="Phone Number" required autocomplete="off">
                <label for="phone">Phone Number</label>
            </div>

            <div class="form-floating mb-4">
                <input class="form-control" type="password" name="password" id="password" placeholder="Password" required autocomplete="off">
                <label for="password">Password</label>
            </div>

            <div class="d-flex justify-content-center mb-3">
                <button type="submit" class="btn w-50" style="background-color: purple; color: white;">Register</button>
            </div>

            <p class="text-center mt-4 mb-0" style="font-size: 12px;">Already have an account?
                <a href="<?= base_url('/login') ?>" style="text-decoration: underline; color: inherit;">Login</a>
            </p>
        </form>
    </div>

</body>

</html>