<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Credit;
use App\Models\UsedCredit;
use Illuminate\Http\Request;
use App\Models\PurchaseCredit;
use App\Http\Controllers\Controller;

class AdminCreditsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = "Transaction List | Petlodger";

        $usedCredits = UsedCredit::with('user', 'ads', 'user.userImage')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('admin.credit.index', compact('usedCredits', 'pageTitle'));
    }

    /**
     * Display a listing of the Credit Balance of every Sitter.
     */
    public function creditBalance()
    {
        $pageTitle = "Credit Balance | Petlodger";

        $credits = User::with('sitter', 'userImage', 'credits', 'usedCredits.ads', 'purchaseCredits.orders')
            ->where('role_id', 5)
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('admin.credit.balance', compact('credits', 'pageTitle'));
    }

    /**
     * Remove the specified resource from storage and reverse the last transaction.
     */
    public function destroy(string $id)
    {
        $usedCredit = UsedCredit::findOrFail($id);
        $user_id = $usedCredit->user_id;

        $usedCredit->delete();

        $this->reverseCharges($user_id);

        return redirect()->route('admin.credit.lists')->with('success', 'Transaction has been deleted, and credits have been reversed successfully!');
    }

    /**
     * Reverse the charges.
     */
    protected function reverseCharges($user_id)
    {
        // Charges Per Ad
        $requiredCredits = 10;
        User::find($user_id)->credits->increment('balance', $requiredCredits);

        return true;
    }
}
