<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script>
	function ddlselect()
	{
		var d=document.getElementById("ddselect");
		var displaytext=d.options[d.selectedIndex].text;
		document.getElementById("productid").value=displaytext;
		
		function toDataURL(url, callback) {
            var httpRequest = new XMLHttpRequest();
            httpRequest.onload = function() {
               var fileReader = new FileReader();
                  fileReader.onloadend = function() {
                     callback(fileReader.result);
                  }
                  fileReader.readAsDataURL(httpRequest.response);
            };
            httpRequest.open('GET', url);
            httpRequest.responseType = 'blob';
            httpRequest.send();
         }
         toDataURL('image', function(dataUrl) {
         document.write('Result in string:', dataUrl)
      })
	
	}
</script>	

</head>
<center>
<body >


<div>
	<form action="registration.php" method="post">
		<div class="container">
		<link type="text/css" href="style.css" rel="stylesheet" />
			<div class="row">
				<div class="col-sm-3" >
					<center>
					<h1>Registration</h1>
					<p>Fill up the form.</p>
					<hr class="mb-3">
					<label for="productname"><b>Product name</b></label><br><br>
					
					<input style="border-radius: 25px; " class="form-control" id="productname" type="text" name="productname" required><br><br>

					<label for="productid"><b>Product ID</b></label><br><br>

					<input style="border-radius: 25px;" type="text" id="productid"/><br><br>

					<label for="category"><b>category</b></label><br><br>
	
					<select id="ddselect" onchange="ddlselect();">  
					<option selected="selected">Choose one</option>
						<option  id="category" name="category"> pillow  
							</option>  
					<option > bedsheet   
							</option>  
					<option > pillow1
							</option>  
					<option > bedsheet1
							</option>  
					
					</select>  <br><br>
					

					<label for="link"><b>Purchase link</b></label><br><br>

					<input style="border-radius: 25px;" class="form-control" id="link"  type="text" name="link" required><br><br>

					<label for="image"><b>image</b></label><br><br>
					
					
					<input class="form-control" type="file" id="image" >
					<!-- <script>
					var element = document.GetElementById('image');
					var file = element.files[0];
					var blob = file.slice(0, file.size, 'image/png'); 
					newFile = new File([blob], 'name.png', {type: 'image/png'});
					
			</script> -->
					<hr class="mb-3">
					<input style="border-radius: 25px;" class="btn btn-primary" type="submit" id="register" name="create" value="Upload">
</center>
				</div>
			</div>
		</div>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

		 var element = document.getElementById('image');
					var file = element.files[0];
					console.log(file)

					var blob = file.slice(0, file.size, 'image/png'); 
					console.log(blob)
					newFile = new File([blob], 'name.png', {type: 'image/png'});
					console.log(newFile) 
					
			var productname 	= $('#productname').val();
			var productid	= $('#productid').val();
			var category 		= $('#category').val();
			var link = $('#link').val();
			var image 	= newfile;
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {productname: productname,productid: productid,category: category,link: link,image: image},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
							
					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});

				
			

			



		});		

		
	});
	
</script>
</body>
</center>
</html>