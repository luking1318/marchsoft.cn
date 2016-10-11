KE.show({
		id : 'content_1',
		items:['source', '|', 'fullscreen', 'undo', 'redo',  'copy', 'paste',
		'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
		'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
		'superscript', '|', 'selectall', '-',
		'title', 'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold',
		'italic', 'underline', 'strikethrough',  '|', 'image',
		'advtable', '|', 'about']

	});
	function check()
	{
		var title= document.getElementById("projecttitle");
		var type=document.getElementById("projecttype");
		var content=document.getElementById("content_1");
	   
		
		
		if(title.value == null ||title.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
		if(type.value == null ||type.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
		
		
			
	}