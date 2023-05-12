// window.onload('check()')
function passOrder(url)
{
    var selectOption = $('#order-type').val();
    if(selectOption == "1")
    {
        // Action is promote
    }
    else if (selectOption == '2')
    {
        // Action is demote
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
                    alert("Subgroup created successfully");
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
        var subgrpId = $('#subgrp-id').val();
        //make ajax call to send values to the server
        $.ajax({
            url : url+"delete-subgrp",
            type : "POST",
            data : {
                subgrpId : subgrpId
            },
            success: function(response) {
                if(response.status == 200) 
                {
                    alert("Subgroup deleted successfully");
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
            }
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