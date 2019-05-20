<?php 
if(isset($_POST['OK'])){
    extract($_POST,EXTR_OVERWRITE);
    $log = new ClientDB($cnx);
    $client = $log->addClient($Nom, $Prenom, $Mail, $MDP);
    if(@is_null($client)){
        print "<br/>Données incorrectes";        
    }
    else {      
        print "Vous êtes bien inscrit";
    }
}
?>


<section id="Inscri">
    <fieldset>
        <legend>INSCRIPTION</legend>
        <br>
        <form name="Variable" method="post" action="<?php print $_SERVER['PHP_SELF']; ?>">
            <table>
                <tbody>
                    <tr>
                        <th align="right"><label for="Name">Nom</label></th>
                        <th align="left"><input type="textarea" name="Nom" id="Name"></th>
                    </tr>
                    <tr>
                        <th align="right"><label for="FName">Prénom</label></th>
                        <th align="left"><input type="textarea" name="Prenom" id="FName"></th>
                    </tr>
                    <tr>
                        <th align="right"><label for="Mail">Mail</label></th>
                        <th align="left"><input type="Mail"  name="Mail" id="email"></th>
                    </tr>
                    <tr>
                        <th align="right"><label for="Pass">Mot de passe</label></th>
                        <th align="left"><input type="password"  name="MDP" id="Pass"></th>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Inscription" name="OK"/>
        </form>
    </fieldset>
</section>
