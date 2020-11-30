<?php
include 'assets/modules/functions.php';
require 'assets/modules/bddsecure.php';
session_start();


$errorLogPw = "<div></div>";
$validation = true;
    if(isset($_SESSION['user_id']) || isset($_SESSION['logged_in'])){
    header('Location: index.php');
    exit;
}

    if(isset($_POST['register'])) {

        $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
        $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
        $email = !empty($_POST['email']) ? trim($_POST['email']) : null;

        $birthday = !empty($_POST['birthday']) ? trim($_POST['birthday']) : null;

        $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
        $token = bin2hex(random_bytes(50));

        $unicity = checkUnicityOfUsernameAndEmail($username, $email);
        if (isset($unicity)) {
            $validation = false;
        }

        $pwd_corresp = checkCorrespondanceBetween2Passwords($_POST['password'], $_POST['confirm_password']);
        if ($pwd_corresp === false) {
            $errorLogPw = '<div style="font-style: italic; font-weight: bold; text-align: center">The 2 passwords are different</div></br>';
            $validation = false;
        }

        $response_pwd = check_password($password);

        if ($response_pwd === true && $validation === true) {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

            $sql = "INSERT INTO users (username, name, password, email, birthday, token) VALUES (:username, :name, :password, :email, :birthday ,:token)";
            $stmt = $pdo->prepare($sql);

            //Bind our variables.
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':birthday', $birthday);
            $stmt->bindValue(':password', $passwordHash);
            $stmt->bindValue(':token', $token);

            $result = $stmt->execute();

            print_r($result);
            header('Location: index.php');

        }

        else{
            $errorRegister = 'ERROR';
    }

}

?>

<form method="POST" action="register.php" >


    <input type="text"  name="username" value="" placeholder="Choose your username" requird>
    <input type="text"  name="name" placeholder="Name" requird>
    <input type="email" name="email" placeholder="Email" requird>
    <input type="password" name="password" placeholder="Enter your password" requird>

    <input type="password" name="confirm_password" placeholder="Confirm your password" requird>

    <input type="date" name="birthday"">


    <input type="submit" class="acceptBtn" name="register" value="Log In"<br>
    <input


</form>

</div>

</div>
