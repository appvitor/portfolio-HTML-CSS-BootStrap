var cursor, space, player, enemy, score, playerLife, enemyLife, explosion;
var txtTimer, timerSize, txtPlayerLife, txtEnemyLife, txtScore, txtGameOver;
var playerAtks, enemyAtks, playerAtk, enemyAtk, playerAtkTime, enemyAtkTime;
var wingsSound, playerFireSound, gameOverSound, gameOverPlayed;
var style = {font: '60px Bell MT', fill: '#e5f442'};

var game = new Phaser.Game(
	'100%',
	'100%',
	Phaser.CANVAS,
	'Game Dragons',
	{ preload: preload, create: create, update: update }

)
//LARGURA X ALTURA

function preload() {
	game.load.spritesheet('player', 'img/player.png', 255, 233);
	game.load.spritesheet('enemy', 'img/enemy.png', 260, 253);
	game.load.spritesheet('playerAtk', 'img/playerAtk.png', 62.7, 19);
	game.load.spritesheet('enemyAtk', 'img/enemyAtk.png', 80, 42);
	game.load.spritesheet('explosion', 'img/explosion.png', 47, 45);
	game.load.image('background', 'img/background.png');
	game.load.audio('dragonWings', 'sound/dragonWings.mp3');
	game.load.audio('playerFireSound', 'sound/playerFireSound.mp3');
	game.load.audio('gameOverSound', 'sound/gameOverSound.mp3');
}

function create() {

	game.physics.startSystem(Phaser.Physics.ARCADE);
	wingsSound = game.sound.play('dragonWings');
	wingsSound.volume = 0.3;
	wingsSound.loopFull();
	gameOverPlayed = false;

	score = 100000;
	playerLife = 100;
	enemyLife = 100;
	playerAtkTime = 0;
	enemyAtkTime = 0;
	game.add.sprite(0,0, 'background');

	txtTimer = game.add.text(game.world.centerX - 50, top, game.time.now, style);
	txtPlayerLife = game.add.text(txtTimer.x - 300, top, playerLife, style);
	txtEnemyLife = game.add.text(txtTimer.x + 350, top, enemyLife, style);

	player = game.add.sprite(game.world.left + 100, game.world.centerY, 'player');
	game.physics.enable(player, Phaser.Physics.ARCADE);
	player.body.collideWorldBounds = true;
	player.animations.add('fly', [0,1,2,3,4,5,6,7,8,9]);

	enemy = game.add.sprite(game.world.right + 100, game.world.centerY, 'enemy');
	game.physics.enable(enemy, Phaser.Physics.ARCADE);
	enemy.body.collideWorldBounds = true;
	enemy.animations.add('fly', [0,1,2,3,4,5,6,7,8]);

	playerAtks = game.add.group();
	playerAtks.enableBody = true;
	playerAtks.physicsBodyType = Phaser.Physics.ARCADE;
	playerAtks.createMultiple(30, 'playerAtk');
	playerAtks.callAll('events.onOutOfBounds.add', 'events.onOutOfBounds', resetPlayerShoot, this);
	playerAtks.setAll('checkWorldBounds', true);

	enemyAtks = game.add.group();
	enemyAtks.enableBody = true;
	enemyAtks.physicsBodyType = Phaser.Physics.ARCADE;
	enemyAtks.createMultiple(30, 'enemyAtk');
	enemyAtks.callAll('events.onOutOfBounds.add', 'events.onOutOfBounds', resetEnemyShoot, this);
	enemyAtks.setAll('checkWorldBounds', true);

	cursor = game.input.keyboard.createCursorKeys();
	space = game.input.keyboard.addKey(Phaser.Keyboard.SPACEBAR);
}

