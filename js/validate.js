//JS file to validate user account generation

	
function formValidator()
{	
	var errors = 'false';
	document.getElementById('nameError').innerHTML = '';
	document.getElementById('emailError').innerHTML = '';
	document.getElementById('passwordError').innerHTML = '';
	document.getElementById('confirmPasswordError').innerHTML = '';
	
	if (document.getElementById('name').value =='')
	{
  		document.getElementById('nameError').innerHTML = 'Please enter your name.';
  		errors='true';
	}
	
	
	if ((document.getElementById('email').value =='' || document.getElementById('email').value.indexOf('@', 0) == -1) || document.getElementById('email').value.indexOf('.') == -1)
	{
  		document.getElementById('emailError').innerHTML = 'Enter a valid email.';
  		errors='true';
	}
	
	if (document.getElementById('password').value.length < 3)
	{
  		document.getElementById('passwordError').innerHTML = 'Please enter a password that is longer than three characters.'; // I wanted passwords to be short for testing purposes. This requirement would change if implemented in an actual live environment. 
  		errors='true';

 	}

	if (document.getElementById('password').value =='')
	{
  		document.getElementById('passwordError').innerHTML = 'Please enter a password.';
  		errors='true';

 	}
	
	if (document.getElementById('password2').value != document.getElementById('password').value)
	{
  		document.getElementById('passwordError').innerHTML = 'Passwords must match.';
  		errors='true';

 	}
	
			
	
	if (errors == 'true')
	{
		return false;
		
		
	}
		
}// JavaScript Document