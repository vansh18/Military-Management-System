// window.onload('check()')
function passOrder(url)
{
    var selectOption = $('#order-type').val();
    // disable the confirm button
    $('#confirm-order').prop('disabled', true);
    // change button value to processing and chnage color to grey
    $('#confirm-order').val('Processing...');
    $('#confirm-order').css('background-color', '#808080');
    if(selectOption == "1")
    {
        // Action is promote
        var id = $('#rank').val();
        //make ajax call to send values to the server
        $.ajax({
            url : url+"promote",
            type : "POST",
            data : {
                id : id
            },
            success: function(response) {
                if(response.status == 200) 
                {
                    // change button value to success and change color to green
                    $('#confirm-order').val('Order Successfull!');
                    $('#confirm-order').css('background-color', '#008000');
                    // refresh after 0.5 seconds
                    setTimeout(function() {
                        location.reload();
                    },500);
                }
                else if (response.status == 500)
                {
                    alert("Promotion failed");
                }
            },
            error: function() {
                console.log("Error occurred during Ajax call");
                alert("Promotion failed");
            },
            dataType: "json"
        });
    }
    else if (selectOption == '2')
    {
        // Action is demote
        var id = $('#rank').val();
        //make ajax call to send values to the server
        $.ajax({
            url : url+"demote",
            type : "POST",
            data : {
                id : id
            },
            success: function(response) {
                if(response.status == 200) 
                {
                    // change button value to success and change color to green
                    $('#confirm-order').val('Order Successfull!');
                    $('#confirm-order').css('background-color', '#008000');
                    // refresh after 0.5 seconds
                    setTimeout(function() {
                        location.reload();
                    },500);
                }
                else if (response.status == 500)
                {
                    alert("Demotion failed");
                }
            },
            error: function() {
                console.log("Error occurred during Ajax call");
                alert("Demotion failed");
            },
            dataType: "json"
        });
    }
    else if (selectOption == '3')
    {
        // Action is dismiss
    }
    else if ( selectOption == '4')
    {
        // Action is create subgrp
        var leader = $('#leader_name').val();
        var name = $('#subgrp_name').val();
        var rankId = $('#Rank-id').val();

        //make ajax call to send values to the server
        $.ajax({
            url : url+"add-subgrp",
            type : "POST",
            data : {
                leader : leader,
                name : name,
                rankId : rankId
            },
            success: function(response) {
                if(response.status == 200) 
                {
                    $('#confirm-order').val('Order Successfull!');
                    $('#confirm-order').css('background-color', '#008000');
                    // refresh after 1 seconds
                    setTimeout(function() {
                        location.reload();
                    },1000);
                }
                else if (response.status == 500)
                {
                    alert("Subgroup creation failed");
                }
            },
            error: function() {
                console.log("Error occurred during Ajax call");
                alert("Subgroup creation failed");
            },
            dataType: "json"
        });
    }
    else if (selectOption == '5')
    {
        // Action is delete subgrp
        var subid = $('#subordinate').val();
        //make ajax call to send values to the server
        $.ajax({
            url : url+"delete-subgrp",
            type : "POST",
            data : {
                id : subid
            },
            success: function(response) {
                if(response.status == 200) 
                {
                    // change button value to success and change color to green
                    $('#confirm-order').val('Order Successfull!');
                    $('#confirm-order').css('background-color', '#008000');
                    // refresh after 0.5 seconds
                    setTimeout(function() {
                        location.reload();
                    },500);
                }
                else if (response.status == 500)
                {
                    alert("Subgroup deletion failed");
                }
            },
            error: function() {
                console.log("Error occurred during Ajax call");
                alert("Subgroup deletion failed");
            },
            dataType: "json"
        });
    }
    // check if the action is custom-order
    // check if custom is selected

    if ( $('#vehicles').is(':checked'))
    {   
        //Action is custom-order    
        var fromUserId = $('#my-user-id').val();
        var toUserId = $('#subordinate').val();
        var order = $('#custom-order').val();
        //make ajax call to send values to the server
        $.ajax({
            url : url+"custom-order",
            type : "POST",
            data : {
                fromUserId : fromUserId,
                toUserId : toUserId,
                order : order
            },
            success: function(response) {
                if(response.status == 200) 
                {
                    alert("Order passed successfully");
                    location.reload();
                }
                else if (response.status == 500)
                {
                    alert("Order passing failed");
                }
            },
            error: function() {
                console.log("Error occurred during Ajax call");
                alert("Order passing failed");
            },
            dataType: "json"
        });
        

    }

}