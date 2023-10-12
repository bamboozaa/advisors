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
          <li class="breadcrumb-item active" aria-current="page">
            Dashboard
          </li>
        </ol>
      </nav>

      <!-- Card -->
      <div class="row">
        <div class="col-xl-3 col-md-6 mb-2">
          <div class="card border-left-primary h-100 py-2">
            <div class="card-body">
              <div class="row">
                <div class="col-4 text-center">
                  <i class="fa fa-graduation-cap text-primary fa-3x"></i>
                </div>
                <div class="col-8 text-right">
                  <span class="right">
                    <div><a href="/advisers" style="font-size: 26px;"><span>{{ $advisers_count }}</span></a></div>
                    <div><span>จำนวนอาจารย์ที่ปรึกษา</span></div>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-2">
          <div class="card border-left-warning h-100 py-2">
            <div class="card-body">
              <div class="row">
                <div class="col-4 text-center">
                  <i class="fa fa-users text-warning fa-3x"></i>
                </div>
                <div class="col-8 text-right">
                  <span class="right">
                    <div><a href="/students" style="font-size: 26px;"><span>{{ $student_count }}</span></a></div>
                    <div>จำนวนนักศึกษา</div>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--<div class="col-xl-3 col-md-6 mb-2">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-4 text-center">
                    <i class="fa fa-list text-success fa-3x"></i>
                  </div>
                  <div class="col-8 text-right">
                    <span class="right">
                      <div style="font-size: 26px;"><?php echo '50' ?></div>
                      <div>จำนวนหลักสูตร</div>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-2">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-4 text-center">
                    <i class="fa fa-gg text-danger fa-3x"></i>
                  </div>
                  <div class="col-8 text-right">
                    <span class="right">
                      <div style="font-size: 26px;"><?php echo '5' ?></div>
                      <div>สาขาวิชา</div>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>-->

        </div>
    </main>
  </div>
@endsection

@include('inc.footer')
