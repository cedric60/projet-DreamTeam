
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


  
    
    //vérif formulaire fontcion blabla

    $('#errorformation').css('visibility','hidden');
    $('#errorsmiley').css('visibility','hidden');
    $('#errortext').css('visibility','hidden');


        $('#button').on('click', function(e){
         
            e.preventDefault();
    
            $formation=$('#selectbasic').val(); 
            
            $smiley=parseInt($('input:checked').val()); 
                   
            $textarea=$('#textarea').val();

            $error=0;

           
            if ($formation==""){
                $error++;
                $('#errorformation').css('visibility', 'visible');
                
            }else{
                $('#errorformation').css('visibility','hidden');
            }
        
            if (isNaN($smiley)) { 
                $error++;
                $('#errorsmiley').css('visibility', 'visible');
                
            }else{
                $('#errorsmiley').css('visibility','hidden');
            }

            if (($smiley==2 && $textarea=="") || ($smiley==3 && $textarea=="")){
                $error++;
                $('#errortext').css('visibility','visible');
                
            }else{
                $('#errortext').css('visibility','hidden');
            }

            if ($error==0){
                $('#formSmiley').submit();
            }
        });
