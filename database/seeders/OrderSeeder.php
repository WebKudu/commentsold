<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rowsToInsert = collect();

        $csvFile = fopen(__DIR__ . DIRECTORY_SEPARATOR .'csv' . DIRECTORY_SEPARATOR . 'orders.csv', 'r');
        while ($row = fgetcsv($csvFile)) {
            if (!is_numeric($row[0])) {     // Either a header or otherwise invalid data
                continue;
            }
            $rowsToInsert[] = [
                'id'                    => $row[0],
                'product_id'            => $row[1],
                'inventory_id'          => $row[2],
                'street_address'        => $row[3],
                'apartment'             => $row[4],
                'city'                  => $row[5],
                'state'                 => $row[6],
                'country_code'          => $row[7],
                'zip'                   => $row[8],
                'phone_number'          => $row[9],
                'email'                 => $row[10],
                'name'                  => $row[11],
                'order_status'          => $row[12],
                'payment_ref'           => $row[13],
                'transaction_id'        => $row[14],
                'payment_amt_cents'     => $row[15],
                'ship_charged_cents'    => is_numeric($row[16]) ? $row[16] : null,
                'ship_cost_cents'       => is_numeric($row[17]) ? $row[17] : null,
                'subtotal_cents'        => $row[18],
                'total_cents'           => $row[19],
                'shipper_name'          => $row[20],
                'payment_date'          => $row[21],
                'shipped_date'          => $row[22],
                'tracking_number'       => $row[23],
                'tax_total_cents'       => $row[24],
                'created_at'            => $row[25],
                'updated_at'            => $row[26]
            ];
        }
        fclose($csvFile);

        foreach ($rowsToInsert->chunk(500) as $batch) {
            Order::insert($batch->toArray());
        }
    }
}
