@extends('dashboard.layouts.app')

@section('style')
    <style>
        .image-thumbnail {
            width: 100px;
        }

        .fullscreen {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            height: 80%;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection

@section('breadcrumb')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('images.index') }}">{{ __('Images') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>{{ __('view') }}</span></li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __('View Image') }}</h4>
                @if (auth()->user()->can('add images'))
                    <a href="{{ route('images.create') }}" class="btn btn-primary">{{ __('Add Image') }}</a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Thumbnail') }}</th>
                            <th>{{ __('Added_by') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Month') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Max_sale') }}</th>
                            <th>{{ __('Sale_number') }}</th>
                            <th>{{ __('Date') }}</th>
                            @if (auth()->user()->can('edit images') ||
                                    auth()->user()->can('delete images'))
                                <th>{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <div class="" style="with: 100px; overflow: hidden;">
                                        <img class="rounded image-thumbnail" src="{{ Storage::url($image->thumbnail) }}">
                                </td>
            </div>
            <td class="text-center">{{ $image->admin->name }}</td>
            <td class="text-center">{{ $image->price }}</td>
            <td class="text-center">{{ \Carbon\Carbon::create()->month($image->month)->format('F') }}</td>
            <td class="text-center">


                <div class="dropdown">
                    <button class="btn @if ($image->active) btn-success @else btn-light @endif dropdown-toggle"
                        type="button" data-toggle="dropdown" aria-expanded="false">
                        @if ($image->active)
                            {{ __('Active') }}
                        @else
                            {{ __('Not_Active') }}
                        @endif
                    </button>
                    @if (auth()->user()->can('active images'))
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                                href="{{ route('images.active', $image->id) }}">{{ __('Active') }}</a>
                            <a class="dropdown-item"
                                href="{{ route('images.deactive', $image->id) }}">{{ __('Not Active') }}</a>
                        </div>
                    @endif
                </div>

            <td class="text-center">{{ $image->qty }}</td>
            <td class="text-center">{{ $image->order_count ?? 0 }}</td>
            <td class="text-center">{{ $image->created_at->diffForHumans() }}</td>
            @if (auth()->user()->can('edit images') ||
                    auth()->user()->can('delete images'))
                <td class="">
                    @if (auth()->user()->can('edit images'))
                        <a href="#" class="m-1 edit-image-btn" data-toggle="modal" data-id="{{ $image->id }}"
                            data-thumbnail="{{ $image->thumbnail }}" data-price="{{ $image->price }}"
                            data-offer="{{ $image->offer }}" data-qty="{{ $image->qty }}"
                            data-month="{{ __(\Carbon\Carbon::create()->month($image->month)->format('F')) }}"
                            data-active="{{ $image->active ? __('Active') : __('Not Active') }}"
                            data-target="#editImageModal">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                    @endif
                    @if (auth()->user()->can('delete images'))
                        <a href="#" class="delete-images-btn m-1" data-id="{{ $image->id }}" data-toggle="modal"
                            data-target="#deleteImageModal"><i class="fa-solid fa-trash"></i></a>
                    @endif
                </td>
            @endif
            </tr>
            @endforeach

            </tbody>
            </table>

            <div class="text-center">
                {{ $images->links() }}
            </div>
        </div>


        @include('dashboard.images.__modals')

    </div>
    </div>
@endsection


@section('script')
    <script>
        // delete usre
        $(document).on('click', '.delete-images-btn', function() {
            let id = $(this).data('id');

            let url = '{{ route('images.destroy', ':id') }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#deleteImageForm').attr('action', url);
        })

        // show user info in the modal
        $(document).on('click', '.edit-image-btn', function() {
            let image = $(this).data("thumbnail");

            let src = '{{ Storage::url(':image') }}';
            src = src.replace(':image', image);
            console.log(src);

            $('#leftPreview').attr('src', src);


            $("#editPrice").val($(this).data("price"));
            $("#editOffer").val($(this).data("offer"));
            $("#Qty").val($(this).data("qty"));
            let active = $(this).data("active");
            let month = $(this).data("month");

            let url = '{{ route('images.update', ':id') }}'
            url = url.replace(':id', $(this).data('id'));

            $('#updateImageForm').attr('action', url)
            $('#editMonth').text(month);
            $('#status').text(active);

        })

        $(document).on('click', '.image-thumbnail', function() {
            $(this).toggleClass('fullscreen');
        });

        function leftPreviewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('leftPreview').setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
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
