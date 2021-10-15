$( document ).ready(function() {
    
    "use strict";
    
$(document).on("click",".delac",function(){
    var id=$(this).children(".deletelog").val();
    $(".modalhref").attr("href","deleteuserlog"+id);
});

});