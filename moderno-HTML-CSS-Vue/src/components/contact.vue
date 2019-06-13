<template>
	<div class="contact imagemBg colorWhite">
		<h1 class="textCenter">CONTACT US</h1>
		<div class="content">
			<div class="smMt smMb">
				<h2 class="textCenter">MEET US</h2>
				<h2 class="mt mb">
					<i class="fas fa-phone fa-rotate-90 mr"></i> +1-202-555-0107
				</h2>
				<h2 class="mt mb">
					<i class="fas fa-envelope mr"></i> support@ourCompany.com
				</h2>
				<h2 class="mt mb">
					<i class="fas fa-map-marker-alt mr"></i> Imaginary Street, 69, N.Y. City
				</h2>
				<div class="mt">
					<a href="https://www.facebook.com/" class="webSocial" id="facebook">
						<i class="fab fa-facebook fa-2x"></i>
					</a>
					<a href="https://www.instagram.com/" class="webSocial">
						<i class="fab fa-instagram fa-2x"></i>
					</a>
					<a href="https://www.twitter.com/" class="webSocial">
						<i class="fab fa-twitter fa-2x"></i>
					</a>
					<a href="https://www.linkedin.com/" class="webSocial">
						<i class="fab fa-linkedin fa-2x"></i>
					</a>
				</div>
			</div>
			<div class="smMt smMb">
				<form class="flexCenter">
					<h2 class="textCenter">MESSAGE US</h2>
					<div>
						<label>Name</label>
						<input type="text" name="nameField" required>
					</div>
					<div class="smMt">
						<label>E-mail</label>
						<input type="email" name="emailField" required>
					</div>
					<div class="smMt">
						<label>Message</label>
						<textarea required></textarea>
					</div>
					<input type="submit" name="" value="SEND MESSAGE"class="mt buttonLink">
				</form>
			</div>
		</div>
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
		min-height: 100vh;
		background-image: url(../assets/bg3.jpg);
		justify-content: center;
	}
	.content {
		display: flex;
		justify-content: space-around;
	}
	@media only screen and (max-width: 768px) {
		.content {
			flex-direction: column;
			text-align: center;
		}
	}
	form div {
		width: 100%;
	}
	.webSocial {
		margin-left: 1rem;
		margin-right: 1rem;
		color: white;
	}
	#facebook {
		margin-left: 0;
	}
</style>