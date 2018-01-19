// EN CHANTIER !!!!!!!!!!!!!!!!!!!!!!!

//cliquer sur les smileys pour sélectionner
$('#happy').on('click', function(){
     $('radios-0').attr("checked",true);
     $('#happy').css('width','85%');
     $('#middle').css('width','100%');
     $('#unhappy').css('width','100%'); 
});

$('#middle').on('click', function(){
    $('radios-1').attr("checked",true);
    $('#happy').css('width','100%');
    $('#middle').css('width','85%');
    $('#unhappy').css('width','100%');
});
 
$('#unhappy').on('click', function(){
    $('radios-2').attr("checked",true);
    $('#happy').css('width','100%');
    $('#middle').css('width','100%');
    $('#unhappy').css('width','85%');
});

//cookie id


/* faire disparaître le formulaire au click "envoyer"
$(document).ready(function(){
    $('#button').click(function(){
        $('.form-horizontal').hide();
    });
});

*/

