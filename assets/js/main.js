$(document).on("submit", "form.js-register", function(event) {
  event.preventDefault();

  var form = $(this);
  var error = $('.js-error', form);
  var dataObj = {
    email: $("input[type='email']", form).val(),
    password: $("input[type='password']", form).val()
  };

  if(dataObj.email.length < 6) {
  error.text("Please enter a valid email address").show();
  return false;
  }else if(dataObj.password.length < 11) {
    error.text("Password is to short, minimum 11 characters").show();
    return false;
  }

    error.hide();

    $.ajax({
      type: 'POST',
      url: 'PHP-Login-System/ajax/register.php',
      data: dataObj,
      datatype: 'json',
      async: true,
    })
    .done(function ajaxDone(data) {
      if(data.redirect !== undefined) {
        window.location = data.redirect;
      }else if(data.error !== undefined) {
        error.text(data.error).show()
      }


    })
    .fail(function ajaxFailed(e) {



    })
    .always(function ajaxAlwaysDoThis(data){
      console.log("Always");


    })



  return false;
});

// Login

$(document).on("submit", "form.js-login", function(event) {
  event.preventDefault();

  var form = $(this);
  var error = $('.js-error', form);
  var dataObj = {
    email: $("input[type='email']", form).val(),
    password: $("input[type='password']", form).val()
  };

  if(dataObj.email.length < 6) {
  error.text("Please enter a valid email address").show();
  return false;
  }else if(dataObj.password.length < 11) {
    error.text("Password is to short, minimum 11 characters").show();
    return false;
  }

    error.hide();

    $.ajax({
      type: 'POST',
      url: 'PHP-Login-System/ajax/login.php',
      data: dataObj,
      datatype: 'json',
      async: true,
    })
    .done(function ajaxDone(data) {
      if(data.redirect !== undefined) {
        window.location = data.redirect;
      }else if(data.error !== undefined) {
        error.html(data.error).show()
      }


    })
    .fail(function ajaxFailed(e) {



    })
    .always(function ajaxAlwaysDoThis(data){
      console.log("Always");


    })



  return false;
});

