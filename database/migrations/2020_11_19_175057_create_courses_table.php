<?php

use App\Models\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 225);
            $table->uuid('uuid')->unique();
            $table->string('slug', 225)->unique();
            $table->string('logo', 225)->nullable();
            $table->text('description');
            $table->text('to_learn')->nullable();
            $table->text('requirements')->nullable();
            $table->enum('condition', Course::STATUS)->default('Future');
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
        Schema::dropIfExists('courses');
    }
}
