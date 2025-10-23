<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Doctor;

class DoctorExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct($request){
        $this->request = $request;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $exportData = [];
        $query = Doctor::query()->select('account_id','name','email','mobile_no','alt_mobile_no','gender','country','address','designation','blood_group','status','created_at');

        if (!empty($this->request->start_date) && !empty($this->request->end_date)) {
            $query->whereDate('created_at','>=',$this->request->start_date)
                ->whereDate('created_at','<=',$this->request->end_date);
        }
        if (!empty($this->request->export_blood_group)) {
            $query->where('blood_group',$this->request->export_blood_group);
        }
        if (!empty($this->request->export_status)) {
            $query->where('status',$this->request->export_status);
        }

        foreach ($query->get() as $key => $value) {
            $exportData[] = [
                'account_id'    => $value->account_id,
                'name'          => $value->name,
                'email'         => $value->email,
                'mobile_no'     => $value->mobile_no,
                'alt_mobile_no' => $value->alt_mobile_no,
                'gender'        => GENDER[$value->gender],
                'country'       => $value->country,
                'address'       => $value->address,
                'designation'   => $value->designation,
                'blood_group'   => $value->blood_group ? BLOOD_GROUP[$value->blood_group] : '',
                'status'        => STATUS[$value->status],
                'created_at'    => $value->created_at
            ];
        }

        $exportData[] = $query;
        return collect($exportData);
    }


    public function headings(): array {
        return [
            'Account ID',
            'Name',
            'Email',
            'Mobile No',
            'Alt Mobile No',
            'Gender',
            'Country',
            'Address',
            'Designation',
            'Blood Group',
            'Status',
            'Created At'
        ];
    }

}
