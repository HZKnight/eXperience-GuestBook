function check(stat)
{
	var len = document.forms[0].elements.length;
	for( var i=0; i < len; i++ )
	{
		chbox = document.forms[0].elements[i];
		if(chbox.type == "checkbox")
			chbox.checked = stat;
	}
	
}