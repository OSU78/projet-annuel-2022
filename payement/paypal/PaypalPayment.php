<?php
require "vendor/autoload.php";
require "config.php";
class PaypalPayement{

    public function __construct(readonly private string $clientId, readonly private string $clientSecret,readonly private bool $sandbox){

     }
    

    public function ui(): string {
        $clientId=PAYPAL_ID;
        return <<<HTML
                        <script src="https://www.paypal.com/sdk/js?client-id={$clientId}&currency=EUR&intent=authorize"></script>
                <!-- Set up a container element for the button -->
                <div id="paypal-button-container"></div>
                <script>
                paypal.Buttons({
                    // Sets up the transaction when a payment button is clicked
                    createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                        amount: {
                            
                            value: '102.44' // Can also reference a variable or function
                        }
                        }]
                    });
                    },
                    // Finalize the transaction after payer approval
                    onApprove: async (data, actions) => {
                        const authorization = await actions.order.authorize()
                        const authorizationId = authorization.purchase_units[0].payments.authorizations[0].id
                        await fetch('/paypal.php', {
                            method: 'post',
                            headers: {
                            'content-type': 'application/json'
                            },
                            body: JSON.stringify({authorizationId})
                        })
                        alert('Votre paiement a bien été enregistré')
                    }
                }).render('#paypal-button-container');
                </script>
    
        HTML;
    }

    public function handle(ServerRequestInterface $request, Cart $cart): void
    {
        if ($this->sandbox) {
            $environment = new \PayPalCheckoutSdk\Core\SandboxEnvironment($this->clientId, $this->clientSecret);
        } else {
            $environment = new \PayPalCheckoutSdk\Core\ProductionEnvironment($this->clientId, $this->clientSecret);
        }
        $client = new \PayPalCheckoutSdk\Core\PayPalHttpClient($environment);
        $authorizationId = $request->getParsedBody()['authorizationId'];
        $request = new \PayPalCheckoutSdk\Payments\AuthorizationsGetRequest($authorizationId);
        $authorizationResponse = $client->execute($request);
        if ($authorizationResponse->result->amount->value !== number_format($cart->getTotal() / 100, 2, '.', "")) {
            //throw new PaymentAmountMissmatchException($amount, $cart->getTotal());
            echo "Erreur : le montant envoyé ne correspond pas au montant du produit";
        }

        // On peut récupérer l'Order créé par le bouton
        $orderId = $authorizationResponse->result->supplementary_data->related_ids->order_id;
        // $request = new OrdersGetRequest($orderId);
        // $orderResponse = $client->execute($request);

        // Vérifier si le stock est dispo

        // Verrouiller le produit (retirer du stock pour éviter une commande en parallèle entre temps)

        // Sauvegarder les informations de l'utilisateur

        // On capture l'autorisation
        $request = new AuthorizationsCaptureRequest($authorizationId);
        $response = $client->execute($request);
        if ($response->result->status !== 'COMPLETED') {
            throw new \Exception();
        }

}


}