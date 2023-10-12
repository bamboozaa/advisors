@extends('master.main')
@section('title', 'Welcome to Advisors System 1.0')

@section('header')
  @include('inc.navbar')
@endsection


@section('content')
  <div class="row">
    @include('inc.sidemenu')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white border">
          <li class="breadcrumb-item">
            <a href="/"><i class="fa fa-home"></i></a>
          </li>
          <li class="breadcrumb-item">
            <a href="/students">Students</a>
          </li>
          <li class="breadcrumb-item active">
            {{ $student->std_fname . " " . $student->std_lname }}
          </li>
        </ol>
      </nav>

      {!! Form::open(['method' => 'PATCH', 'action' => ['StudentController@update', $student->id], 'files' => true]) !!}
          {!! Form::token() !!}
          {{-- csrf_field() --}}
          <div class="card">
            <div class="card-header">
              <h5><font color="red"><strong>แก้ไข</strong></font> ข้อมูลนักศึกษา</h5>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-hover table-sm">
                  <thead>
                    <tr>
                      <th class="align-middle bg-info text-light text-right" scope="col">รหัสนักศึกษา</th>
                      <td><input class="form-control form-control-sm col-md-5" type="text" name="student_id" value={{ $student->student_id }} readonly></td>
                      <th class="align-middle bg-info text-light text-right" scope="col">คำนำหน้าชื่อ</th>
                      <td><input class="form-control form-control-sm col-md-4" type="text" name="std_title" value={{ $student->std_title }} readonly></td>
                    </tr>
                    <tr>
                      <th class="align-middle bg-info text-light text-right" scope="col">ชื่อ</th>
                      <td><input class="form-control form-control-sm" type="text" name="std_fname" value={{ $student->std_fname }} readonly></td>
                      <th class="align-middle bg-info text-light text-right" scope="col">นามสกุล</th>
                      <td><input class="form-control form-control-sm" type="text" name="std_lname" value={{ $student->std_lname }} readonly></td>
                    </tr>
                    <tr>
                      <th class="align-middle bg-info text-light text-right" scope="col">คณะ</th>
                      <td><input class="form-control form-control-sm" type="text" name="facultyname" value={{ $student->facultyname }} readonly></td>
                      <th class="align-middle bg-info text-light text-right" scope="col">สาขาวิชา</th>
                      <td><input class="form-control form-control-sm" type="text" name="programname" value={{ $student->programname }} readonly></td>
                    </tr>
                    <tr>
                      <th class="align-middle bg-info text-light text-right" scope="col">ปีการศึกษา</th>
                      <td>
                        <select class="form-control form-control-sm col-md-3" name="academic_year" id="year">
                          <option value="">Select Year</option>
                        </select>
                      </td>
                      <th class="align-middle bg-info text-light text-right" scope="col">ภาคการศึกษา</th>
                      <td>{!! Form::select('semester', [1 => 'ปีการศึกษาที่ 1', 2 => 'ปีการศึกษาที่ 2'], $student->semester, ['class' => 'form-control form-control-sm col-md-7']) !!}</td>
                    </tr>
                    <tr>
                      <td colspan="2"></td>
                      <th class="align-middle bg-info text-light text-right" scope="col">สถานะนักศึกษา</th>
                      <td>{!! Form::select('status', [1 => 'กำลังศึกษา', 2 => 'สำเร็จการศึกษา'], $student->status, ['class' => 'form-control form-control-sm col-md-7']) !!}</td>
                    </tr>

                    <tr>
                      <th class="text-left" colspan="4">ข้อมูลการทำงานวิจัย วิทยานิพนธ์/การค้นคว้าอิสระ</th>
                    </tr>
                    <tr>
                      <th class="align-middle bg-info text-light text-right" scope="col">อาจารย์ที่ปรึกษา</th>
                      <td>
                        {!! Form::select('lec_id', $advisers, $student->lec_id, ['class' => 'form-control form-control-sm col-md-9']) !!}
                      </td>
                      <th class="align-middle bg-info text-light text-right" scope="col">งานวิจัยทางด้านวิชาการ</th>
                      <td>{!! Form::select('project', [1 => 'วิทยานิพนธ์ (Thesis)', 2 => 'การค้นคว้าอิสระ (IS)', 0 => 'ยังไม่ได้เลือกประเภทงานวิจัย'], $student->project, ['class' => 'form-control form-control-sm col-md-9']) !!}</td>
                    </tr>
                    <tr>
                      <th class="align-top bg-info text-light text-right" scope="col">หัวข้องานวิจัย</th>
                      <td colspan="3">{!! Form::textarea('title_research', $student->title_research, ['class' => 'form-control form-control-sm align-top', 'rows' => '4']) !!}</td>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <div class="form-group row justify-content-center">
                <div class="col-sm-3 pb-2">
                  <button class="btn btn-success btn-sm btn-block" type="submit" name="submit">
                    <i class="fa fa-check pr-2"></i><span>อัพเดท</span>
                  </button>
                </div>
                <div class="col-sm-3 pb-2">
                  <a href="{{ url('/students') }}" class="btn btn-danger btn-sm btn-block">
                    <i class="fa fa-times pr-2"></i><span>ยกเลิก</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <!--</form>-->
        {!! Form::close() !!}
    </main>
  </div>

  <script type="text/javascript">
  for(y = 2014; y <= 2024; y++) {
    var optn = document.createElement("OPTION");
    optn.text = y;
    optn.value = y;

    // if year is 2015 selected
    if (y == {{ $student->academic_year }}) {
      optn.selected = true;
    }

    document.getElementById('year').options.add(optn);
  }
  </script>
@endsection

@include('inc.footer')
