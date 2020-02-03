<!DOCTYPE html>
<html>
<head>
	<title>JQuery-validation demo | Bootstrap</title>

  <link href="<?php echo base_url(); ?>jq-pro-master/css/bootstrap.min.css" rel="stylesheet">

	<script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.validate.js'></script>
</head>
<body>

						<form id="signupForm" method="post" class="form-horizontal" action="">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="password">Password</label>
								<div class="col-sm-6">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="confirm_password">Confirm password</label>
								<div class="col-sm-6">
									<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" />
								</div>
							</div>

						</form>

	<script type="text/javascript">
		$.validator.setDefaults( {
			submitHandler: function () {
				alert( "submitted!" );
			}
		} );

		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					firstname: "required",
					lastname: "required",
					username: {
						required: true,
						minlength: 2
					},
					password: {
						required: true,
						minlength: 5
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					email: {
						required: true,
						email: true
					},
					agree: "required"
				},
				messages: {
					firstname: "Please enter your firstname",
					lastname: "Please enter your lastname",
					username: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 2 characters"
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email: "Please enter a valid email address",
					agree: "Please accept our policy"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `invalid-feedback` class to the error element
					error.addClass( "invalid-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.next( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
				}
			} );

		} );
	</script>
</body>
</html>
