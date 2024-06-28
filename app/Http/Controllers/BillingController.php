<?php
// app/Http/Controllers/BillingController.php
namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Customer;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function generateMonthlyBills()
    {
        $customers = Customer::all();

        foreach ($customers as $customer) {
            $bill = Billing::create([
                'customer_id' => $customer->id,
                'amount' => 100, // Jumlah tagihan adalah contoh
            ]);

            $this->notifyCustomer($customer, $bill);
        }
    }

    protected function notifyCustomer($customer, $bill)
    {
        if ($customer->payment_method == 'cash') {
            $this->notifyCashPayment($customer, $bill);
        } elseif ($customer->payment_method == 'transfer') {
            $this->notifyTransferPayment($customer, $bill);
        }
    }

    protected function notifyCashPayment($customer, $bill)
    {
        // Logika untuk notifikasi pembayaran cash
        echo "Notifikasi cash: {$customer->name}, Tagihan: {$bill->amount}\n";
    }

    protected function notifyTransferPayment($customer, $bill)
    {
        // Logika untuk notifikasi pembayaran transfer
        echo "Notifikasi transfer: {$customer->name}, Tagihan: {$bill->amount}\n";
    }
}
