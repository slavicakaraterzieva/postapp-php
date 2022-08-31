$(function(){
//alert("loaded!")
printComment();
function printComment(){
    var post_id = document.getElementById("post_id").value
    $.ajax({
        url:"../../postapp/php/get-comments.php",
        method:"POST",
        data:{post_id:post_id},
        success:function(data){
            //alert(data);
                $('#my-container').html(data);  
        }
    });
};
//end of printComment

    $("#post_comment").on("submit", function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        var sender_name = document.getElementById("comment_name").value;
        var comment_name = document.getElementById("comment_name");
        var comment_email = document.getElementById("comment_email");
        var comment_body = document.getElementById("comment_body");
        $.ajax({
            url:"../../postapp/php/add-comment.php",
            method:"POST",
            data:form_data,
            dataType:"JSON",
            success:function(data){
                //alert(sender_name);
                console.log(data);
                if(data.msg=='success'){
                    $('#comment_notification').html('<h2 class="cool-heading text-success"> ' + sender_name + ' has added comment</h2>');
                    comment_name.value="";
                    comment_email.value="";
                    comment_body.value="";
                    printComment();
                }
                else{ $('#comment_notification').html('<h2 class="cool-heading text-danger">Comment of ' + sender_name + ' has failed to load</h2>');}
            } 
        });
    });
 
});

  function clickReply(clicked_id){ 
       var new_comment_id = document.getElementById("comment_id");
       new_comment_id.value = clicked_id;
       //alert(clicked_id);
       document.getElementById("comment_name").value="";
       document.getElementById("comment_email").value="";
       document.getElementById("comment_body").value="";
       document.getElementById("comment_name").focus();
   }  
  /* function editComment(clicked_id){
    document.getElementById("submit").classList.add("hidden");
       var each_comment = document.getElementsByClassName("edit");
      each_comment.value=clicked_id;
      //alert(each_comment.value);
      var sender_name = document.getElementById("a").innerText;
      //alert(sender_name);
      var comment_body = document.getElementById("p_body").innerText;
      //alert(comment_body);
      document.getElementById("comment_name").value=sender_name;
      //document.getElementById("comment_email").value=comment_email;
      document.getElementById("comment_body").value=comment_body;
      document.getElementById("comment_body").focus();
       each_comment.onclick=switchClass();  
}*/

function switchClass(){ 
    //document.getElementById("submit-edit").classList.remove("hidden");
    //document.getElementById("submit-save").classList.add("hidden");
    //var submit=document.getElementById("submit").innerText;
    //alert(submit);
}

/*   var my_tag = document.getElementsByTagName("my_tag");
var count = my_tag.length;
for(var i = 0; i < count; i++){
 my_tag[i].value;
} */

/* var Myelement = document.querySelector('button[name="reply"]');
console.log(Myelement.value);
Myelement.setAttribute('value','New value');
console.log(Myelement.value); */
/* 
my_edit_input=$('.input_id').attr('id');
//alert(my_edit_input);

var count = each_comment.length;
for(var i = 0; i < count; i++){
 var set_comment=each_comment[i].value;

       if(set_comment===my_edit_input){
          $(".input_id").removeClass("hidden");
          $("#button_save").removeClass("hidden");
       } 
    } */

      /*   if(edit_comment_id.value==my_edit_input){
            each_comment=[edit_comment_id.value];
            each_comment.forEach(function(item) {
            //document.writeln(item);
            item=$(".input_id").removeClass("hidden");
            item=$("#button_save").removeClass("hidden");
         }); 
  }*/