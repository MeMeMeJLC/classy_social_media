
<script>	
 
function getAnAnnotationLocation(){
		var x = event.clientX - 16.5;
		var y = event.clientY - 17;
		document.getElementById('annotationLocationX').value = x;
		document.getElementById('annotationLocationY').value = y;	
console.log(x);
console.log(y);		
	}	
	
</script>