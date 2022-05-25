
<?php 
// ATTENTION !!! ne pass toucher à ce bout de code //
    session_start();              //ouverture de la séance.
    require_once 'db.php';       //appel de la database

    if(!empty($_POST['emailusthb']) && !empty($_POST['password']))    //si les deux champs sont remplis
    {
        $emailusthb = ($_POST['emailusthb']);
        $password = ($_POST['password']);

        $stmt = $bdd->prepare('SELECT * FROM enseignant  WHERE emailusthb = ?');  //le prepare prépare une requête à l'exécution et retourne un objet PDOStatement qui est $stmt dans ce cas.
        $stmt->execute(array($emailusthb));               //executer le pdo statement qui est stmt
        $data = $stmt->fetch();                //$data est de type Array et contient le résultat du fetch
        $row = $stmt->rowCount();         // rowCount retourne le nombre de lignes affectées par le dernier appel à la fonction PDOStatement::execute()


        if($row == 1)                //si 1 ligne est affecté c.à.d l'émail est selectionné et donc existe dans la base de donnée
        {
            if(filter_var($emailusthb, FILTER_VALIDATE_EMAIL))         //vérifier qque c'est une adresse valide.
            {
                
                if($password === $data['password'])       //si le mot de passe est bon.
                {
                   //création des variables de session.
                    $_SESSION['user'] = $data['emailusthb'];
                    header('Location: accueil_ens.php');          //aller vers l'espace membre
                    die();
                }else{ header('Location: login5.php?login_err=password'); die(); } //sinon, une erreur dans le mot de passe.
            }else{ header('Location: login5.php?login_err=emailusthb'); die(); }    //sinon, une erreur dans l'email et die.
        }else{ header('Location: login5.php?login_err=nonexistant'); die(); }   //sinon, le user n'existe pas
        //à chaque fois redériger vers la page index.
    }
    