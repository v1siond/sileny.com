<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="<?php echo route_css; ?>application.css">
    <?php include './views/layouts/head_common.php';?>
</head>
<body>
	<?php include './views/layouts/header.php';?>
	<?php if (isset($flash_message)) {echo $flash_message;}?>
	<header class="default-section -banner">
		<h2 class="default-title -white -big -fullWidth">Psicología Online</h3>
		<h3 class="default-title -medium -white -underline">A un click de distancia</h3>
		<figure class="section-bg"></figure>
		<article class="social-media">
			<?php foreach ($redes as $red): ?>
				<a target="_blank" class="icon" href="<?php echo $red['link']; ?>"><i class="fas fa-<?php echo $red['icon_name']; ?>" aria-hidden="true"></i></a>
			<?php endforeach?>
		</article>
	</header>
	<div class="home-container">
		<section class="default-section -online" id="online">
			<div class="limited-container">
				<article class="service-description -offer">
					<div class="body">
						<h2 class="default-title -scorpion -big -fullWidth -lateral">Consulta psicológica online</h2>
						<hr class="line-div -scorpion -left">
						<p class="default-text -scorpion">
							Si estás sufriendo un problema que te sobrepasa y te impide vivir de la forma que deseas, quizá necesites ayuda psicológica, pero, si no puedes o no quieres por alguna razón acudir a un gabinete psicológico tradicional, la atención psicológica on-line puede ser una alternativa válida y eficaz. Aquí puedes dar el primer paso y contar con el apoyo de una profesional que te acompañe en el camino de recuperar la vida que quieres.
						</p>
					</div>
					<figure class="lateral-img">
						<img src="<?php echo route_images; ?>online.png" color="#FFD071">
					</figure>
				</article>
			</div>
		</section>
		<section class="default-section -whatIs" id="whatIs">
			<div class="limited-container">
				<article class="service-description">
					<figure class="lateral-img">
						<img src="<?php echo route_images; ?>whatIsIt.png" color="#FFD071">
					</figure>
					<div class="body">
						<h2 class="default-title -scorpion -big -lateral">¿Qué es?</h2>
						<hr class="line-div -scorpion -left">
						<p class="default-text -scorpion">
							La terapia online se puede definir como el conjunto de servicios que un profesional de la salud mental ofrece a sus pacientes a través de una o varias modalidades de comunicación que permite internet.
						</p>
						<p class="default-text -scorpion">
							En la terapia online se siguen los mismos protocolos y procedimientos que en la terapia presencial: evaluación, identificación de problemas, planteamiento de objetivos, seguimiento, etc.
						</p>
					</div>
				</article>
			</div>
		</section>
		<section class="default-section -howItWoks" id="howItWoks">
			<div class="limited-container">
				<article class="service-description">
					<div class="body">
						<h2 class="default-title -scorpion -big -lateral">¿Cómo funciona?</h2>
						<hr class="line-div -scorpion -left">
						<p class="default-text -scorpion">
							Se necesita identificar los problemas principales y comprender los factores predisponentes, precipitantes y mantenedores de los mismos, así como la relación que esos factores tienen en su vida, para lograrlo se pueden utilizar varios medios ya sea escrito (mail, chat), auditivo (llamada) o audiovisual (video llamada).
						</p>
						<p class="default-text -scorpion">
							El proceso de desinhibición debido al anonimato visual y la ausencia de signos sociales debido a la distancia (efecto de desinhibición online)  favorece la apertura y expresividad emocional.
						</p>
					</div>
					<figure class="lateral-img">
						<img src="<?php echo route_images; ?>doing.jpg" color="#FFD071">
					</figure>
				</article>
			</div>
		</section>
		<section class="default-section -advantages" id="howItWoks">
			<div class="limited-container">
				<article class="service-description -advantages">
					<div class="body">
						<h2 class="default-title -golden -big -scorpion">Ventajas</h2>
						<hr class="line-div -scorpion">
						<ul class="advantages-list">
							<li class="item -green wow fadeInLeft">
								<span class="advantage-icon -cheap"></span>
								<h3 class="default-title -white">Económica</h3>
								<p class="default-text -white">
									La terapia on-line es significativamente más económica que la presencial.
								</p>
							</li>
							<li class="item -orange wow fadeInRight">
								<span class="advantage-icon -stay"></span>
								<h3 class="default-title -white">Sin esperas</h3>
								<p class="default-text -white">
									Permite evitar desplazamientos y molestas esperas ahorrando tiempo y dinero al paciente.
								</p>
							</li>
							<li class="item -yellow wow fadeInLeft">
								<span class="advantage-icon -mail"></span>
								<h3 class="default-title -white">Frecuente</h3>
								<p class="default-text -white">
									Permite un contacto terapéutico más frecuente y flexible entre sesiones a través de mail de una forma muy sencilla y directa.
								</p>
							</li>
							<li class="item -white wow fadeInRight">
								<span class="advantage-icon -anonimity"></span>
								<h3 class="default-title -white">Privada</h3>
								<p class="default-text -white">
									Facilita el anonimato y la discreción si no quiere que puedan verlo acudir a la consulta de un psicólogo.
								</p>
							</li>
							<li class="item -red wow fadeInLeft">
								<span class="advantage-icon -save"></span>
								<h3 class="default-title -white">Constante</h3>
								<p class="default-text -white">
									Facilita el archivo de las comunicaciones mantenidas, permitiendo al cliente y al terapeuta consultarlas cuando deseen para repasarlas (si es por chat escrito).
								</p>
							</li>
							<li class="item -blue wow fadeInRight">
								<span class="advantage-icon -confidentiality"></span>
								<h3 class="default-title -white">Confidencial</h3>
								<p class="default-text -white">
									La atención psicológica online está sometida, igualmente que la presencial, al código deontológico del psicólogo que garantiza la confidencialidad y el secreto profesional.
								</p>
							</li>
						</ul>
				</article>
			</div>
		</section>
		<section class="default-section -service" id="service">
			<div class="limited-container">
				<h2 class="default-title -big -scorpion">Problemas con los que puedo ayudarte</h2>
				<div class="line-div -scorpion"></div>
				<ul class="service-list">
					<li class="item wow fadeInLeft">
						<div class="service-icon fas fa-check-circle"></div>
						<div class="description">
							<h3 class="default-title -scorpion -uppercase">Trastornos de ansiedad</h3>
							<p class="default-text -scorpion">Fobias, ansiedad generalizada, agorafobia, ataques de pánico, fobia social, obsesiones y compulsiones, estrés postraumático,...</p>
						</div>
					</li>
					<li class="item wow fadeInRight">
						<div class="service-icon fas fa-check-circle"></div>
						<div class="description">
							<h3 class="default-title -scorpion -uppercase">Trastornos de personalidad</h3>
							<p class="default-text -scorpion">Trastorno histriónico, dependiente, antisocial y narcisista, obsesivo compulsivo, evitador y esquizoide,...</p>
						</div>
					</li>
					<li class="item wow fadeInLeft">
						<div class="service-icon fas fa-check-circle"></div>
						<div class="description">
							<h3 class="default-title -scorpion -uppercase">Trastornos del ánimo</h3>
							<p class="default-text -scorpion">Depresión, distimia, duelo, baja estima,...</p>
						</div>
					</li>
					<li class="item wow fadeInRight">
						<div class="service-icon fas fa-check-circle"></div>
						<div class="description">
							<h3 class="default-title -scorpion -uppercase">Problemas de relación</h3>
							<p class="default-text -scorpion">Timidez, agresividad, ira, déficit de asertividad,...</p>
						</div>
					</li>
					<li class="item wow fadeInRight">
						<div class="service-icon fas fa-check-circle"></div>
						<div class="description">
							<h3 class="default-title -scorpion -uppercase">Problemas de pareja</h3>
							<p class="default-text -scorpion">Problemas de comunicación, entrenamiento en solución de problemas, celos,...</p>
						</div>
					</li>
					<li class="item wow fadeInLeft">
						<div class="service-icon fas fa-check-circle"></div>
						<div class="description">
							<h3 class="default-title -scorpion -uppercase">Trastornos sexuales</h3>
							<p class="default-text -scorpion">Trastornos del deseo, anorgasmia, dispareunia, vaginismo, problemas de erección, eyaculación precoz, eyaculación retardada,...</p>
						</div>
					</li>
					<li class="item wow fadeInRight">
						<div class="service-icon fas fa-check-circle"></div>
						<div class="description">
							<h3 class="default-title -scorpion -uppercase">Trastornos alimentarios</h3>
							<p class="default-text -scorpion">Anorexia, bulimia, obesidad, trastorno por atracón,...</p>
						</div>
					</li>
					<li class="item wow fadeInLeft">
						<div class="service-icon fas fa-check-circle"></div>
						<div class="description">
							<h3 class="default-title -scorpion -uppercase">Trastornos adictivos</h3>
							<p class="default-text -scorpion">Tabaquismo, ludopatía, adicción a internet,...</p>
						</div>
					</li>
					<li class="item wow fadeInRight">
						<div class="service-icon fas fa-check-circle"></div>
						<div class="description">
							<h3 class="default-title -scorpion -uppercase">Otros trastornos</h3>
							<p class="default-text -scorpion">Insomnio, parálisis del sueño, tics nerviosos, despersonalización, trastornos somatomorfos y psicosomáticos.....</p>
						</div>

					</li>
				</ul>
			</div>
		</section>
		<section class="default-section -pricing" id="pricing">
			<div class="limited-container">
				<h2 class="default-title -big -white -fullWidth">Tarifas</h2>
				<div class="line-div -white"></div>
			</div>
			<div class="limited-container -around">
				<?php
