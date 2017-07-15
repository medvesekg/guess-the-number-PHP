<?php
    session_start();

 



    
    if(isset($_POST["izberi"])) {
       $_SESSION['random'] = rand(1,100);
    }
    if(!isset($_SESSION['counter'])) {
       $_SESSION['counter'] = 0;
    }

    if(isset($_POST['submit']) && $_POST['number'] != "" && isset($_SESSION['random']) && is_numeric($_POST['number'])) { 
            $_SESSION['counter']++;
    }
    
    

  
   
    
    function rezultat() {
        if(!isset($_SESSION['random'])) {
                echo "Najprej pritisni 'Izberi številko'";
        }
        elseif(isset($_POST['izberi']) && !isset($_POST['number'])) {
                echo "Izbral sem si številko med 1 in 100. Poskusi jo uganiti.";
        }
        elseif(isset($_POST['number'])) {
            if($_POST['number'] == "") {
                echo "Vpiši številko.";
            } 
            elseif(!is_numeric($_POST['number'])) {
                 echo "Vpišeš lahko samo cela števila.";
             }
            elseif($_POST['number'] > $_SESSION['random'] && $_POST['number'] <= ($_SESSION['random'] + 10)) {
                echo "Tvoja številka je višja, ampak si blizu.";
            }
            elseif($_POST['number'] < $_SESSION['random'] && $_POST['number'] >= ($_SESSION['random'] - 10)) {
                echo "Tvoja številka je nižja, ampak si blizu.";
            }
            elseif($_POST['number'] > ($_SESSION['random'] + 40)) {
                echo "Tvoja številka je veliko previsoka.";
            }
            elseif($_POST['number'] < ($_SESSION['random'] - 40)) {
                echo "Tvoja številka je mnogo prenizka.";
            } 
            elseif($_POST['number'] < $_SESSION['random']) {
                echo "Tvoja številka je nižja.";
            } 
            elseif($_POST['number'] > $_SESSION['random']) {
                echo "Tvoja številka je višja.";
            } 
            elseif($_POST['number'] == $_SESSION['random'] && $_SESSION['counter'] == 1) {
                echo "FIRST TRY!!! Uganil si v prvo!";
                unset($_SESSION['random'], $_SESSION['counter']);
            }
            elseif($_POST['number'] == $_SESSION['random'] && $_SESSION['counter'] == 2) {
                echo "Uganil si. Potreboval si {$_SESSION['counter']} poskusa.";
                unset($_SESSION['random'], $_SESSION['counter']);
            }
            elseif($_POST['number'] == $_SESSION['random'] && $_SESSION['counter'] == 3) {
                echo "Uganil si. Potreboval si {$_SESSION['counter']} poskuse.";
                unset($_SESSION['random'], $_SESSION['counter']);
            }
            elseif($_POST['number'] == $_SESSION['random'] && $_SESSION['counter'] == 4) {
                echo "Uganil si. Potreboval si {$_SESSION['counter']} poskuse.";
                unset($_SESSION['random'], $_SESSION['counter']);
            }
            elseif($_POST['number'] == $_SESSION['random'] && $_SESSION['counter'] > 4) {
                echo "Uganil si. Potreboval si {$_SESSION['counter']} poskusov.";
                unset($_SESSION['random'], $_SESSION['counter']);
            }
        }
    }
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ugani Številko</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        
        <form method="post">
            <input type="submit" name="izberi" value="Izberi številko" class="button button-1">
        </form>
        
       
        
        <form method="post">
            <div class="area">
                <input type="text" name="number" class="field" placeholder="<?php rezultat(); ?>">
                <br>
                <input type="submit" name="submit" value="Ugibaj" class="button">
            </div>
           
        </form>
        
    </body>
</html>

<?php
    
?>