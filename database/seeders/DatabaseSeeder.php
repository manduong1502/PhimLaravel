<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Kiểm tra xem tài khoản admin đã tồn tại hay chưa
        $admin = User::where('email', 'tranlevu1962004@mail.com')->first();

        if (!$admin) {
            // Tạo tài khoản admin nếu chưa tồn tại
            User::create([
                'username' => 'Admin',
                'email' => 'tranlevu1962004@mail.com',
                'password' => bcrypt('vumandat123'),
                'role' => 'admin',
            ]);
        } else {
            // Cập nhật quyền admin nếu tài khoản đã tồn tại
            $admin->update(['role' => 'admin']);
        }
    }
}
