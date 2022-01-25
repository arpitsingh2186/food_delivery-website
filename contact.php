<?php include('partials-front/menu.php');?>


<section class="contact">
	<div class="content">
	<h2>Contact Us</h2><br>
	<p>Need Help? Our Customer Care Executive will Assist You.</p><br>
	</div>
	<br><br>

	<?php
		if (isset($_SESSION['update'])) 
		{
			echo $_SESSION['update'];
			unset($_SESSION['update']);
		}
	?>

	<div class="containerC">
		<div class="contactInfo">
			<div class="box">
				<div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
				<div class="text">
				<h3>Address</h3><br>
				<p>Main Road,<br>Babubarhi,Madhubani,<br>848210</p>
				</div>
			</div>
			<div class="box">
				<form action="tel:917387084384"><button type="submit">Call +91-7387084384</button></form>
				<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
				<div class="text">
				<h3>Phone</h3><br>
				<p>7545055444</p>
				</div>
			</div>
			<div class="box">
				<div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
				<div class="text">
				<h3>Email</h3><br>
				<p>bhaskarkumar00222@gmail.com</p>
				</div>
			</div>
		</div>
	
	<div class="contactForm">
		<form action="formProcess.php" method="POST">
			<h2>Send Message</h2>
			<div class="inputBox">
				<input type="text" name="UName" required="required">
				<span>Full Name</span>
			</div>
			<div class="inputBox">
				<input type="text" name="Email" required="required">
				<span>Email</span>
			</div>
			<div class="inputBox">
				<textarea name="Msg" required="required"></textarea>
				<span>Type Your Message....</span>
			</div>
			<div class="inputBox">
				<input type="submit" name="btn-send" value="Send">
			</div>
		</form>
	</div>
	</div>
</section>


<?php include('partials-front/footer.php');?>