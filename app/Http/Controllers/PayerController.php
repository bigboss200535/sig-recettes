<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Payer; 
use DataTables;

class PayerController extends Controller
{
    public function index()
    {
        // fetch all tax_payers which are active and not soft deleted
        $payers = Payer::rightJoin('gender', 'gender.GenderId', '=', 'tax_payer.GenderId')
        ->where('tax_payer.Archived', 'NO')
        ->where('gender.Differential', '0')
        ->select('tax_payer.*', 'gender.GenderId as GenderId', 'gender.GenderName')
         // ->limit(20)
        ->get();

        return view('payer.index', compact('payers'));
    }

    //  public function showsingle(TaxPayerId $taxpayeid)
    // {
    //     return view('payer.details',compact('payer'));
    // } 

    public function show()
    {
        $payers = Payer::rightJoin('gender', 'gender.GenderId', '=', 'tax_payer.GenderId')
        ->where('tax_payer.Archived', 'NO')
        ->where('gender.Differential', '0')
        ->select('tax_payer.*', 'gender.GenderId as GenderId', 'gender.GenderName')
         // ->limit(20)
        ->get();

        return view('payer.show', compact('payers'));
    }

    public function showsingle(Payer $payer)
    {
        return view('payer.details',compact('payer'));
    }

    // public function showsingle($TaxPayerId)
    // {
    //     $payer = Payer::find($TaxPayerId);
    //     return view('payer.details', compact('payer'));
    // }

    public function show_taxable()
    {
        // fetch all tax_payers which are active
        $payers = Payer::rightJoin('gender', 'gender.GenderId', '=', 'tax_payer.GenderId')
        ->where('tax_payer.Archived', 'NO')
        ->where('gender.Differential', '0')
        ->select('tax_payer.*', 'gender.GenderId as GenderId', 'gender.GenderName')
        ->get();
        return view('Payer.AddTaxables', compact('payers'));
    }


    public function create()
    {
        return view('payer.create');
    }


    
   public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'surname' => 'required|min:3|max:50',
        //     'othername' => 'required|min:3|max:50',
        //     'gender' => 'nullable |min:1',
        //     'national_id' => 'required|min:3|max:50',
        //     'email' => 'nullable|email|min:3|max:50',
        //     'file_number' => 'required|min:3|max:50',
        //     'voter_id' => 'nullable|min:3|max:50',
        //     'telephone_1' => 'required|min:3|max:50',
        //     'telephone_2' => 'nullable|min:3|max:50',
        //     'geolocation' => 'nullable|min:3|max:50',
        //     'latitude' => 'nullable|min:3|max:50',
        //     'longitude' => 'nullable|min:3|max:50',
        //     'precision' => 'nullable|min:3|max:50',
        //     'altitude' => 'nullable|min:3|max:50',
        //     'address' => 'required',
        //     'village' => 'nullable|min:3|max:100',
        //     'city' => 'nullable|min:3|max:100',
        //     'neighborhood' => 'nullable',
        //     'municipal' => 'nullable|min:3', 
        //     'zone_name' => 'nullable|min:3',
        //     'user_id' => 'nullable|min:1',
        // ]);

         // Retrieve the count of existing taxpayers
        $count_payers = Payer::count();
        // Extract the initials from the surname and firstname
        $surnameInitial = strtoupper(substr($request->input('surname'), 0, 1));
        $firstnameInitial = strtoupper(substr($request->input('othername'), 0, 1));
        $count_plus_one = $count_payers + 1;
        // Get the current hour, day, month, and year
        $currentMinute = date('i');
        $currentSecond = date('s');
        $currentHour = date('H');
        $currentDay = date('d');
        $currentMonth = date('m');
        $currentYear = date('Y');

        $desiredLength = 4;
        $formattedTaxPayerId = str_pad($count_plus_one, $desiredLength, '0', STR_PAD_LEFT);

        $payer_details = new Payer();
        $payer_details->TaxPayerId = $surnameInitial.$formattedTaxPayerId.$firstnameInitial.$currentHour.$currentDay.$currentMonth.$currentYear;
        $payer_details->Surname = strtoupper($request->input('surname'));
        $payer_details->Firstname = strtoupper($request->input('othername'));
        $payer_details->GenderId = $request->input('gender');
        $payer_details->NationalIdNumber = $request->input('national_id');
        $payer_details->Email = $request->input('email');
        $payer_details->FileNumber = $request->input('file_number');
        $payer_details->VoterNumber = $request->input('voter_id');
        $payer_details->Telephone1 = $request->input('telephone_1');
        $payer_details->Telephone2 = $request->input('telephone_2');
        $payer_details->Geolocation = $request->input('geolocation');
        $payer_details->Latitude = $request->input('latitude');
        $payer_details->Longitude = $request->input('longitude');
        $payer_details->GeoPrecision = $request->input('precision');
        $payer_details->Address = strtoupper($request->input('address'));
        $payer_details->Village = strtoupper($request->input('village'));
        $payer_details->City = strtoupper($request->input('city'));
        $payer_details->Neighborhood = strtoupper($request->input('neighborhood'));
        $payer_details->MunicipalId = $request->input('municipal');
        $payer_details->ZoneId = $request->input('zone_name');
        $payer_details->save();

        return redirect()->back()->with('success', 'Payer saved successfully!');
    }


    public function destroy($id)
    {
         DB::table('tax_payer')->where('TaxPayerId ', '=', $id)->delete();
         return view('payer.index');
    }
    

    public function showPayer(TaxPayerId $taxpayerid)
    {
        // $contact = Contact::find($id);
        return view('payer.details')->with('payer', $payer);
    }


    public function deletePayer($id)
    {
         DB::table('tax_payer')->where('TaxPayerId ', '=', $id)->delete();
         return view('Payer.Payers');
    }

   
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'Firstname' => 'required|string|max:100',
            'Surname' => 'required|string|max:100',
            'GenderId' => 'required|string|max:20',
            'NationalIdNumber' => 'required|string|max:50',
            
        ]);

        // Find the payer by ID
        $payer = Payer::findOrFail($id);

        // Update the payer
        $payer->update($validatedData);

        // Additional logic or response handling can be added here

        return response()->json(['message' => 'Payer updated successfully', 'payer' => $payer]);
    }
}
