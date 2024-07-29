<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Sitter;
use App\Models\Address;
use App\Models\PetType;
use App\Models\UserFile;
use App\Models\UserImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SitterExperience;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /**
     * Display the user registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $pageTitle = "User Registration Form";
        $pageDescription = "Please register with your email to create ads on this platform or become a sitter and apply for jobs.";

        $data = [
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
        ];
        // dd($data);
        return view('auth.register.register', $data);
    }

    /**
     * Handle user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate User Input
        $request->validate([
            'full_name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|digits:11',
            'password' => 'required|string|min:8|max:32|confirmed',
        ]);

        // Create a New User Instance
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password),
            'active' => 1, // default is active
            'role_id' => 4, // default is Pet Owner
        ]);

        // save name and email into session
        Session::put('full_name', $request->full_name);
        Session::put('email', $request->email);


        // Redirect to a specific page after successful registration
        // return redirect()->route('verification.email.form')->with('success', 'Your have registered successfully!');

        // redirect to email verification
        return redirect()->route('verification.email.form');
    }

    /**
     * Display the sitter registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showSitterRegistrationForm()
    {
        $pageTitle = "Become a Sitter!";
        $pet_type = PetType::get();
        $sitter_experiences = SitterExperience::get();

        return view('auth.register.sitter.become_a_sitter', compact(['pageTitle', 'pet_type', 'sitter_experiences']));
    }

    /**
     * Handle sitter registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sitterRegister(Request $request)
    {
        // dd($request->all());

        // Validate User Input
        $request->validate([
            // personal info and contact
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'mobile' => 'required|regex:/^[0-9]{11}$/',
            // 'insurance_number' => 'required|string|size:9',
            'password' => 'required|string|min:8|confirmed',
            'document' => 'required|image|mimes:jpeg,png,jpg|max:50000', // Validate image upload (50MB)
            'about' => 'required|string|max:500',
            // address
            'street' => 'required|string|max:255',
            'post_code' => 'required|min:6|max:7',
            'city' => 'required|string|max:60',
            // sitter
            'species' => 'required',
            'experience' => 'required',
            'other_species' => 'required',
            'sit_type' => 'required',
        ]);

        // Generate Password for User
        $password = Str::random(8);

        // Create User
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile' => $request->mobile,
            'insurance_number' => null, // fill in profile update
            'about' => $request->about,
            'role_id' => 5, // Sitter
            'active' => true, // Use boolean for active status
        ]);

        // Create Address
        $address = Address::create([
            'street' => $request->street,
            'post_code' => $request->post_code,
            'city' => $request->city,
            'country' => 'United Kingdom',
            'user_id' => $user->id, // Assign user_id foreign key
        ]);

        // Create Sitter
        $sitter = Sitter::create([
            'sit_type' => $request->sit_type,
            'other_species' => $request->other_species,
            'availability' => 1, // default is active
            'insurance' => $request->insurance, // default is active
            'charging_mode' => 'Hourly', // default is hourly
            'sitter_experience_id' => $request->experience,
            'pet_type_id' => implode(',', $request->species),
            'user_id' => $user->id, // Assign user_id foreign key
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image_path = $image->storeAs('images', $image_name, 'public');

            // Create Image Record
            $profilePic = UserFile::create([
                'user_id' =>  $user->id, // Assign user_id foreign key
                'image_type' => 'sitter_files', // default
                'title' => $image_name,
                'image_path' => $image_path,
            ]);
        }
        // Handle Sitter Document Upload
        if ($request->hasFile('document')) {
            $sitter_document = $request->file('document');
            $document_name = time() . '.' . $sitter_document->getClientOriginalExtension();
            $document_path = $sitter_document->storeAs('images', $document_name, 'public');

            // Create Image Record
            $sitter_files = UserFile::create([
                'user_id' =>  $user->id, // Assign user_id foreign key
                'image_type' => 'sitter_files', // default
                'title' => $document_name,
                'image_path' => $document_path,
            ]);
        }
        // dd($sitter_files);

        // Log the User In (Optional)
        // auth()->login($user);

        // Handle Registration Success
        // return redirect()->route('sitter.profile')->with('success', 'Thank you for Registration! Welcome to our site.');

        // save name and email into session
        Session::put('full_name', $request->full_name);
        Session::put('email', $request->email);

        // redirect to email verification
        return redirect()->route('verification.email.form');
    }

}