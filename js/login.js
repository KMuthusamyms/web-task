$('#rform').submit(function() {
    var ar={'email': $('#email').val(),'pwd': $('#pwd').val()};
    $.post('php/login.php',ar,
  function(data){
    var arr = $.parseJSON(data);
    if(arr['res']==1){
      $('#formerr').html('User Login Successful');
      $('#rform').trigger("reset");
      window.location.href = "profile.html";
    } else {
      $('#formerr').html('Incorrect User/Password');
    }
  }).error(function(data, textStatus){alert(data)});
    return false; 
  });