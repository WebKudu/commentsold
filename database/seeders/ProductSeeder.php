<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rowsToInsert = collect();

        $csvFile = fopen(__DIR__ . DIRECTORY_SEPARATOR .'csv' . DIRECTORY_SEPARATOR . 'products.csv', 'r');
        while ($row = fgetcsv($csvFile)) {
            if (!is_numeric($row[0])) {     // Either a header or otherwise invalid data
                continue;
            }
            $rowsToInsert[] = [
                 'id'               => $row[0],
                 'product_name'     => $row[1],
                 'description'      => $row[2],
                 'style'            => $row[3],
                 'brand'            => $row[4],
                 'created_at'       => $row[5],
                 'updated_at'       => $row[6],
                 'url'              => $row[7],
                 'product_type'     => $row[8],
                 'shipping_price'   => $row[9],
                 'note'             => $row[10],
                 'admin_id'         => $row[11]
            ];
        }
        fclose($csvFile);

        foreach ($rowsToInsert->chunk(500) as $batch) {
            Product::insert($batch->toArray());
        }
    }
}
