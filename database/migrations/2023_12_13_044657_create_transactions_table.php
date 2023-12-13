<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table
                ->foreignUuid('user_id')
                ->nullable()
                ->references('id')
                ->on('users');
            $table->string('code')->nullable();
            $table
                ->foreignUuid('loan_id')
                ->nullable()
                ->references('id')
                ->on('loans');
            $table->string('loan_date')->nullable();
            $table
                ->foreignUuid('admin_id')
                ->nullable()
            ->references('id')
                ->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
};