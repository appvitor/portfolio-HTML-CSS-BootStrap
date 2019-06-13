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
		font-size: 0.9em;
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
	.flexCenter {
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
	}
	.imagemBg {
		background-color: #A9BACE;
		background-blend-mode: multiply;
		background-size: 100% 100%;
        background-repeat: no-repeat;
	}
	.mainWidth {
		width: 50vw;
	}
	fieldset {
		border: 2px solid;
		padding-right: 3rem;
		padding-left: 3rem;
 	}
	legend {
 		margin-left: auto;
 		margin-right: auto;
	}
	label {
		display: block;
		text-align: center;
		margin-bottom: 0.7rem;
	}
	input, textarea {
		display: block;
		background-color: rgba(255, 255, 255, 0.3);
		color: white;
		border: none;
		width: 100%;
		height: 2rem;
		font-size: 1em;
	}
	textarea {
		resize: none;
		height: 5rem;
	}
	a, input[type=submit] {
		display: inline-block;
		width: 35vw;
		height: 2rem;
		padding-top: 0.5rem;
		background-color: #393939;
		color: #938b8b;
		text-decoration: none;
	}
	input[type=submit] {
		padding-top: 0;
	}
</style>
