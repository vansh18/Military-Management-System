// js to make an ajax call to create an operation
function create_op(url) {
    event.preventDefault(); // Prevent the form from submitting normally
    // prevent page from reloading

    var opname = $("#op-name").val();
    var opdesc = $("#description-field").val();
    //select the value of the selected option
    var batallion_id = $(".battalion-list").val();
    //select start-date
    var start_date = $("#start-date").val();
    //select end-date
    var end_date = $("#end-date").val();
    //check if any of the fields are empty
    if(opname == "" || opdesc == "" || batallion_id == "" || start_date == "" || end_date == "") {
        alert("Please fill all the fields");
        return false;
    }
    // check if start date is greater than end date
    if(start_date > end_date) {
        alert("Start date cannot be before than end date");
        return false;
    }

    //make ajax call to send values to the server
    // alert the user
    $.ajax({
        url: url+"add-operation",
        type: "POST",
        data: {
            Op_name: opname,
            Descriptions    : opdesc,
            Batallion_id: batallion_id,
            start_date: start_date,
            end_date: end_date
        },
        success: function(response) {
            if(response.status == 200) {
            alert("Operation created successfully");
            // redirtect to the dashboard after 1 seconds    
            setTimeout(function() {
                window.location.replace(url+"dashboard");
                },1000);
            }
            else { 
                console.log("Operation creation failed");
                window.alert(response.message);
            }
        },
        error: function() {
            console.log("Error occurred during Ajax call");
            window.alert("Battalion is already assigned to an operation");
        },
        dataType: "json"
    });
}