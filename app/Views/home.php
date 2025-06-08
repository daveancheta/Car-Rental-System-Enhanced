<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CarVibe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />

  <style>
    * {
      box-sizing: border-box;
    }

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
      height: 100vh;
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

    .hero-content {
      position: relative;
      z-index: 2;
      color: white;
      text-align: center;
      top: 50%;
      transform: translateY(-50%);
      padding: 0 1rem;
    }

    .hero-content h1 {
      font-family: 'Bungee Spice', cursive;
      font-size: 3rem;
    }

    .hero-content p {
      font-size: 1.2rem;
      max-width: 600px;
      margin: 1rem auto;
    }

    .hero-content a {
      background-color: rgb(255, 166, 0);
      color: white;
      border: none;
      padding: 0.75rem 2rem;
      font-weight: 600;
      border-radius: 50px;
      margin-top: 1rem;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
    }

    .hero-content a:hover {
      background-color: rgb(255, 144, 0);
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
    }


    .navbar-brand {
      font-family: 'Bungee Spice', cursive;
      font-size: 1.8rem;
      color: purple !important;
    }

    .nav-link {
      font-weight: 600;
      color: white !important;
    }

    .navbar {
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 3;
    }

    @media (max-width: 768px) {
      .hero-content h1 {
        font-size: 2rem;
      }

      .hero-content p {
        font-size: 1rem;
      }
    }
  </style>
</head>

<body>

  <div class="bg-image">
    <div class="overlay"></div>

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

    <div class="hero-content">
      <h1>Welcome to CarVibe</h1>
      <p>Rent your dream car with just a few clicks. Fast, reliable, and stylish rides for every journey.</p>
      <a href="/rent" class="btn mt-3">Explore Cars</a>
    </div>
  </div>
</body>

</html>