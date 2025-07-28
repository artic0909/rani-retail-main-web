<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Saler;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // Stock Manager ----------------------------->
    public function stockManagerView()
    {
        $stockManagers = User::where('type', 'stock-manager')->get();

        return view('admin.admin-stock-manager', compact('stockManagers'));
    }

    public function addToManager($id)
    {
        $user = User::findOrFail($id);

        if ($user->type !== 'stock-manager') {
            return redirect()->back()->with('error', 'Only stock-managers can be added.');
        }


        if (Manager::where('email', $user->email)->exists()) {
            return redirect()->back()->with('info', 'Already added as manager.');
        }

        Manager::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'password' => $user->password,
            'type'     => $user->type,
        ]);

        return redirect()->back()->with('success', 'User added to managers.');
    }

    public function removeFromManager($id)
    {
        $user = User::findOrFail($id);

        $manager = Manager::where('email', $user->email)->first();

        if (!$manager) {
            return redirect()->back()->with('error', 'Manager not found.');
        }

        $manager->delete();

        return redirect()->back()->with('success', 'Manager removed successfully from Manager table.');
    }



    public function deleteManager($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        Manager::where('email', $user->email)->delete();

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully from Users table.');
    }


    // Saler ----------------------------->
    public function salerView()
    {
        $salers = User::where('type', 'saler')->get();
        return view('admin.admin-saler', compact('salers'));
    }

    public function addToSaler($id)
    {
        $user = User::findOrFail($id);

        if ($user->type !== 'saler') {
            return redirect()->back()->with('error', 'Only salers can be added.');
        }


        if (Saler::where('email', $user->email)->exists()) {
            return redirect()->back()->with('info', 'Already added as saler.');
        }

        Saler::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'password' => $user->password,
            'type'     => $user->type,
        ]);

        return redirect()->back()->with('success', 'User added to salers.');
    }

    public function removeFromSaler($id)
    {
        $user = User::findOrFail($id);

        $saler = Saler::where('email', $user->email)->first();

        if (!$saler) {
            return redirect()->back()->with('error', ' not found.');
        }

        $saler->delete();

        return redirect()->back()->with('success', 'Saler removed successfully from saler table.');
    }



    public function deleteSaler($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        Saler::where('email', $user->email)->delete();

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully from Users table.');
    }
}
