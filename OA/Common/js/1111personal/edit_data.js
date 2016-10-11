function radio_check(thisid,otherid){
	thisobj=document.getElementById(thisid);
	otherobj=document.getElementById(otherid);
	if(thisobj.checked==true){
		otherobj.checked=false;
	}
}
