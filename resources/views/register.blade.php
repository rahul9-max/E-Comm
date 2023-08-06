<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <!-- Bootstrap 4 CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container my-5">
        <h1>Registration Form</h1>

        <form method="POST" action="/register" class="needs-validation" novalidate>
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter your name.
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a password.
                </div>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="">Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
                <div class="invalid-feedback">
                    Please select your gender.
                </div>
            </div>

            <div class="form-group">
                <label for="dob">Date of birth:</label>
                <input type="date" name="dob" id="dob" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter your date of birth.
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        
    </div>
    <!-- Bootstrap 4 JS CDN -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>