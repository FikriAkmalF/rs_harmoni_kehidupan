<?php

namespace App\Http\Controllers;

use App\Models\Rs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    // Update Profile bagian Role Users
    public function update(Request $request)
    {
        $user = Auth::user();

        if (!($user instanceof User)) {
            return redirect()->back()->withErrors(['user' => 'Invalid user instance']);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users',
            'no_hp' => 'required|string|regex:/^[0-9]{10,15}$/',
            'old_password' => 'required_with:new_password|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ], [
            'email.unique' => 'Email sudah ada!',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek jika email sudah terdaftar
        $existingUser = User::where('email', $request->email)->where('id', '!=', $user->id)->first();

        if ($existingUser) {
            return redirect()->route('user.profile')->with('failed', 'Email sudah terdaftar!');
        }

        // Update informasi pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;

        // Simpan perubahan
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    public function reset(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'id' => 'required|exists:users,id', // Validasi ID pengguna
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed', // 'confirmed' memeriksa kecocokan dengan new_password_confirmation
        ]);

        // Temukan pengguna berdasarkan ID
        $user = User::find($request->id);

        // Periksa apakah pengguna ditemukan
        if (!$user) {
            return redirect()->back()->withErrors(['id' => 'Pengguna tidak ditemukan.']);
        }

        // Periksa apakah password lama cocok
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Password lama yang diberikan tidak cocok dengan catatan kami.']);
        }

        // Update password dengan yang baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('berhasil', 'Password telah berhasil diperbarui.');
    }




   
}
