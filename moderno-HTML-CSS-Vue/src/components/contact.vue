<template>
	<div class="contact flexCenter imagemBg colorWhite">
		<h2 class="mt mb">CONTACT US</h2>
		<form class="flexCenter">
			<div>
				<label>Name</label>
				<input type="text" name="nameField" required>
			</div>
			<div class="mt">
				<label>E-mail</label>
				<input type="email" name="emailField" required>
			</div>
			<div class="mt">
				<label>Message</label>
				<textarea required></textarea>
			</div>
			<input type="submit" name="" value="SEND MESSAGE"class="mt">
		</form>
	</div>
</template>
<script>
	export default{
		name:'contact',
		data (){
			return{
				title:'Contact'
			}
		}
	}
</script>
<style scoped>
	.contact {
		height: 97vh;
		background-image: url(../assets/bg3.jpg);
		justify-content: flex-start;
	}
	form div {
		width: 100%;
	}
</style>