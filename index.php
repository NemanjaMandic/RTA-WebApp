<?php
 //set the timezone and generate two formatted date strings
  date_default_timezone_set('US/Pacific');
  $datetime = date('c');
  $date_fmt = date('F d, Y');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Realtime Web Apps</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>
<header>
	<h1><em>Realtime Web App</em> &ndash; Vezba 1</h1>
	<p>
		Published on
		<time datetime="<?php echo $datetime; ?>"><?php echo $date_fmt;?></time>.
	</p>
</header>
<section>
	<p>
		19. Zahtijevamo besplatan servis u opštinama i ukidanje opštinskih i republičkih taksi pri ostvarivanju prava gradjana.

	</p>
	<p>
		19. Zahtijevamo besplatan servis u opštinama i ukidanje opštinskih i republičkih taksi pri ostvarivanju prava gradjana.
          the <code>&lt;section&gt;</code> and
           <code>&lt;time&gt;</code> elements.
	</p>
</section>
<footer>
	<p>
		All content &copy; 2012 Jason Lengstorf &amp; Phil Leggetter
	</p>
</footer>
</body>
</html>