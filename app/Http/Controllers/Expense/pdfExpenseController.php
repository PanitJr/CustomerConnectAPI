<?php
/**
 * Created by IntelliJ IDEA.
 * User: Eieigrm
 * Date: 9/11/2559
 * Time: 21:47
 */

namespace app\Http\Controllers\Expense;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class pdfExpenseController extends Controller
{
    public function getPDF(){
        $pdf = PDF::loadView('pdf.expense');
        return $pdf->download('expense.pdf');
    }

}