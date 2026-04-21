<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak terdaftar di sistem.',
        ]);

        $email = $request->email;
        $token = Str::random(64);
        $expiresAt = now()->addMinutes(60); // Token berlaku 1 jam

        // Hapus token lama jika ada
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        // Simpan token baru
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now(),
        ]);

        // Kirim email reset password (untuk demo, kita akan redirect ke halaman reset)
        // Dalam implementasi nyata, kirim email dengan link reset
        return redirect()->route('password.reset', ['token' => $token, 'email' => $email]);
    }

    public function showResetPassword(Request $request)
    {
        $token = $request->token;
        $email = $request->email;

        // Verifikasi token
        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('token', $token)
            ->where('created_at', '>', now()->subMinutes(60))
            ->first();

        if (!$resetRecord) {
            return redirect()->route('forgot-password')
                ->with('error', 'Link reset password tidak valid atau sudah expired.');
        }

        return view('auth.reset-password', compact('token', 'email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $token = $request->token;
        $email = $request->email;
        $password = $request->password;

        // Verifikasi token
        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('token', $token)
            ->where('created_at', '>', now()->subMinutes(60))
            ->first();

        if (!$resetRecord) {
            return redirect()->route('forgot-password')
                ->with('error', 'Link reset password tidak valid atau sudah expired.');
        }

        // Update password user
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->update([
                'password' => Hash::make($password),
            ]);

            // Hapus token setelah berhasil reset
            DB::table('password_reset_tokens')->where('email', $email)->delete();

            return redirect()->route('login')
                ->with('success', 'Password berhasil direset. Silakan login dengan password baru.');
        }

        return redirect()->route('forgot-password')
            ->with('error', 'Terjadi kesalahan saat reset password.');
    }
}