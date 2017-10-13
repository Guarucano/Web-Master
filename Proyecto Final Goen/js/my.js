function checkInput(input) {
	if (input.attr('id') != 'cedula' && input.attr('id') != 'email' && input.attr('id') != 'email2' && input.attr('id') != 'numero' && input.attr('id') != 'usuario' && input.attr('id') != 'password' && input.attr('id') != 'password2' && input.attr('id') != 'numeroPago') {
		return checkFilled(input);
		
	} else {
		if (checkFilled(input)) {
			if (input.attr('id') == 'cedula') {
				var check = checkFilled(input);
				if (check) {
					var validate = validateCedula(input);
					if (validate) {
						checkCedula(input);
					}
					return validate;
				} else {
					return check;
				}
			}

			if (input.attr('id') == 'email') {
				var check = checkFilled(input);
				if (check) {
					var validate = validateEmail(input);
					if (validate) {
						checkEmail(input);
					}
					return validate;
				} else {
					return check;
				}
			}

			if (input.attr('id') == 'email2') {
				var check = checkFilled(input);
				if (check) {
					return checkEqualEmail(input);
				} else {
					return check;
				}
			}

			if (input.attr('id') == 'numero') {
				var check = checkFilled(input);
				if (check) {
					return validatePhone(input);
				} else {
					return check;
				}
			}

			if (input.attr('id') == 'usuario') {
				checkUsuario(input);
				return checkFilled(input);
			}

			if (input.attr('id') == 'password') {
				var check = checkFilled(input);
				if (check) {
					var validate = validatePassword(input);
					return validate;
				} else {
					return check;
				}
			}

			if (input.attr('id') == 'password2') {
				var check = checkFilled(input);
				if (check) {
					return checkEqualPass(input);
				} else {
					return check;
				}
			}

			if (input.attr('id') == 'numeroPago') {
				var check = checkFilled(input);
				if (check) {
					return validateNumeroPago(input);
				} else {
					return check;
				}
			}
		} else {
			return checkFilled(input);
		}
	}
}

function checkFilled(input) {
	var formGroup = input.closest('div.form-group');
	if (input.val().length > 0) {
		formGroup.removeClass('has-error');
		formGroup.addClass('has-success');
		return true;
	} else { 
		formGroup.removeClass('has-success');
		formGroup.addClass('has-error');
		return false;
	}
}

function checkCedula(input) {
	var formGroup = input.closest('div.form-group');
	var cedula = input.val();
	$.ajax({
		url: "modules/validarCedula.php",
		type: "post",
		data: {
			cedula: cedula
		},
		dataType: "json"
	}).success(
		function(data){
			if (data == true) {
				formGroup.removeClass('has-success');
				formGroup.addClass('has-error');
				$('#alertci').slideDown();
			} else {
				formGroup.removeClass('has-error');
				formGroup.addClass('has-success');
				$('#alertci').slideUp();
			}
		}
	).fail(
		function(error){

		}
	);
}

function validateCedula(input) {
	var formGroup = input.closest('div.form-group');
	var cedula = input.val();
	var re = /^\d{1,}$/;
	var valid = re.test(cedula);
	if (!valid) {
		formGroup.removeClass('has-success');
		formGroup.addClass('has-error');
		$('#alertvci').slideDown();
	} else {
		formGroup.removeClass('has-error');
		formGroup.addClass('has-success');
		$('#alertvci').slideUp();
	}
	return valid;
}

function checkEmail(input) {
	var formGroup = input.closest('div.form-group');
	var email = input.val();

	$.ajax({
		url: "modules/validarEmail.php",
		type: "post",
		data: {
			email: email
		},
		dataType: "json"
	}).done(
		function(data){
			if (data == true) {
				formGroup.removeClass('has-success');
				formGroup.addClass('has-error');
				$('#alertemail').slideDown();
			} else {
				formGroup.removeClass('has-error');
				formGroup.addClass('has-success');
				$('#alertemail').slideUp();
			}
		}
	).fail(
		function(error){

		}
	);
}

function validateEmail(input) {
	var formGroup = input.closest('div.form-group');
	var email = input.val();
	var re = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
	var valid = re.test(email);
	if (!valid) {
		formGroup.removeClass('has-success');
		formGroup.addClass('has-error');
		$('#alertvemail').slideDown();
	} else {
		formGroup.removeClass('has-error');
		formGroup.addClass('has-success');
		$('#alertvemail').slideUp();
	}
	return valid;
}

function validatePhone(input) {
	var formGroup = input.closest('div.form-group');
	var phone = input.val();
	var re = /^\d{7}$/;
	var valid = re.test(phone);
	if (!valid) {
		formGroup.removeClass('has-success');
		formGroup.addClass('has-error');
		$('#alertvphone').slideDown();
	} else {
		formGroup.removeClass('has-error');
		formGroup.addClass('has-success');
		$('#alertvphone').slideUp();
	}
	return valid;
}

function checkUsuario(input) {
	var formGroup = input.closest('div.form-group');
	var usuario = input.val();

	$.ajax({
		url: "modules/validarUsuario.php",
		type: "post",
		data: {
			usuario: usuario
		},
		dataType: "json"
	}).done(
		function(data){
			if (data == true) {
				formGroup.removeClass('has-success');
				formGroup.addClass('has-error');
				$('#alertuser').slideDown();
			} else {
				formGroup.removeClass('has-error');
				formGroup.addClass('has-success');
				$('#alertuser').slideUp();
			}
		}
	).fail(
		function(error){

		}
	);
}

function validatePassword(input) {
	var formGroup = input.closest('div.form-group');
	var pass = input.val();
	var re = /((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[.,!?@]).{6,20})/;
	var valid = re.test(pass);
	console.log("valid = " + valid);
	if (!valid) {
		formGroup.removeClass('has-success');
		formGroup.addClass('has-error');
		$('#alertvpass').slideDown();
	} else {
		formGroup.removeClass('has-error');
		formGroup.addClass('has-success');
		$('#alertvpass').slideUp();
	}
	return valid;
}

function checkEqualPass(input) {
	var pass2 = input.val();
	var pass = $('#password').val();
	if (pass != pass2) {
		$('#passgroup, #passgroup2').removeClass('has-success');
		$('#passgroup, #passgroup2').addClass('has-error');
		$('#alertpass').slideDown();
		return false;
	} else {
		$('#passgroup, #passgroup2').removeClass('has-error');
		$('#passgroup, #passgroup2').addClass('has-success');
		$('#alertpass').slideUp();
		return true;
	}
}

function checkEqualEmail(input) {
	var email2 = input.val();
	var email = $('#email').val();
	if (email != email2) {
		$('#emailgroup, #emailgroup2').removeClass('has-success');
		$('#emailgroup, #emailgroup2').addClass('has-error');
		$('#alertemail2').slideDown();
		return false;
	} else {
		$('#emailgroup, #emailgroup2').removeClass('has-error');
		$('#emailgroup, #emailgroup2').addClass('has-success');
		$('#alertemail2').slideUp();
		return true;
	}
}

function validateNumeroPago(input) {
	var formGroup = input.closest('div.form-group');
	var numeroPago = input.val();
	var re = /^\d{1,}$/;
	var valid = re.test(numeroPago);
	if (!valid) {
		formGroup.addClass('has-error');
		$('#alertvnumeropago').slideDown();
	} else {
		formGroup.removeClass('has-error');
		$('#alertvnumeropago').slideUp();
	}
	return valid;
}