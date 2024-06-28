<<?php
// database/seeders/CustomerSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use League\Csv\Reader;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $csv = Reader::createFromPath(database_path('seeders/customers.csv'), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            Customer::create([
                'name' => $record['name'],
                'address' => $record['address'],
                'phone' => $record['phone'],
                'payment_method' => $record['payment_method'],
            ]);
        }
    }
}
