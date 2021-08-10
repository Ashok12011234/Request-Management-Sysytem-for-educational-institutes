$(document).ready(function(){
  
        
  
        $.ajax({
          type: "GET",
          url: "show_teachers.php",
          data: {
            id: 'gfdgds'
          },
          success: function (data) {
              
  
            $('#result').html(data);
  
          }
        });
  
    
});




function fun() {
    var words = $("#word_count").val();
      
      var words = words.match(/\S+/g).length;
      if (words > 150) {
        // Split the string on first 200 words and rejoin on spaces
        var trimmed = $(this).val().split(/\s+/, 150).join(" ");
        // Add a space at the end to keep new typing making new words
        $(this).val(trimmed + " ");
      } else {
        $('#display_count').text(words);
        $('#word_left').text(150 - words);
      }
  }

  