<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Index's CSS -->
    <link href="index.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

		<script src="https://www.gstatic.com/firebasejs/ui/4.8.0/firebase-ui-auth.js"></script>
		<link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.8.0/firebase-ui-auth.css" />

    <title>Netclaw | Online Claw Machines!</title>
  </head>
  <body>
    <body>

    <?php require('navbar.php'); ?>

		<!-- Hero -->

		<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1">Netclaw – Arcade Machines. Online. For Free.</h1>
        <p class="">Using the power of the internet, you can play a real-life claw machine remotely – from the comfort of a web browser!</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          <a type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold" href="/play/">Play Now</a>
        </div>
      </div>
      <div class="col-lg-4 offset-sm-1 p-0 overflow-hidden shadow-lg">
          <img id="hero-image" class="rounded-lg-3" src="hero-image-compressed.jpg" alt="Claw Machine" height="500"> 
      </div>
    </div>
  </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>  
		<!-- The core Firebase JS SDK is always required and must be listed first -->
	<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>

	<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
  <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-analytics.js"></script>

  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-firestore.js"></script>

	<script>
		// Your web app's Firebase configuration
		var firebaseConfig = {
			apiKey: "AIzaSyC76j0N4SiCtER1RarbbFQKBqg6JFMhXsc",
			authDomain: "netclaw-development.firebaseapp.com",
			projectId: "netclaw-development",
			storageBucket: "netclaw-development.appspot.com",
			messagingSenderId: "435923540255",
			appId: "1:435923540255:web:f800ac6fbbe2a7bfbef82a"
		};
		// Initialize Firebase
		firebase.initializeApp(firebaseConfig);

		// Initialize the FirebaseUI Widget using Firebase.
		var ui = new firebaseui.auth.AuthUI(firebase.auth());

		ui.start('#firebaseui-auth-container', {
  	signInOptions: [
    // List of OAuth providers supported.
    firebase.auth.GoogleAuthProvider.PROVIDER_ID,
    firebase.auth.FacebookAuthProvider.PROVIDER_ID,
    firebase.auth.TwitterAuthProvider.PROVIDER_ID,
    firebase.auth.GithubAuthProvider.PROVIDER_ID
  ],
  // Other config options...
});
	</script>
  
  <?php require('footer.php'); ?>
  </body>
</html> 