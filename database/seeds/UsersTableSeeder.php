<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Loir";
        $user->lastname = "Sandoval";
        $user->matricula = "2016082296";
        $user->email="loir@mail.com";
        $user->date_of_birth="2019-11-13";
        $user->phone_number = "6121539429";
        $user->password = bcrypt("contraseña123");
        $user->role = 1;
        $user->save();

        $user = new User;
        $user->name = "Juan";
        $user->lastname = "Perez";
        $user->matricula = "2016082295";
        $user->email="juan@mail.com";
        $user->date_of_birth="2019-11-13";
        $user->phone_number = "6121539429";
        $user->password = bcrypt("contraseña123");
        $user->role = 2;
        $user->save();

        $user = new User;
        $user->name = "Diego";
        $user->lastname = "Ceseña";
        $user->matricula = "2016082297";
        $user->email="diego@mail.com";
        $user->date_of_birth="2019-11-13";
        $user->phone_number = "6121539429";
        $user->password = bcrypt("contraseña123");
        $user->role = 2;
        $user->save();
        
    }
}
