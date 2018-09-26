// when the form changes (one of the inputs), update the form with the incoming new result
var $post_category = $("#post_category")
var $_token = $("#post__token")

$post_category.change(function ()
{
	var $form = $(this).closest('form')

	var data = {}

	data[$_token.attr('name')]        = $_token.val()
	data[$post_category.attr('name')] = $post_category.val()

	$.post($form.attr('action'), data).then(function (response)
		{
			// log(response)
			// need to replace the current sub_category
			$("#post_sub_category").replaceWith(
				$(response).find("#post_sub_category")
			)
		}
	)
}) 

function log($message)
{
	console.log($message)
}