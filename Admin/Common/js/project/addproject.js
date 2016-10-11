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
		var connull=document.getElementById("connull");
		
		var title= document.getElementById("projecttitle");
		var type=document.getElementById("projecttype");
		var company=document.getElementById("projectcompany");
		var account= document.getElementById("projectaccount");
		var password=document.getElementById("projectpassword");
		var picture=document.getElementById("picture");
		var alink=document.getElementById("alink");
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
		if(company.value == null ||company.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
		
		if(account.value == null ||account.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
		if(password.value == null ||password.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
		
		
		if(alink.value == null ||alink.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
		
		
			
	}