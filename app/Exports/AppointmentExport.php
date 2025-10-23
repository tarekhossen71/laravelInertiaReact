<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Appointment;

class AppointmentExport implements FromCollection, WithHeadings
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
        $query = Appointment::query()->with('doctor','patient')->select('appointment_id','patient_id','doctor_id','slot','appointment_date','priority','status','vip_patient','created_at');

        if (!empty($this->request->start_date) && !empty($this->request->end_date)) {
            $query->whereDate('appointment_date','>=',$this->request->start_date)
                ->whereDate('appointment_date','<=',$this->request->end_date);
        }
        if (!empty($this->request->export_doctor)) {
            $query->where('doctor_id',$this->request->export_doctor);
        }
        if (!empty($this->request->export_patient)) {
            $query->where('patient_id',$this->request->export_patient);
        }
        if (!empty($this->request->export_priority)) {
            $query->where('priority',$this->request->export_priority);
        }
        if (!empty($this->request->export_status)) {
            $query->where('status',$this->request->export_status);
        }

        foreach ($query->get() as $key => $value) {
            $exportData[] = [
                'appointment_id'   => $value->appointment_id,
                'patient_id'       => $value->patient->patient_id,
                'doctor_id'        => $value->doctor->name,
                'slot'             => $value->slot,
                'appointment_date' => $value->appointment_date,
                'priority'         => $value->priority ? APPOINTMENT_PIORITY[$value->priority] : '',
                'vip_patient'      => $value->vip_patient ? CORPORATE_CLIENT[$value->vip_patient] : '',
                'status'           => $value->status ? APPOINTMENT_STATUS[$value->status] : '',
                'created_at'       => date('Y-m-d H:i A', strtotime($value->created_at))
            ];
        }

        $exportData[] = $query;
        return collect($exportData);
    }


    public function headings(): array {
        return [
            'Appointment ID',
            'Patient ID',
            'Doctor',
            'Slot',
            'Appointment Date',
            'Priority',
            'VIP Patient',
            'Status',
            'Created At'
        ];
    }
}

