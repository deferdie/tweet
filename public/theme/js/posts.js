  var images = [];
$('.iCon').click(function(){
  var t = $(this).attr('data-imd');
  //Check if id is in array
  if(inArray(t, images) == -1){
    //Add to array
    images.push(t);
    $(this).css('border-color', '#ff0000');

  }else{
    // Remove from array
    var remove = images.indexOf(t);
    images.splice(remove, 1);
    $(this).css('border-color', '#000');

  }
});

function inArray(item, inArray) {
  return a = inArray.indexOf(item);
}

$('.data-del').click(function(){
  var id = $(this).attr('data-del');
  deleteImage(id);
})

function deleteImage(id){
  var csrf = $('meta[name="csrf-token"]').attr('content');
  $.post('deleteImage', {imageID : id, _token: csrf}, function(data){
    alert(data);
  });
  $('#'+id+'mediaImage').fadeOut(200);
}

function deletePost(href, csrf_token){
    $.post('delete-shedule-post', {postID: href, _token: csrf_token}, function(data){
       //alert(data);
      $('#row-client-'+href).hide(200);
    });
}

function deleteClient(href, csrf_token){
    $.post('/user/delete/client', {clientID: href, _token: csrf_token}, function(data){
      $('#row-client-'+href).hide(200);
    });
}

function editClientModal(href, csrf_token){
    $.post('/user/edit/client', {clientID: href, _token: csrf_token}, function(data){
      //Get the array

      var $client = $.parseJSON(data);
      //Apply the variables
      $('#cName').html($client.clientName);
      $('#cname').val($client.clientName);
      $('#clientTwitterAuth').attr('href', '/twitter/auth?clientID=' + $client.id);
      $('#deltw').attr('data-cid', $client.id);
      $('#editClientModal').modal('show');
    });
}

function removeSocialAccount(href, csrf_token){
  $.post('remove-social-account', {clientID: href, _token: csrf_token}, function(data){
    alert(data);
  });
}

function editMesageModal(href, csrf_token){
    $.post('edit-shedule-post', {postID: href, _token: csrf_token}, function(data){
      $('.updateTextEdit').html(data);
      $('#mesid').val(href);
      $('#myModalEdit').modal('show');
    });
}

$('#updF').bind().unbind().submit(function(){
  $.post('edit-shedule-message', $('#updF').serialize(), function(data){
      alert(data);
    });
  return false;
});

function createTweet(formVars){
      $.post('create-shedule-tweet', formVars , function(data){

        $( ".container-fluid-full" ).append( $( '      <div class="noty_bar noty_theme_default noty_layout_top noty_information" id="noty_information_1450278298284" style="cursor: pointer; display: block;"><div class="noty_message"><span class="noty_text">'+data+'</span></div></div>' ) ).fadeIn();
        $('#noty_information_1450278298284').fadeIn(100);
    });
}


function getPostContent(href, csrf_token){
    $.get('get-post-message', {postID: href, _token: csrf_token}, function(data){
      $('.updateText').html(data);
      $('#myModal').modal('show');

    });

}

function addTwitter(csrf_token){
  $.post('addTwitter', {_token: csrf_token}, function(data){
    var oAuthURL = data;
    openWindow(data);

  });
}

function openWindow(data){
  window.open(data, "windowName", "height=500,width=500");
}

$('#cTe').click(function(){
  var f = $('#sTweet').serialize()
  createTweet(f);
  return false;
});

$('#upImg').click(function(){
  $('#disImg').html('');
  $.get('user-images', {}, function(data){
    $.each(data, function(i, item) {
      $('#disImg').append('<div class="col-md-1 iCon" data-imd="'+data[i].id+'" id="'+data[i].id+'mediaImage"><div class="img-op data-del" data-del="'+data[i].id+'"><i class="halflings-icon white trash im"></i></div><img width="200" src="'+data[i].imagePath+'/'+data[i].imageName+'" alt="'+data[i].imageName+'" data-image="'+data[i].imageName+'"></div>');
    });
    $('#upImgs').modal('show');
    selectImg();
  });

});

function selectImg(){
  var images = [];
$('.iCon').click(function(){

  var t = $(this).attr('data-imd');
  //Check if id is in array
  if(inArray(t, images) == -1){
    //Add to array
    images.push(t);
    $(this).css('border-color', '#ff0000');
    $('#imgs').val(JSON.stringify(images));
  }else{
    // Remove from array
    var remove = images.indexOf(t);
    images.splice(remove, 1);
    $(this).css('border-color', '#000');

  }
});
}
