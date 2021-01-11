<?php

use App\Address;
use App\Product;
use App\PurchaseOrder;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate();

        DB::table('roles')->insert([
            ['name'=> 'Administrador'],
            ['name'=> 'Usuario']
        ]);

        factory(User::class, 50)->create()
            ->each(function($user) {
                $id = random_int(1,2);
                $rol = \App\Rol::find($id);
                $user->rol()->associate($rol);
                $user->save();
                $user->address()->save(factory(Address::class)->make());
            });

        $users = User::all();
        foreach ($users as $key => $user)
        {
            factory(PurchaseOrder::class, 3)->create([
                'user_id' => $user->id,
                'addres_id'=> $user->address()->first()->id
                ])
            ->each(function($purchaseOrder) use ($key){
                factory(Product::class, 3)->create();
                $products = Product::all()->take(2)->pluck('id');
                $key++ ;
                $purchaseOrder->products()->attach($products,['count_product' => $key]);
            });
        }

    }
}
