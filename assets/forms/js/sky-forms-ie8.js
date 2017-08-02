jQuery(function()
{
	jQuery('.pinpointe-signup-form input[type="checkbox"]:checked, input[type="radio"]:checked').addClass('checked');
	
	jQuery('.pinpointe-signup-form .sky-form').on('change', 'input[type="radio"]', function()
	{
		jQuery(this).closest('.pinpointe-signup-form .sky-form').find('input[name="' + jQuery(this).attr('name') + '"]').removeClass('checked');
		jQuery(this).addClass('checked');
	});
	
	jQuery('.pinpointe-signup-form .sky-form').on('change', 'input[type="checkbox"]', function()
	{
		jQuery(this).toggleClass('checked');
	});
});