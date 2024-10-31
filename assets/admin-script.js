

function Rexp_add_list_button()
{
 var list_title=document.getElementById("new_list").value;
 var uid=document.getElementById("list_uid").value;

 if(list_title.length >= 1){
   jQuery.ajax
 ({
  type:'post',
  url:Rexp_adminajax.ajaxurl,
  data:{
   action:'Rexp_add_list',
   list_title_val:list_title,
   uid_val:uid,
  },
  success:function(response) {
   if(response!="")

   {
    document.getElementById("new_list").value="";
    document.getElementById("list_comment").innerHTML="Loading Edit Page";
    window.location.href = "admin.php?page=rank-expert-edit-list&edit="+response;
   }
   
   else{

   } 
}
});
}
}


function Rexp_add_item_button()
{
  var list_id=document.getElementById("new_list_id").value;
  var no=document.getElementById("new_no").value;
  var item_post_id=document.getElementById("new_item_post_id").value;

 if(item_post_id.length >= 1){
  jQuery.ajax
  ({
   type:'post',
   url:Rexp_adminajax.ajaxurl,
   data:{
    action:'Rexp_add_item',
    list_id_val:list_id,
    item_post_id_val:item_post_id,
   },
   success:function(response) {
    if(response!="")
    {
      var post_return=response;
      const postArray = post_return.split("#@$");
      var title = postArray[0];
      var content = postArray[1];
      var url = postArray[2];
      var item_id = postArray[3];

        var row ="<br/><div class='embox'id='item_box"+item_id+"'>"+
        "<div class='Rexp-q'>"+no+".&nbsp;&nbsp;&nbsp;<a style='color:#393939'>"+title+"</a>&nbsp;&nbsp;</div>"+
        "<div class='Rexp-dangerBtn'>"+
        "<a href='#TB_inline?width=600&height=550&inlineId=delete_item_popup' title='Delete Item' class='thickbox' onclick='Rexp_delete_item_button("+item_id+");'>"+
        "<button class='Rexp-btn Rexp-btn_danger Rexp-tooltip' >"+
        "<span class='Rexp-tooltiptext Rexp-tooltip-bottom'>Delete Item</span><span class='dashicons dashicons-trash'></span>"+
        "<i class='Rexp-icon-trash'></i></button></a></div>"+
        "<br/><br/><br/>"+
        "<div style='width:30%;padding:0 10px 0 0;float:left;'>"+
        "<img src='"+url+"' /></div>"+
        "<div style='width:60%;padding:0 10px 0 0;float:left;'>"+
        "<a class='row-title'>"+content+"</a></div>"+
        "<div style='clear:both;'></div></div>"
 
         jQuery("#allcontents").append(row);
 
         newno=parseFloat(no)+1;
         document.getElementById("new_no").value=newno;
         document.getElementById("new_item_post_id").value="";
         document.getElementById("inputcheck").innerHTML="";
    }
    else{
      document.getElementById("new_item_post_id").value="";
      document.getElementById("inputcheck").innerHTML="Wrong Post ID";
      
 } }
});
 }
 else{
  
 } 
}


function Rexp_delete_list_button(id)
{
  document.getElementById("delete_list_button").innerHTML="<div class='Rexp-row' onclick='Rexp_delete_confirm_list_button("+id+");'><button class='Rexp-btn Rexp-btn_danger Rexp-btn_ls Rexp-add_answer'>Confirm Delete</button></div>  ";

}

function Rexp_delete_confirm_list_button(id)
{
  var wp_post_id=document.getElementById("wp_post_id"+id).value;
   jQuery.ajax
 ({
  type:'post',
  url:Rexp_adminajax.ajaxurl,
  data:{
   action:'Rexp_delete_list',
   list_id_val:id,
   wp_post_id_val:wp_post_id,
 
  },
  success:function(response) {
   response=parseFloat(response);
   if(response!="")
   {
    var row=document.getElementById("list_row"+id);
    row.parentNode.removeChild(row);
    tb_remove();
  }
}
});
}



function Rexp_delete_item_button(id)
{
  document.getElementById("delete_item_button").innerHTML="<div class='Rexp-row' onclick='Rexp_delete_confirm_item_button("+id+");'><button class='Rexp-btn Rexp-btn_danger Rexp-btn_ls Rexp-add_answer'>Confirm Delete</button></div>  ";

}

function Rexp_delete_confirm_item_button(id)
{
   jQuery.ajax
 ({
  type:'post',
  url:Rexp_adminajax.ajaxurl,
  data:{
   action:'Rexp_delete_item',
   item_id_val:id,

  },
  success:function(response) {
   response=parseFloat(response);
   if(response!="")
   {
    var row=document.getElementById("item_box"+id);
    row.parentNode.removeChild(row);
    tb_remove();
  }
}
});
}


function Rexp_add_url_button()
{
  var url_id=document.getElementById("new_url").value;
  var no=document.getElementById("new_no").value;
  var item_post_id=document.getElementById("new_item_post_id").value;

 if(item_post_id.length >= 1){
  jQuery.ajax
  ({
   type:'post',
   url:Rexp_adminajax.ajaxurl,
   data:{
    action:'Rexp_add_item',
    url_val:url,
    item_post_id_val:item_post_id,
   },
   success:function(response) {
    if(response!="")
    {
      var post_return=response;
      const postArray = post_return.split("#@$&");
      var title = postArray[0];
      var content = postArray[1];
      var url = postArray[2];
      var item_id = postArray[3];

        var row ="<br/><div class='embox'id='item_box"+item_id+"'>"+
        "<div class='Rexp-q'>"+no+".&nbsp;&nbsp;&nbsp;<a style='color:#393939'>"+title+"</a>&nbsp;&nbsp;</div>"+
        "<div class='Rexp-dangerBtn'>"+
        "<a href='#TB_inline?width=600&height=550&inlineId=delete_item_popup' title='Delete Item' class='thickbox' onclick='Rexp_delete_item_button("+item_id+");'>"+
        "<button class='Rexp-btn Rexp-btn_danger Rexp-tooltip' >"+
        "<span class='Rexp-tooltiptext Rexp-tooltip-bottom'>Delete Item</span><span class='dashicons dashicons-trash'></span>"+
        "<i class='Rexp-icon-trash'></i></button></a></div>"+
        "<br/><br/><br/>"+
        "<div style='width:30%;padding:0 10px 0 0;float:left;'>"+
        "<img src='"+url+"' /></div>"+
        "<div style='width:60%;padding:0 10px 0 0;float:left;'>"+
        "<a class='row-title'>"+content+"</a></div>"+
        "<div style='clear:both;'></div></div>"
 
         jQuery("#allcontents").append(row);
 
         newno=parseFloat(no)+1;
         document.getElementById("new_no").value=newno;
         document.getElementById("new_item_post_id").value="";
         document.getElementById("inputcheck").innerHTML="";
    }
    else{
      document.getElementById("new_item_post_id").value="";
      document.getElementById("inputcheck").innerHTML="Wrong Post ID";
      
 } }
});
 }
 else{
  
 } 
}