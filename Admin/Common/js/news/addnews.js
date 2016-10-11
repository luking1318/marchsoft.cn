
    function check()
	{
		var title= document.getElementById("newstitle");
		var newstime=document.getElementById("newstime");
		var connull=document.getElementById("connull");
		if(title.value == null ||title.value == "" )
		{
			alert(1);
			connull.style.visibility="visible";
			return false;
		}
		if(newstime.value == null ||newstime.value == "" )
		{
			alert(2);
			connull.style.visibility="visible";
			return false;
		}
		return true;
		
			
	}