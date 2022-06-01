<?php
// Include loginUser file
require_once "dbLogin.php";

// Initialize form variables
$role = $email = $name = $password = $confirm_password = "";
$email_err = $name_err = $password_err = $confirm_password_err = "";

// Process data from the form
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate email
    if(empty($_POST["email"])){
        $email_err = "Please enter an email address.";
    } else{
        // Prepare the query
        $sql = "SELECT id FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind the variables to prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set the email
            $param_email = trim($_POST["email"]);

            // Execute the statement
            if(mysqli_stmt_execute($stmt)){
                // Store the result
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "An account with the email already exists.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Something went wrong, please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    // Get the role
    $role = trim($_POST["role"]);


    // Validate the name
    if (empty($_POST["name"])) {
        $name_err = "Please enter a name.";
    } else{
        $name = trim($_POST["name"]);
    }

    // Validate the password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password!";
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Password must have at least 8 characters!";
    } else{
        $password = trim($_POST["password"]);
    }

    // Re-enter the password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password!";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "The passwords did not match, please double check!";
        }
    }

    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err)){

        // sql to insert the new user
        $sql = "INSERT INTO users (email, password, name, role) VALUES (?, ?, ?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind the variables to prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_password, $param_name, $param_role);

            // Set Role
            $param_role = $role;

            // Set Email
            $param_email = $email;

            // Create a hashed password before storing in DB
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            // Set the name
            $param_name = $name;

            // Execute the statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: Login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        //Close statement
        mysqli_stmt_close($stmt);
    }

    //Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Profile Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">

</head>
<body background="https://store-images.s-microsoft.com/image/apps.46003.14259451864568504.ad5e5d07-0fbb-46ed-b9b6-a1b781645691.2ebcfa4e-172c-43d3-bf01-2d9a2a94e897?mode=scale&q=90&h=1080&w=1920">

<div class="wrapper">
    <h2>Sign up</h2>
    <p>Please fill this form to create an account</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>User Type</label>
            <select name="role" id="role" class="form-control">
                <option value="Student">Student</option>
                <option value="Recruiter">Recruiter</option>
            </select>
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
            <label>Your Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
            <span class="help-block"><?php echo $name_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Register">
            <input type="reset" class="btn btn-default" value="Reset">
        </div>
        <p>Already have an account? <a href="Login.php">Login here</a>.</p>
    </form>
</div>

</body>
</html>