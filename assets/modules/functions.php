<?php


function checkUnicityOfUsernameAndEmail($username, $email)
{
    include 'assets/modules/bddsecure.php';
    $sql  = "SELECT * FROM users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($user as $valuecheck)
    {
        if ($username == $valuecheck['username'])
        {
            $errorLogName = '<div style="font-style: italic; font-weight: bold; text-align: center">That username already exists !</div></br>';
            return $errorLogName;
            break;
        }
        if ($email == $valuecheck['email'])
        {
            $errorLogMail = '<div style="font-style: italic; font-weight: bold; text-align: center">That email is already registered !</div></br>';
            return $errorLogMail;
            break;
        }

    }
}

function checkCorrespondanceBetween2Passwords($firstPass, $secondPass)
{
    if ($firstPass != $secondPass)
    {
        return false;
    }
    else
    {
        return true;
    }
}
function check_password($password)
{
    $error = null;
    if (strlen($password) < 8)
    {
        $error .= "Password too short!
       ";
    }
    if (strlen($password) > 20)
    {
        $error .= "Password too long!
       ";
    }
    if (!preg_match("#[0-9]+#", $password))
    {
        $error .= "Password must include at least one number!
       ";
    }
    if (!preg_match("#[a-z]+#", $password))
    {
        $error .= "Password must include at least one letter!
       ";
    }
    if (!preg_match("#[A-Z]+#", $password))
    {
        $error .= "Password must include at least one CAPS!
       ";
    }
    if (!preg_match("#\W+#", $password))
    {
        $error .= "Password must include at least one symbol!
       ";
    }

    if ($error)
    {
        $errorLogPw_2 = '<div style="font-style: italic; font-weight: bold; text-align: center">Password validation failure ' . $error . '</div></br>';
        return $errorLogPw_2;
    }
    else
    {
        return true;
    }
}



?>