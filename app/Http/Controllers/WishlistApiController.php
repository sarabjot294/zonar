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
        $inserted = Wishlist::create([
            'user_id' => request('user_id'),
            'book_id' => request('book_id'),
        ]);
        return $this->return(empty($inserted)?false:true);
    }

    public function update(Wishlist $wishlist)
    {
        $success = $wishlist->update([
            'user_id' => request('user_id'),
            'book_id' => request('book_id'),
        ]);
        if(empty($success))
            return $this->return(false);
        return $this->return(true);
    }

    public function delete(Wishlist $wishlist)
    {
        $success = $wishlist->delete();

        return $this->return($success);
    }

    public function return($status, $msg="")
    {
        return ['status' => $status, 'msg' => $msg];
    }

}
