<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Tb_msrt_bs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountAdminController extends Controller
{
    public function index()
    {
        $admins = Tb_msrt_bs::orderByDesc('msrt_no')->paginate(20);

        return view('account.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('account.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'msrt_id'   => 'required|string|max:50|unique:tb_msrt_bs,msrt_id',
            'fnm'       => 'required|string|max:50',
            'email_adres' => 'required|email|max:100|unique:tb_msrt_bs,email_adres',
            'password'  => 'required|string|min:8|confirmed',
            'author'    => 'required|string|in:admin,dev,manager,operator,staff,intern',
        ]);

        Tb_msrt_bs::create([
            'msrt_id'   => $request->msrt_id,
            'fnm'       => $request->fnm,
            'email_adres' => $request->email_adres,
            'password'  => Hash::make($request->password),
            'author'    => $request->author,
            'login_posbl_at' => true,
        ]);

        return redirect()->route('account.admin.index')->with('success', '관리자 계정이 생성되었습니다.');
    }

    public function edit($id)
    {
        $admin = Tb_msrt_bs::findOrFail($id);

        return view('account.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Tb_msrt_bs::findOrFail($id);

        $request->validate([
            'fnm'       => 'required|string|max:50',
            'email_adres' => 'required|email|max:100|unique:tb_msrt_bs,email_adres,' . $admin->msrt_no . ',msrt_no',
            'author'    => 'required|string|in:admin,dev,manager,operator,staff,intern',
        ]);

        $admin->fnm        = $request->fnm;
        $admin->email_adres = $request->email_adres;
        $admin->author     = $request->author;

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('account.admin.index')->with('success', '관리자 계정이 수정되었습니다.');
    }

    public function destroy($id)
    {
        $admin = Tb_msrt_bs::findOrFail($id);
        $admin->delete();

        return redirect()->route('account.admin.index')->with('success', '관리자 계정이 삭제되었습니다.');
    }
}
