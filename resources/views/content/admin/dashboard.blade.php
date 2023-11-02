@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dashboard - eCommerce')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/fullcalendar/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/fullcalendar/fullcalendar.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-calendar.css')}}" />
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-calendar-events.js')}}"></script>
<script src="{{asset('assets/js/app-calendar.js')}}"></script>
@endsection

<style>
  .fc-event-time {
    display: none!important;
  }
</style>

@section('content')
<div class="row">

  <!-- Statistics cards & Revenue Growth Chart -->
  <div class="col-lg-12 col-12">
    <div class="row d-flex justify-content-between">
      <!-- Statistics Cards -->
      <div class="col-6 col-md-3 col-lg-6 col-xl-6 mb-4">
        <div class="card h-100">
          <div class="card-body text-center">
            <div class="avatar mx-auto mb-2">
              <span class="avatar-initial rounded-circle bg-label-primary"><i class="bx bx-user fs-4"></i></span>
            </div>
            <span class="d-block text-nowrap">Total Users</span>
            <h2 class="mb-0">{{$totalUsers}}</h2>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3 col-lg-6 col-xl-6 mb-4">
        <div class="card h-100">
          <div class="card-body text-center">
            <div class="avatar mx-auto mb-2">
              <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-dollar fs-4"></i></span>
            </div>
            <span class="d-block text-nowrap">Total Money</span>
            <h2 class="mb-0">0</h2>
          </div>
        </div>
      </div>
      <!--/ Statistics Cards -->
    </div>
  </div>
  <!--/ Statistics cards & Revenue Growth Chart -->

  <!-- Full Calendar -->
  <div class="col-12 mb-3">
    <div class="row g-0">
      <!-- Calendar Sidebar -->
      <div class="col app-calendar-sidebar d-none" id="app-calendar-sidebar">
        <div class="border-bottom p-4 my-sm-0 mb-3">
          <div class="d-grid">
            <button class="btn btn-primary btn-toggle-sidebar" data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar" aria-controls="addEventSidebar">
              <i class="bx bx-plus me-1"></i>
              <span class="align-middle">Add Event</span>
            </button>
          </div>
        </div>
        <div class="p-4">
          <!-- inline calendar (flatpicker) -->
          <div class="ms-n2">
            <div class="inline-calendar"></div>
          </div>

          <hr class="container-m-nx my-4">

          <!-- Filter -->
          <div class="mb-4">
            <small class="text-small text-muted text-uppercase align-middle">Filter</small>
          </div>

          <div class="form-check mb-2">
            <input class="form-check-input select-all" type="checkbox" id="selectAll" data-value="all" checked>
            <label class="form-check-label" for="selectAll">View All</label>
          </div>

          <div class="app-calendar-events-filter">
            <div class="form-check form-check-danger mb-2">
              <input class="form-check-input input-filter" type="checkbox" id="select-personal" data-value="personal" checked>
              <label class="form-check-label" for="select-personal">Personal</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input input-filter" type="checkbox" id="select-business" data-value="business" checked>
              <label class="form-check-label" for="select-business">Business</label>
            </div>
            <div class="form-check form-check-warning mb-2">
              <input class="form-check-input input-filter" type="checkbox" id="select-family" data-value="family" checked>
              <label class="form-check-label" for="select-family">Family</label>
            </div>
            <div class="form-check form-check-success mb-2">
              <input class="form-check-input input-filter" type="checkbox" id="select-holiday" data-value="holiday" checked>
              <label class="form-check-label" for="select-holiday">Holiday</label>
            </div>
            <div class="form-check form-check-info">
              <input class="form-check-input input-filter" type="checkbox" id="select-etc" data-value="etc" checked>
              <label class="form-check-label" for="select-etc">ETC</label>
            </div>
          </div>
        </div>
      </div>
      <!-- /Calendar Sidebar -->

      <!-- Calendar & Modal -->
      <div class="col app-calendar-content">
        <div class="card shadow-none border-0">
          <div class="card-body pb-0">
            <!-- FullCalendar -->
            <div id="calendar"></div>
          </div>
        </div>
        <div class="app-overlay"></div>
        <!-- FullCalendar Offcanvas -->
        <div class="offcanvas offcanvas-end event-sidebar d-none" tabindex="-1" id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
          <div class="offcanvas-header border-bottom">
            <h6 class="offcanvas-title" id="addEventSidebarLabel">Add Event</h6>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <form class="event-form pt-0" id="eventForm" onsubmit="return false">
              <div class="mb-3">
                <label class="form-label" for="eventTitle">Title</label>
                <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Event Title" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="eventLabel">Label</label>
                <select class="select2 select-event-label form-select" id="eventLabel" name="eventLabel">
                  <option data-label="primary" value="Business" selected>Business</option>
                  <option data-label="danger" value="Personal">Personal</option>
                  <option data-label="warning" value="Family">Family</option>
                  <option data-label="success" value="Holiday">Holiday</option>
                  <option data-label="info" value="ETC">ETC</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="eventStartDate">Start Date</label>
                <input type="text" class="form-control" id="eventStartDate" name="eventStartDate" placeholder="Start Date" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="eventEndDate">End Date</label>
                <input type="text" class="form-control" id="eventEndDate" name="eventEndDate" placeholder="End Date" />
              </div>
              <div class="mb-3">
                <label class="switch">
                  <input type="checkbox" class="switch-input allDay-switch" />
                  <span class="switch-toggle-slider">
                    <span class="switch-on"></span>
                    <span class="switch-off"></span>
                  </span>
                  <span class="switch-label">All Day</span>
                </label>
              </div>
              <div class="mb-3">
                <label class="form-label" for="eventURL">Event URL</label>
                <input type="url" class="form-control" id="eventURL" name="eventURL" placeholder="https://www.google.com" />
              </div>
              <div class="mb-3 select2-primary">
                <label class="form-label" for="eventGuests">Add Guests</label>
                <select class="select2 select-event-guests form-select" id="eventGuests" name="eventGuests" multiple>
                  <option data-avatar="1.png" value="Jane Foster">Jane Foster</option>
                  <option data-avatar="3.png" value="Donna Frank">Donna Frank</option>
                  <option data-avatar="5.png" value="Gabrielle Robertson">Gabrielle Robertson</option>
                  <option data-avatar="7.png" value="Lori Spears">Lori Spears</option>
                  <option data-avatar="9.png" value="Sandy Vega">Sandy Vega</option>
                  <option data-avatar="11.png" value="Cheryl May">Cheryl May</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="eventLocation">Location</label>
                <input type="text" class="form-control" id="eventLocation" name="eventLocation" placeholder="Enter Location" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="eventDescription">Description</label>
                <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
              </div>
              <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                <div>
                  <button type="submit" class="btn btn-primary btn-add-event me-sm-3 me-1">Add</button>
                  <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">Cancel</button>
                </div>
                <div><button class="btn btn-label-danger btn-delete-event d-none">Delete</button></div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /Calendar & Modal -->
    </div>
  </div>
  <!-- /Full Calendar -->

  <div class="col-12">
    <!-- Striped Rows -->
    <div class="card">
      <h5 class="card-header">User Online Today</h5>
      <div class="table-responsive text-nowrap">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>User ID</th>
              <th>Name</th>
              <th>Level</th>
              <th>Last Access</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($activeUsers as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->level }}</td>
                    <td>{{ $user->last_activity }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </div>
    <!--/ Striped Rows -->
  </div>

</div>

<script>
  let events = [
    @foreach ($events as $event)
    {
      id: '{{ $event->id }}',
      url: '',
      title: '{{ $event->event_name }}',
      start: '{{ $event->start_date }}',
      end: '{{ $event->end_date }}',
      allDay: false,
      extendedProps: {
        calendar: 'Business'
      }
    },
    @endforeach
  ];
</script>
@endsection
