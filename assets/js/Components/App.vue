<template>
	<div>
		<h2 class="text-center">Hello world!</h2>
		<h3 class="text-center" v-if="loading">Processing...</h3>

		<div v-html="formContent" @submit.prevent="handleFormSubmission"></div>
	</div>
</template>

<script>
	import axios from 'axios'
    import serialize from 'form-serialize'
    import Routing from '../../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';
    const routes = require('../routes.json');

    Routing.setRoutingData(routes);

	export default {
		data: function (){
			return {
			    formContent: "",
				loading: true
				// might need to add all field that i have in the form as models in here
			}
		},
		beforeCreate: function ()
		{
		    // this.formContent = `
				// <form name="form" method="post" action="/form" v-bind:onsubmit="handleFormSubmission">
				// 	<div id="form"><div class="form-group"><label class="control-label required" for="form_title">Title</label><input type="text" id="form_title" name="form[title]" required="required" class="form-control"></div><div class="form-group"><label class="control-label required" for="form_description">Description</label><input type="text" id="form_description" name="form[description]" required="required" class="form-control"></div><div class="form-group"><label class="control-label required" for="form_author">Author</label><input type="text" id="form_author" name="form[author]" required="required" class="form-control"></div><div class="form-group"><button type="submit" id="form_save" name="form[save]" class="btn btn-success btn">Save</button></div><input type="hidden" id="form__token" name="form[_token]" value="STbDrthqzNyj3ne_Df7QE8EFxadsEzCVvgpS66SivTU"></div>
				// </form>`;
			// make a request to the end-point to get the form as a string ~ done
			// expose the link in the controller ~ done
			axios.get(Routing.generate('form_getter'))
				.then((response) =>
				{
				    this.formContent = response.data
                    this.loading = false
				})
				.catch((error) =>
				{
					console.error(error)
                    this.loading = false
                })
		},
		methods:
		{
			handleFormSubmission: function (event)
			{
                // new Promise(function (resolve, reject)
				// {
                 //    let xhr = new XMLHttpRequest()
                 //    // let formData = new FormData()
                 //    // third argument specifies if it's an async request or a sync
                 //    xhr.addEventListener('load', function ()
                 //    {
                 //        if (this.readyState === 4 ) {
                 //            if (this.status === 200) {
                 //                resolve(JSON.parse(this.response))
                 //            } else {
                 //                reject(this.status)
                 //            }
                 //        }
                 //    })
                 //    xhr.open("POST", event.target.getAttribute('action'))
                 //    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
                //
                 //    xhr.send({
				// 		name: 'Mohammed BAZA'
				// 	})
				// })
                 //    .then((response) =>
                 //    {
                //
                 //        this.loading = false
                 //        console.log(response)
                 //    })
                 //    .catch((error) =>
                 //    {
                 //        this.loading = false
                 //        alert(error)
                 //    })
				let form = event.target
				axios.post(form.getAttribute('action'), serialize(form),
					// the object below is for axios options
					{
					    headers:
							{
							    'X-Requested-With' : 'XMLHttpRequest'
							}
					})
					.then((response) =>
					{

                        this.loading = false
						console.log(response)
					})
					.catch((error) =>
					{
                        this.loading = false
						alert(error)
					})
			}
		}
	}
</script>

<style>
	
</style>