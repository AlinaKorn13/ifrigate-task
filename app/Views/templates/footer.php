    
    <footer>
        <em>&copy; Alina Vertola, 2021</em>
    </footer>
    </div>

    <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://snipp.ru/cdn/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(".authority").select2({
            theme: "bootstrap4",
        });
    </script>

    <script>  
     $(document).ready(function() {  
        $('.edit').click(function() {  
           var id = $(this).data("id");  
           $.ajax({  
                url : "/pages/view/" + id, 
                type : "GET",  
                success: function(data) {
                    let modal = $(data) 
                    $(modal[2]).modal('show')
                    $(modal[2]).find(".authority").select2({theme: "bootstrap4"})
                    $(modal[2]).find(".datepicker-here").datepicker({
                        autoClose : true,
                        dateFormat : 'dd/mm/yyyy'
                    })
                }  
           });  
        });  
     });  
    </script>
    
    </body>
</html>