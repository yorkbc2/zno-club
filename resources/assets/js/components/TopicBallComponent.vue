<template>
	<span class="balls">
		<button class="top-butt"><i class="fa fa-chevron-up"></i></button>
			<b>{{tpBalls}}</b>
		<button class='bottom-butt'><i class="fa fa-chevron-down"></i></button>
	</span>

</template>

<script>
export default {

  name: 'TopicBallComponent',

  props: ['balls', 'userid', 'tokenid'],

  data () {
    return {
    	tbBalls: this.balls
    };
  },

  methods: {
  	up() {},
  	down() {}
  }
};
</script>

<style lang="css" scoped>
</style>