/*fonctions jquery pour DA */
$(document).ready(function(){
    $('#OK').remove();
    
    $('#tri').change(function(){
        var param = $(this).attr('name');
        var val =$(this).val();
        var refresh = 'index.php?'+param+'='+val+'&submit_choix_type=1';
        window.location.href = refresh;
    });
});
