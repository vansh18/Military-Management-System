// js to get all orders selectd from user and send to server

function send_orders(url){
    var orders = [];
    //get orders from incoming-order-container by accessgin id attribute and pass or order variable
    $('.incoming-order-container').each(function(){
        var order = $(this).attr('id');
        var status = $(this).attr('status');
        if(status == 'checked')
            orders.push(order);
    });
    //send orders to server
    $.ajax({
        url : url+"send-orders-status",
        type : "POST",
        data : {
            orders : orders
        },
        success: function(response) {
            if(response.status == 200) 
            {
                alert("Orders completed!");
                location.reload();
            }
            else if (response.status == 500)
            {
                alert("Order status change failed");
            }
        },
        error: function() {
            console.log("Error occurred during Ajax call");
        },
        dataType: "json"
    });
}