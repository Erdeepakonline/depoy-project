<?php
$req_method = getenv('REQUEST_METHOD');
if ($req_method !== 'POST') {
  http_response_code(404);
  echo "<p>Invalid request!</p>";
  exit();
}
$custCurrency = $currencycode;
$customerEmail = $user->email;
$customerId = $user->uid;
$amt_usd = trim($amounts); 
$stripe = new \Stripe\StripeClient($key);
  $checkout_session = $stripe->checkout->sessions->create([
    'customer_email' => $customerEmail,
    'billing_address_collection' => 'auto',
    'payment_method_types' => ['card'],
    'metadata' => ['order_id' => $txnids, 'request_for' => $request_for],
    'line_items' => [[
      'price_data' => [
        'currency' => $custCurrency,
        'unit_amount' => $amounts,
        'product_data' => [
          'name' => '7Search PPC Service',
          'images' => ["https://www.7searchppc.com/assets/images/logo/logo.png"],
        ],
      ],
      'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => "https://services.7searchppc.com/stripe/response/{CHECKOUT_SESSION_ID}",
    'cancel_url' => "https://services.7searchppc.com/stripe/response/{CHECKOUT_SESSION_ID}",
  ]);
return redirect()->to($checkout_session->url)->send();
?>