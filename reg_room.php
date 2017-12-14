<?php session_start(); ?>


<html>
      <head>
           <title>Add or Remove Hotel</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		   <style>
       header{
         padding: 20px;
         text-align: center;
         background-color: orange;
         color: black;
         text-transform: uppercase;
         letter-spacing: 8px;
         font-family: impact;
         font-weight: lighter;
         font-size: 32px;
         background-color:#2ECC71;}
		   .container{
						  opacity: 0.8;
						  border-radius: 4px;
						  background-color: #F5B7B5;
						  margin-top: 4%;
						  margin-left: 17%;
						  margin-right: -30%;
						  padding: 20px;
						  width: 1000px;
						  text-align: center;
					}

          a{
            text-decoration: none;
            color: black;
          }

          ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #333;
          float: left;
              }
              li {
                  float: right;
                  }

              li a {
                  display: block;
                  color: white;
                  text-align: center;
                  padding: 14px 80.2px;
                  text-decoration: none;
                    }

              li a:hover {
                  background-color: #111;
                    }

                  li a:hover:not(.active){
                    background-color:#D6EAF8;
                      }

		   </style>




      </head>
      <body>
        <header> sala_dia_dhaka </header>

        <ul>




          <li><a style="float: right; margin: 0;" href="lout.php">LOGOUT</a></li>
          <li><a href="abt.php">About us</a></li>
          <li><a href="con.php">Contact</a></li>
          <li><a href="reg.php">Registration</a></li>
          <li><a href="agent.php"><?php if(isset($_SESSION['usr'])){echo $_SESSION['usr']; } ?></a></li>
          <li style="margin-top:00px;"><a class = "active" href="agent_home.php">Home</a></li>



        </ul>

           <div class="container">
                <br />
                <br />
                <div class="form-group">
                     <form name="add_name" id="add_name">
                          <div class="table-responsive">
                               <table class="table table-bordered" id="dynamic_field">
                                    <tr>
										 <td><label>Create Room </label></td>
										 <td><select name = "roomtype"><option>SINGLE</option><option>DOUBLE</option><option>FAMILY</option><option>MULTIPORPOSES</option></select></td>

                                         <td><button type="button" name="single" id="single" class="btn btn-success">CREATE</button></td>
                                    </tr>


                               </table>
                               <input type="button" name="submit1" id="submit" class="btn btn-info" value="Submit" />
                          </div>
                     </form>
                </div>
            </div>



      </body>
 </html>
 <script>
 $(document).ready(function(){
      var i=1;
      $('#single').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter Room Number" class="form-control name_list" /></td><td>AC<select name = "ac"><option value="Yes">Yes</option><option value="No">No</option></select></td><td><input type="text" name="cost[]" placeholder="Enter Cost" class="form-control name_list" /> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });


      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });
      $('#submit').click(function(){
           $.ajax({
                url:"name.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                     alert(data);
                     $('#add_name')[0].reset();
						location.reload();
                }
           });


      });




 });


 </script>
