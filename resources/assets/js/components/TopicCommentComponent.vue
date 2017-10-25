<template>
	<div>
		
		<div v-if='!user'>
			<div class="alert-info">
				<p class='icon'><i class="fa fa-check"></i></p>
				<p>
					На жаль, Ви не можете коментувати топік, тому що не авторизовані. <a :href="signupurl">Увійти або зареєструватися</a>
				</p>
			</div>
		</div>
		<div v-else>
			
		</div>

		

	</div>
</template>

<script>
export default {

  name: 'TopicCommentComponent',

  props: ['token', 'topicid', 'user', 'signupurl'],

  data () {
    return {
    	comment: {
    		text: ""
    	}
    };
  }
};
</script>

<style lang="css" scoped>
</style>