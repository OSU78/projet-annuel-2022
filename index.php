<!DOCTYPE html>
<html lang="en">


<head>
  <?php require_once './views/includes/head.php'; ?>
  <!-- Include Google Maps JS API -->

  <!-- Custom JS code to bind to Autocomplete API -->
  <!-- find it here: https://github.com/lewagon/google-place-autocomplete/blob/gh-pages/autocomplete.js -->
  <!-- We'll detail this file in the article -->
  <!-- <script type="text/javascript" src="autocomplete.js"></script> -->
  <title>Home</title>
</head>


<body>
  <header>
    <div>
      logo
    </div>
    <nav>
      <a href="./views/login.php">Login</a>
      <a href="./views/register.php">Register</a>
      <a href="./views/profil.php">Profile</a>
      <a href="./Controllers/logout.php">logout</a>
    </nav>
  </header>
  <main>
    <form>
      <h2>Adresse</h2>
      <!-- <input id="user_input_autocomplete_address" placeholder="Start typing your address..."> -->
      <label>Address</label>
      <input id="user_input_autocomplete_address" placeholder="Votre adresse...">
      <label>street_number</label>
      <input id="street_number" name="street_number" disabled>
      <label>route</label>
      <input id="route" name="route" disabled>
      <label>locality</label>
      <input id="locality" name="locality" disabled>
      <label>country</label>
      <input id="country" name="country" disabled>
    </form>
  </main>
  <p>

    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint cumque minus odit minima amet cum debitis repellendus.
    Quia inventore earum ea officiis vel. Adipisci voluptatum debitis tenetur sed odit enim!
  </p>
</body>

</html>