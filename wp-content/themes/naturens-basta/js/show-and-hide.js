$(document).ready(function(){
    // Toggle searchform checkbox area
    $("#btnCat").click(function(){
        $(".checkboxArea").toggle();
    }); 
/*
    $("input").click(function(){
        $(this).attr("value");
*/
    // Submit filter form when input changed
    $(function() {
      $('#omrade').on('change', function(e) {
        $(this).closest('form')
               .trigger('submit')
      })
    })
    
    $(function() {
      $('#habitat').on('change', function(e) {
        $(this).closest('form')
               .trigger('submit')
      })
    })
    
    $(function() {
       $('input').on('click', function(e) {
        $(this).closest('form')
               .trigger('submit') 
       })
    })
});