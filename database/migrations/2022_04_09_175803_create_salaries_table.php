<?php

use App\Models\Player;
use App\Models\Season;
use App\Models\Team;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Player::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Team::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Season::class)->nullable()->constrained()->cascadeOnDelete();
            $table->decimal('salary', 15, 2)->nullable();
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
        Schema::dropIfExists('salaries');
    }
}
