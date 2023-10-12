@extends('master.main')
@section('title', 'Welcome to Advisors System 1.0')

@section('importcss')
  <!-- Data Tables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('header')
  @include('inc.navbar')

  @if (Session::has('add_new_adviser'))
    <script type="text/javascript">
      swal({
        title: "Good job!",
        text: "{{ session('add_new_adviser') }}",
        icon: "success",
      });
    </script>
  @endif

  @if (Session::has('delete_adviser'))
    <script type="text/javascript">
      swal({
        title: "Good job!",
        text: "{{ session('delete_adviser') }}",
        icon: "success",
      });
    </script>
  @endif

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
            Advisers
          </li>
        </ol>
      </nav>

      <div class="row justify-content-center">
          <div class="col-12">
            <table id="mydatatable" class="table table-hover table-bordered table-sm" style="width:100%">
              <thead>
                <tr>
                  <th width="5%" class="align-middle" rowspan="2">#</th>
                  <th style="white-space:nowrap" class="align-middle" rowspan="2">ชื่อ</th>
                  <th width="20%" class="align-middle" rowspan="2">นามสกุล</th>
                  <th style="white-space:nowrap" colspan="2">จำนวนภาระงานที่ปรึกษาวิทยานิพนธ์และการค้นคว้าอิสระ</th>
                  <th width="10%" class="align-middle" rowspan="2">Manage</th>
                </tr>
                <tr>
                  <th width="15%">วิทยานิพนธ์</th>
                  <th width="15%">การค้นคว้าอิสระ</th>
                </tr>
              </thead>
              <tbody>
                @if (count($advisers) > 0)
                  @foreach ($advisers as $key => $adviser)
                    <tr>
                      <td class="text-center">{{ $key+1 }}</td>
                      <td class="text-left">{{ $adviser->lec_title2 . " " . $adviser->lec_fname }}</td>
                      <td class="text-left">{{ $adviser->lec_lname }}</td>
                      @php
                      $thesiscount = 0;
                      $iscount = 0;
                      @endphp
                      <td class="text-center">
                        @foreach ($adviser->student as $student)
                          @if ($student->project == '1')
                            @php $thesiscount++; @endphp
                          @endif
                        @endforeach
                        {{ $thesiscount > 0 ? $thesiscount : "" }}
                      </td>
                      <td>
                        @foreach ($adviser->student as $student)
                          @if ($student->project == '2')
                            @php $iscount++; @endphp
                          @endif
                        @endforeach
                        {{ $iscount > 0 ? $iscount : "" }}
                      </td>
                      <td>
                        <form action="{{ url('/advisers/'.$adviser->id) }}" method="POST">
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                          <a href="{{ url('/advisers/'.$adviser->id) }}" class="btn-floating btn-sm btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                          <a href="{{ url('/advisers/'.$adviser->id.'/edit') }}" class="btn-floating btn-sm btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                          <button class="btn-floating btn-danger" type='submit' onclick="return confirm('ยืนยันการลบ')" value="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="7">ไม่พบข้อมูลที่ท่านต้องการค้นหาในขณะนี้</td>
                  </tr>
                @endif
              </tbody>
            </table>
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
      //$('#mydatatable').DataTable();
    </script>
@endsection

@include('inc.footer')
