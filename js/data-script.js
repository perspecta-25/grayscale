
function getId() {
    let id = prompt("whats your id?", 1);
    return id;
}

$(document).ready(function () {
    $('#getDataBtn').click(function () {
        const id = getId();
        $.ajax({
            url: '/api/export-data.php',        // Backend endpoint
            type: 'GET',                    // HTTP method
            dataType: 'json',          // Expected response format
            data: {                        // Data sent to server
            },  
            success: function(){
                console.log(1);
            }
        });
        
    })
})