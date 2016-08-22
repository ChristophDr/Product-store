


function DatePickerDisplay(){

};
function DatePickerTrigger(){

};

function SearchProducts(){

  var temp_input_date = GetInputTextForDatePicker();
  var temp_input_text = GetInputTextForSearch();

  var path = "SimpleStore/Content/php/table_display.php";
  if (temp_input_text ||temp_input_date) {
    path = "SimpleStore/Content/php/search_type.php";
  }
  $.ajax({
    type: 'POST',
    url: path,
    data: { temp_input_date: temp_input_date, temp_input_text: temp_input_text },
    success: function(response) {
      $('#product-table').remove();
        $('#table-container').html(response);
    }
});
};

function GetInputTextForDatePicker(){
  return $('#daterange-picker').val();
};
function GetInputTextForSearch(){
  return document.getElementById("search-description").value;
};
//Get the daterange specified for search
//handle keyword enter for faster search, not necessary to click search button
function HandleKeyPress(event){
    $('#search-description').keypress(function (event) {
        if (event.which == '13') {
            SearchProducts();
        }
    });
};

$(function() {

  $('input[name="daterange"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
  });

  $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
