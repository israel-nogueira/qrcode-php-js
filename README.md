
# **QRCODE Requirer**
Classe simples para criação de QRCodes;
Essa classe utiliza a LIB [QRServer](https://api.qrserver.com/) para gerar de forma fácil e rápida seus QRcodes;

Exemplo:
```php		
<?
include('./qrcode-requirer.php');
$_QRCODE =qrcode::data('Lorim Ipsum dolor amet...') // texto
					->ecc('H') // O nível de correção de erros: L, M, Q e H, onde H é o nível mais alto.
					->qzone(0) // O espaço entre os quadrados no QR code
					->margin(10) //A margem a ser adicionada em torno do QR code
					->height(300) // Altura
					->width(300) // Largura
					->color('000000') // A cor do preenchimento dos quadrados
					->bg('FFFFFF') // A cor de fundo da imagem
					->png() // ->png() | ->gif() | ->jpg() | ->svg()
					//---------------------------------------------------------
					// ->string() : retorna a string da imagem sem tratamento
					// ->base64() : data/base64 para inserir em algum elemento
					// ->url() : retorna a URL direto da API
					// ->render() : randeriza a imagem diretamente no browser
					//---------------------------------------------------------
					->base64();
?>

  

<!DOCTYPE  html>
<html  lang="en">
	<head>
		<meta  charset="UTF-8">
		<meta  name="viewport"  content="width=device-width, initial-scale=1">
	</head>
	<body>
		<img  src="<?=$_QRCODE?>">
		<img  id="qrcode-01" src="">
		<div  id="qrcode-02"></div>
		
		<script  src="//code.jquery.com/jquery-3.2.1.min.js"></script>
		<script  src="qrcode-requirer.js"></script>
		<script>
			$(document).ready(function(){
				// SE FOR UMA IMAGEM, ELE MUDA APENAS O src=""
				$('#qrcode-01').qrcode({
					text: "Lorim Ipsum dolor amet...",
					background: "FFFFFF",
					color: "000000",
					width: 200,
					height: 200,
					margin: 3,
					type: "png",
					qzone: 0,
					ecc: "H",
					onSuccess: function () { },
				});
				// SE FOR UMA DIV, ELE ADICIONA UMA IMAGEM DENTRO
				$('#qrcode-02').qrcode({
					text: "Lorim Ipsum dolor amet...",
					background: "ffd800",
					color: "ff3000",
					width: 200,
					height: 200,
					margin: 3,
					type: "png",
					qzone: 0,
					ecc: "H",
					onSuccess: function () { },
				});
		 	})
		</script>
	</body>
</html>
```
