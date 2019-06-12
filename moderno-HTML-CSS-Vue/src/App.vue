<template>
	<div id="app">
		<router-view/>
	</div>
</template>

<script>
	export default {
		name: 'App'
	}
</script>

<style>
	@font-face {
		font-family: 'Maipo Sans SemiBold';
		src: url('assets/MaipoSansSemiBold.otf');
	}
	#app {
		font-family: 'Maipo Sans SemiBold';
		color: #595252;
	}
	p {
		font-size: 0.8em;
	}
	.colorWhite {
		color: white;
	}
	.colorGrey {
		color: #938b8b;
	}
	.mt {
		margin-top: 3rem;
	}
	.mb {
		margin-bottom: 4rem;
	}
	.mr {
		margin-right: 1rem;
	}
	.ml {
		margin-left: 1rem;
	}
	.smMt {
		margin-top: 1rem;
	}
	.smMb {
		margin-bottom: 1rem;
	}
	a {
		display: inline-block;
		width: 20rem;
		height: 2rem;
		padding-top: 0.5rem;
		background-color: #393939;
		color: #938b8b;
		text-decoration: none;
	}
	.imagemBg {
		background-color: #A9BACE;
		background-blend-mode: multiply;
		background-size: 100% 100%;
        background-repeat: no-repeat;
	}
	.flexCenter {
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
	}
	.mainWidth {
		width: 40vw;
	}
</style>
