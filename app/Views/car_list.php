<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            background-color: rgb(255, 140, 0);
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
                        <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="container content-section">
            <h2 class="text-center mb-5">Cars for rent</h2>
            <div class="mb-4 text-center">
                <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Car</a>
            </div>
            <div class="row justify-content-center">
                <?php if (!empty($cars)): ?>
                    <?php foreach ($cars as $car): ?>
                        <div class="col-md-4 mb-4 d-flex justify-content-center">
                            <div class="card shadow-sm">
                                <img src="<?= base_url('uploads/' . $car['image_path']) ?>" class="card-img-top" alt="Car Image">
                                <div class="card-body">
                                    <h5 class="card-title"><?= esc($car['car_name']) ?></h5>
                                    <p class="card-text"><?= esc($car['description']) ?></p>
                                    <p class="" style="color:rgb(98, 169, 57); font-weight: bold;">₱<?= esc($car['car_price']) ?>/day</p>
                                    <p class="" style="color:rgb(227, 102, 0); font-weight: bold;"><?= esc($car['status']) ?></p>
                                    <div class="d-flex justify-content-center gap-3">
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editModal<?= $car['id'] ?>">Edit</button>
                                        <a href="<?= site_url('cars/delete/' . $car['id']) ?>" class="btn">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center bg-light text-dark">No cars available for rent.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modals OUTSIDE the background section for z-index fix -->
    <?php if (!empty($cars)): ?>
        <?php foreach ($cars as $car): ?>
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal<?= $car['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $car['id'] ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="<?= site_url('cars/update/' . $car['id']) ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel<?= $car['id'] ?>">Edit Car</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="old_image" value="<?= esc($car['image_path']) ?>">

                                <div class="mb-3">
                                    <label for="car_name">Car Name:</label>
                                    <input type="text" name="car_name" value="<?= esc($car['car_name']) ?>" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="car_price">Car Price:</label>
                                    <input type="number" name="car_price" value="<?= esc($car['car_price']) ?>" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description">Description:</label>
                                    <textarea name="description" class="form-control" required><?= esc($car['description']) ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="startus">Status:</label>
                                    <input type="text" name="status" value="<?= esc($car['status']) ?>" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="image">Image:</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" value="Update Car" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Add Car Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= site_url('cars/store') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Car</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="car_name">Car Name:</label>
                        <input type="text" name="car_name" class="form-control" required><br>

                        <label for="car_price">Car Price:</label>
                        <input type="number" name="car_price" class="form-control" required><br>

                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control" required></textarea><br>

                        <input type="text" name="status" id="status" value="Available" hidden>
                        <label for="image">Image:</label>
                        <input type="file" name="image" class="form-control" required accept="image/*"><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Create Car" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>