<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MailtasksTableSeeder::class);
    }
}

class MailtasksTableSeeder extends Seeder
{
    public function generateData()
    {
        $mt_count=1000;
        $data=[];
        for( $i=0 ; $i<$mt_count ;$i++ )
        {
            $email = 'email' . $i . '@mail.com';
            $text = 'Some text ' . $i;
            $subject = 'Subject ' . $i;
            $status = 0;
            $data[] = compact('email','text','status','subject');
        }
        return $data;
    }
    public function run()
    {

        DB::table('mailtask')->delete();
        DB::table('mailtask')->insert($this->generateData());
    }
}