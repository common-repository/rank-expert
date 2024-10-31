function Rexp_upvote(id)
{
  var upvote_purl=document.getElementById("upvote_purl").value;
  var downvote_url=document.getElementById("downvote_url").value;

   jQuery.ajax
  ({
    type:'post',
    url:Rexp_frontajax.ajaxurl,
    data:{
    action:'Rexp_upvote',
    item_id_val:id,
    },
    success:function(response) {
      document.getElementById("vote"+id).innerHTML=
      "<div><img src='"+upvote_purl+"' alt='' width='80'/></div><br/><br/>"+
      "<div onclick='Rexp_downvote_press("+id+")'><img src='"+downvote_url+"' alt='' width='80'/></div>";
}
});
}


function Rexp_downvote(id)
{
  var upvote_url=document.getElementById("upvote_url").value;
  var downvote_purl=document.getElementById("downvote_purl").value;

   jQuery.ajax
  ({
    type:'post',
    url:Rexp_frontajax.ajaxurl,
    data:{
    action:'Rexp_downvote',
    item_id_val:id,
    },
    success:function(response) {

      document.getElementById("vote"+id).innerHTML=
      "<div onclick='Rexp_upvote_press("+id+")'><img src='"+upvote_url+"' alt='' width='80'/></div><br/><br/>"+
      "<div><img src='"+downvote_purl+"' alt='' width='80'/></div>";

}
});
}

function Rexp_upvote_press(id)
{
  var upvote_purl=document.getElementById("upvote_purl").value;
  var downvote_url=document.getElementById("downvote_url").value;

   jQuery.ajax
  ({
    type:'post',
    url:Rexp_frontajax.ajaxurl,
    data:{
    action:'Rexp_upvote_press',
    item_id_val:id,
    },
    success:function(response) {
      document.getElementById("vote"+id).innerHTML=
      "<div><img src='"+upvote_purl+"' alt='' width='80'/></div><br/><br/>"+
      "<div onclick='Rexp_downvote_press("+id+")'><img src='"+downvote_url+"' alt='' width='80'/></div>";
}
});
}


function Rexp_downvote_press(id)
{
  var upvote_url=document.getElementById("upvote_url").value;
  var downvote_purl=document.getElementById("downvote_purl").value;

   jQuery.ajax
  ({
    type:'post',
    url:Rexp_frontajax.ajaxurl,
    data:{
    action:'Rexp_downvote_press',
    item_id_val:id,
    },
    success:function(response) {

      document.getElementById("vote"+id).innerHTML=
      "<div onclick='Rexp_upvote_press("+id+")'><img src='"+upvote_url+"' alt='' width='80'/></div><br/><br/>"+
      "<div><img src='"+downvote_purl+"' alt='' width='80'/></div>";

}
});
}