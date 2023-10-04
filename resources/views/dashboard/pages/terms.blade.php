@extends('dashboard.layouts.app')

@section('breadcrumb')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>{{ __('Pages') }}</span></li>
            <li class="breadcrumb-item active" aria-current="page"><span>{{ __('Terms and Conditions') }}</span></li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __('Terms and Conditions') }}</h4>
            </div>
        </div>
        <div class="card-body">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-en-tab" data-toggle="tab" data-target="#nav-en" type="button"
                        role="tab" aria-controls="nav-en" aria-selected="true">{{ __('English') }}</button>
                    <button class="nav-link" id="nav-ar-tab" data-toggle="tab" data-target="#nav-ar" type="button"
                        role="tab" aria-controls="nav-ar" aria-selected="false">{{ __('Arabic') }}</button>
                    <button class="nav-link" id="nav-ur-tab" data-toggle="tab" data-target="#nav-ur" type="button"
                        role="tab" aria-controls="nav-ur" aria-selected="false">{{ __('Urdu') }}</button>
                    <button class="nav-link" id="nav-fil-tab" data-toggle="tab" data-target="#nav-fil" type="button"
                        role="tab" aria-controls="nav-fil" aria-selected="false">{{ __('Filipino') }}</button>
                </div>
            </nav>
            <form action="{{ route('page.terms.store') }}" method="post">
                @csrf
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                        <label for="editor">{{ __('Content') }}</label>
                        <textarea class="form-control ckeditor" name="content_en" id="editor_en">{!! $terms->content_en ?? '' !!}</textarea>


                    </div>
                    <div class="tab-pane fade" id="nav-ar" role="tabpanel" aria-labelledby="nav-ar-tab">

                        <label for="editor">{{ __('Content') }}</label>
                        <textarea class="form-control ckeditor" name="content_ar" id="editor_ar">{!! $terms->content_ar ?? '' !!}</textarea>


                    </div>
                    <div class="tab-pane fade" id="nav-ur" role="tabpanel" aria-labelledby="nav-ur-tab">

                        <label for="editor">{{ __('Content') }}</label>
                        <textarea class="form-control ckeditor" name="content_ur" id="editor_ur">{!! $terms->content_ur ?? '' !!}</textarea>


                    </div>
                    <div class="tab-pane fade" id="nav-fil" role="tabpanel" aria-labelledby="nav-fil-tab">

                        <label for="editor">{{ __('Content') }}</label>
                        <textarea class="form-control ckeditor" name="content_fil" id="editor_fil">{!! $terms->content_fil ?? '' !!}</textarea>


                    </div>
                </div>
                @if (auth()->user()->can('edit terms'))
                    <div class="mt-3 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
                    </div>
                @endif
            </form>


        </div>
    </div>
@endsection


@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor_en'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor_ar'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor_ur'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor_fil'))
            .catch(error => {
                console.error(error);
            });
    </script>

    @if (session('message'))
        <script>
            Snackbar.show({
                text: '{{ session('message') }}',
                pos: 'top-right',
                duration: 5000,
            });
        </script>
    @endif
@endsection
