
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
        $('#button').on('click', function(e){
            e.preventDefault();
             console.log("toto");
            $formation=parseInt($_POST['#selectbasic']); 
               
            
            $smiley=parseInt($_POST['.smiley']); 
                   
            $textarea=$_POST['#textarea'];

            $error=0;
           
            if ($formation==0){
                $error+=1;
                $messError.css('visibility', 'visible');
            }else{
                $error+=0;
                $messError.css('visibility', 'hidden');
            }
        
        /*
            if ($smiley==0){

                $error+=1;
            }else{
                $error+=0;
            }

            if (($smiley==2 && $textarea=="") || ($smiley==3 && $textarea=="")){
               
                $error+=1;
            }else{
                $error+=0;
            }
*/
        });
