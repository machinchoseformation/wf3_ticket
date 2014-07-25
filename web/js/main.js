    var lastCount = 0;
    var beep = document.getElementById("beep");


    function updateTickets(){
        $.ajax({
            url: updateTicketsUrl,
            success: function(response){
                $("#current_tickets").html(response);
                currentTicketCount = $(response).find('tr.ticket_tr').length;
                if (currentTicketCount > lastCount){
                    lastCount = currentTicketCount;
                    console.log("Play sound");
                    beep.play();
                }
            }
        });
    }

    function updateResolvedCount(){
        $.ajax({
            url: countResolvedUrl,
            success: function(response){
                $("#resolved_count").html(response);
            }
        });
    }

    $("body").on("click", "a.resolve_btn", function(e){
        e.preventDefault();
        updateResolvedCount();
        var href = $(this).attr("href");
        $.ajax({
            url: href,
            success: function(response){
                updateTickets();
            }
        });
    });

    window.setInterval(updateTickets, 3000);
    window.setInterval(updateResolvedCount, 5000);
