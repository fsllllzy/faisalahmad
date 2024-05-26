<nav>
	<ul class="sf-menu">
		<li <?php if ($_SESSION['menu'] == "home") echo 'class="current"'; ?>>
			<a href="index.php">Home</a>
		</li>
		<li <?php if ($_SESSION['menu'] == "login") echo 'class="current"'; ?>>
			<a href="login.php">Login</a>
		</li>
	</ul>
	<div class="clear"></div>
</nav>
<div class="clear"></div>