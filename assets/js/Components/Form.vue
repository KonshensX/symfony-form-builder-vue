<template>
	<div>
		<h2 class="text-center">Hello world!</h2>
		{{ formContent }}
	</div>
</template>

<script>
	import axios from 'axios'
	let Routing = require('../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router')
	let Routes = require('./js_routes.json')

	Routing.setRoutingData(Routes)

	export default {
		data: function ()
		{
			return {
				formContent: ""
			}
		},
		created: function ()
		{
			// make a request to the form url
			// XXX: 
			// need to get dump the url in the controller and get here 
			axios.get()

			// set the response to the formContent
			// 
		}
	}
</script>

<style>
	
</style>