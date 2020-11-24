var $dates = $('#from, #to').datepicker();

$('#clear-dates').on('click', function () {
    $dates.datepicker('setDate', null);
});


var $dates1 = $('#from1, #to1').datepicker();

$('#clear-dates1').on('click', function () {
    $dates.datepicker('setDate', null);
});