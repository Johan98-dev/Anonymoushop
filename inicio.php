<!DOCTYPE html>
<html>
<head>
	<title>AnonymouShop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="/Cliente/imh/art.jpg">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link type=" text/css" rel="stylesheet" href="css/Style.css"/>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<h4>AnonymouShop</h4>
			<div class="collapse navbar-collapse" id="navbarText">
				
				<span class="navbar-text">
					
					<a class="nav-link" href="loginC.php">
						<span id="span1"></span>
						<span id="span2"></span>
						<span id="span3"></span>
						<span id="span4"></span>
					Login
					</a>
					<a class="nav-link" href="registrar.php">
					    <span id="span1"></span>
						<span id="span2"></span>
						<span id="span3"></span>
						<span id="span4"></span>
						Registro
					</a>
					
					
				</span>
			</div>
		</div>
	</nav>
	<div class="bien"> <p>Bienvenidos a Anonymouhop</p></div>
	<div class="container mt-5">
<div class="row" style="justify-content: center;">
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="10" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 1" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="Cliente/img/xbox.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 1</h5>
                        <p class="card-text">Descripción - Precio 10$</p>
                        
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="20" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 2" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="Cliente/img/camiseta.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 2</h5>
                        <p class="card-text">Descripción - Precio 20$</p>
                        
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="30" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 3" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="Cliente/img/balon1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 3</h5>
                        <p class="card-text">Descripción - Precio 30$</p>
                        
                </div>
        </form>
</div>
</div>
</div>
	
	
</body>
</html>        