$control = 1;
$class = '';
foreach ($plans as $plan):
	if ($control == 1) {
		$control++;
		$class = 'fadeInLeft';
	} elseif ($control == 2) {
	$control++;
	$class = 'fadeInUp';
} else {
	$control == 1;
	$class = 'fadeInRight';
}
?>
					<ul class="pricing-features wow <?php echo $class; ?>">
						<li class="feature -name"><?php echo $plan['title']; ?></li>
						<li class="feature -price"><h3 class="default-title -big -scorpion -fullWidth"><?php echo $plan['price']; ?></h3></li>
						<?php
$planFeatures = $features->getFeatures($plan['id_price']);
foreach ($planFeatures as $feature):
?>
							<li class="feature"><?php echo $feature['description']; ?></li>
						<?php endforeach?>
						<li class="feature -button"><a href="#contact" class="default-button animate-link">Reservar cita</a></li>
					</ul>
				<?php endforeach?>
			</div>
			<figure><img src="<?php echo route_images; ?>therapy.png" alt=""></figure>
		</section>
		<section class="default-section -about" id="about">
			<div class="limited-container">
				<h2 class="default-title -scorpion -big -about -fullWidth">
					Sobre mi
				</h2>
				<hr class="line-div -scorpion">
				<p class="default-text">
					<?php echo $admin['bio']; ?>
				</p>
			</div>
		</section>
		<section class="default-section -contact" id="contact">
			<div class="section-bg -contact"></div>
			<div class="limited-container">
				<h2 class="default-title -white -big -fullWidth">Contacto</h2>
				<div class="line-div -white"></div>
				<p class="default-text -white -fullWidth -center">Da el primer paso hacia la resolución de tus problemas, conversemos</p>
				<div class="contact-info">
					<a href="#" class="default-button -contact">Email: <?php echo $admin['email']; ?></a>
				</div>
				<div class="contact-info">
					<a href="#" class="default-button -contact">Skype: <?php echo $admin['skype']; ?></a>
				</div>
				<div class="contact-info">
					<a href="#" class="default-button -contact">Teléfono: <?php echo $admin['phone']; ?></a>
				</div>
			</div>
		</section>
	</div>
	<?php include './views/layouts/footer.php';?>
	<script src="<?php echo route_js; ?>animate_index.js"></script>
	<?php include './views/layouts/foot_common.php';?>
</body>
</html>