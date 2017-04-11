function change_status(){
	document.form.start.disabled = (document.form.inputText.value.length > 0) ? false : true;
}

change_status();
