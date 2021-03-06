<?php
session_start();
require "vendor/autoload.php";
require_once "getPanierItem.php";
// require_once "ApiOrder.php";

$orders=json_decode($_SESSION["order"],true);
$totalPrice=$_SESSION["totalPrice"];
//echo $totalPrice;
// die();

require "config.php";
// $payement = new PaypalPayement(PAYPAL_ID, PAYPAL_SECRET, true);
// echo $payement->ui();
class PaypalPayement{

    public function __construct(readonly private string $clientId, readonly private string $clientSecret,readonly private bool $sandbox){

     }
    

    public function ui(): string {
        $totalPrice=$_SESSION["totalPrice"];
        $orders=json_decode($_SESSION["order"],true);
        $clientId=PAYPAL_ID;
        $order=json_encode([
            "purchase_units"=>[[
                'description'=> 'Panier MathThePrinter',
                'items'=> array_map(function ($product){
                    return [
                        'name'=> $product["nomProd"],
                        'quantity'=>$product["quantity"],
                        'unit_amount'=>[
                            'value'=>$product['priceProd'],
                            'currency_code'=>"EUR",

                        ]
                        ];
                },$orders),
                "amount"=> [
                    'currency_code'=>"EUR",
                    'value'=> $totalPrice, 
                    "breakdown"=> [
                        'item_total'=>[
                            'currency_code'=>'EUR',
                            'value'=> $totalPrice,
                        ]
                    ]
                ]
            ]]
            ]);
            //Exemple d'affichage d'un produit*/
            //print_r($order["purchase_units"][0]["items"][0]);
            //die();
        return <<<HTML
                        <script src="https://www.paypal.com/sdk/js?client-id={$clientId}&currency=EUR&intent=authorize"></script>
                <!-- Set up a container element for the button -->
                <div id="paypal-button-container"></div>
                <script defer src="/Public/Js/function.js"></script>
                <!-- <script defer src="/Public/Js/updateUser.js"></script> -->
                <script>
                paypal.Buttons({
                    // Sets up the transaction when a payment button is clicked
                    createOrder: (data, actions) => {
                    return actions.order.create({$order});
                    },
                    // Finalize the transaction after payer approval
                    onApprove: async (data, actions) => {
                        const authorization = await actions.order.authorize()
                        const authorizationId = authorization.purchase_units[0].payments.authorizations[0].id
                        await fetch('/payement/paypal/paypal.php', {
                            method: 'post',
                            headers: {
                            'content-type': 'application/json'
                            },
                            body: JSON.stringify({authorizationId})
                        })
                        //alert('Votre paiement a bien ??t?? enregistr?? : '+authorizationId)
                        window.location.href="/views/confirmCmd.php?auth="+authorizationId;
                        /*On fait ce qu'on veut*/
                           
                        // envoie des elements de la commande dans la base de donn??e
                        console.log(getUser().idUser);
                        var dataOrder = {
                        totalPrice: getTotalPrice(),
                        idUser: getUser().idUser,
                        statusCmd: "En cours de validation",
                        };
                        
                        saveOrder(dataOrder);
                        console.log(getUser());
                        console.log(getOrder());

                        let order = JSON.parse(localStorage.getItem("order"));
                        var dataOrder = new FormData();
                        for (key in order) {
                            dataOrder.append(key, order[key]);
                        }

                        const requeteAjax = new XMLHttpRequest();
                        requeteAjax.open("POST", "/Api/ApiOrder.php", true);
                        requeteAjax.onload = function () {
                            if (requeteAjax.readyState === XMLHttpRequest.DONE) {
                            if (requeteAjax.status === 200) {
                                const resultats = JSON.parse(requeteAjax.response);
                                console.log(resultats);
                            } else {
                                alert("Un probl??me est intervenu, merci de revenir plus tard.");
                            }
                            }
                        };
                        requeteAjax.send(dataOrder);

                        // window.location.href = "/views/completUserDelivery.php";
                        setTimeout(() => {
                            let basket = JSON.stringify(localStorage.getItem("basket"));
                            var formaData = new FormData();
                            formaData.append("basket", basket);
                            const requeteAjax = new XMLHttpRequest();
                            requeteAjax.open("POST", "/Api/ApiOrder.php", true);
                            //Envoyez les informations d'en-t??te appropri??es avec la demande
                            requeteAjax.onload = function () {
                            if (requeteAjax.readyState === XMLHttpRequest.DONE) {
                                if (requeteAjax.status === 200) {
                                const resultats = JSON.parse(requeteAjax.response);
                                console.log(resultats);
                                windows.location.href=="/views/confirmCmd.php";
                                if (resultats.status == "succes") {
                                } else {
                                    window.location.href = "/views/profil.php";
                                }
                                } else {
                                   
                                alert("Un probl??me est intervenu, merci de revenir plus tard.");
                                }
                            }
                            };
                            requeteAjax.send(formaData);
                        },1000);
                        













                    }
                }).render('#paypal-button-container');
                </script>
              
        HTML;
        
    }

    public function handle(ServerRequestInterface $request, Cart $cart): void
    {
        $totalPrice=$_SESSION["totalPrice"];
        if ($this->sandbox) {
            $environment = new \PayPalCheckoutSdk\Core\SandboxEnvironment($this->clientId, $this->clientSecret);
        } else {
            $environment = new \PayPalCheckoutSdk\Core\ProductionEnvironment($this->clientId, $this->clientSecret);
        }
        $client = new \PayPalCheckoutSdk\Core\PayPalHttpClient($environment);
        $authorizationId = $request->getParsedBody()['authorizationId'];
        $request = new \PayPalCheckoutSdk\Payments\AuthorizationsGetRequest($authorizationId);
        $authorizationResponse = $client->execute($request);
        if ($authorizationResponse->result->amount->value !== number_format($totalPrice, 2, '.', "")) {
            //throw new PaymentAmountMissmatchException($amount, $cart->getTotal());
            echo "Erreur : le montant envoy?? ne correspond pas au montant du produit";
        }

        // On peut r??cup??rer l'Order cr???? par le bouton
        $orderId = $authorizationResponse->result->supplementary_data->related_ids->order_id;
        // $request = new OrdersGetRequest($orderId);
        // $orderResponse = $client->execute($request);

        // V??rifier si le stock est dispo

        // Verrouiller le produit (retirer du stock pour ??viter une commande en parall??le entre temps)

        // Sauvegarder les informations de l'utilisateur

        // On capture l'autorisation
        $request = new AuthorizationsCaptureRequest($authorizationId);
        $response = $client->execute($request);
        if ($response->result->status !== 'COMPLETED') {
            throw new \Exception();
        }

}


}