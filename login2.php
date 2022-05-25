<?php
session_start();
require_once 'db.php';
$_SESSION['connect'] = 'done';
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = htmlspecialchars(strtolower($_POST['email']));
    $password = htmlspecialchars($_POST['password']);

    $stmt = $bdd->prepare('SELECT * FROM enseignant  WHERE emailusthb = ?');
    $stmt->execute(array($email));
    $data = $stmt->fetch();
    $row = $stmt->rowCount();
    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($password === $data['password']) {
                header('Location: acceuil_ens.php');

                } else {echo'Notyet';
                    $_SESSION['connect'] = 'notyet';
                    
                }
            } else {echo'cpass';
                $_SESSION['connect'] = 'correct_password';
                
            }
        } else {echo'valmail';
            $_SESSION['connect'] = 'valid_email';
            
        }
    } else {echo'cmail';
        $_SESSION['connect'] = 'correct_email';
        
    }
    
}
