<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Printer;


class PrintersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $printers = new Printer();
        $printers->category_id = '3';
        $printers->model = 'l3000';
        $printers->price = '5000000';
        $printers->stock_quantity = '20';
        $printers->save();

        $printers = new Printer();
        $printers->category_id = '1';
        $printers->model = 'HP Smart Tank 615';
        $printers->price = '4000000';
        $printers->stock_quantity = '5';
        $printers->save();

        $printers = new Printer();
        $printers->category_id = '2';
        $printers->model = 'PIXMA TS707';
        $printers->price = '2500000';
        $printers->stock_quantity = '15';
        $printers->save();

        $category = new Printer();
        $category->category_id = '4';
        $category->model = 'DCP-1601';
        $category->price = '2200000';
        $category->stock_quantity = '5';
        $category->save();
    }
}
