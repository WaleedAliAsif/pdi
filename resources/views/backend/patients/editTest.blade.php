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
                                <h4 class="card-title">Add Test</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('patients.updateTest', $test->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{ @method_field('PUT') }}
                                <div class="row">


                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="first_name" class="required">Test Name</label>
                                        <input type="text" class="form-control" name="name" placeholder=""
                                            value="{{ $test->name }}">
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-3">
                                       <label for="first_name" class="required">Test result</label>
                                       <input type="text" class="form-control" name="result" placeholder="Null"
                                           value="{{ $test->result }}">
                                   </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-12 align-self-center mb-0 "
                                                for="image">Upload Image:</label>
                                            <div class="col-sm-12">
                                                <div class="custom-file">
                                                    <input type="file" name="file" class="custom-file-input"
                                                        id="image" >
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <div class="custom-file text-center  ">
                                                    <img src="{{ asset($test->file) }}" alt=""
                                                        style="max-height: 200px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="mt-5">

                                </div>

                                <button type="submit" class="btn btn-primary mr-3">Update</button>
                                <a href="{{ route('patients.index') }}" class="btn iq-bg-danger">Cancel</a>
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
