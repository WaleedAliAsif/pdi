@extends('backend.main')
@section('title', 'Create Designations')

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
                                <h4 class="card-title">Import Cities</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('importCities') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">File</label>
                                        <input type="file" required class=" required" id="file" name="file">
                                    </div>
                        
                                   


                         
                                  


                                </div>
                                <button type="submit" class="btn btn-primary mr-3">Submit</button>
                                <a href="{{ route('cities.index') }}" class="btn iq-bg-danger">Home</a>
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
