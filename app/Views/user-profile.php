<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding-left: 250px;
            /* Reserve space for sidebar */
            transition: padding-left 0.3s ease;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 60px;
            transition: transform 0.3s ease;
            z-index: 1050;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            font-weight: 500;
        }

        .sidebar a:hover {
            background-color: rgb(255, 166, 0);
            color: black;
        }

        .sidebar.hidden {
            transform: translateX(-250px);
        }

        .main-content {
            padding: 40px;
        }

        .table {
            margin-top: 30px;
        }

        .btn-logout {
            background-color: rgb(255, 166, 0);
            color: white;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-logout:hover {
            background-color: rgb(204, 133, 0);
        }

        /* Navbar at the top only on small screens */
        .mobile-navbar {
            display: none;
        }

        .navbar-brand,
        .brand {
            font-family: 'Bungee Spice', cursive;
            font-size: 1.8rem;
            color: purple !important;
        }

        @media (max-width: 768px) {
            body {
                padding-left: 0;
            }

            .sidebar {
                transform: translateX(-250px);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .mobile-navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #343a40;
                color: white;
                padding: 10px 20px;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1060;
            }

            .mobile-navbar .brand {
                font-weight: bold;
                font-size: 18px;
            }

            .mobile-navbar button {
                background: none;
                border: none;
                color: white;
                font-size: 24px;
            }

            .main-content {
                margin-top: 60px;
            }
        }
    </style>
</head>

<body>

    <!-- Mobile Navbar -->
    <div class="mobile-navbar">
        <div class="brand">CarVibe</div>
        <button id="toggleSidebar">&#9776;</button>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="navbar-brand d-flex justify-content-center" href="#">Carvibe</div>
        <a href="/home">Home</a>
        <a href="/about">About</a>
        <a href="/services">Services</a>
        <a href="#">Profile</a>
    </div>

    <!-- Main Content -->
    <div class="main-content container">
        <h1>Account Information</h1>
        <p><strong>Full Name:</strong> <?= $fullname ?></p>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>Address:</strong> <?= $address ?></p>
        <p><strong>Phone Number:</strong> <?= $phone ?></p>

        <h2 class="mt-5">Your Rented Cars</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Car Model</th>
                    <th>Rental Duration (Days)</th>
                    <th>Rental Start Date</th>

                </tr>
            </thead>
            <tbody>
                <?php if (!empty($car_name)): ?>
                    <?php foreach ($car_name as $car): ?>
                        <tr>
                            <td><?= htmlspecialchars($car['car_name'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($car['rented_days'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($car['date'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">No rented cars found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a href="/logout" class="btn-logout mt-4 d-inline-block">Logout</a>
    </div>

    <script>
        document.getElementById("toggleSidebar").addEventListener("click", function() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("active");
        });
    </script>
</body>

</html>