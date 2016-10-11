			function selectall()
			{
				var elam = document.getElementsByName('checkbox');
				if(!(elam.length < 1))
				{
					for(var i=0;i<elam.length;i++)
					{
						elam[i].checked=true;
					}
				}
				else
				{
					return ;
				}
			}
			function noselectall()
			{
				var elam = document.getElementsByName('checkbox');
				
				if(!(elam.length < 1))
				{
					for(var i=0;i<elam.length;i++)
					{
						elam[i].checked=false;
					}
				}
			}
			function del()
			{
			    var selectnull= document.getElementById("selectnull");
				var elam = document.getElementsByName('checkbox');
				var items = new Array();
				var num=0;
				if(elam.length > 0)
				{
					for(var i=0;i<elam.length;i++)
					{
						if(elam[i].checked == true)
						{			   
							items[num]=elam[i].value;
							num++;
						}
						
					}
					
				}
				if(items.length < 1)
				{
					
					selectnull.style.visibility = "visible";
				}
				else
				{
					window.location="__URL__/delsel?items="+items+"&type=<?php echo $type ?>";
				}
			}