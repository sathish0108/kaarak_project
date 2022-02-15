<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type="text/css" href="style.css">
   <script>
       function getdetails()
{
     var xmlhttp =new XMLHttpRequest();
     xmlhttp.open("GET","getdetails1.php",false);
     xmlhttp.send();
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
     {
         var result = xmlhttp.responseText;
         //alert(result);
         var o=JSON.parse(result);
         var data="";
        for(var i=0;i<o.length;i++)
        {
            data+='<table>\
            <tr><th>Product name</th><td>'+o[i]["productname"]+'</td><td rowspan=4><img src='+o[i]["image"]+' class=img></td></tr>\
            <tr><th>Product ID</th><td>'+o[i]["productid"]+'</td></tr>\
            <tr><th>Product category</th><td>'+o[i]["category"]+'</td></tr>\
            <tr><th>Purchase link</th><td><a href="'+o[i]["link"]+'">link</a></td></tr>\
            </table>\
            ';
        }
        document.getElementById("show").innerHTML = data;
     }
    }
</script>
</head>
<body onload="getdetails();">
<h3>Mobile store</h3>
<div id="show">

</div>
    
</body>
</html>