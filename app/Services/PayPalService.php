<?php

namespace App\Services;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PayPalService
{
    protected $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),
                config('services.paypal.secret')
            )
        );

        $this->apiContext->setConfig([
            'mode' => config('services.paypal.sandbox') ? 'sandbox' : 'live',
        ]);
    }

    public function createPayment($totalAmountUSD, $orderIds)
    {
        if (!is_array($orderIds)) {
            throw new \Exception('orderIds phải là mảng.');
        }


        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $amount = new Amount();
        $amount->setCurrency(config('services.paypal.currency', 'USD'))
            ->setTotal($totalAmountUSD); // ✅ Đây là USD

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription("Thanh toán đơn hàng #" . implode(',', $orderIds));
       //dd($transaction);
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.success', ['orderIds' => implode(',', $orderIds)]))
            ->setCancelUrl(route('paypal.cancel'));

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions([$transaction])
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return $payment->getApprovalLink();
        } catch (\Exception $e) {
            throw new \Exception('Không thể tạo thanh toán PayPal: ' . preg_replace('/\s+/', ' ', $e->getMessage()));
        }
    }



    public function executePayment($paymentId, $payerId)
    {
        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        return $payment->execute($execution, $this->apiContext);
    }
}
