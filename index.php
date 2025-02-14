<?php 
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h2>Contact Us</h2>

            <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> Please fill out all fields correctly.
                </div>
            <?php } ?>

            <form action="Scripts/add.php" method="POST" autocomplete="off">
                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control <?php echo (isset($_GET['mess']) && $_GET['mess'] == 'error') ? 'is-invalid' : ''; ?>" required autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control <?php echo (isset($_GET['mess']) && $_GET['mess'] == 'error') ? 'is-invalid' : ''; ?>" required autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

        <hr class="my-5">

        <h3>Submissions</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $usersList = $conn->query("SELECT * FROM submissions ORDER BY id DESC");
                $counter = 1;
                while($user = $usersList->fetch(PDO::FETCH_ASSOC)) { 
                ?>
                    <tr>
                        <th scope="row"><?php echo $counter++; ?></th>
                        <td><?php echo $user['fname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>