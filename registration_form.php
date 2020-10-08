<?php

// -------------------------------->> DB CONFIG
require_once "config/configPDO.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOSTEL MANAGEMENT SYSTEM | REGISTER</title>

	<!-- Include HeaderScripts -->
	<?php include_once "includes/headerScripts.php";?>


</head>

<body>

<?php

try {

    if (isset($_POST["register-user"])) {

        if (isset($_POST["terms"])) {

            $userName = htmlspecialchars($_POST["userName"]);
            $firstName = htmlspecialchars($_POST["firstName"]);
            $lastName = htmlspecialchars($_POST["lastName"]);
            $password = htmlspecialchars($_POST["password"]);
            $confirmPassword = htmlspecialchars($_POST["confirmPassword"]);
            $gender = htmlspecialchars($_POST["gender"]);

            # Hash Password
            $hashPass = password_hash($password, PASSWORD_BCRYPT);
            $hashConPass = password_hash($confirm_password, PASSWORD_BCRYPT);

            # Sql Query
            $sql = "INSERT INTO registered_users (userName, firstName, lastName, password, email, gender) VALUES
		(:userName, :firstName, :lastName, :hashPass, :email, :gender)";

            # Prepare Query
            $result = $conn->prepare($sql);

            # Binding Value
            $result->bindValue(":userName", $userName);
            $result->bindValue(":firstName", $firstName);
            $result->bindValue(":lastName", $lastName);
            $result->bindValue(":hashPass", $hashPass);
            $result->bindValue(":email", $email);
            $result->bindValue(":gender", $gender);

            # Execute Query
            $result->execute();

            if ($result) {
                echo "<script>Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'You have registered successfully!',
				})</script>";

            } else {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'We failed to register you!',
                })</script>";
            }

        } else {
            echo "<script>Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'We failed to register you!',
                })</script>";

        }

    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}

?>

	<!-- Include Navbar -->
	<?php include_once "includes/authNavbar.php";?>


	<div class="container my-5">
		<div class="row">

			<div class="col-md-6 offset-md-3">

				<h3 class="font-time  text-center text-uppercase">Register Here</h3>

				<form action="" method="post" id="userRegisterForm">

				<div class="form-group">
					<label for="userName">Username</label>
					<input type="text" name="userName" id="userName" class="form-control"
						placeholder="Enter Your Username">
				</div>

				<div class="form-group">
					<label for="userEmail">Email</label>
					<input type="email" name="userEmail" id="userEmail" class="form-control"
						placeholder="Enter Your Username">
				</div>


				<div class="form-group">
					<label for="firstName">First Name</label>
					<input type="text" name="firstName" id="firstName" class="form-control"
						placeholder="Enter Your Username">
				</div>

				<div class="form-group">
					<label for="lastName">Last Name</label>
					<input type="text" name="lastName" id="lastName" class="form-control"
						placeholder="Enter Your Username" aria-describedby="helpId">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control"
						placeholder="Enter Your Username" aria-describedby="helpId">
				</div>

				<div class="form-group">
					<label for="confirmPassword">Confirm Password</label>
					<input type="password" name="confirmPassword" id="confirmPassword" class="form-control"
						placeholder="Enter Your Username" aria-describedby="helpId">
				</div>



				<div class="form-group">
					<label for="gender">Gender</label>

					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="gender" id="gender" value="Male">
							Male
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="gender" id="gender" value="Female">
							Female
						</label>
					</div>

				</div>


				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" name="terms" id="terms" value="checkedValue">
						I accept Terms and Conditions
					</label>
				</div>

				<button type="submit" name="register-user" id="register-user"
					class="btn btn-primary mt-3">Submit</button>

					</form>


			</div>
		</div>
	</div>

	<!-- Include FooterScripts -->
	<?php include_once "includes/footerScripts.php";?>

</body>

</html>