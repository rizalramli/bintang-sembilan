<?php

namespace Modules\Employee\Http\Controllers;

use Modules\Employee\DataTables\AttendanceDataTable;
use Modules\Employee\Http\Requests\CreateAttendanceRequest;
use Modules\Employee\Http\Requests\UpdateAttendanceRequest;
use Modules\Employee\Repositories\AttendanceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Modules\Master\Models\Warehouse;
use Response;

class AttendanceController extends AppBaseController
{
    /** @var  AttendanceRepository */
    private $attendanceRepository;

    public function __construct(AttendanceRepository $attendanceRepo)
    {
        $this->attendanceRepository = $attendanceRepo;
    }

    /**
     * Display a listing of the Attendance.
     *
     * @param AttendanceDataTable $attendanceDataTable
     * @return Response
     */
    public function index(AttendanceDataTable $attendanceDataTable)
    {
        return $attendanceDataTable->render('employee::attendances.index');
    }

    /**
     * Show the form for creating a new Attendance.
     *
     * @return Response
     */
    public function create()
    {
        $warehouse = Warehouse::pluck('name', 'id');
        return view('employee::attendances.create', compact('warehouse'));
    }

    /**
     * Store a newly created Attendance in storage.
     *
     * @param CreateAttendanceRequest $request
     *
     * @return Response
     */
    public function store(CreateAttendanceRequest $request)
    {
        $input = $request->all();

        $attendance = $this->attendanceRepository->create($input);

        Flash::success('Attendance saved successfully.');

        return redirect(route('attendances.index'));
    }

    /**
     * Display the specified Attendance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Kehadiran tidak ditemukan');

            return redirect(route('attendances.index'));
        }

        return view('employee::attendances.show')->with('attendance', $attendance);
    }

    /**
     * Show the form for editing the specified Attendance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Kehadiran tidak ditemukan');

            return redirect(route('attendances.index'));
        }

        return view('employee::attendances.edit')->with('attendance', $attendance);
    }

    /**
     * Update the specified Attendance in storage.
     *
     * @param  int              $id
     * @param UpdateAttendanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttendanceRequest $request)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Kehadiran tidak ditemukan');

            return redirect(route('attendances.index'));
        }

        $attendance = $this->attendanceRepository->update($request->all(), $id);

        Flash::success('Attendance updated successfully.');

        return redirect(route('attendances.index'));
    }

    /**
     * Remove the specified Attendance from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Kehadiran tidak ditemukan');

            return redirect(route('attendances.index'));
        }

        $this->attendanceRepository->delete($id);

        Flash::success('Attendance deleted successfully.');

        return redirect(route('attendances.index'));
    }

    public function getTemplate()
    {
        $warehouse_id = request()->warehouse_id;
        $type = request()->type;
        $data = AttendanceRepository::getTemplate($warehouse_id,$type);
        is_null($data) ? $status = false : $status = true;  
        return response()->json(['status' => $status, 'data' => $data]);
    }
}
