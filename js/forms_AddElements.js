function addSeparatorsNF(nStr, inD, outD, sep) {
	nStr += '';
	var dpos = nStr.indexOf(inD);
	var nStrEnd = '';
	if (dpos != -1) {
		nStrEnd = outD + nStr.substring(dpos + 1, nStr.length);
		nStr = nStr.substring(0, dpos);
	}
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(nStr)) {
		nStr = nStr.replace(rgx, '$1' + sep + '$2');
	}
	return nStr + nStrEnd;
}

function addElement_Company() {
	var ni = document.getElementById('company_fields');	
	var numi = document.getElementById('startValue_Company');	
	var num = (document.getElementById('startValue_Company').value -1)+ 2;
	numi.value = num;	
	var newdiv = document.createElement('div');
	var divIdName = 'my'+num+'Div_Company';
	newdiv.setAttribute('id',divIdName);
	if (num == 1) {
		var divClassName = 'row padding-top-30 padding-bottom-30 border-top';
	}
	else {
		var divClassName = 'row padding-bottom-30 border-top';
	}
	newdiv.setAttribute('class',divClassName);
	newdiv.innerHTML = '<div class="6u"><section><div class="row half"><div class="12u"><label>COMPANY NAME</label><input class="text" type="text" name="company_name[]" /></div></div><div class="row half"><div class="12u"><label>KEY CONTACT JOB TITLE</label><input class="text" type="text" name="contact_job[]" /></div></div><div class="row half"><div class="12u"><label>KEY CONTACT EMAIL ADDRESS</label><input class="text" type="text" name="contact_email[]" /></div></div></section></div><div class="6u"><section><div class="row half"><div class="12u"><label>KEY CONTACT NAME</label><input class="text" type="text" name="contact_name[]" /></div></div><div class="row half"><div class="12u"><label>KEY CONTACT PHONE NUMBER</label><input class="text" type="text" name="contact_phone[]" /></div></div><div class="row half"><div class="12u"><label>HOW DO YOU KNOW THIS PERSON?</label><select name="contact_how[]"><option value="We are related">We are related</option><option value="We are friends">We are friends</option><option value="We are acquaintances">We are acquaintances</option><option value="They are currently a colleague">They are currently a colleague</option><option value="I used to work with this person">I used to work with this person</option><option value="Other">Other</option></select></div></div></section></div>';
	
	ni.appendChild(newdiv);
}