function update() {

	if(playerLife > 0 && enemyLife > 0){

		if(cursor.up.isDown){
		 	player.y -= 5;
		}

		if(cursor.down.isDown){
			player.y += 5;
		}

		if(cursor.left.isDown){
			player.x -= 5;
		}

		if(cursor.right.isDown && (enemy.x - 500) > player.x){
			player.x += 5;
		}

		if(space.isDown){
			playerShoot();
		}

		if(game.time.now%4 === 0){

			var numRandom = Math.floor((Math.random()*15)+1)
			if(numRandom <= 3 && (enemy.x >= (player.x + 500))){
				enemy.y -= 20;
				enemy.x -= 20;//Baixo p/ FRENTE
				enemyShoot();
			}

			else if(numRandom >= 4 && numRandom <= 6){
				enemy.y += 20;
				enemy.x += 20;//ATRAS p/ Cima
				enemyShoot();
			}

			else if(numRandom >= 7 && numRandom <= 9){
				enemy.y -= 20;
				enemy.x += 20;//ATRAS p/ Baixo
			}

			else if (numRandom >= 10 && numRandom <= 12 && (enemy.x >= (player.x + 500))){
				enemy.y += 20;
				enemy.x -= 20;//Cima p/ FRENTE
			}
		}
		
		score -= 15;

		timerSize = (game.time.now.toString().length)-3;
		txtTimer.setText(game.time.now.toString().substr(0, timerSize), style);
		txtPlayerLife.setText(playerLife.toString() + '%', style);
		txtEnemyLife.setText(enemyLife.toString() + '%', style);

		player.animations.play('fly', 10, true);
		enemy.animations.play('fly', 8, true);
		game.physics.arcade.overlap(playerAtks, enemy, playerAtkEnemyHit);
		game.physics.arcade.overlap(enemyAtks, player, enemyAtkPlayerHit);
		game.physics.arcade.overlap(playerAtks, enemyAtks, atksCollide);		
	}

	else{

		if(gameOverPlayed == false){
			gameOverSound = game.add.sound('gameOverSound');
			gameOverSound.play();
			gameOverSound.volume = 0.7;
			gameOverPlayed = true;
		}

		txtEnemyLife.setText(enemyLife.toString() + '%', style);
		txtPlayerLife.setText(playerLife.toString() + '%', style);

		txtGameOver = game.add.text(game.world.centerX - 140, game.world.centerY, txtGameOver, style);
		txtScore = game.add.text(game.world.centerX - 170, game.world.centerY + 50, score, style);

		if(playerLife === 0 && enemyLife === 0){
			const scoreDraw = score/2;
			txtGameOver.setText("It's a Draw", style);
			txtScore.setText(scoreDraw + ' Points', style);

		}	
		else if(playerLife === 0){ 
			score = 0;
			txtGameOver.setText('You Lose...', style);
			txtScore.setText('00000 Points', style);
		}
		else{
			txtGameOver.setText('You Win!!!', style);
			txtScore.setText(score + ' Points', style);
		}
		
	}
}

function playerShoot(){

	playerFireSound = game.sound.play('playerFireSound');
	playerFireSound.volume = 0.2;

	if(game.time.now > playerAtkTime){

		playerAtk = playerAtks.getFirstExists(false);
	}

	if(playerAtk){
		
		playerAtk.reset(player.x + 200, player.y + 65);
		playerAtk.body.velocity.x = +300;
		playerAtk.animations.add('fly', [0,1,2,3,4,5,6,7]);
		playerAtk.animations.play('fly', 10, true);
		playerAtkTime = game.time.now + 100;
	}
}

function enemyShoot(){

	if(game.time.now > enemyAtkTime){

		enemyAtk = enemyAtks.getFirstExists(false);
	}

	if(enemyAtk){

		enemyAtk.reset(enemy.x -10, enemy.y + 105);
		enemyAtk.body.velocity.x = -300;
		enemyAtk.animations.add('fly', [0,1,2,3,4]);
		enemyAtk.animations.play('fly', 10, true);
		enemyAtkTime = game.time.now + 100;
	}
}

function resetPlayerShoot(playerAtk){
	playerAtk.kill();
}

function resetEnemyShoot(enemyAtk){
	enemyAtk.kill();
}

function playerAtkEnemyHit(playerAtks, enemy){
	if(enemyLife - 2 > 0){
		enemyLife -= 2;
		enemy.kill();
	}
	else {
		enemyLife = 0;
	}
	
}

function enemyAtkPlayerHit(enemyAtks, player){
	if(playerLife - 3 > 0){
		playerLife -= 3;
		player.kill();
	}
	else {
		playerLife = 0;
	}
}

function atksCollide(playerAtks, enemyAtks){
	explosion = game.add.sprite(enemyAtks.x, enemyAtks.y, 'explosion');
	playerAtks.kill();
	enemyAtks.kill();
	explosion.visible = true;
	explosion.animations.add('explosion');
	explosion.animations.play('explosion', 10, false, true);
}