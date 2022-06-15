var headers = new Headers();
headers.append("Content-Type", "application/x-www-form-urlencoded");
headers.append("x-api-key", "jbgm66kalnupjhcox59ukj0h");
// headers.append(
//   "Authorization",
//   "Bearer 25144099.jKBPLnOiYt7vpWlsny_lDKqINn4Ny_jwH89hA4IZgggyzqmV_bmQHGJ3HOHH2DmZxOJn5V1qQFnVP9bCn9jnrggCRz"
// );
var myInit = {
  method: "POST",
  headers: headers,
  mode: "cors",
  cache: "default",
};

fetch(
  "https://www.etsy.com/oauth/connect?response_type=application/x-www-form-urlencoded&redirect_uri=https://localhost:8080&scope=transactions_r%20transactions_w&client_id=jbgm66kalnupjhcox59ukj0h&state=superstate&code_challenge=YVFXl_j_swZFB_rs9qNCMRYHyyXjY7NFmHU1t3WYRHo&code_challenge_method=S256",
  myInit
)
  .then((response) => response.text())
  .then((result) => console.log(result))
  .catch((error) => console.log("error", error));
