@extends('master.main')
@section('title', 'Welcome to Advisors System 1.0')

@section('header')
  @include('inc.navbar')

  @if (Session::has('add_new_student'))
    <script type="text/javascript">
      swal({
        title: "Good job!",
        text: "{{ session('add_new_student') }}",
        icon: "success",
      });
    </script>
  @endif

  @if (Session::has('update_student'))
    <script type="text/javascript">
      swal({
        title: "Good job!",
        text: "{{ session('update_student') }}",
        icon: "success",
      });
    </script>
  @endif

@endsection

@section('importcss')
  <!-- Data Tables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
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
          <li class="breadcrumb-item active">
            Students
          </li>
        </ol>
      </nav>

      <div class="jumbotron">
        <iframe src="http://10.7.47.81/stu_elections/masai_receive/student_check_library_pong.php" frameborder="0" width="100%" height="105"></iframe>
      </div>

      <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <!-- Table -->
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table id="mydatatable" class="table table-sm table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="white-space:nowrap">รหัสนักศึกษา</th>
                                <th style="white-space:nowrap">ชื่อ - นามสกุล</th>
                                <th style="white-space:nowrap">อาจารย์ที่ปรึกษา</th>
                                <!--<th>คณะ</th>
                                <th style="white-space:nowrap">สาขาวิชา</th>-->
                                <th style="white-space:nowrap">งานวิจัย</th>
                                <th>เรื่อง</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($students) > 0)
                          @foreach ($students as $key => $student)
                            <tr>
                                <td class="align-top"><a href="{{ url('/students/'.$student->id.'/edit') }}">{{ $student->student_id }}</a></td>
                                <td class="align-top text-left" style="white-space:nowrap">{{ $student->std_fname . " " . $student->std_lname }}</td>
                                <td class="align-top text-left" style="white-space:nowrap">{{ $student->adviser->lec_fname . " " . $student->adviser->lec_lname }}</td>
                                <!--<td class="text-left" style="white-space:nowrap">{{ $student->facultyname }}</td>
                                <td class="text-left" style="white-space:nowrap">{{ $student->programname }}</td>-->
                                <td class="align-top text-left" style="white-space:nowrap">{{ $student->project === 1 ? "วิทยานิพนธ์" : "" }} {{ $student->project === 2 ? "การค้นคว้าอิสระ" : "" }} </td>
                                <td class="text-left">{{ $student->title_research }}</td>
                            </tr>
                          @endforeach
                        @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
  </div>
@endsection

@section('importjs')
  <!-- JS Data Tables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      $('#mydatatable').DataTable();
    </script>
@endsection

@include('inc.footer')
