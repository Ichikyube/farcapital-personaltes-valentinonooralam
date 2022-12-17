<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirementforms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table-> index('user_id');
            $table-> foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->  bool("hadHepatitisB");
            $table-> bool("hadContactwithPatientHepatitisB");
            $table-> bool("hadBloodTransfusion");
            $table->  bool("gotPiercedOrTatto");
            $table->  bool("hadTeethOperation");
            $table->  bool("hadSmallOperation");
            $table->  bool("beenYearafterSmallOperation");
            $table->  bool("withinaDayafterVaccin");
            $table->  bool("withinaWeekafterLiveVaccin");
            $table->  bool("withinaYearafterRabiesImunitation");
            $table->  bool("withinaWeekafterAlergicSymtom");
            $table->  bool("withinaYearafterSkinTranspant");
            $table->  bool("pregnantOrNewBornMom");
            $table->  bool("activeBreastFeed");
            $table->  bool("drugAddiction");
            $table->  bool("alcoholics");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirementforms');
    }
};
