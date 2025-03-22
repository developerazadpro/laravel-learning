@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>File Uplaod Form</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('/storage/upload/67db684234f44.jpg') }}"/>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Select File</label>
                            <input type="file" name="profileImage" id="file" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Uplaod</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
