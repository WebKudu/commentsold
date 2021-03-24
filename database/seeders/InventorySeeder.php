<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rowsToInsert = collect();

        $csvFile = fopen(__DIR__ . DIRECTORY_SEPARATOR .'csv' . DIRECTORY_SEPARATOR . 'inventory.csv', 'r');
        while ($row = fgetcsv($csvFile)) {
            if (!is_numeric($row[0])) {     // Either a header or otherwise invalid data
                continue;
            }

            $rowsToInsert[] = [
                'id'                => $row[0],
                'product_id'        => $row[1],
                'quantity'          => $row[2],
                'color'             => $row[3],
                'size'              => $row[4],
                'weight'            => $row[5],
                'price_cents'       => $row[6],
                'sale_price_cents'  => $row[7],
                'cost_cents'        => $row[8],
                'sku'               => $row[9],
                'length'            => $row[10],
                'width'             => $row[11],
                'height'            => $row[12],
                'note'              => $row[13]
            ];
        }
        fclose($csvFile);

        foreach ($rowsToInsert->chunk(500) as $batch) {
            Inventory::insert($batch->toArray());
        }
    }
}
