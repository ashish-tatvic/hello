<html>
<head>
<script>
function showUser(str) {

    if (str == "") {
	
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
	
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
			
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
		
		

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			   
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
		alert(str);
        xmlhttp.open("GET","database.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <option value="IT5">IT5</option>
  <option value="IT2">IT2</option>
  </select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>

</body>
</html>