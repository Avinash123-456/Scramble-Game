<!DOCTYPE html>
<html>
<head>
	<title>ScrambleGame.com</title>
	<link href="https://fonts.googleapis.com/css?family=Coda+Caption:800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fugaz+One&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<style type="text/css">
		*{
			margin: 0;padding: 0;box-sizing: border-box;
		}
		
		header h1{
			display: flex;
			background-color: green;
			width: 100%;
			height: 105px;
			align-items: center;
			justify-content: center;
			font-size: 60px;
			color: #ffbf00;
			word-spacing: 5px;
			letter-spacing: 4px;
		    text-shadow: 3px 3px 10px blueviolet;
			font-family: 'Coda Caption', sans-serif;
		}

		/* game design */
		section{
			width: 100%;
			height: 86vh;
			display: flex;
			align-items: center;
			/*background-color: red;*/
			justify-content: center;
		}
		.display::before{
			content: "";
			background-image: url('https://images.unsplash.com/photo-1519669556878-63bdad8a1a49?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80');
			background-size: cover;
			background-position: center;
			width: 60%;
			height: 70vh;
			position: absolute;
			z-index: -1;
			opacity: 0.9;
		}
		.display{
			border : 2px solid red;
			width: 60%;
			height: 70vh;
			/*background-color: skyblue;*/
			display: flex;
			flex-direction: column;
			align-items: center;justify-content: center;
		}
		.display h1{
			font-size: 70px;
			letter-spacing: 10px;
			margin-bottom: 20px;
			text-shadow: 3px 3px 10px darkblue;
    		color: crimson;
    		font-family: 'Fugaz One', cursive;
		}
		input{
			height: 70px;
			visibility: hidden;
			width: 40%;
			margin-bottom: 30px;
			font-size: 40px;
			text-align: center;
			font-weight: bold;
			border-radius: 20px;
			/*visibility: hidden;*/
			font-family: 'Fugaz One', cursive;
		}
		#btn{
			width: 30%;
			height: 50px;
			border-radius: 10px;
			font-size: 30px;
			border : none;
			font-family: 'Coda Caption', sans-serif;
		}
		#btn:hover{
			animation: btn;
			animation-duration: 5s;
			animation-iteration-count: infinite; 
		}
		@keyframes btn{
			0%{
				background-color: grey;
				transform: scale(1);

			}
			100%{
				background-color: white;
				transform: scale(1.1);
				
			}
		}

		/* Responsive Design */
		@media screen and (max-width: 468px){
			header h1{
				font-size: 30px;
				height: 70px;
			}

			.display::before{
				content: "";
				background-image: url('https://images.unsplash.com/photo-1519669556878-63bdad8a1a49?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80');
				background-size: cover;
				background-position: center;
				width: 80%;
				height: 600px;
				position: absolute;
				z-index: -1;
				opacity: 0.9;
			}
			.display{
				height: 600px;
				width: 80%;
			}
			.display h1{
				font-size: 40px;
				letter-spacing: 4px; 
			}
			input{
				width: 80%;				
			}
			#btn{
				width: 70%;
				font-size: 25px;
			}
		}
		@media screen and (max-width: 650px){
			header h1{
				font-size: 40px;
				height: 70px;
			}

			.display::before{
			content: "";
			background-image: url('https://images.unsplash.com/photo-1519669556878-63bdad8a1a49?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80');
			background-size: cover;
			background-position: center;
			width: 80%;
			height: 600px;
			position: absolute;
			z-index: -1;
			opacity: 0.9;
		}
		.display{
			height: 600px;
			width: 80%;
		}
		.display h1{
			font-size: 50px;
			letter-spacing: 6px; 
		}
		input{
			width: 80%;				
		}
		#btn{
			width: 70%;
			font-size: 33px;
		}
		}
	</style>
</head>
<body>
	<header>
		<h1>Scramble Game</h1>
	</header>

	<!-- Game interface -->
	<section class="game">
		<div class="display">
			<h1 id="text"-></h1>
			<input type="text" name="name" id="kokare">
			<button type="submit" id="btn">Start Game</button>
		</div>
	</section>

	<script type="text/javascript">
		
		let text = document.getElementById('text');
		let kokare = document.getElementById('kokare');
		let btn = document.getElementById('btn');
		let play = false;

		let newWords = "";
		let randWords = "";
		let sWords = ['python','ruby','java','javascript','php','swift','sql','reactjs','angular','expressjs'];
		const createWord = () => {
			let randNum = Math.floor(Math.random()*sWords.length);
			myword = sWords[randNum];
			let newTempWords = sWords[randNum].split("");
			return newTempWords;
		}

		const scrambleWords = (arr) => {
			for(let i=arr.length-1;i>=0;i--){
				let temp = arr[i];
				// console.log(temp);
				let j = Math.floor(Math.random()*(i+1));

				// swap the position
				arr[i] = arr[j];
				arr[j] = temp;

			}
			return arr;
		}
		btn.addEventListener('click',function(){
			if(!play){
				play = true;
				btn.innerHTML = 'Guess';
				kokare.style.visibility = "visible";
				newWords = createWord();
				randWords = scrambleWords(newWords);
				text.innerHTML = randWords.join("");

			}else{
				let tempword = kokare.value;
				if(tempword===myword){
					play = false;
					text.innerHTML = "You Won";
					btn.innerHTML = "Start Game";
					kokare.value = "";
				}else{
					text.innerHTML = "You Lost";
				}
			}
		});
		
	</script>
</body>
</html>