<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show()
{
    $user = auth()->user();
    return view('users.account.show', compact('user'));
}


    public function edit()
    {
        $user = auth()->user();
        return view('users.account.edit', compact('user'));
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);
    
        $user = auth()->user();
        $user->update($request->only('name', 'email'));
    
        return redirect()->route('user.account')->with('success', 'Account updated successfully!');
    }
    public function destroy()
    {
        $user = auth()->user();
        $user->delete();
    
        return redirect('/')->with('success', 'Account deleted successfully!');
    }
        










    

    // if (!auth()->user()->isAdmin()) { // Replace isAdmin() with your role-checking logic
    //     abort(403, 'Unauthorized action.');
    // }
    
    

//     public function show($id)
// {
//     $user = User::findOrFail($id);
//     return view('users.show', compact('user'));
// }



// public function rename(Request $request, $id)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//     ]);

//     $user = User::findOrFail($id);
//     $user->name = $request->name;
//     $user->save();

//     return redirect()->route('users.show', $id)->with('success', 'User renamed successfully!');
// }


// public function destroy($id)
// {
//     $user = User::findOrFail($id);
//     $user->delete();

//     return redirect()->route('users.index')->with('success', 'User deleted successfully!');
// }

// public function index()
// {
//     $users = User::paginate(10); // Paginate users for better performance
//     return view('users.index', compact('users'));
// }


}
