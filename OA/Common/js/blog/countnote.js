
	function check()
	{
		var start=document.getElementById("start");
		var end=document.getElementById("end");
		var connull=document.getElementById("connull");
		if(start.value == null ||start.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
		if(end.value == null ||end.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
			
	}