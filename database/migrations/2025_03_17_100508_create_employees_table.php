    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateEmployeesTable extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->string('employee_code')->unique();
                $table->string('employee_name');
                $table->string('nic')->unique();
                $table->string('address')->nullable();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('employees');
        }
    }
