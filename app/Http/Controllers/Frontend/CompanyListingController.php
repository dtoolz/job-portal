<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\CompanyIndustry;
use App\Models\CompanyLocation;
use App\Models\CompanySize;
use App\Models\CompanyPhoto;
use App\Models\CompanyVideo;
use App\Models\Order;
use App\Mail\Sitemail;
use App\Models\OtherPageItem;

class CompanyListingController extends Controller
{
    public function index(Request $request)
    {

        $company_industries = CompanyIndustry::orderBy('name','asc')->get();
        $company_locations = CompanyLocation::orderBy('name','asc')->get();
        $company_sizes = CompanySize::orderBy('id','asc')->get();

        $form_name = $request->name;
        $form_industry = $request->industry;
        $form_location = $request->location;
        $form_size = $request->size;
        $form_founded = $request->founded;

        $companies = Company::withCount('rJob')->with('rCompanyIndustry','rCompanyLocation','rCompanySize')->orderBy('id','desc');

        if($request->name != null) {
            $companies = $companies->where('company_name','LIKE','%'.$request->name.'%');
        }

        if($request->industry != null) {
            $companies = $companies->where('company_industry_id',$request->industry);
        }

        if($request->location != null) {
            $companies = $companies->where('company_location_id',$request->location);
        }

        if($request->size != null) {
            $companies = $companies->where('company_size_id',$request->size);
        }

        if($request->founded != null) {
            $companies = $companies->where('founded_on',$request->founded);
        }
       
        $companies = $companies->paginate(9);

        $other_page_item = OtherPageItem::where('id',1)->first();

        return view('frontend.company_listing', compact('companies','company_industries','company_locations','company_sizes','form_name','form_industry','form_location','form_size','form_founded','other_page_item'));
    }

    public function detail($id)
    {
        $order_data = Order::where('company_id',$id)->where('currently_active',1)->first();
        if(date('Y-m-d') > $order_data->expire_date) {
            return redirect()->route('home');
        }

        $company_single = Company::withCount('rJob')->with('rCompanyIndustry','rCompanyLocation','rCompanySize')->where('id',$id)->first();

        if(CompanyPhoto::where('company_id',$company_single->id)->exists()) {
            $company_photos = CompanyPhoto::where('company_id',$company_single->id)->get();
        } else {
            $company_photos = '';
        }
        
        if(CompanyVideo::where('company_id',$company_single->id)->exists()) {
            $company_videos = CompanyVideo::where('company_id',$company_single->id)->get();
        } else {
            $company_videos = '';
        }

        $jobs = Job::with('rJobCategory','rJobLocation','rJobType','rJobExperience','rJobGender','rJobSalaryRange')->where('company_id',$company_single->id)->get();

        $other_page_item = OtherPageItem::where('id',1)->first();

        return view('frontend.company', compact('company_single','company_photos','company_videos','jobs','other_page_item'));
    }

    public function send_email(Request $request)
    {
        $request->validate([
            'visitor_name' => 'required',
            'visitor_email' => 'required|email',
            'visitor_message' => 'required'
        ]);

        $subject = 'Contact Form Message';
        $message = 'Visitor Information: <br>';
        $message .= 'Name: '.$request->visitor_name.'<br>';
        $message .= 'Email: '.$request->visitor_email.'<br>';
        $message .= 'Phone: '.$request->visitor_phone.'<br>';
        $message .= 'Message: '.$request->visitor_message;

        \Mail::to($request->receive_email)->send(new Sitemail($subject,$message));

        return redirect()->back()->with('success', 'Email Sent successfully!');
    }
}
