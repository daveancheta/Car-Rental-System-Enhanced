<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent a Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

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

        .bg-image {
            background-image: url('https://images.ctfassets.net/r7p9m4b1iqbp/B8znZdNyICw2UYMAguKk4/01e2c5f7848a87722d659d7e60447d36/Sky-G-Norway-23.jpg?w=1200&fm=webp&q=90');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 3;
        }

        .navbar-brand,
        h2 {
            font-family: 'Bungee Spice', cursive;
            font-size: 1.8rem;
            color: purple !important;
        }

        .nav-link {
            font-weight: 600;
            color: white !important;
        }

        .content-section {
            position: relative;
            z-index: 2;
            padding-top: 100px;
            padding-bottom: 60px;
            color: white;
        }

        .card {
            width: 18rem;
            margin: auto;
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
        }

        .btn {
            background-color: rgb(255, 166, 0);
            color: white;
            font-weight: 600;
            box-shadow: none;
        }

        .btn:hover {
            background-color: rgb(255, 166, 0);
            color: white;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

    <div class="bg-image">
        <div class="overlay"></div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top px-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CarVibe</a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user/info">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="container content-section">
            <h2 class="text-center mb-5">Rent a Car Now</h2>
            <div class="row justify-content-center">
                <?php if (!empty($cars)): ?>
                    <?php foreach ($cars as $car): ?>
                        <div class="col-md-4 mb-4 d-flex justify-content-center">
                            <form action="<?= base_url('rent-car') ?>" method="POST">
                                <!-- Hidden field for car name -->
                                <input type="hidden" name="car_name" value="<?= esc($car['car_name']) ?>">
                                <input type="hidden" name="fullname" value="<?= session()->get('fullname') ?>">

                                <!-- Card to display car details -->
                                <div class="card shadow-sm">
                                    <!-- Use the car name in the card image alt and card title -->
                                    <img src="<?= base_url('uploads/' . $car['image_path']) ?>" class="card-img-top" alt="<?= esc($car['car_name']) ?> Image">
                                    <div class="card-body">
                                        <!-- Display the car name dynamically in the card title -->
                                        <h5 class="card-title"><?= esc($car['car_name']) ?></h5>
                                        <p class="card-text"><?= esc($car['description']) ?></p>
                                        <p style="color:rgb(98, 169, 57); font-weight: bold;">₱<?= esc($car['car_price']) ?>/day</p>
                                        <p class="" style="color:rgb(227, 102, 0); font-weight: bold;"><?= esc($car['status']) ?></p>
                                        <!-- Rental days selection -->
                                        <select name="rental_days" class="form-select mb-3" required>
                                            <?php for ($i = 1; $i <= 100; $i++): ?>
                                                <option value="<?= $i ?>"><?= $i ?> day<?= $i > 1 ? 's' : '' ?></option>
                                            <?php endfor; ?>
                                        </select>

                                        <?php if (strtolower($car['status']) === 'available'): ?>
                                            <button type="submit" class="btn w-100">Rent Now</button>
                                        <?php else: ?>
                                            <button type="button" class="btn w-100 btn-secondary" disabled>Already Rented</button>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center bg-light text-dark">No cars available for rent.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>


</body>

</html>