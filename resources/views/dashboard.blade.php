<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #343a40;
            padding-top: 20px;
            color: #fff;
        }
        .sidebar a {
            color: #adb5bd;
            padding: 10px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
            color: #fff;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar {
            margin-left: 250px;
            width: calc(100% - 250px);
            background-color: #343a40;
            color: #fff;
        }
        .navbar .nav-item .nav-link {
            color: #fff;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">User Dashboard</h4>
        <a href="#" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="#"><i class="bi bi-person-circle"></i> Profile</a>
        <a href="#"><i class="bi bi-gear"></i> Settings</a>
        <a href="#"><i class="bi bi-envelope"></i> Messages</a>
        <a href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                Logout
            </button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome, User
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content Body -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Welcome, User!</h2>
                    <p>This is your dashboard where you can manage your profile, settings, messages, and more.</p>
                </div>
            </div>
            <!-- Example Cards -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Profile</h5>
                            <p class="card-text">Manage your personal information and settings.</p>
                            <a href="#" class="btn btn-primary">Go to Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Settings</h5>
                            <p class="card-text">Update your account settings and preferences.</p>
                            <a href="#" class="btn btn-primary">Go to Settings</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Messages</h5>
                            <p class="card-text">View and manage your messages.</p>
                            <a href="#" class="btn btn-primary">Go to Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Additional Content -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
