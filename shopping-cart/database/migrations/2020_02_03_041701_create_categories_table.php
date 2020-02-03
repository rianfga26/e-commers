<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // menjalankan migrate ketika membuat tabel bernama categories
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); //STRING SAMA DENGAN VARCHAR

            //JADI KITA AKAN MEMBUAT CATEGORI INI MEMILIKI ANAK KATEGORI
            //SEHINGGA DIBUAT STRUKTUR DIMANA KATEGORI YANG MEMILIKI parent_id
            //ADALAH KATEGORI ANAK, SEBALIKNYA JIKA KATEGORI ITU parent_id NYA NULL
            //MAKA DIA ADALAH KATEGORI INDUK
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //METHOD INI DIGUNAKAN KETIKA ROLLBACK ATAU REFRESH DATABASE DIJALANKAN
    public function down()
    {
        Schema::dropIfExists('categories'); // bagian ini untuk menghapus database diatas
        // fungsi ini hanya akan berjalan ketika menjalankan fungsi rollback atau sejenisnya
    }
}
