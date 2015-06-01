
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
	<title>Realtime Q&amp;A</title>
	
<!-- Fonts -->
<script type="text/javascript" src=""></script>	
<link rel="stylesheet" href="css/main.css">
</head>
<body>

<header>
	<h1>Realtime Q&amp;A</h1>
	<p class="tagline">A live feedback system for classes, presentation, and conferences</p>
</header>

<section>
	<form id="attending">
		<h2>Attending ?</h2>
		<p>Join a room using it's ID.</p>
		<label>
			What is the room's ID ?
			<input type="text" name="room_id">
		</label>
		<input type="submit" value="Join This Room">
	</form><!--END id="attending"-->



<form id="presenting">
	<h2>Presenting ?</h2>
	<p>Create a room to start your Q&amp;A session</p>
	<label>
		Tell us your name (so attendees know who you are).
		<input type="text" name="presenter-name">
	</label>
	<label>
		Tell us your email (so attendees can get in touch with you).
		<input type="email" name="presenter-email">
	</label>
	<label>
		What is your session called ?
		<input type="text" name="session-name">
	</label>
	<input type="submit" value="Create Your Room">
</form><!--END id="presenting"-->
</section>
<footer>
	<ul>
		<li class="copyright">
			&copy; 2015 Nemanja Mandic
		</li>
		<li>
			Part of <em>Realtime Web Apps: HTML5 Websockets, Pusher, and the Web&rsquo;s Next Big Thing</em>
		</li>
		<li>
			<a href="#">Get the Book</a>
			<a href="#">Code (on Github)</a>
		</li>
	</ul>
</footer>
</body>
</html>