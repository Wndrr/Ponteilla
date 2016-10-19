/*
* @Author: Wndrr
* @Date:   2016-10-19 23:51:58
* @Last Modified by:   Wndrr
* @Last Modified time: 2016-10-20 00:08:51
*/

'use strict';

var ContactFormManager = function(selector, targetRoute)
			{
				/*==================================
				=            Properties            =
				==================================*/				
					/*----------  Public  ----------*/
					
					/*----------  Private  ----------*/		
					var form = $(selector);
					var serializedForm = null;

					var action = targetRoute;

					var checkboxes = 
					{
						container: form.find('#sectionsCheckboxes'),
						inputs: form.find('#sectionsCheckboxes:checkbox')
					};

					var email = 
					{
						container: form.find('#emailBlock'),
						input: form.find('#emailBlock input')
					};
				
				/*=====  End of Properties  ======*/
				
				/*===============================
				=            Methods            =
				===============================*/				
					/*----------  Public  ----------*/

					
					/*----------  Private  ----------*/	
					var bindEvents = function()
					{
						form.on('submit', function(e)
						{
							e.preventDefault();

							if(validate())
								submit();
						});

					};

					var validate = function()
					{
						/*=============================
						=            Email            =
						=============================*/
						
						var emailPattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
		    			
		    			var isEmailValid = emailPattern.test(email.input.val());

										
		    			if(isEmailValid)  	
		    				email.container.removeClass('has-error');

		    			else
							email.container.addClass('has-error');
						
						/*=====  End of Email  ======*/

						return isEmailValid;
					};

					var submit = function()
					{						

						//Save the form as a serialied object
						serializedForm = form.serialize();

						changeFormContent($('#contactLoader'), function()
						{
							//Sends form using AJAX
							$.ajax(
							{
								type: "POST",
								url: targetRoute,
								data: serializedForm,
								success: function(data)
								{
									changeFormContent(data, function(){});
								}
							});
						});	
					};	

					var changeFormContent = function(newContent, callBack)
					{
						//Hide the form
						form.slideUp('fast', function()
						{
							//Replace the form content with the provided content
							form.html(newContent);

							//Show the animation
							form.slideDown('slow', callBack());
						});
					};

				
				/*=====  End of Methods  ======*/

				/*===================================
				=            Constructor            =
				===================================*/
				
				bindEvents();
				
				/*=====  End of Constructor  ======*/				
			}