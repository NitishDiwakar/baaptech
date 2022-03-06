<!-- n -->
<style type="text/css">
     {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 150px;
}

.form-container .myc {
    border:  none;
    background: #f1f1f1;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
} 
</style>

<button id="open_box1" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" onclick="openForm()" style="position:fixed;
right:0;
bottom:0;">
<i class="bi-chat-text-fill me-2"></i>
Send Suggestion</button>
 <div class="chat-popup" id="myForm" style="display: none; position:fixed;
right:0;
bottom:0;">
  <!-- <form action="" class="form-container" id="sug-form" method="post"> -->

    <?= $this->Form->create($sugg,['class' => 'form-container', 'id' => 'sug-form']) ?>
    <h3>Suggestion</h3>

    <label for="name"><b>Name</b></label>
    <input type="text" name="name" class="form-control myc" required>

    <label for="msg"><b>Suggestion</b></label>
    <textarea placeholder="Your suggestion.." name="msg" id="tx1" required></textarea>

    <div id="hoo1"></div>
    <button type="submit" class="btn" id="submit_comment" onclick="disableMe()">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  <!-- </form> -->
  <?= $this->Form->end() ?>
</div> 


<script type="text/javascript">
    function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
} 
</script>
<script type="text/javascript">
    /*$( document ).ready(function() 
    {
        $("#open_box").click(function(){
            $("#myForm").show();
            });
    }*/
</script>

    <script type="text/javascript">
            // $(document).ready(function() {  
                
                // submit form using $.ajax() method
                
                $('#sug-form').submit(function(e){
                    e.preventDefault(); // Prevent Default Submission
                    // alert('hello'); exit;
                    
                    $.ajax({
                        url: '../home/sendsug',
                        type: 'POST',
                        data: $(this).serialize() // it will serialize the form data
                    })
                    .done(function(data){
                        $('#hoo1').fadeOut('slow', function(){
                            // $('#form-content').fadeIn('slow').html(data);
                            $('#tx1').val('');
                            $('#hoo1').fadeIn('slow').html(data);
                        });
                        console.log('data submitted');
                        // $("#form-content").fadeIn('slow');
                    })
                    .fail(function(){
                        alert('Unable to send suggestion ...');    
                    });
                });
            // }); // end document ready
        </script>

        <script type="text/javascript">
        // disable button for 4 seconds after click
        function disableMe(id){
        document.getElementById("submit_comment").disabled = true;
        setTimeout(function(){document.getElementById("submit_comment").disabled = false;},4000);
        }
        </script>
<!-- en -->