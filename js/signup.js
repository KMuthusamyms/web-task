var err=false;
$('#email').keyup(function() {
  $.post(
'php/checkmail.php',
{'email' : this.value},
function(data){
  var arr = $.parseJSON(data);
  if(arr['res']==1){
    $('#mailerr').html('Email Already Exist');
    err=false;
  } else {
    $('#mailerr').html('');
    err=true;
  }
})
.error(function(data, textStatus){alert(data)});
});
$("#dd").keyup(function () {
    if (this.value.length == this.maxLength) {
      $('#mm').focus();
    }
});
$('#dd').focusout(function() {
  if(this.value<=0 || this.value>31){
    $('#daterr').html('Invalid Value');
    err=false;
  } else {
    $('#daterr').html('');
    err=true;
  }
});
$("#mm").keyup(function () {
    if (this.value.length == this.maxLength) {
      $('#yy').focus();
    }
});
$('#mm').focusout(function() {
  if(this.value<=0 || this.value>12){
    $('#daterr').html('Invalid Value');
    err=false;
  } else {
    $('#daterr').html('');
    err=true;
  }
});
$('#rform').submit(function() {
  var ar={'fname': $('#fname').val(),'email': $('#email').val(),'phno': $('#phno').val(),'pwd': $('#pwd').val(),'dob': $('#yy').val()+'-'+$('#mm').val()+'-'+$('#dd').val(),'gen': $("input[name='gender']:checked").val(),'lang': $('#lang').val()};
  $.post('php/register.php',ar,
function(data){
  var arr = $.parseJSON(data);
  if(arr['res']==1){
    $('#formerr').html('User Registration Successful');
    $('#rform').trigger("reset");
  } else {
    $('#formerr').html('Error on Registration');
  }
}).error(function(data, textStatus){alert(data)});
  return false; 
});