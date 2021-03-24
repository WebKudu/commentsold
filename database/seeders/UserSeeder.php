<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rowsToInsert = collect();

        $csvFile = fopen(__DIR__ . DIRECTORY_SEPARATOR .'csv' . DIRECTORY_SEPARATOR . 'users.csv', 'r');
        while ($row = fgetcsv($csvFile)) {
            if (!is_numeric($row[0])) {     // Either a header or otherwise invalid data
                continue;
            }

            $rowsToInsert[] = [
                 'id'                   => $row[0],
                 'name'                 => $row[1],
                 'email'                => $row[2],
                 'email_verified_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                 'password'             => $row[3],
                 'created_at'           => $row[8],
                 'updated_at'           => $row[9],
                 'superadmin'           => $row[5],
                 'shop_name'            => $row[6],
                 'card_brand'           => $row[10],
                 'card_last_four'       => $row[11],
                 'trial_ends_at'        => $row[12],
                 'shop_domain'          => $row[13],
                 'is_enabled'           => $row[14],
                 'billing_plan'         => $row[15],
                 'trial_starts_at'      => $row[16]
            ];
        }
        fclose($csvFile);

        foreach ($rowsToInsert->chunk(500) as $batch) {
            User::insert($batch->toArray());
        }
    }
}
