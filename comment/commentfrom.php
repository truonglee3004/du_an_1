<html>
<head>
<link href="../css/reset.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<title>Document</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

	function commentSubmit(){
		if(form1.name.value == '' && form1.contet.value == ''){ 
			alert('nhập bình luận !');
			return;
		}
		var name = form1.name.value;
		var content = form1.content.value;
		var xmlhttp = new XMLHttpRequest(); 
		
		xmlhttp.onreadystatechange = function(){ 
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; 
			}
		}
		xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+content, true); 
		xmlhttp.send();
	}
	
		$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#comments_logs').load('logs.php');}, 2000);
		});
		
</script>
</head>
<body>
<div id="container">
	<div class="page_content">
    	BÌNH LUẬN
    </div>
    <div class="comment_input">
        <form name="form1">
        	<input type="text" name="name" placeholder="Tên..."/></br></br>
            <textarea name="comments" placeholder="nội dung bình luận..." style="width:635px; height:100px;"></textarea></br></br>
            <a href="#" onClick="commentSubmit()" class="button">Gửi</a></br>
        </form>
    </div>
   
</div>
</body>
</html>