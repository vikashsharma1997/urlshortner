<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\Analytic;
use App\Models\ShortUrl;
use Illuminate\Support\Str;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use App\Exports\ShortUrlsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function clients()
    {
        $data['companies'] = Company::with(['users', 'urls'])->orderBy('created_at', 'desc')->paginate(10);
        return view('clients.index', $data);
    }

    public function clientinvite()
    {
        $data['companies'] = Company::orderBy('name', 'asc')->get();
        return view('clients.invite', $data);
    }

    public function sendInvitation(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email',
            'company' => 'required|exists:companies,id',
        ]);
        $randomPassword = Str::random(10);
        $user = User::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'companyid' => $validated['company'],
            'roleid' => 2,
            'password'   => Hash::make($randomPassword),
        ]);
        $loginUrl = route('login');
        Mail::to($validated['email'])->send(
            new InvitationMail($validated['name'], $validated['email'], $randomPassword, $loginUrl)
        );

        return back()->with('success', 'Invitation sent successfully to ' . $validated['email']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function members()
    {
        $users = User::query();
        $user = Auth::user();
        if ($user->roleid === 2) {
            $users->where('companyid', $user->companyid);
        } elseif ($user->roleid === 1) {
            $users->where('roleid', 2)->orWhere('roleid', 3);
        }
        $data['users'] = $users->with('company')->orderBy('created_at', 'desc')->paginate(10);
        return view('members.index', $data);
    }

    public function memberinvite()
    {
        $data['roles'] = Role::where('id', '!=', 1)->get();
        return view('members.invite', $data);
    }

    public function memberPostInvite(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email',
            'role' => 'required|exists:roles,id',
        ]);
        $randomPassword = Str::random(10);
        $user = User::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'roleid' => $validated['role'],
            'companyid' => optional(auth()->user()->company)->id,
            'password'   => Hash::make($randomPassword),
        ]);
        $loginUrl = route('login');
        Mail::to($validated['email'])->send(
            new InvitationMail($validated['name'], $validated['email'], $randomPassword, $loginUrl)
        );

        return back()->with('success', 'Invitation sent successfully to ' . $validated['email']);
    }

    public function generateShortUrl()
    {
        return view('generateurl');
    }

    public function generatedShortUrls()
    {
        $user = Auth::user();
        $shortUrl = ShortUrl::query();
        if($user->roleid === 2) $shortUrl->where('companyid',$user->companyid);
        elseif($user->roleid === 3) $shortUrl->where('userid', $user->id);
        $data['urls'] = $shortUrl->withCount('analytics')->orderBy('created_at', 'desc')->paginate(10);
        return view('generatedurls', $data);
    }

    public function generatePostShortUrl(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'url'    => 'required|url',
        ]);
        do {
            $shortCode = Str::random(6);
        } while (ShortUrl::where('shorten_url', $shortCode)->exists());
        $shortUrl = url($shortCode);
        ShortUrl::create([
            'original_url' => $validated['url'],
            'shorten_url'   => $shortUrl,
            'shortcode' => $shortCode,
            'userid'    => $user->id,
            'companyid'    => optional($user->company)->id,
        ]);

        return back()->with('success', 'Short URL generated successfully.');
    }

    public function urlRedirect($slug)
    {
        $shortUrl = ShortUrl::where('shortcode', $slug)->firstOrFail();
        Analytic::create([
            'urlid' => $shortUrl->id,
            'ip' => request()->ip(),
            'hit_at' => now(),
        ]);
        return redirect($shortUrl->original_url);
    }

    public function export(Request $request) {
        $type = $request->input('type');
        switch ($type) {
            case 'today':
                $startDate = Carbon::today();
                $endDate   = Carbon::today()->endOfDay();
                break;
            case 'last_week':
                $startDate = Carbon::now()->subWeek()->startOfWeek();
                $endDate   = Carbon::now()->subWeek()->endOfWeek();
                break;
            case 'this_month':
                $startDate = Carbon::now()->startOfMonth();
                $endDate   = Carbon::now()->endOfMonth();
                break;
            case 'last_month':
                $startDate = Carbon::now()->subMonth()->startOfMonth();
                $endDate   = Carbon::now()->subMonth()->endOfMonth();
                break;
            default:
                return back()->with('error', 'Invalid date type.');
        }

        return Excel::download(
            new ShortUrlsExport($startDate, $endDate),
            'shorturls_' . $type . '.xlsx'
        );
    }
}
