// Attach an event listener to the form's submit event
function login(url) {
    event.preventDefault(); // Prevent the form from submitting normally
    var loginurl = url+"validate-user";
    var userid = $(".user-id").val();
    var password = $(".password").val();
    var hashedPassword = CryptoJS.SHA256(password).toString();
    $.ajax({
        url: loginurl,
        type: "POST",
        data: {
            userid: userid,
            password: hashedPassword
        },
        success: function(response) {
            // Handle the response from the server
            if (response.status == 200) {
            // Update the UI based on the response
            console.log("Login successful");
            window.location.replace(url+"dashboard"); // Redirect to the main page(modify it to remove php tag
         } 
          else {
            document.getElementById('error-msg').style.display = 'flex';
            var error = document.getElementById("error");
            error.innerHTML = "Username or Password entered is wrong. Please try again" // Display error message
          }
            // console.log(response.userid);
            // console.log(response.password);
        },
        error: function() {
            // Handle any errors that occur during the Ajax call
            console.log("Error occurred during Ajax call");
            var error = document.getElementById("error");
            error.innerHTML = "Username or Password entered is wrong. Please try again" // Display error message
            console.log(loginurl);
        },
        dataType: "json"
    });
  }
