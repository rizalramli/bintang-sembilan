<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Master\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();

        $permissions = [
            'dashboard-dashboard',
            'transaksi-kayu masuk sakr',
            'transaksi-kayu masuk dagang',
            'transaksi-kayu keluar',
            'transaksi-pemasukan',
            'transaksi-pengeluaran',
            'karyawan-kehadiran',
            'karyawan-penggajian',
            'laporan-kayu masuk',
            'laporan-kayu keluar',
            'laporan-kehadiran',
            'laporan-penggajian',
            'laporan-laba rugi',
            'laporan-pemasukan',
            'laporan-pengeluaran',
            'pengaturan-template kayu masuk',
            'pengaturan-template kayu keluar',
            'pengaturan-produk',
            'pengaturan-jenis kayu masuk',
            'pengaturan-jenis kayu keluar',
            'pengaturan-customer',
            'pengaturan-supplier',
            'pengaturan-gudang',
            'pengaturan-karyawan',
            'pengaturan-pengguna',
            'pengaturan-hak akses',
            'pengaturan-perusahaan',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name' => 'web']);
        }
    }
}
