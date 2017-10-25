<template>
	<div v-if="success == false">
		<form v-on:submit.prevent="addComment($event)" class="form left comment">
			<div>
				<label for="c-content"></label>
				<textarea v-model="content" id="c-content" placeholder="Залишіть Ваш комментар тут..."></textarea>
			</div>
			<div>
				<button type='submit' class='read-more--button'>
					Додати +
				</button>
			</div>
		</form>
	</div>
	<div v-else class='commentary'>
		<div class='c-aside'>
			<div class="c-aside--image">
				<img :src="prefix+comment.author_avatar" :alt="comment.author_name">
			</div>
		</div>
		<div class="c-inside">
			<div class="c-inside--content">
				<h3><a :href='prefix+"/profile/"+comment.author_id'>{{comment.author_name}}</a></h3>
				<p>
					{{comment.content}}
				</p>
			</div>
		</div>
	</div>
</template>

<script>
export default {

  name: 'CommentComponent',

  props: ['token', 'postid', 'url', 'prefix'],

  data () {
    return {
    	content: "",
    	success: false,
   		comment: {}
    };
  },

  methods: {
  	
  	addComment(ev) {
  		var self = this;

  		this.$http.post(this.url, {
  			_token: this.token,
  			id: this.postid,
  			content: this.content
  		}).then(res => {
  			self.comment = res.body;
  			self.success = true;
  		}, err => console.error(err))

  	}

  }

};
</script>
