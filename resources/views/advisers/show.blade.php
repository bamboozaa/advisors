@extends('master.main')
@section('title', 'Welcome to Advisors System 1.0')

@section('importcss')
  <!-- Data Tables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

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
            <a href="/advisers">Advisers</a>
          </li>
          <li class="breadcrumb-item active">
            {{ $adviser->lec_title2 . " " . $adviser->lec_fname . " " . $adviser->lec_lname }}
          </li>
        </ol>
      </nav>

      <div class="row">
        <!-- Table Advisers -->
        <div class="col-12">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th class="text-left" scope="col" colspan="4">ข้อมูลอาจารย์ที่ปรึกษา</th>
              </tr>
              <tr>
                <th class="align-middle text-right bg-info" scope="col">{!! Form::label('lec_title1', 'คำนำหน้าชื่อตามบัตรประชาชน', ['class' => 'form-control-plaintext text-light']) !!}</th>
                <td>
                  <!--<input class="form-control form-control-sm col-md-5" type="text" name="student_id" value="" readonly>-->
                  {!! Form::text('lec_title1', $adviser->lec_title1, ['class' => 'form-control col-md-4', 'readonly']) !!}
                </td>
                <th class="align-middle text-right bg-info" scope="col">{!! Form::label('lec_title2', 'คำนำหน้าชื่อที่แสดงในระบบ', ['class' => 'form-control-plaintext text-light']) !!}</th>
                <td>{!! Form::text('lec_title2', $adviser->lec_title2, ['class' => 'form-control', 'readonly']) !!}</td>
              </tr>
              <tr>
                <th class="align-middle text-right bg-info" scope="col">{!! Form::label('lec_fullname', 'ชื่อ - นามสกุล', ['class' => 'form-control-plaintext text-light']) !!}</th>
                <td>{!! Form::text('lec_fullname', $adviser->lec_fname . " " . $adviser->lec_lname, ['class' => 'form-control', 'readonly']) !!}</td>
                <th class="align-middle text-right bg-info" scope="col">{!! Form::label('academic_name', 'ตำแหน่งทางวิชาการ', ['class' => 'form-control-plaintext text-light']) !!}</th>
                <td>{!! Form::text('academic_name', $adviser->academic_name, ['class' => 'form-control', 'readonly']) !!}</td>
              </tr>
              <!--<tr>
                <th class="text-right" colspan="4">
                  <form action="{{ url('/advisers/'.$adviser->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <a href="{{ url('/advisers/'.$adviser->id.'/edit') }}" class="btn btn-success shadow rounded"><i class="fa fa-edit"> Edit</i></a>
                    <button type='submit' class="btn btn-danger shadow rounded" onclick="return confirm('ยืนยันการลบ')" value="delete"><i class="fa fa-times"></i> Delete</button>
                  </form>
                </th>
              </tr>-->
            </table>
          </div>
        </div>
      </div>

      <fieldset class="scheduler-border">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="true">รายชื่อนักศึกษา</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ประวัติการศึกษา</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">หลักสูตรที่ประจำหรือสอน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">ผลงานทางวิชาการ</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student-tab">
            <table class="table table-bordered table-hover table-sm mt-1">
              <thead class="bg-light">
                <tr>
                  <th scope="col">#</th>
                  <th style="white-space:nowrap" scope="col">รหัสนักศึกษา</th>
                  <th scope="col">ชื่อ - นามสกุล</th>
                  <th style="white-space:nowrap" scope="col">ปีการศึกษา/ภาค</th>
                  <th style="white-space:nowrap" scope="col">งานวิจัยทางวิชาการ</th>
                  <th width="100%" scope="col">หัวข้องานวิจัยเรื่อง</th>
                </tr>
              </thead>
              <tbody class="bg-light">
                @if (count($adviser->student)>0)
                  @foreach ($adviser->student as $key => $student)
                    <tr>
                      <td class="align-top">{{ $key+1 }}</td>
                      <td class="align-top"><a href="{{ url('/students/'.$student->id.'/edit') }}">{{ $student->student_id }}</a></td>
                      <td style="white-space:nowrap" class="align-top text-left">{{ $student->std_title . " " . $student->std_fname . " " . $student->std_lname }}</td>
                      <td class="align-top">{{ $student->academic_year . "/" . $student->semester }}</td>
                      <td style="white-space:nowrap" class="align-top text-left">{{ $student->project === 1 ? "วิทยานิพนธ์" : '' }} {{ $student->project === 2 ? "ค้นคว้าอิสระ" : '' }}</td>
                      <td class="text-left">{{ $student->title_research }}</td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td class="text-left" colspan="6"><mark><span class="text-danger">* ไม่พบข้อมูลที่ท่านต้องการค้นหา !!!</span></mark></td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
      </fieldset>

    </main>
  </div>
@endsection

@include('inc.footer')
