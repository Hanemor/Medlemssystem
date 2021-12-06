<?php
require 'site/lib/medlem.class.php';

session_start();

if(!isset($_SESSION['bruker']['innlogget']) ||
    $_SESSION['bruker']['innlogget'] !== true) {
    header("Location: site/funk/login.funk.php");
    exit();
}

 $obj = unserialize($_SESSION['bruker']['medlem']);
 $arr = $obj->getArr(); 
?>




<html>
    <header>
        <h2>Velkommen <?php echo $arr['fornavn']?>!</h2>
    </header>

    <body>
        <p>
            <a href = "site/funk/visProfil.funk.php">
                Min profil            </a><br><br>
            <a href = "site/funk/hentAlle.funk.php">
                Vis alle medlemmer     </a><br>
            <a href = "site/funk/hentMedFilter.funk.php">
                Filtrer medlemmer </a><br><br>   
             
            
            <?php
                if(in_array("admin", $arr['roller'])){
                    echo '<a href = "site/funk/nyttMedlem.funk.php">
                            Nytt medlem </a><br> 
                          <a href = "site/funk/velgEndring.funk.php">
                            Endre Medlem </a><br><br>
                          <a href = "site/funk/aktivitetsPåmelding.funk.php">
                            Vis aktiviteter og påmeldte</a><br>
                          <a href = "site/funk/nyAktivitet.funk.php">
                            Legg til aktiviteter </a><br>';
                }       
            ?>
        <p>
            <a href = "site/funk/loggUt.funk.php">Logg Ut </a><br><br>
        </p>
    </body>

</html>