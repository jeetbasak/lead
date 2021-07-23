
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
document.addEventListener('DOMContentLoaded', function() {
	var inputs = document.getElementsByClassName('product-dtl-quantity')
	function incInputNumber(input, step) {
		var val = +input.value
		if (isNaN(val)) val = 1
		val += step
		input.value = val > 1 ? val: 1
	}
	Array.prototype.forEach.call(inputs, function(el) {
		var input = el.getElementsByTagName('input')[0]
		
		el.getElementsByClassName('increase')[0].addEventListener('click', function() { incInputNumber(input, 1) })		
	})
})
// Input Type Number JS
document.addEventListener('DOMContentLoaded', function() {
	var inputs = document.getElementsByClassName('product-dt2-quantity')
	function incInputNumber(input, step) {
		var val = -input.value
		if (isNaN(val)) val = 100
		val += step
		input.value = val > 1 ? val: 1
	}
	Array.prototype.forEach.call(inputs, function(el) {
		var input = el.getElementsByTagName('input')[0]
		
		el.getElementsByClassName('decrease')[0].addEventListener('click', function() { incInputNumber(input, 1) })
	})
})
