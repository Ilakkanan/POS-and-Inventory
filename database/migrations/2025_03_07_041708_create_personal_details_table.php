<!-- Development Note

    Date        : 2025/03/07
    Version     : V1
    Developer   : K.Ilakkanan

    Name        : Personal Details Table
    Path Info   : Http/databse/migrations/

    Connection  : User

    ====================================================================================================
    Connection                  Model               Controller                      Table
    ====================================================================================================

    Connection                  PersonalDetails     PersonalDetailsController       PersonalDetails

    
    ****************************************************************************************************
    
    
    
    
    ====================================================================================================
    Current Version             Date                Developer                       Comments
    ====================================================================================================

    Version 1.00                2025/03/07          K.Ilakkanan                     Initial Version

Note Finished -->


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('srtFirstName');
            $table->string('srtLastName');
            $table->date('dtDOB');
            $table->string('strGender');
            $table->string('strNIC');
            $table->string('strAddress');
            $table->string('strImage');
            $table->string('intPhoneNo');
            
            
            // ========== Common Field ==========
            $table->string('strLoginUser');           
            $table->string('strDeleteStatus');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_details');
    }
};
