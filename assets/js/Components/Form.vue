<template>
	<div>
		<h2 class="text-center">Hello world!</h2>

		<form action="#" v-bind:onsubmit="handleForm">
			<input type="text" v-model="name" placeholder="Your name!">

			<button type="submit">Send</button>
		</form>
	</div>
</template>

<script>

	export default {
		data: function ()
		{
			return {
				name: "Med BAZA"
			}
		},
		created: function ()
		{

		},
		methods: {
		    handleForm: function (event)
			{
			    event.preventDefault()
				console.log(event)
			}
		}
	}
</script>

<style>
	
</style>