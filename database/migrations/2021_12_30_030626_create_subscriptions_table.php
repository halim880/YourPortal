<?php

use App\Helpers\SubscriptionType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')
                ->references('id')->on('packages')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('member_id')
                ->references('id')
                ->on('members')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->dateTime('exp_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
