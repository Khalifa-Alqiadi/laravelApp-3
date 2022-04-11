
@extends('admin.layout.master')
@section('content')


<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Tables /</span> Basic Tables
  </h4>
  
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Table Basic</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>id</th>
            <th>name</th>
            
            <th>image</th>
            <th>email</th>
            <th>status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
         
         @foreach ($allUsers as $user)

         <tr>
           <td>{{ $loop->iteration }}</td>
          <td>{{ $user->user_id }}</td>
          <td>{{ $user->name }}</td>
          <td>
            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
              </li>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
              </li>
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                <img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
              </li>
            </ul>
          </td>
          <td>{{ $user->email }}</td>
          <td><span class="badge bg-label-warning me-1">Pending</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
             
         @endforeach
        
         
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->


@endsection