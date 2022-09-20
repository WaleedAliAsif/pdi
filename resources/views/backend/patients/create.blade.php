@extends('backend.main')
@section('title', 'Create User')

@section('styles')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
   <script src="{{ asset('backend/parsley.js') }}"></script>

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
                                <h4 class="card-title">Add Patient</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('patients.store') }}" method="POST" id="patient_form"
                                data-parsley-validate>
                                @csrf
                                {{ @method_field('POST') }}
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">CNIC</label>
                                        <input type="number" class="form-control" name="cnic"
                                            placeholder="3420256785612" data-parsley-type="integer">
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
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="e.g. abc@email.com">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">City</label>
                                        <select class="form-control  select2-allow-clear  js-data-example-ajax"
                                            id='city_id' name="city" required>
                                            <option>Search your City and State</option>

                                        </select>
                                    </div>
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
                                            <label class="required" for="designation">User Gender</label>
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
                                <a href="{{ route('users.index') }}" class="btn iq-bg-danger">Cancel</a>
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
<script>
   $('#patient_form').parsley();
</script>
    <script>
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            // var conceptName = $('#companyId').find(":selected").text();
            $("#city_id").select2({
                theme: "flat",
                // multiple: "multiple",
                ajax: {
                    url: "{{ route('cities.get') }}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,

                    data: function(params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                }

            });

        });
    </script>


@endpush
