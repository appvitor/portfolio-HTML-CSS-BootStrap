var player, monster, cursors, txtScore, score, txtTime, timer;
var style = {font: '25px Arial', fill: '#bddb28'};

var game = new Phaser.Game(

	'100%',
	'100%',
	Phaser.CANVAS,
	'Game Demo',
	{ preload: preload, create: create, update: update }
)

function preload() {

	game.load.spritesheet('player', 'img/player2.png', 32, 48);
	game.load.spritesheet('monster', 'img/monster.png', 100, 114);
	game.load.image('background', 'img/bg.png');
	game.load.audio('music', 'music/music1.mp3');
	game.load.audio('woosh', 'sound/woosh2.mp3');
}

function create() {

	var music = game.sound.play('music');
	music.volume = 0.5;
	music.loopFull();

	game.world.resize(2000, 2000);
	game.add.sprite(0,0,'background');

	player = game.add.sprite(game.world.centerX, game.world.centerY, 'player');
	game.camera.follow(player);
	player.anchor.setTo(0.5, 0);
	game.physics.enable(player, Phaser.Physics.ARCADE);
	player.animations.add('walkdown', [0,1,2,3]);
	player.animations.add('walkleft', [4,5,6,7]);
	player.animations.add('walkright', [8,9,10,11]);
	player.animations.add('walkup', [12,13,14,15]);
	player.body.collideWorldBounds = true;

	monster = game.add.group();

	for (var i = 0; i < 10; i++) {
		
		var randomX = game.world.randomX;
		var randomY = game.world.randomY;

		if (randomX > (game.width - 300)){
    		randomX -= 300;
		}

  		if ((randomY > (game.height - 300))){
    		randomY -= 300;
  		}

		var theMonster = monster.create(randomX, randomY, 'monster');
		var styleName = { font: '25px Arial', fill: '#bddb28'};
		var text = game.add.text(randomX, randomY, (i+1).toString(), styleName);
		theMonster.theName = text;
	}

	//monster.animations.add('stands', [0,1,2,3,4,5,6,7]);
	game.physics.enable(monster, Phaser.Physics.ARCADE);

	timer = game.time.create();
	txtTime = game.add.text(10, 10, timer.duration.toFixed(0) + " Sec", style);
	txtTime.fixedToCamera = true;
	timer.start();

	score = 0;
	txtScore = game.add.text(10, 40, "No Dragons", style);
	txtScore.fixedToCamera = true;
	
	cursor = game.input.keyboard.createCursorKeys();
}

function update() {

	//monster.animations.play('stands', 6, true);

	if((cursor.left.isDown && cursor.down.isDown) || (cursor.right.isDown && cursor.down.isDown) || (cursor.left.isDown && cursor.up.isDown) || (cursor.right.isDown && cursor.up.isDown)){
		player.animations.stop();
	}
	else{
			
		if(cursor.left.isDown){
			player.animations.play('walkleft', 7, true);
			player.x -= 3;	
		}

		if(cursor.right.isDown){
			player.animations.play('walkright', 7, true);
			player.x += 3;
		}

		if(cursor.up.isDown){
			player.animations.play('walkup', 7, true);
			player.y -= 3;		
		}

		if(cursor.down.isDown){
			player.animations.play('walkdown', 7, true);
			player.y += 3;
		}


		game.physics.arcade.overlap(player, monster, monsterHitHandler);
		if(!cursor.down.isDown && !cursor.up.isDown && !cursor.left.isDown && !cursor.right.isDown){
			player.animations.stop();
		}
		
	}
}

function monsterHitHandler(playerObject, monsterObject){

	if(monsterObject.z === 0){

		score++;
		if(score === 1){
			txtScore.setText(score.toString() + " Dragon", style);
		}
		else{
			txtScore.setText(score.toString() + " Dragons", style);	
		}
		game.sound.play('woosh');
		monsterObject.theName.destroy();
		monster.remove(monsterObject);
	}
}