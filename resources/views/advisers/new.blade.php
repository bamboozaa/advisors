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
            <a href="/advisers">Advisers</a>
          </li>
          <li class="breadcrumb-item active">
            New
          </li>
        </ol>
      </nav>

      <form class="mt-3" action="{{ url('/advisers') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0"><font color="#009933"><strong>เพิ่ม</strong></font> ข้อมูลอาจารย์ที่ปรึกษาใหม่</h5>
          </div>
          <div class="card-body">
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="lec_id">รหัสอาจารย์ที่ปรึกษา</label><span style="color: red">*</span>
                    <!--@if($errors->any())
                      @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                      @endforeach
                    @endif-->
                    @error ('lec_id') <span class="alert-sm alert-danger">{{ $message }}</span> @enderror
                    {!! Form::text('lec_id', null, ['class' => 'form-control form-control-sm form-control-alternative text-primary', 'id' => 'validationLecID', 'aria-describedby' => 'inputGroupPrepend']) !!}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="personal_id">รหัสบัตรประชาชน</label>
                    {!! Form::text('personal_id', null, ['class' => 'form-control form-control-sm form-control-alternative text-primary']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="user_name">รหัสผู้ใช้งานระบบ</label>
                    {!! Form::text('user_name', null, ['class' => 'form-control form-control-sm form-control-alternative text-primary']) !!}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="lec_title1">คำนำหน้าชื่อตามบัตรประชาชน</label>
                    {!! Form::text('lec_title1', null, ['class' => 'form-control form-control-sm form-control-alternative text-primary']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="lec_fname">ชื่อ</label><span style="color: red">*</span>
                    @error ('lec_fname') <span class="alert-sm alert-danger">{{ $message }}</span> @enderror
                    {!! Form::text('lec_fname', null, ['class' => 'form-control form-control-sm form-control-alternative text-primary']) !!}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="lec_lname">นามสกุล</label><span style="color: red">*</span>
                    @error ('lec_lname') <span class="alert-sm alert-danger">{{ $message }}</span> @enderror
                    {!! Form::text('lec_lname', null, ['class' => 'form-control form-control-sm form-control-alternative text-primary']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="lec_title2">ดำรงตำแหน่ง</label><span style="color: red">*</span>
                    @error ('lec_title2') <span class="alert-sm alert-danger">{{ $message }}</span> @enderror
                    {!! Form::text('lec_title2', null, ['class' => 'form-control form-control-sm form-control-alternative text-primary']) !!}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="academic_name">ตำแหน่งทางวิชาการ</label>
                    {!! Form::text('academic_name', null, ['class' => 'form-control form-control-sm form-control-alternative text-primary']) !!}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="major">จบการศึกษาทางด้าน</label>
                    {!! Form::text('major', null, ['class' => 'form-control form-control-sm form-control-alternative text-primary']) !!}
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="abbreviation">ตัวย่อวุฒิการศึกษา</label>
                    {!! Form::text('abbreviation', null, ['class' => 'form-control form-control-sm form-control-alternative text-primary']) !!}
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="form-group row justify-content-center">
                <div class="col-sm-3 pb-2">
                  <button class="btn btn-primary btn-sm btn-block" type="submit" name="submit">
                    <i class="fa fa-floppy-o pr-2"></i><span>บันทึก</span>
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

  <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

@endsection

@include('inc.footer')
