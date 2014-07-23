    function updateTickets(){
        $.ajax({
            url: updateTicketsUrl,
            success: function(response){
                $("#current_tickets").html(response);
            }
        });
    }

    $("body").on("click", "a.resolve_btn", function(e){
        e.preventDefault();
        var href = $(this).attr("href");
        $.ajax({
            url: href,
            success: function(response){
                updateTickets();
            }
        });
    });

    window.setInterval(updateTickets, 3000);
