
    $(document).ready(function() {
	
        $('#generisiLozinku').click(function() {
            
            $.ajax({
              url: './generisiLozinku.php',
              success: function(json) {
                  
                  if(json) {
                      $('#lozinka').val(json);
                      $('#poruka').text('Molimo Vas da zapišete ovu lozinku.');
                  }	  	
                  
              }			  
            });
            
        });
        
    });