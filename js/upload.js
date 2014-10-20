var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {

//following function will executes on change event of file input to select different file	
$('body').on('change', '#file', function(){
    for (int i = 0; i < this.files.size(); ++i) {
        if (this.files && this.files[0]) {
             abc += 1; //increementing global variable by 1
				
				var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
               
			    var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
               
			    $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: 'img/x.png', alt: 'delete'}).click(function() {
                $(this).parent().parent().remove();
                }));
            }
     }
        
     });

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});