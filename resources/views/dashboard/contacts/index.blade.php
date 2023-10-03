@extends('dashboard.layouts.app')

@section('style')
    <style>
        .contact-thumbnail {
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
            <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">{{ __('Contacts') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>{{ __('view') }}</span></li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="card mt-3">
        <div class="card-header ">
            <div class="p-2 row justify-content-between">
                <h4>{{ __('View contacts') }}</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Message') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Date') }}</th>

                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>

                                <td class="text-center">{{ $contact->name }}</td>
                                <td class="text-center">{{ $contact->phone }}</td>
                                <td class="text-center">{{ $contact->email }}</td>
                                <td class="text-center">{{ $contact->message }}</td>
                                <td class="text-center">
                                    @if ($contact->status)
                                        <span class="badge badge-success">{{ __('Replaid') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('Not Replaid') }}</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $contact->created_at->diffForHumans() }}</td>
                                <td class="">
                                    <a href="#" class="m-1 edit-contact-btn" data-id="{{ $contact->id }}"
                                        data-name="{{ $contact->name }}" data-phone="{{ $contact->phone }}"
                                        data-email="{{ $contact->email }}" data-message="{{ $contact->message }}"
                                        data-replay_message="@if ($contact->replay->first()) {{ strip_tags($contact->replay->first()->message) }} @endif"
                                        data-toggle="modal" data-target="#editContactModal">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    @if (auth()->user()->can('delete messages'))
                                        <a href="#" class="delete-contacts-btn m-1" data-id="{{ $contact->id }}"
                                            data-toggle="modal" data-target="#deleteContactModal"><i
                                                class="fa-solid fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="text-center">
                    {{ $contacts->links() }}
                </div>
            </div>


            @include('dashboard.contacts.__modals')

        </div>
    </div>
@endsection


@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        // delete usre
        $(document).on('click', '.delete-contacts-btn', function() {
            let id = $(this).data('id');

            let url = '{{ route('contacts.destroy', ':id') }}';
            url = url.replace(':id', id);
            console.log(url);
            $('#deleteContactForm').attr('action', url);
        })

        // show user info in the modal
        $(document).on('click', '.edit-contact-btn', function() {
            let name = $(this).data("name");
            let phone = $(this).data("phone");
            let email = $(this).data("email");
            let message = $(this).data("message");
            let replay_message = $(this).data("replay_message");
            let id = $(this).data('id');

            $('#senderName').text(name);
            $('#senderPhone').text(phone);
            $('#senderEmail').text(email);
            $('#senderMessage').text(message);
            $('#replaymessage').text(replay_message);
            $('#replayId').val(id);

            let url = '{{ route('contacts.update', ':id') }}'
            url = url.replace(':id', id);

            $('#updateContactForm').attr('action', url)
            let storeUrl = '{{ route('contacts.store') }}';

            $('#replayContactForm').attr('action', storeUrl)

        })

        $(document).on('click', '.contact-thumbnail', function() {
            $(this).toggleClass('fullscreen');
        });

        function leftPreviewcontact(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('leftPreview').setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        ClassicEditor
            .create(document.querySelector('#message'))
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
