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
          <li class="breadcrumb-item">
            <a href="{{ url('/advisers/'.$adviser->id) }}">{{ $adviser->lec_title2 . " " . $adviser->lec_fname . " " . $adviser->lec_lname }}</a>
          </li>
          <li class="breadcrumb-item active">
            <span class="text-danger">Edit</span>
          </li>
        </ol>
      </nav>

        <form class="" action="{{ action('AdviserController@update', [$adviser->id]) }}" method="POST">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0"><font color="#DC3545"><strong>แก้ไข</strong></font> ข้อมูลอาจารย์ที่ปรึกษาใหม่</h5>
            </div>
            <div class="card-body">
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="lec_id">รหัสอาจารย์ที่ปรึกษา</label><span style="color: red">*</span>
                      {!! Form::text('lec_id', $adviser->lec_id, ['class' => 'form-control form-control-sm form-control-alternative text-info']) !!}
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="personal_id">รหัสบัตรประชาชน</label>
                      {!! Form::text('personal_id', $adviser->personal_id, ['class' => 'form-control form-control-sm form-control-alternative text-info']) !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="user_name">รหัสผู้ใช้งานระบบ</label>
                      {!! Form::text('user_name', $adviser->user_name, ['class' => 'form-control form-control-sm form-control-alternative text-info']) !!}
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="lec_title1">คำนำหน้าชื่อตามบัตรประชาชน</label>
                      {!! Form::text('lec_title1', $adviser->lec_title1, ['class' => 'form-control form-control-sm form-control-alternative text-info']) !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="lec_fname">ชื่อ</label><span style="color: red">*</span>
                      {!! Form::text('lec_fname', $adviser->lec_fname, ['class' => 'form-control form-control-sm form-control-alternative text-info']) !!}
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="lec_lname">นามสกุล</label><span style="color: red">*</span>
                      {!! Form::text('lec_lname', $adviser->lec_lname, ['class' => 'form-control form-control-sm form-control-alternative text-info']) !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="lec_title2">ดำรงตำแหน่ง</label><span style="color: red">*</span>
                      {!! Form::text('lec_title2', $adviser->lec_title2, ['class' => 'form-control form-control-sm form-control-alternative text-info']) !!}
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="academic_name">ตำแหน่งทางวิชาการ</label>
                      {!! Form::text('academic_name', $adviser->academic_name, ['class' => 'form-control form-control-sm form-control-alternative text-info']) !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="major">จบการศึกษาทางด้าน</label>
                      {!! Form::text('major', $adviser->major, ['class' => 'form-control form-control-sm form-control-alternative text-info']) !!}
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="abbreviation">ตัวย่อวุฒิการศึกษา</label>
                      {!! Form::text('abbreviation', $adviser->abbreviation, ['class' => 'form-control form-control-sm form-control-alternative text-info']) !!}
                    </div>
                  </div>
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
                    <a href="{{ url('/advisers') }}" class="btn btn-danger btn-sm btn-block">
                      <i class="fa fa-times pr-2"></i><span>ยกเลิก</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

    </main>
  </div>
@endsection

@include('inc.footer')
