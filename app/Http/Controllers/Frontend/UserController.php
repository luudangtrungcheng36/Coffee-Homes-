<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\VerifyAccount;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function index() {
        return view('frontend.register');
    }

    public function user_detail($id) {
        $account = Account::where('id', $id)->first();
        return view('frontend.user_detail', compact('account'));
    }

    public function login() {
        return view('frontend.login');
    }
 
    public function check_login(Request $request) {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->role == 3) {
                Auth::logout();
                return back()->with('error', 'Bạn chưa xác minh email ');
            } else if($user->role !== 2) {
                return redirect()->route('home.index')->with('success', 'Đăng nhập thành công');
            }
            else {
                Auth::logout();
                return back()->with('error', 'Tài khoản của bạn đã bị khóa');
            }
        } else {
            return back()->with('error', 'Email hoặc mật khẩu không đúng ');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function store(Request $request) {

        $validation = $request->validate([
            'username' => 'required',
            'email' => ['required', 'email', Rule::unique('accounts', 'email')],
            'password' => 'required',
            'confirm-password' => 'required|same:password',
        ], [
            'username.required' => 'Vui lòng nhập họ và tên.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'confirm-password.required' => 'Vui lòng nhập xác nhận mật khẩu.',
            'confirm-password.same' => 'Xác nhận mật khẩu không trùng khớp với mật khẩu.',
        ]);
        

        $account = new Account();

        $account->name = $request->input('username');
        $account->email = $request->input('email');
        $account->password = bcrypt($request->input('password'));
        $account->role = 3; // role = 3 : Chưa xác minh email.
        $account->save();
        // dd($account);
        Mail::to($account->email)->send(new VerifyAccount($account));

        
        return redirect()->route('home.index')->with('success', 'Đăng ký thành công, vui lòng xác minh email');;
    }

    public function verify($email) {
        $account = Account::where('email', $email)->whereNUll('email_verified_at')->firstOrFail();
        
        $account = Account::where('email', $email)->update(['email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'), 'role' => 0]);
        return redirect()->route('home.index')->with('success', 'Xác minh email thành công , vui lòng đăng nhập');;
    }

    public function update(Account $account, Request $request) {
        $account->name = $request->input('username');
        $account->phonenumber = $request->input('phonenumber');
        $account->address = $request->input('address');
        if($request->image) {
            $image = $request->image->hashName();
            $request->image->move(public_path('uploads/avatars'), $image);
            $account->avatar = $image;
        }

        $account->save();
        
        return back()->with('success', 'Sửa thông tin thành công ');;

    }

    public function comment($account_id, $product_id, Request $request) {


        $review = new Review();

        $review->number_stars = $request->input('number_stars');
        $review->content = $request->input('content');
        $review->product_id = $product_id;
        $review->account_id = $account_id;
        $review->save();

        // $data = request()->only('content', 'number_stars');
        // $data['product_id'] = $product_id;
        // $data['account_id'] = auth()->id();
        // dd($data); -> ra đúng rồi nhưng lưu vào thì number_stars bị null không biết sai ở đâu. 
        // if(Review::create($data)) {
        //     return back()->with('success', 'Đánh giá sản phẩm thành công');
        // }

        return back()->with('success', 'Đánh giá sản phẩm thành công');

    }
}
