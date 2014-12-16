$(document).ready(function() {
  $('#list').change(function() {
var selected=$(this).val();
  $.get("change_query.php?selected="+selected, function(data){
      $('.result').html(data);

    });
    });
});