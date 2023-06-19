
function numeric(keyCode,fullstop,negetive){
if (fullstop==undefined)
	fullstop=1;
if (negetive==undefined)
	negetive=0;
	
	if (fullstop==0)//don't allow full stops
		if (keyCode==46)//full stop
			return false;
	if (negetive==0)//dont allow negetives
		if (keyCode==45) //negetive'
			return false;
	if (!(keyCode>47 && keyCode <59 || keyCode==8 || keyCode==45 || keyCode==46 || keyCode==10 || keyCode==13))
		return false;

return true;

}

function isnumeric(expr){
	var g='';
	var negetives=0;
	var points=0;
	var ok=true;
	if (expr.length==0)//no entry
		return false;
	for(var i=0;i< expr.length;i++){
		g=expr.charAt(i);
		if (!((g>='0' && g<='9') || g=='.' || g=='-')) //no digit entered
			return false;
			
		if (g=="-")//checking for negetives
			if(++negetives > 1)//too many negetives
				return false;
		
		if (g==".")//checking for decimal points
			if (++points>1)//more than one deciomal points
				return false;
			
	}
	return true;
}

function alphabetic(keycode){
	if ((keycode>=97 && keycode <=122) || (keycode>=65 && keycode <=90) || keycode==46 || keycode==44 || keycode==8 || keycode==10 || keycode==13 || keycode==32)
		return true;
	else
      alert(" Enter letters only ");
		return false;
}

function isalphabetic(expr){
	var g='';
	if (expr.length==0)//no entry
		return false;
	for (var i=0;i< expr.length;i++){
		g=expr.charAt(i);
		if (!((g>='a' && g<='z') || (g>='A' && g<='Z') || g=='.' || g==',' || g==' '))
			return false;
	}
	return true;
}

function phone_(keycode){
	if (!((keycode>=48 && keycode<=57) || keycode==32 || keycode==44 || keycode==8))
		return false;
}
function isphone(expr) {
	var g='';
	if (expr.length==0)//no entry
		return false;
	for (var i=0;i< expr.length;i++){
		g=expr.charAt(i);
		if (!((g>='0' && g<=9) || g==' ' || g==','))
			return false;
	}
	return true;

}

var cnt,idx,i_,tim
var popup,val
//function to open the calender (datepicker) window
function showCalender(idx)
{
	var frm = document.forms[0];
	if (typeof idx=="number") {
		if (!frm.elements[idx])
			return;
	}
	else
		if (!eval("document.forms[0]." + idx))
			return;
		
	popup = window.createPopup()
	initContent()
	popup.show(350,1,250,150,document.body)

	tim = setTimeout('countDown('+ idx +')', 1)
		i_=idx;
}

function initContent() {
	if (popup && !popup.isOpen) {
		var popBody = popup.document.body
		popBody.style.fontSize = "24pt"
		popBody.style.textAlign = "center"
		var bodyText = "<object  border='0' style='background-color:yellow' classid='CLSID:8E27C92B-1264-101C-8A2F-040224009C02'  onMouseOut='' name='myCalender' width='250' height='150' > "
		bodyText += "</object>"
		popBody.innerHTML = bodyText
	}
}
function countDown(idx) {
	if (popup && popup.isOpen) {
		val = popup.document.all.myCalender.toString()
        var dot = val.split("/");
        val= dot[2]+"-"+dot[0]+"-"+dot[1];
		if (typeof i_ == "number" )  document.forms[0].elements[idx].value = val;
    	if (typeof i_ == "string" ) eval("document.forms[0]."+i_+".value = val");
		//}   
	/*	var currCount = 10;
		if (--currCount == 0) {
			popup.hide()
		//	document.forms[0].elements[idx].value = val
			popup = null
		} else {*/
			tim = setTimeout("countDown("+ i_ +")", 100)

		//}
	}
}





var isNS4 = (navigator.appName=="Netscape")?1:0;
