
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

// Input Type Number JS
$('.minus').click(function () {
	var $input = $(this).parent().find('input');
	var count = parseInt($input.val()) - 1;
	count = count < 1 ? 1 : count;
	$input.val(count);
	$input.change();
	return false;
});
$('.plus').click(function () {
	var $input = $(this).parent().find('input');
	$input.val(parseInt($input.val()) + 1);
	$input.change();
	return false;
});



$(document).ready(function(){

    var current_fs, next_fs, previous_fs;
    
    // No BACK button on first screen
    if($(".show").hasClass("first-screen")) {
    $(".prev").css({ 'display' : 'none' });
    }
    
    // Next button
    $(".next-button").click(function(){
    
    current_fs = $(this).parent().parent();
    next_fs = $(this).parent().parent().next();
    
    $(".prev").css({ 'display' : 'block' });
    
    $(current_fs).removeClass("show");
    $(next_fs).addClass("show");
    
    $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");
    
    current_fs.animate({}, {
    step: function() {
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    
    next_fs.css({
    'display': 'block'
    });
    }
    });
    });
    
    // Previous button
    $(".prev").click(function(){
    
    current_fs = $(".show");
    previous_fs = $(".show").prev();
    
    $(current_fs).removeClass("show");
    $(previous_fs).addClass("show");
    
    $(".prev").css({ 'display' : 'block' });
    
    if($(".show").hasClass("first-screen")) {
    $(".prev").css({ 'display' : 'none' });
    }
    
    $("#progressbar li").eq($(".card2").index(current_fs)).removeClass("active");
    
    current_fs.animate({}, {
    step: function() {
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    
    previous_fs.css({
    'display': 'block'
    });
    }
    });
    });
    
    });



    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });