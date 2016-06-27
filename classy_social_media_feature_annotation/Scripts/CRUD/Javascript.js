
<script>	

console.log("javascript.js running");
 
function getAnAnnotationLocation(){
		var x = event.clientX - 16.5;
		var y = event.clientY - 17;
		document.getElementById('annotationLocationX').value = x;
		document.getElementById('annotationLocationY').value = y;	
console.log(x);
console.log(y);		
	}	
	
	function showUser(str) {
		console.log("showUser running");
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
        };
        xmlhttp.open("GET","getannotation.php?q="+str,true);
        xmlhttp.send();
    }
}
	
</script>