// Attach an event listener to the form's submit event
function login(url) {
    event.preventDefault(); // Prevent the form from submitting normally

    var email = $("#email_box").val();
    var password = $("#password_box").val();
    var hashedPassword = CryptoJS.SHA256(password).toString();
    $.ajax({
        url: url,
        type: "POST",
        data: {
            email: email,
            password: hashedPassword
        },
        success: function(response) {
            // Handle the response from the server
            if (response.success) {
            // Update the UI based on the response
            console.log("Login successful");
            window.location.href = '<?php echo BASE_URL."home"; ?>'; // Redirect to the main page
          } 
          else {
            $('#error-message').text("Invalid email or password. Please try again."); // Display error message
            $(".error-message").css("display", "block");
          }
            // console.log(response.email);
            // console.log(response.password);
        },
        error: function() {
            // Handle any errors that occur during the Ajax call
            $('#error-message').text("Invalid email or password. Please try again."); // Display error message
            $(".error-message").css("display", "block");
            console.log("Error occurred during Ajax call");
        },
        dataType: "json"
    });
  }
