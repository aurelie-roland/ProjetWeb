/*fonctions jquery pour DA */
$(document).ready(function(){
    $('#OK').remove();
    
    $('#triSel').change(function(){
        var param = $(this).attr('name');
        var val =$(this).val();
        var refresh = 'index.php?'+param+'='+val+'&OK=1';
        window.location.href = refresh;
    });
    
    
     $("span[id]").click(function () {
      //Récupération du contenu d'origine de la zone cliquée
        var valeur1 = $.trim($(this).text());

        //s'il fallait tester si on utilise edge :
        if (/Edge\/\d./i.test(navigator.userAgent)) {
            $(this).addClass("borderInput");
        }

        $(this).contentEditable = "true";
        $(this).addClass("borderInput");

       //récupération, pour la zone cliquée, des attributs id et name, pour les envoyer à la requête sql
        var ident = $(this).attr("id");
        var name = $(this).attr("name");

        $(this).blur(function () {
            
            $(this).removeClass("borderInput");
           //récupération de la nouveau contenu du champ qui vient de perdre le focus (blur)
            var valeur2 = $(this).text();
            valeur2 = $.trim(valeur2);

            if (valeur1 != valeur2) // Si on a fait un changement
            {
               //adjonction des paramètres qui accompagnent le nom du fichier appelé
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
                var retour = $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: "text",
                    url: "../php/ajax/ajaxUpdateProduit.php",
                    success: function (data) {
                       //rien de particulier à faire
                        console.log("success");
                    }
                });
                retour.fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            };
        });
    });
});
