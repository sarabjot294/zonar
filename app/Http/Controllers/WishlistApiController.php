<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\User;
use App\Models\Book;

class WishlistApiController extends Controller
{
    public function index()
    {
        return Wishlist::all();
    }

    public function getUserWishlist(User $user)
    {
        return Wishlist::where('user_id', $user->id)->get();
    }

    public function store()
    {
        try{
            $inserted = Wishlist::create([
                'user_id' => request('user_id'),
                'book_id' => request('book_id'),
            ]);
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return $this->return(false, $e->getMessage());
        }
        return $this->return(true);
    }

    public function update(Wishlist $wishlist)
    {
        print_r($wishlist);
        try{
            $success = $wishlist->update([
                'user_id' => request('user_id'),
                'book_id' => request('book_id'),
            ]);
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return $this->return(false, $e->getMessage());
        }
        catch(\Exception $ex)
        {
            return $this->return(false, $ex);
        }
        return $this->return(true);
    }

    public function delete(Wishlist $wishlist)
    {
        try{
            $success = $wishlist->delete();
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return $this->return(false, $e->getMessage());
        }
        return $this->return($success);
    }

    public function return($status, $msg="")
    {
        return ['status' => $status, 'msg' => $msg];
    }

}
