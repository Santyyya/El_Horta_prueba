<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú - Taquería El Horta</title>
    <link rel="stylesheet" href="CSS/menucss.css">
</head>
<body>
    <header>
        <div class="nav-logo">
            <img src="Resourses/7633253-removebg-preview.png" alt="Logo de la Taquería Mi Vecindario" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="menu.php">Menú</a></li>
                <li><a href="noveYProm.html">Promociones</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="carrito.php">Carrito 
                <?php 
                    session_start();
                    if (isset($_SESSION['carrito'])) {
                        echo '(' . array_sum($_SESSION['carrito']) . ')';
                    } else {
                        echo '(0)';
                    }
                    ?>
                </a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Menú</h2>


        <!--Categorias menu-->
        <div class="menu-category">
            <h3>Tacos</h3>
            <div class="menu-grid">
                <!-- Productos -->
                <div class="menu-item">
                    <img src="Resourses/Platillos/pastor.jpg" alt="Taco al pastor">
                    <h4>Taco al pastor</h4>
                    <p class="description">Delicioso taco de carne al pastor, con piña y guacamole.</p>
                    <p>$15.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="1">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/bistec 1.jpg" alt="Taco de bistec">
                    <h4>Taco de bistec</h4>
                    <p class="description">Sabroso taco de bistec, acompañado de nuestras ricas salsas.</p>
                    <p>$12.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="2">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/Suadero.jpg" alt="Taco de suadero">
                    <h4>Taco de suadero</h4>
                    <p class="description">Nuestro taco de suadero, acompañado de nuestras deliciosas salsas.</p>
                    <p>$12.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="3">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/buchetaco.jpg" alt="Taco de buche">
                    <h4>Taco de Buche</h4>
                    <p class="description">Nuestro taco de buche, acompañado con nuestras ricas salsas.</p>
                    <p>$15.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="4">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/cabeza.jpg" alt="Taco de cabeza">
                    <h4>Taco de cabeza</h4>
                    <p class="description">Sabroso taco de cabeza de res.</p>
                    <p>$12.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="5">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/chorizo.jpg" alt="Taco de chorizo">
                    <h4>Taco de chorizo</h4>
                    <p class="description">Sabroso taco de chorizo, acompañado con nuestras deliciosas salsas.</p>
                    <p>$12.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="6">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Más categorías aquí... -->


        <div class="menu-category">
            <h3>Quesadillas</h3>
            <div class="menu-grid">
                <div class="menu-item">
                    <img src="Resourses/Platillos/quesadilla.webp" alt="Quesadilla al pastor">
                    <h4>Quesadilla al pastor</h4>
                    <p class="description">Quesadilla al pastor, con tortilla de harina y queso.</p>
                    <p>$45.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="7">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/quesadilla.webp" alt="Quesadilla de bistec">
                    <h4>Quesadilla de bistec</h4>
                    <p class="description">Quesadilla de bistec, con tortilla de harina y queso.</p>
                    <p>$45.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="8">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/quesadilla.webp" alt="Quesadilla de suadero">
                    <h4>Quesadilla de suadero</h4>
                    <p class="description">Quesadilla de suadero, con tortilla de harina y queso.</p>
                    <p>$45.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="9">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/quesadilla.webp" alt="Quesadilla de buche">
                    <h4>Quesadilla de buche</h4>
                    <p class="description">Quesadilla de buche, con tortilla de harina y queso.</p>
                    <p>$45.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="10">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/quesadilla.webp" alt="Quesadilla de cabeza">
                    <h4>Quesadilla de cabeza</h4>
                    <p class="description">Quesadilla de cabeza, con tortilla de harina y queso.</p>
                    <p>$45.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="11">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/quesadilla.webp" alt="Quesadilla de chorizo">
                    <h4>Quesadilla de chorizo</h4>
                    <p class="description">Quesadilla de chorizo, con tortilla de harina y queso.</p>
                    <p>$45.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="12">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
            </div>
        </div>



        <div class="menu-category">
            <h3>Tortas</h3>
            <div class="menu-grid">
                <div class="menu-item">
                    <img src="Resourses/Platillos/torta.webp" alt="Torta al pastor">
                    <h4>Torta de pastor</h4>
                    <p class="description">Deliciosa torta al pastor, con nuestro bolillo crujiente del dia.</p>
                    <p>$65.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="13">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <!-- Producto 2 -->
                <div class="menu-item">
                    <img src="Resourses/Platillos/torta.webp" alt="Torta de bistec">
                    <h4>Torta de bistec</h4>
                    <p class="description">Deliciosa torta de bistec, con nuestro bolillo crujiente del dia.</p>
                    <p>$65.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="14">
                        <input type="number" name="quantity" value="1" min="14">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/torta.webp" alt="Torta de suadero">
                    <h4>Torta de suadero</h4>
                    <p class="description">Deliciosa torta de suadero, con nuestro bolillo crujiente del dia</p>
                    <p>$65.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="15">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/torta.webp" alt="Torta de buche">
                    <h4>Torta de buche</h4>
                    <p class="description">Deliciosa torta de buche, con nuestro bolillo crujiente del dia.</p>
                    <p>$65.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="16">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/torta.webp" alt="Torta de cabeza">
                    <h4>Torta de cabeza</h4>
                    <p class="description">Deliciosa torta de cabeza de res, con nuestro bolillo crujiente del dia.</p>
                    <p>$65.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="17">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/torta.webp" alt="Torta de chorizo">
                    <h4>Torta de chorizo</h4>
                    <p class="description">Deliciosa torta de chorizo, con nuestro bolillo crujiente del dia.</p>
                    <p>$65.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="18">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="menu-category">
            <h3>Platos</h3>
            <div class="menu-grid">
                <div class="menu-item">
                    <img src="Resourses/Platillos/platobistec.jpg" alt="Plato de bistec">
                    <h4>Plato de bistec</h4>
                    <p class="description">Plato de bistec, acompañado con tortillas y nuestras deliciosas salsas.</p>
                    <p>$80.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="19">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/platopastor.jpg" alt="Plato de pastor">
                    <h4>Plato de pastor</h4>
                    <p class="description">Plato de carne al pastor, acompañado con tortillas y nuestras deliciosas salsas.</p>
                    <p>$80.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="20">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/platochorizo.jpg" alt="Plato de chorizo">
                    <h4>Plato de chorizo</h4>
                    <p class="description">Plato de chorizo, acompañado con tortillas y nuestras deliciosas salsas.</p>
                    <p>$80.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="21">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="menu-category">
            <h3>Bebidas</h3>
            <div class="menu-grid">
                <div class="menu-item">
                    <img src="Resourses/Platillos/coca.webp" alt="Coca-cola">
                    <h4>Coca Cola</h4>
                    <p class="description">Coca cola bien fria.</p>
                    <p>$20.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="22">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/sprite-limon-pnr-500ml.webp" alt="Sprite">
                    <h4>Sprite</h4>
                    <p class="description">Sprite bien frio.</p>
                    <p>$20.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="23">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/sidmun-manz-nor-pet-600ml-1.webp" alt="Sidral Mundet">
                    <h4>Sidral Mundet</h4>
                    <p class="description">Sidral Mundet bien frio.</p>
                    <p>$20.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="24">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/fanta.webp" alt="Fanta">
                    <h4>Fanta</h4>
                    <p class="description">Fanta bien fria.</p>
                    <p>$20.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="25">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/fanta-fresa-pnr-600ml.webp" alt="Fanta de fresa">
                    <h4>Fanta de fresa</h4>
                    <p class="description">Fanta de fresa bien fria.</p>
                    <p>$20.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="26">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/fresca.webp" alt="Fresca">
                    <h4>Fresca</h4>
                    <p class="description">Fresca bien fria.</p>
                    <p>$20.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="27">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
                <div class="menu-item">
                    <img src="Resourses/Platillos/103_ciel-purificada-600-ml-botella-pet_6.webp" alt="Agua ciel">
                    <h4>Agua ciel</h4>
                    <p class="description">Agua natural ciel.</p>
                    <p>$20.00</p>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="item_id" value="28">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart" class="order-button">Añadir al carrito</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <footer>
        <div class="social-icons">
        <a href="https://www.facebook.com/share/4DB59jmaFHCS54vK/?mibextid=qi2Omg" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/taqueriaelhorta/" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.tiktok.com/@taqueria_el_horta" target="_blank"><i class="fab fa-tiktok"></i></a>
        </div>
        <p>&copy; 2024 Taquería El Horta. Todos los derechos reservados.</p>
    </footer>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
