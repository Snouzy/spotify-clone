<?php
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");
    $account = new Account($con);
    include("includes/handlers/register-handler.php");
    include("/includes/handlers/register-login.php");

    /**
     * echo the $_POST[$name] if it exists (useful to remember the value of the form)
     */
    if(isset($_POST)){
        echo '<pre>' . print_r($_POST, 1) . '</pre>';
    }
    function getPostValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }

?>

<html>
<head>
	<title>Welcome to Slotify!</title>
</head>
<body>

	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account</h2>
			<p>
				<label for="loginUsername">Username</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" required>
			</p>
			<p>
				<label for="loginPassword">Password</label>
				<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
			</p>

			<button type="submit" name="loginButton">LOG IN</button>
			
		</form>



		<form id="registerForm" action="register.php" method="POST">
			<h2>Create your free account</h2>
			<p>
                <?= $account->getError(Constants::$usernameCharacters) ?>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="e.g. bartSimpson" value="<?php getPostValue("username") ?>"required>
			</p>
            
			<p>
                <?= $account->getError(Constants::$firstNameCharacters) ?>
				<label for="firstName">First name</label>
				<input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" value="<?php getPostValue("firstName") ?>" required>
			</p>

			<p>
                <?= $account->getError(Constants::$lastNameCharacters) ?>
				<label for="lastName">Last name</label>
				<input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" value="<?php getPostValue("lastName") ?>" required>
			</p>

			<p>
                <?= $account->getError(Constants::$emailsDoNotMatch) ?>
                <?= $account->getError(Constants::$emailInvalid) ?>
				<label for="email">Email</label>
				<input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" value="<?php getPostValue("email") ?>" required>
			</p>

			<p>
				<label for="email2">Confirm email</label>
				<input id="email2" name="email2" type="email" placeholder="e.g. bart@gmail.com" value="<?php getPostValue("email2") ?>" required>
			</p>

			<p>
                <?= $account->getError(Constants::$passwordDoNotMatch) ?>
                <?= $account->getError(Constants::$passwordNotAlphanumeric) ?>
                <?= $account->getError(Constants::$passwordCharacters) ?>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="Your password" required>
			</p>

			<p>
				<label for="password2">Confirm password</label>
				<input id="password2" name="password2" type="password" placeholder="Your password" required>
			</p>

			<button type="submit" name="registerButton">SIGN UP</button>
			
		</form>


	</div>

</body>
</html>