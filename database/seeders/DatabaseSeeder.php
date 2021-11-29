<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Bus;
use App\Models\Route;
use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $AdminUser = User::factory()->create([
            'name' => 'Administratorius',
            'surname' => 'Admin',
            'email' => 'administratorius@ktu.lt',
            'role' => '1',
            'password' => 'bananas' // password
        ]);
        $BusinessUser = User::factory()->create([
            'name' => 'Vadybininkas',
            'surname' => 'Business',
            'email' => 'vadybininkas@ktu.lt',
            'role' => '2',
            'password' => 'bananas' // password
        ]);
        $BasicUser = User::factory()->create([
            'name' => 'Vartotojas',
            'surname' => 'Basic',
            'email' => 'vartotojas@ktu.lt',
            'role' => '0',
            'password' => 'bananas' // password
        ]);
        $bus1 = Bus::factory()->create([
            'busseats' => 20,
            'license_plate' => 'BUS:001',
        ]);
        $bus2 = Bus::factory()->create([
            'busseats' => 10,
            'license_plate' => 'BUS:002',
        ]);
        $bus3 = Bus::factory()->create([
            'busseats' => 25,
            'license_plate' => 'BUS:003',
        ]);
        $route1 = Route::factory()->create([

            'bus_id' => $bus1->id,
            'from' => "Kaunas",
            'to' => "Vilnius",
            'leaveAt' => Carbon::parse("2021-11-29 11:00"),
            'arriveAt' => Carbon::parse("2021-11-29 12:30"),
            'price' => 7,
            'seats' => $bus1->busseats,
        ]);
        $route2 = Route::factory()->create([

            'bus_id' => $bus1->id,
            'from' => "Kaunas",
            'to' => "Vilnius",
            'leaveAt' => Carbon::parse("2021-12-29 11:00"),
            'arriveAt' => Carbon::parse("2021-12-29 12:30"),
            'price' => 9,
            'seats' => $bus1->busseats,
        ]);
        $route3 = Route::factory()->create([

            'bus_id' => $bus2->id,
            'from' => "Kaunas",
            'to' => "Utena",
            'leaveAt' => Carbon::parse("2021-12-01 10:00"),
            'arriveAt' => Carbon::parse("2021-12-01 12:30"),
            'price' => 10,
            'seats' => $bus2->busseats,
        ]);
        $route4 = Route::factory()->create([

            'bus_id' => $bus3->id,
            'from' => "Kaunas",
            'to' => "Utena",
            'leaveAt' => Carbon::parse("2021-12-19 11:00"),
            'arriveAt' => Carbon::parse("2021-12-19 13:30"),
            'price' => 9,
            'seats' => $bus3->busseats,
        ]);
        $route5 = Route::factory()->create([

            'bus_id' => $bus1->id,
            'from' => "Kaunas",
            'to' => "Ryga",
            'leaveAt' => Carbon::parse("2022-01-29 11:00"),
            'arriveAt' => Carbon::parse("2022-01-29 14:30"),
            'price' => 20,
            'seats' => $bus1->busseats,
        ]);
        $route6 = Route::factory()->create([

            'bus_id' => $bus1->id,
            'from' => "Vilnius",
            'to' => "Ryga",
            'leaveAt' => Carbon::parse("2022-01-20 11:00"),
            'arriveAt' => Carbon::parse("2022-01-20 16:30"),
            'price' => 25,
            'seats' => $bus1->busseats,
        ]);
        $route7 = Route::factory()->create([

            'bus_id' => $bus3->id,
            'from' => "Palanga",
            'to' => "Utena",
            'leaveAt' => Carbon::parse("2021-12-14 11:00"),
            'arriveAt' => Carbon::parse("2021-12-14 17:30"),
            'price' => 17,
            'seats' => $bus3->busseats,
        ]);
        $route8 = Route::factory()->create([

            'bus_id' => $bus3->id,
            'from' => "Palanga",
            'to' => "Ryga",
            'leaveAt' => Carbon::parse("2022-02-29 11:00"),
            'arriveAt' => Carbon::parse("2022-02-29 19:30"),
            'price' => 50,
            'seats' => $bus3->busseats,
        ]);
        $route9 = Route::factory()->create([

            'bus_id' => $bus2->id,
            'from' => "Vilnius",
            'to' => "Utena",
            'leaveAt' => Carbon::parse("2019-11-29 11:00"),
            'arriveAt' => Carbon::parse("2019-11-29 12:30"),
            'price' => 7,
            'seats' => 1,
        ]);
        $route10 = Route::factory()->create([

            'bus_id' => $bus1->id,
            'from' => "Kaunas",
            'to' => "Klaipėda",
            'leaveAt' => Carbon::parse("2021-12-24 11:00"),
            'arriveAt' => Carbon::parse("2021-12-24 12:45"),
            'price' => 10,
            'seats' => $bus1->busseats,
        ]);
        $route11 = Route::factory()->create([

            'bus_id' => $bus1->id,
            'from' => "Kaunas",
            'to' => "Vilnius",
            'leaveAt' => Carbon::parse("2022-11-29 11:00"),
            'arriveAt' => Carbon::parse("2022-11-29 12:30"),
            'price' => 7,
            'seats' => $bus1->busseats,
        ]);
        $route12 = Route::factory()->create([

            'bus_id' => $bus3->id,
            'from' => "Utena",
            'to' => "Skuodas",
            'leaveAt' => Carbon::parse("2021-12-09 11:00"),
            'arriveAt' => Carbon::parse("2021-12-09 14:30"),
            'price' => 17,
            'seats' => $bus3->busseats,
        ]);
        $route13 = Route::factory()->create([

            'bus_id' => $bus3->id,
            'from' => "Utena",
            'to' => "Skuodas",
            'leaveAt' => Carbon::parse("2022-12-09 11:00"),
            'arriveAt' => Carbon::parse("2022-12-09 14:30"),
            'price' => 17,
            'seats' => $bus3->busseats,
        ]);
        $route14 = Route::factory()->create([

            'bus_id' => $bus3->id,
            'from' => "Utena",
            'to' => "Skuodas",
            'leaveAt' => Carbon::parse("2022-02-09 11:00"),
            'arriveAt' => Carbon::parse("2022-02-09 14:30"),
            'price' => 17,
            'seats' => $bus3->busseats,
        ]);
        Order::factory()->create([
            'user_id' => $BasicUser->id,
            'route_id' => $route12->id,
        ]);
        Order::factory()->create([
            'user_id' => $BasicUser->id,
            'route_id' => $route12->id,
        ]);
        Order::factory()->create([
            'user_id' => $BasicUser->id,
            'route_id' => $route1->id,
        ]);
        Order::factory()->create([
            'user_id' => $BasicUser->id,
            'route_id' => $route3->id,
        ]);
        Order::factory()->create([
            'user_id' => $BasicUser->id,
            'route_id' => $route7->id,
        ]);
        Order::factory()->create([
            'user_id' => $BasicUser->id,
            'route_id' => $route8->id,
        ]);
        Order::factory()->create([
            'user_id' => $BasicUser->id,
            'route_id' => $route9->id,
        ]);
        Order::factory()->create([
            'user_id' => $BasicUser->id,
            'route_id' => $route1->id,
        ]);
        Order::factory()->create([
            'user_id' => $BasicUser->id,
            'route_id' => $route2->id,
        ]);
        Order::factory()->create([
            'user_id' => $BasicUser->id,
            'route_id' => $route2->id,
        ]);

    }
}
