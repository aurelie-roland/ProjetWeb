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
        var valeur1 = $.trim($(this).text());

        if (/Edge\/\d./i.test(navigator.userAgent)) {
            $(this).addClass("borderInput");
        }

        $(this).contentEditable = "true";
        $(this).addClass("borderInput");
        var ident = $(this).attr("id");
        var name = $(this).attr("name");

        $(this).blur(function () {
            
            $(this).removeClass("borderInput");
            var valeur2 = $(this).text();
            valeur2 = $.trim(valeur2);

            if (valeur1 != valeur2)
            {
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
                var retour = $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: "text",
                    url: "../php/ajax/ajaxUpdateProduit.php",
                    success: function (data) {
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
