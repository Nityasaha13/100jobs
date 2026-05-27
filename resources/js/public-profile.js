$(document).ready(function(){

    // Add 'active' class to the clicked nav item and remove it from siblings
    $(".nav ul li").click(function() {
        $(this).addClass("active").siblings().removeClass("active");
        const panelIndex = $(this).index(); // Get index of clicked tab
        tabs(panelIndex); // Show corresponding tab
    });

    // Function to control tab visibility
    function tabs(panelIndex) {
        $(".tab").hide(); // Hide all tabs
        $(".tab").eq(panelIndex).show(); // Show selected tab
    }

    tabs(0); // Initialize first tab as visible


    // Check alert message length and adjust font size if necessary
    if ($(".alert-message").text().length > 9) {
        $(".alert-message").css("fontSize", ".7rem");
    }

});
