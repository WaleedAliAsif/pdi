@extends('backend.main')
@section('title', 'Edit Designation '. $city->name )

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
                                <h4 class="card-title">City</h4>
                            </div>
                        </div>
                        <div class="iq-card-body px-4">
                            <form action="{{ route('cities.update',$city->id) }}" method="POST">
                                {{@method_field('PUT')}}
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="name" class="required">Name</label>
                                        <input type="text" required class="form-control required" id="name" name="name"
                                            placeholder="Gujrat" value="{{$city->name??old('name')}}">
                                    </div>
                        
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="state" class="required">State</label>
                                        <input type="text" required class="form-control required" id="state" name="state"
                                            placeholder="Gujrat" value="{{$city->state??old('state')}}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="postal_code" class="required">postal_code</label>
                                        <input type="text" required class="form-control required" id="postal_code" name="postal_code"
                                            placeholder="50700" value="{{$city->postal_code??old('postal_code')}}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="postal_code" class="required">Country</label>
                                        <input type="text" required class="form-control required" disabled
                                            placeholder="Pakistan" value="{{$city->country??old('country')}}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="postal_code" class="required">ISO2</label>
                                        <input type="text" required class="form-control required" disabled
                                            placeholder="PK" value="{{$city->iso2??old('iso2')}}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="postal_code" class="required">ISO3</label>
                                        <input type="text" required class="form-control required" disabled
                                            placeholder="PK" value="{{$city->iso3??old('iso3')}}">
                                    </div>

                         
                                    <div class="col-md-6 col-sm-12 mb-3">
                                        <label for="population" class="required">population</label>
                                        <input type="text" required class="form-control required" id="population" name="population"
                                            placeholder="00" value="{{$city->population??old('population')}}">
                                    </div>


                                </div>



                                <button type="submit" class="btn btn-primary mr-3">Submit</button>
                                <a href="{{ route('designations.index') }}" class="btn iq-bg-danger">Home</a>
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
