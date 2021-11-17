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

    public function store(Request $request)
    {
        $data = $request->all();
        //Checking the user request
        if (!array_key_exists('user_id', $data) || !array_key_exists('book_id', $data))
        {
            return $this->return(false,"check user input");
        }

        //Check if the book already exsists in the user's wishlist
        $matchThese = ['user_id' => request('user_id'), 'book_id' => request('book_id')];
        if (Wishlist::where($matchThese)->exists()) {
            return $this->return(false,"Book already added into the wishlist");            
        }

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

    public function update(Wishlist $wishlist, Request $request)
    {
        
        $data = $request->all();
        if (!array_key_exists('user_id', $data) || !array_key_exists('book_id', $data))
        {
            return $this->return(false,"check user input");
        }

        //Check if the data is already updated or not
        $matchThese = ['id'=>$wishlist->id,'user_id' => request('user_id'), 'book_id' => request('book_id')];
        if (Wishlist::where($matchThese)->exists()) {
            return $this->return(false,"Data already updated into the db");            
        }

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
