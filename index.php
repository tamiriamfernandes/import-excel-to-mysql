<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Importar Excel</title>

	<style>
		body {
			margin: 0px;
		}
		.container {
			width: 100vw;
			height: 100vh;
			display: flex;
			flex-direction: row;
			background-color: #E5E4E2;
			justify-content: center;
			align-items: center;
		}
		.box-form{
			width:400px;
			height:400px;
			padding: 10px 10px 10px 10px;
			border:1px solid #BFBFBF;
			background-color: white;
			box-shadow: 10px 10px 5px #aaaaaa;
			text
		}
		input[type='file'] {
			display: none;
		}

		.input-wrapper label {
			background-color: #3498db;
			border-radius: 5px;
			color: #fff;
			margin: 10px;
			padding: 6px 20px;
		}

		.input-wrapper label:hover {
			background-color: #2980b9;
		}

		input[type='submit']{
			background-color: #3498db;
			border-radius: 5px;
			color: #fff;
			margin: 10px;
			padding: 6px 20px;
			border-color:#3498db;
			
		}
			
	</style>
</head>
    
	<body>
		<div class="container">
			<div class="box-form">
				<form enctype="multipart/form-data" id="formulario-arquivo" method="post" action="import.php">	                        
					<h3 style="text-align: center;">Importar Dados do Excel</h3>
					<div class="input-wrapper" style="margin-top:100px">
						<label for='arquivo'>
							Selecionar um arquivo
						</label>
						<input  type="file" name="arquivo" id="arquivo" accept=".xlsx" required>
						<span id='file-name' style="color:#696969;">Nome do arquivo</span>
					</div>   
					<br>
					<div style="text-align: center;margin-top:80px">	
						<input class="btn btn-dark btn-sm" type="submit" name="enviar" id="enviar" value="Importar">
					</div> 
				</form>
			</div>
		</div>
	
		<script src="script.js"></script>
	
	</body>
</html>
    
  