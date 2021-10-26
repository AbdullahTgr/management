$( document ).ready(function() {
    
    "use strict";
    
    var todo = function() { 
        $('.todo-list .todo-item input').click(function() {
        if($(this).is(':checked')) {
            $(this).parent().parent().parent().toggleClass('complete');
        } else {
            $(this).parent().parent().parent().toggleClass('complete');
        }
    });
    
    $('.todo-nav .all-task').click(function() {
        $('.todo-list').removeClass('only-active');
        $('.todo-list').removeClass('only-complete');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });
    
    $('.todo-nav .active-task').click(function() {
        $('.todo-list').removeClass('only-complete');
        $('.todo-list').addClass('only-active');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });
    
    $('.todo-nav .completed-task').click(function() {
        $('.todo-list').removeClass('only-active');
        $('.todo-list').addClass('only-complete');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });
    
    $('#uniform-all-complete input').click(function() {
        if($(this).is(':checked')) {
            $('.todo-item .checker span:not(.checked) input').click();
        } else {
            $('.todo-item .checker span.checked input').click();
        }
    });
    
    $('.remove-todo-item').click(function() {
        $(this).parent().remove();
    });
    };
    
    todo();
    
    $(".add-task").keypress(function (e) {
        if ((e.which == 13)&&(!$(this).val().length == 0)) {
            $('<div class="todo-item"><div class="checker"><span class=""><input type="checkbox"></span></div> <span>' + $(this).val() + '</span> <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="icon-close"></i></a></div>').insertAfter('.todo-list .todo-item:last-child');
            $(this).val('');
        } else if(e.which == 13) {
            alert('Please enter new task');
        }
        $(document).on('.todo-list .todo-item.added input').click(function() {
            if($(this).is(':checked')) {
                $(this).parent().parent().parent().toggleClass('complete');
            } else {
                $(this).parent().parent().parent().toggleClass('complete');
            }
        });
        $('.todo-list .todo-item.added .remove-todo-item').click(function() {
            $(this).parent().remove();
        });
    });


    $(document).on("click",".user_click",function(){
        var userid=$(this).children(".userid").val();
        var username=$(this).children(".username").val();

        $(".box_users").html('<button type="button" class="btn btn-default btn-lg btn3d col-2" ><input type="hidden"  value="'+userid+'" name="userid">'+username+'</button>');

        $(".validate").val("1");
    $(".add-task").fadeIn();

    });
    
    $(document).on("click",".btn3d",function(){
        $(this).remove();
        $(".validate").val("");
    });

    $(document).on("click",".getid",function(){
        var id=$(this).children(".id").val();
        var name=$(this).children(".name").val();

        $(".modaledit_id").val(id);
        $(".modaledit_name").val(name);
        
    });

    $(document).on("click",".del",function(){
        var id=$(this).children(".id").val();
        $(".modaledel_id").val(id);
        
    });

    $(document).on("change",".dist_select",function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id=$(this).val();
           $.ajax({
           type:'GET',
           url:'getexcurr', 
           data:{id:id}, 
           success:function(data){
              $(".excursions_select").html(data);
           }
        });
    }); 


    
    $(document).on("click",".click_sendemail",function(){
        var sendemail=$('.sendemail').val();
        if(sendemail==0){
            $('.sendemail').val(1)
        }else{
            $('.sendemail').val(0)
        }
        
    });
    $(document).on("click",".getmail_modat",function(){
        var mail=$(this).children(".u_mail").val();
        $(".mailmodal").val(mail);
     
    });
    

});