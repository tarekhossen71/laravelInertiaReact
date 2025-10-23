<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Patient;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientExport implements FromCollection, WithHeadings
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
        $query = Patient::query()->select(
            'patient_id',
            'consultation_type_id',
            'patient_type_id',
            'name',
            'phone_no',
            'referred_doctor_name',
            'address',
            'gender',
            'remark',
            'age',
            'attachment'
        );

        if (!empty($this->request->start_date) && !empty($this->request->end_date)) {
            $query->whereDate('created_at','>=',$this->request->start_date)
                ->whereDate('created_at','<=',$this->request->end_date);
        }
        if (!empty($this->request->export_patient_type)) {
            $query->where('patient_type_id',$this->request->export_patient_type);
        }
        if (!empty($this->request->export_consultation_type)) {
            $query->where('consultation_type_id',$this->request->export_consultation_type);
        }
        if (!empty($this->request->export_gender)) {
            $query->where('gender',$this->request->export_gender);
        }

        foreach ($query->get() as $key => $value) {
            $exportData[] = [
                'patient_id'           => $value->patient_id,
                'consultation_type_id' => $value->consultation_type_id ? CONSULTATION_TYPE[$value->consultation_type_id] : '',
                'patient_type_id'      => $value->patient_type_id ? PATIENT_TYPE[$value->patient_type_id] : '',
                'name'                 => $value->name,
                'phone_no'             => $value->phone_no,
                'referred_doctor_name' => $value->referred_doctor_name,
                'address'              => $value->address,
                'gender'               => $value->gender ? GENDER[$value->gender] : '',
                'remark'               => $value->remark,
                'age'                  => $value->age,
                'attachment'           => $value->attachment ? asset('uploads/attachments/'.$value->attachment) : '',
             ];
        }

         return collect($exportData);
    }


    public function headings(): array {
        return [
            'Patient ID',
            'Consultation Type',
            'Patient Type',
            'Patient Name',
            'Phone No',
            'Referred Doctor',
            'Address',
            'Gender',
            'Remark',
            'Age',
            'Attachment',
        ];
    }
}
