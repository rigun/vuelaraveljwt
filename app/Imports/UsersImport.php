<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\User;
use App\Role;
use App\UsersDetail;
use Hash;
class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // foreach ($rows as $row) 
        // {
        //     $password = trim($row['tangg']);
          
        //     $user = new User();
        //     $user->name = $row['name'];
        //     $user->username = $row['username'];
        //     $user->password = Hash::make($password);
        //     $user->save();

        //     $detailUser = new UsersDetail();
        //     $detailUser->tanggal_lahir = $row['tanggal_lahir'];
        //     $detailUser->tempat_lahir = $row['tempat_lahir'];
        //     $detailUser->alamat = $row['alamat'];
        //     $detailUser->kelas = $row['kelas'];
        //     $detailUser->angkatan = $row['angkatan'];
        //     $detailUser->user_id = $user->id;
        //     $detailUser->save();

        //     if ($row['roles']) {
        //         $user->syncRoles(explode(',', $row['roles']));
        //     }
      
        // }
        return 'success';
    }
}
