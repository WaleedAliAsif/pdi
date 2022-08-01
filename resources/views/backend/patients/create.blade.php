@extends('backend.main')
@section('title', 'Create User')

@section('styles')
@endsection

@push('css')
@endpush



@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Create Patient</h4>
                   </div>
                </div>
                <div class="iq-card-body px-4">
                   <form action="{{route('patients.store')}}" method="POST">
                    @csrf
                    {{@method_field('POST')}}
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="first_name" class="required">CNIC</label>
                            <input type="number" class="form-control" name="cnic" placeholder="e.g. Ali">
                        </div>

                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="first_name" class="required">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="e.g. Ali">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="last_name" class="required">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="e.g. Raza">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="email" class="required">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="e.g. abc@email.com">
                        </div>
                     </div>
                 
                     <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="first_name" class="required">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="e.g. Gujrat">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="last_name" class="required">phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="0300990898">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="required" for="designation">User Designation</label>
                                <select class="form-control" id="designation" name="gender">
                                   
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                   
                                </select>
                             </div>
                        </div>
                     </div>

                      <div class="mt-5">
                     
                      </div>
                     
                      <button type="submit" class="btn btn-primary mr-3">Submit</button>
                      <a href="{{route('users.index')}}" class="btn iq-bg-danger">Cancel</a>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection


@section('scripts')

@endsection

@push('js')
@endpush
