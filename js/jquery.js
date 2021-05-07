$(document).ready(function() {

    var total = $('#cart').find('#totalscore').find('span').html();
        if(total > 0){
             $('#cart').css('display' , 'block');
        }else{
             $('#cart').css('display' , 'none');
        }
   
    


});