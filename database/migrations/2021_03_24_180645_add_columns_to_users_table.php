<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('superadmin')->default(false);
            $table->string('shop_name')->default('');
            $table->enum('card_brand',
                         ['Discover', 'Via', 'Amex', 'Mastercard']
            )->nullable();
            $table->string('card_last_four', 4)->default('');
            $table->dateTime('trial_ends_at')->nullable();
            $table->string('shop_domain')->default('');
            $table->boolean('is_enabled')->default(true);
            $table->enum('billing_plan',
                         ['Enterprise', 'Boutique', 'Startup']
            )->nullable();
            $table->dateTime('trial_starts_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('superadmin');
            $table->dropColumn('shop_name');
            $table->dropColumn('card_brand');
            $table->dropColumn('card_last_four');
            $table->dropColumn('trial_ends_at');
            $table->dropColumn('shop_domain');
            $table->dropColumn('is_enabled');
            $table->dropColumn('billing_plan');
            $table->dropColumn('trial_starts_at');
        });
    }
}
