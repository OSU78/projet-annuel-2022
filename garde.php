$url = "https://api.etsy.com/v3/public/oauth/token?grant_type=authorization_code&client_id={MY_ Etsy_App_ API_ Key
}&redirect_uri={MY_REDIRECT_URL}&code=".$code."&code_verifier=".$code_verifier;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$headers = array(
'x-api-key: ={ MY_ Etsy_App_ API_ Key } ',
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response_body = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if (intval($status) != 200) throw new Exception("HTTP $status\n$response_body");

var myHeaders = new Headers();

var myInit = {
method: "GET",
headers: myHeaders,
mode: "cors",
cache: "default",
};

fetch("flowers.jpg", myInit)
.then(function (response) {
return response.blob();
})
.then(function (myBlob) {
var objectURL = URL.createObjectURL(myBlob);
myImage.src = objectURL;
});