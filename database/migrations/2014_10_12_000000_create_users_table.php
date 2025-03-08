<!-- Development Note

    Date        : 2025/03/07
    Version     : V1
    Developer   : K.Ilakkanan

    Name        : User Table
    Path Info   : Http/databse/migrations/

    Connection  : User

    ====================================================================================================
    Connection                  Model               Controller                      Table
    ====================================================================================================

    Connection                  User                UserController                  User

    
    ****************************************************************************************************
    
    
    
    
    ====================================================================================================
    Current Version             Date                Developer                       Comments
    ====================================================================================================

    Version 1.00                2025/03/07          K.Ilakkanan                     Main Layouts

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('usertype');  
            $table->string('strEnablePremium');    

            
            $table->string('strDeleteStatus');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
