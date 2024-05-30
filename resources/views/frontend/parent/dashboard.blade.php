@extends('frontend.layouts.app')
<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #7e40f6;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right,
                rgba(126, 64, 246, 1),
                rgba(80, 139, 252, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right,
                rgba(126, 64, 246, 1),
                rgba(80, 139, 252, 1));
    }

    .mask-custom {
        background: rgba(24, 24, 16, 0.2);
        border-radius: 2em;
        backdrop-filter: blur(25px);
        border: 2px solid rgba(255, 255, 255, 0.05);
        background-clip: padding-box;
        box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
    }
</style>
@section('content')
    <section class="py-5 bg-white">
        <div class="container">
            <div class="d-flex align-items-start">
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                <div class="container profile-page">
                    <section class="vh-100 gradient-custom-2">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-md-12 col-xl-10">

                                    <div class="card mask-custom">
                                        <div class="card-body p-4 text-black">

                                            <div class="text-center pt-3 pb-2">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-todo-list/check1.webp"
                                                    alt="Check" width="60">
                                                <h2 class="my-4">Added Candidate</h2>


                                            </div>
                                            <div class="text-right pt-3 pb-2">

                                                <a href="{{ route('parent.addchild') }}" class="btn btn-warning">
                                                    <span
                                                        class="text-primary-grad mb-n1">{{ translate('Add Candidate') }}</span>
                                                </a>

                                            </div>
                                            <table class="table text-black mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Member Name</th>
                                                        {{-- <th scope="col">Task</th>
                                                        <th scope="col">Priority</th> --}}
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($childProfiles->count() > 0)
                                                        @foreach ($childProfiles as $key => $child)
                                                            @php
                                                                $temp = $key + 1;
                                                                if ($temp > 4) {
                                                                    $temp -= 4;
                                                                }
                                                                $src =
                                                                    'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava' .
                                                                    $temp .
                                                                    '-bg.webp';
                                                            @endphp


                                                            <tr class="fw-normal">
                                                                <th>
                                                                    <img src="{{ $src }}" alt="avatar 1"
                                                                        style="width: 45px; height: auto;">
                                                                    <span
                                                                        class="ms-2">{{ $child->first_name . ' ' . $child->last_name }}</span>
                                                                </th>
                                                                {{-- <td class="align-middle">
                                                                    <span>Call Sam For payments</span>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <h6 class="mb-0"><span class="badge bg-danger">High
                                                                            priority</span></h6>
                                                                </td> --}}
                                                                <td class="align-right">
                                                                    {{-- <a href="#!" data-mdb-tooltip-init
                                                                        title="Done"><i
                                                                            class="fas fa-check fa-lg text-success me-3"></i></a>
                                                                    <a href="#!" data-mdb-tooltip-init
                                                                        title="Remove"><i
                                                                            class="fas fa-trash-alt fa-lg text-warning"></i></a> --}}
                                                                    <a href="{{ route('child.login', $child->id) }}"
                                                                        class="btn btn-secondary mr-2">{{ translate('Login As') . ' ' . $child->first_name }}</a>
                                                                    <span></span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        {{-- <tr>
                                                            <span>{{ translate('No child found') }}</span>
                                                        </tr> --}}
                                                    @endif
                                                </tbody>

                                            </table>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </section>
@endsection
