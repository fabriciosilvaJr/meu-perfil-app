<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    { 
       
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        // if ($request->hasFile('image_url')) {
        //     $photo = $request->file('image_url');
        //     $image = Image::make($photo);
        //     $image->resize(200, 200); 
    
        //     $photoData = (string) $image->encode('data-url');
            
        //     $request->user()->image_url = $photoData;
    
        // }

        if ($request->hasFile('image_url')) {
            $user = $request->user();
            $image = $request->file('image_url');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('uploads/' . $filename);
    
            // Redimensionar e recortar a imagem para o tamanho desejado (ajuste conforme necessário)
            $imagemRedimensionada = Image::make($image)->fit(200, 200);
            $imagemRedimensionada->save($path);
    
            $user->image_url = 'uploads/' . $filename;
    
        }
        
        
        
        
    
    

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }



  

    

    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
