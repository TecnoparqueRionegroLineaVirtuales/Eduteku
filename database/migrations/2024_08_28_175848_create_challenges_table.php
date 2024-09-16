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
            Schema::create('challenges', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('challenge_type_id');
                $table->unsignedBigInteger('bootcamp_id');
                // $table->unsignedBigInteger('challenge_filter_category_id');
                $table->string('name');
                $table->string('description', 1000);
                $table->string('img_url');
                $table->timestamps();

                $table->foreign('challenge_type_id')->references('id')->on('challenge_types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
                $table->foreign('bootcamp_id')->references('id')->on('bootcamp')
                    ->onDelete('cascade')
                    ->onDelete('restrict');

                // $table->foreign('challenge_filter_caregory_id')->references('id')->on('challenge_types')
                //     ->onUpdate('cascade')
                //     ->onDelete('restrict');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('challenges');
        }
    };
