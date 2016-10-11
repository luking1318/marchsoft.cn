
	function check()
	{
		var elam = document.getElementsByName('item[tags][]');
		var tag= document.getElementById("tags");
		var tags="";
		if(!(elam.length < 1))
		{
			tags+=elam[0].value;
			for(var i=1;i<elam.length;i++)
			{
				tags+=","+elam[i].value;	
			}
			tag.value=tags;
			
		}
		var title= document.getElementById("newstitle");
		var newstime=document.getElementById("newstime");
		var connull=document.getElementById("connull");
		
		if(title.value == null ||title.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
		if(newstime.value == null ||newstime.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
		return true;
		
			
	}