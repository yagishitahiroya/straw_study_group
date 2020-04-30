<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>

<!DOCTYPE html>
<html lang = 'ja'>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $this->fetch('title'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('header');
		echo $this->Html->css('chat');
		echo $this->Html->script('top');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<nav class="navbar navbar-expand-lg navbar-dark">
			<?= $this->Html->link('わらしべ', ['controller' => 'threads', 'action' => 'threads'], ['class' =>'navbar-brand']); ?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<?= $this->Html->link('したい＆できる', ['controller' => 'threads', 'action' => 'threads'], ['class' =>'nav-link']); ?>
						</li>
						<li class="nav-item ">
						<?= $this->Html->link('資料管理', ['controller' => 'documents', 'action' => 'index'], ['class' =>'nav-link']); ?>
						</li>
					</ul>
					

					<div class="dropdown open navbar-text">
							<?php if ($auth): ?>
							<button class="btn btn-default dropdown-toggle navbar-text "
								type="button" id="dropdownMenu5" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<?= $auth['nickname']." さん";?>
							</button>
						<div class="dropdown-menu">
							<!-- <a class="dropdown-item" href="#!">Separated link</a> -->
							<?= $this->Html->link('ログアウト', ['controller' => 'users', 'action' => 'logout'],['class' =>'dropdown-item']); ?>
						<!-- <div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#!">Action</a>
							<?= $this->Html->link('ログアウト', ['controller' => 'users', 'action' => 'logout'],['class' =>'dropdown-item']); ?> -->
						</div>
					</div>
					
					<span class="nav-item navbar-nav" >
					</span>
					<?php endif; ?>
				</div>
			</nav>
		</div>
		<div id="content">

			<?= $this->Flash->render(); ?>

			<?= $this->fetch('content'); ?>
		</div>
		<div id="footer">

		</div>
	</div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
