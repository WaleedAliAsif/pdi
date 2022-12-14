@extends('backend.main')
@section('title', 'Create User')

@section('styles')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                   <form action="{{route('patients.update',$patient->id)}}" method="POST">
                    @csrf
                    {{@method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="first_name" class="required">CNIC</label>
                            <input type="number" class="form-control" name="cnic" placeholder="779" value="{{$patient->cnic}}" disabled>
                        </div>

                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="first_name" class="required">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="e.g. Ali" value="{{$patient->user->first_name}}">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="last_name" class="required">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="e.g. Raza" value="{{$patient->user->last_name}}">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="email" class="required">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="e.g. abc@email.com" value="{{$patient->user->email}}">
                        </div>
                     </div>
                 
                     <div class="row">
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="first_name" class="required">City</label>
                            <select class="form-control  select2-allow-clear  js-data-example-ajax"
                                id='city_id' name="city" required>
                                <option value="{{$patient->city->id}}">{{$patient->city->name}}</option>

                                <option>Search your City and State</option>

                            </select>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="first_name" class="required">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="e.g. Gujrat" value="{{$patient->address}}">
                        </div>
                        <div class="col-md-6 col-sm-12 mb-3">
                            <label for="last_name" class="required">phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="0300990898" value="{{$patient->phone}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="required" for="designation">Gender</label>
                                <select class="form-control" id="designation" name="gender">
                                   
                                    <option value="Male" {{$patient->gender=='Male'?'selected':''}}>Male</option>
                                    <option value="Female" {{$patient->gender=='Female'?'selected':''}}>Female</option>
                                   
                                </select>
                             </div>
                        </div>
                     </div>

                      <div class="mt-5">
                     
                      </div>
                     
                      <button type="submit" class="btn btn-primary mr-3">Update</button>
                      <a href="{{route('patients.index')}}" class="btn iq-bg-danger">Cancel</a>
                      <a href="{{route('patients.addTests',$patient->id)}}" class="btn iq-bg-primary">Add Test</a>
                   </form>
                </div>
             </div>
          </div>

          <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Patient Reports</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                   
                        <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid"
                            aria-describedby="user-list-page-info">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Result</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($patient->reports as $report)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $report->name }}</td>
                                        <td>{{ $report->result }}</td>
                                        <td><a href="{{ asset($report->file) }}">{{ asset($report->file) }}</a></td>
                                        <td>{{ date('d-m-y/h:m',strtotime($report->created_at)) }}</td>
                                        <td>
                                   
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="iq-bg-primary" data-toggle="tooltip"
                                                        data-placement="top" title=""
                                                        data-original-title="Show"
                                                        href="{{ route('patients.editTest', $report->id) }}"><i
                                                            class="lar la-eye"></i></a>
                                                



                                                </div>
                                            </form>
                                        </td>
                                    </tr>

                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    
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
<script>
   // CSRF Token
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function() {
    // var conceptName = $('#companyId').find(":selected").text();
    $("#city_id").select2({
        theme: "flat",
        // multiple: "multiple",
        ajax: {
            url: "{{route('cities.get')}}"
            , type: "post"
            , dataType: 'json'
            , delay: 250,

            data: function(params) {
                return {
                    _token: CSRF_TOKEN
                    , search: params.term // search term
                };
            }
            , processResults: function(response) {
                return {
                    results: response
                };
            }
        , }

    });

});

</script>
@endpush
