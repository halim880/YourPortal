<?php

use App\Helpers\ApplicationStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('member_email');
            $table->string('member_phone');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('admin_email');
            $table->string('status')->default(ApplicationStatus::PENDING);
            $table->string('subscription_name');
            $table->string('plan_name');
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
        Schema::dropIfExists('member_applications');
    }
}
