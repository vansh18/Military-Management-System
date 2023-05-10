function manage_equipment(url){
    var type = $('input[name=equipment]:checked').val();
    var action = $('input[name=action]:checked').val();
    var assignee = '';
    var name = $('#name').val();
    var quantity = $('#quantity').val();
    if(action == 'Allocate')
        var assignee = $('#assignee').val();
    //send values to the server
    $.ajax({
        url : url+"manage-equipment",
        type : "POST",
        data : {
            type : type,
            action : action,
            assignee : assignee,
            name : name,
            quantity : quantity
        }, 
        success: function(response) {
            if(response.status == 200)
            {
                alert(response.message);
            }
            else
            {
                alert("Error: "+response.message);
            }
        },
        error: function() {
            console.log("Error occurred during Ajax call");
        },
        dataType: "json"
    });
}