<?php

namespace App\Traits;

use App\Models\User;

trait CheckPermissionUser
{
    public $count = 0;
    public function IsAdmin()
    {
//        return true;
        foreach (auth()->user()->roles as $role) {
            if ($role->name == 'Admin')
                $this->count++;
        }
        if ($this->count > 0) return true;
        else return false;
    }

    public function CheckPermissionForArticle()
    {
        foreach (auth()->user()->roles as $role) {
            if ($role->name == 'write-article')
                $this->count++;
        }
        if ($this->count > 0) return true;
        else return false;
    }
    public function CheckPermissionForProject()
    {
        foreach (auth()->user()->roles as $role) {
            if ($role->name == 'write-project')
                $this->count++;
        }
        if ($this->count > 0) return true;
        else return false;
    }


    public function FindAdmin()
    {
       $users = User::all();
       foreach ($users as $user){
           foreach ($user->roles as $item){
               if($item->name == 'Admin') return $user;
           }
       }
    }

}
