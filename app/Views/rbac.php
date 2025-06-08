<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CarVibe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    .bg-image {
      background-image: url('https://images.ctfassets.net/r7p9m4b1iqbp/B8znZdNyICw2UYMAguKk4/01e2c5f7848a87722d659d7e60447d36/Sky-G-Norway-23.jpg?w=1200&fm=webp&q=90');
      background-size: cover;
      background-position: center;
      height: 100vh;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
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

    .content {
      position: relative;
      z-index: 2;
      width: 100%;
      padding: 20px;
    }

    .card-option {
      color: white;
      padding: 40px 25px;
      text-align: center;
      border-radius: 20px;
      transition: all 0.3s ease-in-out;
      backdrop-filter: blur(12px);
      background: rgba(255, 255, 255, 0.1);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      cursor: pointer;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .card-option a {
      color: inherit;
      text-decoration: none;
      display: block;
    }

    .card-option svg {
      margin-bottom: 15px;
      transition: transform 0.3s ease-in-out;
    }

    .card-option:hover {
      transform: translateY(-8px);
      background-color: rgba(255, 255, 255, 0.15);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    .card-option:hover svg {
      transform: scale(1.1);
    }

    .card-client {
      border-left: 5px solid #17a2b8;
    }

    .card-admin {
      border-left: 5px solid #ffc107;
    }

    .card-option h5 {
      margin-top: 10px;
      font-size: 1.25rem;
      letter-spacing: 0.5px;
    }

    @media (max-width: 575.98px) {
      .card-option {
        margin-bottom: 15px;
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="bg-image">
    <div class="overlay"></div>
    <div class="container content">
      <div class="row justify-content-center g-4">
        <div class="col-10 col-sm-6 col-md-4 col-lg-3">
          <div class="card-option card-client">
            <a href="/login">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
              <h5>Client</h5>
            </a>
          </div>
        </div>
        <div class="col-10 col-sm-6 col-md-4 col-lg-3">
          <div class="card-option card-admin">
            <a href="/admin">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                <path d="M5.5 9a1.5 1.5 0 1 1 3 0v1a1.5 1.5 0 1 1-3 0V9z"/>
                <path d="M8 0c-.69 0-1.187.119-1.59.266-.404.147-.75.334-1.096.547C4.437 1.166 4 1.556 4 2c0 .663.42 1.187.99 1.627.57.44 1.23.827 1.842 1.186C7.836 5.173 8 5.463 8 5.75v2.242c.528.244 1 .635 1 1.258v1c0 .396-.164.76-.428 1.018C8.737 11.888 8.382 12 8 12s-.737-.112-1.072-.232A1.462 1.462 0 0 1 6.5 10.25v-1c0-.623.472-1.014 1-1.258V5.75c0-.287.164-.577.168-.937C8.74 4.454 9.4 4.067 9.97 3.627 10.54 3.187 10.96 2.663 10.96 2c0-.444-.437-.834-1.314-1.187A6.688 6.688 0 0 0 8 0z"/>
              </svg>
              <h5>Admin</h5>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
