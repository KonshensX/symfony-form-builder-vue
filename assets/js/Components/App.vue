<template>
	<div>
		<h2 class="text-center">Hello world!</h2>

		<div v-html="formContent">
			{{ formContent }}
		</div>
	</div>
</template>

<script>
	import axios from 'axios'
    const routes = require('../routes.json');
    import Routing from '../../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

    Routing.setRoutingData(routes);

	export default {
		data: function (){
			return {
			    formContent: "",
				// might need to add all field that i have in the form as models in here
			}
		},
		created: function ()
		{
			// make a request to the end-point to get the form as a string ~ done
			// expose the link in the controller ~ done
			axios.get(Routing.generate('form_getter'))
				.then((response) =>
				{
				    this.formContent = response.data
				})
				.catch((error) =>
				{
					console.error(error)
				})
		},
		methods:
		{
			handleFormSubmission: function (event)
			{
				// handle the form submittion
				console.log(event)
			}
		}
	}
</script>

<style>
	
</style>