function getXMLHTTP() { //fuction to return the xml http object
	var xmlhttp=false;	
	try{
		xmlhttp=new XMLHttpRequest();
	}
	catch(e)	{		
		try{			
			xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(e){
			try{
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e1){
				xmlhttp=false;
			}
		}
	}
		
	return xmlhttp;
}

function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    theEvent.preventDefault();
  }
}

function validate_dropdown(field) {
	with (field) {
		if (selectedIndex == 0) {
        	return false;
		}
		else {	
			return true;
		}
	}
}

function validate_required(field) {
	with (field) {
		if (value==null||value=="") {
			return false;
		}
		else {	
			return true;
		}
	}
}

function validate_email(field) {
	with (field) {
		apos=value.indexOf("@");
		dotpos=value.lastIndexOf(".");
	  
		if (apos<1||dotpos-apos<2) {
		  return false;
		}
		else {
		  return true;
		}
	}
}

function validate_entry(thisform) {
	with (thisform) {
		if (validate_required(your_name) == false) {
			  your_name.focus();
			  return false;
		}
		if (validate_required(your_surname) == false) {
			  your_surname.focus();
			  return false;
		}
		if (validate_email(your_email) == false) {
			  your_email.focus();
			  return false;
		}
		if (validate_required(your_cell) == false) {
			  your_cell.focus();
			  return false;
		}
		if (validate_required(first_company) == false) {
			  first_company.focus();
			  return false;
		}
		if (validate_required(first_contact_name) == false) {
			  first_contact_name.focus();
			  return false;
		}
		if (validate_required(first_contact_job) == false) {
			  first_contact_job.focus();
			  return false;
		}
		if (validate_required(first_contact_phone) == false) {
			  first_contact_phone.focus();
			  return false;
		}
		if (validate_email(first_contact_email) == false) {
			  first_contact_email.focus();
			  return false;
		}
	}
}