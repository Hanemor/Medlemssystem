



<!doctype html>
<html>
    <body>
        <p>
            <a href = "forside.inc.php">Tilbake til forsiden </a>
            <br>
        <p>        
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="Kontigentstatus">Kontigentstatus</label><br>
            <select name="Kontigentstatus">
                <option value="alle" <?php if ((isset($_POST["Kontigentstatus"]) && 
                        str_contains($_POST["Kontigentstatus"], "alle"))){
                            echo " selected";}?>>Vis alle</option>

                <option value="betalt" <?php if ((isset($_POST["Kontigentstatus"]) && 
                        str_contains($_POST["Kontigentstatus"], "betalt"))){
                            echo " selected";}?>>Betalt</option>

                <option value="ikkebetalt" <?php if ((isset($_POST["Kontigentstatus"]) && 
                        str_contains($_POST["Kontigentstatus"], "ikkebetalt"))){
                            echo " selected";}?>>Ikke betalt</option>
            </select>
            <p>
        
            <label for="rolle">Rolle</label><br>
                <select name="rolle">       
                    <option value="alle" <?php if ((isset($_POST["rolle"]) && 
                        str_contains($_POST["rolle"], "alle"))){
                            echo " selected";}?>>Vis alle</option>

                    <option value="Admin"   <?php if ((isset($_POST["rolle"]) && 
                        str_contains($_POST["rolle"], "Admin"))){
                            echo "selected";}?>>Admin</option>
                    
                    <option value="Leder"   <?php if ((isset($_POST["rolle"]) && 
                        str_contains($_POST["rolle"], "Leder"))){
                            echo "selected";}?>>Leder</option>
                    
                    <option value="Medlem"  <?php if ((isset($_POST["rolle"]) && 
                        str_contains($_POST["rolle"], "Medlem"))){
                            echo "selected";}?>>Medlem</option>
            </select>

            <p>

            <label for="interesse">Interesse</label><br>
                <select name="interesse">       
                    <option value="alle" <?php if ((isset($_POST["interesse"]) && 
                        str_contains($_POST["interesse"], "alle"))){
                            echo " selected";}?>>Vis alle</option>

                    <option value="Fotball"   <?php if ((isset($_POST["interesse"]) && 
                        str_contains($_POST["interesse"], "Fotball"))){
                            echo "selected";}?>>Fotball</option>
                    
                    <option value="Dart"   <?php if ((isset($_POST["interesse"]) && 
                        str_contains($_POST["interesse"], "Dart"))){
                            echo "selected";}?>>Dart</option>
                    
                    <option value="Biljard"  <?php if ((isset($_POST["interesse"]) && 
                        str_contains($_POST["interesse"], "Biljard"))){
                            echo "selected";}?>>Biljard</option>
                    <option value="Dans"  <?php if ((isset($_POST["interesse"]) && 
                        str_contains($_POST["interesse"], "Dans"))){
                            echo "selected";}?>>Dans</option>
            </select>

            <p>

            <label for="aktivitet">Aktivitet</label><br>
                <select name="aktivitet">       
                    <option value="alle" 
                    <?php if ((isset($_POST["interesse"]) && 
                        str_contains($_POST["aktivitet"], "alle"))){
                        echo " selected";
                        }?>>Vis alle</option>


                    <?php  
                    $a_query = "SELECT id AS ID, navn AS Navn FROM aktiviteter";
                    
                    $con = dbConnect();
                    $result = mysqli_query($con, $a_query);    
                    $rader = mysqli_fetch_all($result, MYSQLI_ASSOC);   //Henter passord om 

                    echo "<br><pre>";
                    print_r($rader);
                    echo "<br></pre>";
                    
                    foreach($rader as $rad){
                        echo '<option value=' . $rad['ID'] . ' '; 
                        if (isset($_POST["aktivitet"]) && 
                            str_contains($_POST["aktivitet"], $rad['ID'])){
                        echo "selected ";}
                        echo '>' . $rad['Navn'] . '</option>';
                    }

                    mysqli_free_result($result);
                    ?>
                </select>

                    
                    
            </select>
            
        
        <p>               <!––"send" knapp -->
            <button type="submit" name="contact-send">Filtrer</button>   
        </form>
        

        <p>
            <br><b>Viser aktuelle medlemmer:</b>
        
        <p>
            <table border=1>
                <tr>
                <?php if(!empty($medlemmer)):?>
                <?php foreach ($medlemmer[0] as $navn => $verdi){echo "<td><b>" . $navn . "</b></td>";}?>

                <?php foreach($medlemmer as $medlem):?>
                    <tr><?php foreach ($medlem as $navn => $verdi){

                        if ($navn == "kjonn"){              //Endrer fra boolsk verdi
                            switch ($verdi){
                                case 0: $val = "Kvinne";         break;
                                case 1: $val = "Mann";           break;
                            }
                        }
                        elseif ($navn == "kontigentstatus"){
                            switch ($verdi){
                                case 0: $val = "Ikke Betalt";    break;
                                case 1: $val = "Betalt";         break;
                            }
                        }
                        else{
                            $val = $verdi;                 //Legger verdi i $val
                        }
                        
                        echo "<td>" . $val . "</td>";}      //Utskrift i rute
                        ?>

                <?php   endforeach; endif; ?>
            
                </tr>
            
            </table> 
        </p>
    </body>
</html>